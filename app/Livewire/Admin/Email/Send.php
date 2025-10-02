<?php

namespace App\Livewire\Admin\Email;

use App\Mail\SendMail;
use App\Models\Budget;
use App\Models\Customer;
use App\Models\Email;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Mews\Purifier\Facades\Purifier;
use Spatie\Browsershot\Browsershot;

class Send extends Component
{
    public $budget;
    public $subject;
    public $customer;
    public $message;
    public $additional_emails = [];
    public $recipient_email;

    public $status = false;
    public $errorMessage = '';
    public $storagePath = '';

    public function mount($id)
    {
        $this->budget = Budget::findOrFail($id);

        $this->customer = $this->budget->customer->name;
        $this->recipient_email = $this->budget->customer->email;
        $this->subject = $this->budget->name;
    }

    public function sendEmail()
    {
        $data = $this->validate([
            'subject' => 'required|min:3',
            'customer' => 'required|min:3',
            'recipient_email' => 'required|email|min:3',
            'additional_emails.*' => 'nullable|email',
            'message' => 'nullable',
        ]);

        $error = $this->createEmail($this->budget->id);

        dd($error);

        // Registrar email enviado no banco
        Email::create([
            'subject' => $this->subject,
            'customer_id' => $this->budget->customer->id,
            'recipient_email' => $this->recipient_email,
            'additional_emails' => json_encode($this->additional_emails),
            'message' => $this->message,
            'budget_id' => $this->budget->id,
            'user_id' => Auth::id(),
        ]);

        if ($error) {
            toastr()->error('Erro ao enviar o email: ' . $error);
        } else {
            toastr()->success('Email enviado com sucesso!');
        }

        return redirect()->route('email.index');
    }

    public function createEmail($id)
    {
        try {
            $budget = Budget::where('id', $id)
                ->with(['items' => function ($query) {
                    $query->orderBy('sort_order', 'asc');
                }])
                ->firstOrFail();

            $pdfName = date('dmYHis') . $budget->code . '.pdf';
            $storagePath = storage_path('app/public/reports/' . $pdfName);

            $setting = Setting::first();

            // Dados do e-mail
            $emailData = [
                'subject' => $this->subject,
                'message' => Purifier::clean($this->message ?? ''),
                'recipient_email' => $this->recipient_email,
                'additional_emails' => $this->additional_emails,
                'name' => $this->customer,
                'code' => $budget->code,
                'total' => $budget->total,
                'logo_impress' => $setting->logo_impress,
                'title' => $setting->title,
                'email' => $setting->email,
                'whatsapp' => $setting->whatsapp,
            ];

            $template = view('admin.budget.print', compact('budget', 'setting'))->render();

            // Gerar PDF com Browsershot
            Browsershot::html($template)
                ->setNodeBinary('C:\\Program Files\\nodejs\\node.exe')
                ->setNpmBinary('C:\\Program Files\\nodejs\\npm.cmd')
                ->setOption('args', ['--no-sandbox'])
                ->setOption('executablePath', 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe')
                ->emulateMedia('screen')
                ->showBackground()
                ->showBrowserHeaderAndFooter()
                ->hideHeader()
                ->footerHtml($this->getFooterHtml($budget))
                ->setOption('pageRanges', '1-')
                ->format('A4')
                ->timeout(120)
                ->waitUntilNetworkIdle()
                ->ignoreHttpsErrors()
                ->savePdf($storagePath);


            if (!file_exists($storagePath)) {
                throw new \Exception('PDF não foi gerado.');
            }


            $pdfContent = file_get_contents($storagePath);

            // Enviar e-mail principal
            $res = Mail::to($emailData['recipient_email'])
                ->send(new SendMail($emailData, $pdfContent, $pdfName));

            // Emails adicionais
            if (!empty($emailData['additional_emails'])) {
                foreach ($emailData['additional_emails'] as $email) {
                    if (!empty($email)) {
                        Mail::to(trim($email))->send(new SendMail($emailData, $pdfContent, $pdfName));
                    }
                }
            }

            $this->status = true;
            return $res; // sem erro


        } catch (\Exception $e) {
            Log::error('Erro ao enviar email: ' . $e->getMessage());
            $this->status = false;
            dd( "erro = ".$e->getMessage());
        }


    }

    public function render()
    {
        return view('livewire.admin.email.send');
    }

    private function getFooterHtml($budget)
    {
        // Aqui você monta o HTML do rodapé do PDF
        return "<div style='text-align:center;font-size:12px;'>Orçamento: {$budget->code}</div>";
    }
}
