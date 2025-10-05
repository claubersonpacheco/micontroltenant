<?php

namespace App\Livewire\Admin\Email;

use App\Mail\SendMail;
use App\Models\Budget;
use App\Models\Customer;
use App\Models\Email;
use App\Models\Setting;
use App\Traits\GeneratedPdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Mews\Purifier\Facades\Purifier;

class Send extends Component
{
    use GeneratedPdf;

    public $budget;
    public $subject;
    public $customer;
    public $message;
    public $additional_emails = ''; // agora é string
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
        $this->validate([
            'subject' => 'required|min:3',
            'customer' => 'required|min:3',
            'recipient_email' => 'required|email|min:3',
            'additional_emails' => 'nullable|string',
            'message' => 'nullable',
        ]);

        $resEnvio = $this->createEmail($this->budget->id);

        if (!$resEnvio || !file_exists(public_path($resEnvio))) {
            toastr()->error('Erro ao enviar o email: PDF não foi gerado.');
            return false;
        }

        $this->storagePath = $resEnvio;
        $this->status = true;

        // Registrar email no banco
        Email::create([
            'subject' => $this->subject,
            'customer_id' => $this->budget->customer->id,
            'recipient_email' => $this->recipient_email,
            'additional_emails' => $this->additional_emails,
            'message' => $this->message,
            'budget_id' => $this->budget->id,
            'user_id' => Auth::id(),
            'file' => $this->storagePath,
            'status' => $this->status,
        ]);

        toastr()->success('Email enviado com sucesso!');
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

            // Converter emails adicionais em array limpo
            $additionalEmails = is_array($this->additional_emails)
                ? $this->additional_emails
                : array_filter(array_map('trim', explode(',', $this->additional_emails)));

            // Dados do e-mail
            $emailData = [
                'subject' => $this->subject,
                'message' => Purifier::clean($this->message ?? ''),
                'recipient_email' => $this->recipient_email,
                'additional_emails' => $additionalEmails,
                'name' => $this->customer,
                'code' => $budget->code,
                'total' => $budget->total,
                'logo_impress' => $setting->logo_impress,
                'title' => $setting->title,
                'email' => $setting->email,
                'whatsapp' => $setting->whatsapp,
            ];

            // Gerar PDF
            $template = view('admin.budget.print', compact('budget', 'setting'))->render();
            $this->PdfWithChrome($template, $storagePath, $budget);

            if (!file_exists($storagePath)) {
                throw new \Exception('PDF não foi gerado.');
            }

            $pdfContent = file_get_contents($storagePath);

            // Enviar e-mail principal
            Mail::to($emailData['recipient_email'])
                ->send(new SendMail($emailData, $pdfContent, $pdfName));

            // Enviar e-mails adicionais
            foreach ($additionalEmails as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($email)->send(new SendMail($emailData, $pdfContent, $pdfName));
                }
            }

            $relativePath = 'storage/reports/' . $pdfName;
            return $relativePath;

        } catch (\Exception $e) {
            Log::error('Erro ao enviar email [' . $id . ']: ' . $e->getMessage());
            toastr()->error('Erro ao gerar ou enviar email: ' . $e->getMessage());
            $this->status = false;
        }

        return false;
    }

    public function render()
    {
        return view('livewire.admin.email.send');
    }

    private function getFooterHtml($budget)
    {
        return "<div style='text-align:center;font-size:12px;'>Orçamento: {$budget->code}</div>";
    }
}
