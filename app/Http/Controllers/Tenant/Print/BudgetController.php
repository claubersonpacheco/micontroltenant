<?php

namespace App\Http\Controllers\Tenant\Print;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Setting;
use App\Traits\GeneratedPdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;
use Spatie\Browsershot\Browsershot;

class BudgetController extends Controller
{
    use GeneratedPdf;
    public function generatePDF($id)
    {

        $budget = Budget::where('id', $id)
            ->with(['items' => function ($query) {
                $query->orderBy('sort_order', 'asc');
            }])
            ->first();

        $pdfName = $budget->code . '.pdf';

        Storage::makeDirectory('app/public/reports/');

        $storagePath = storage_path('app/public/reports/' . $pdfName);

        $setting = Setting::first();

        $template = view('admin.budget.print', compact('budget', 'setting'))->render();

       // llamo la trait Browsershot
        $this->PdfWithChrome($template, $storagePath, $budget);

        if (!file_exists($storagePath)) {
            abort(404, 'File not found.');
        }

        return response()->file($storagePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $pdfName . '"',
        ])->deleteFileAfterSend(true);

    }



    public function print($id)
    {

        $budget = Budget::where('id', $id)
            ->with(['items' => function ($query) {
                $query->orderBy('sort_order', 'asc');
            }])
            ->first();

        $setting = Setting::first();

        if(!$setting){

            return redirect()->route('setting.index');

        }

        return view('admin.budget.print', compact('budget', 'setting'))->render();

    }

}

