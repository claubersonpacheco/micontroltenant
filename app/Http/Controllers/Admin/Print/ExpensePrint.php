<?php

namespace App\Http\Controllers\Admin\Print;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Expense;
use App\Models\Setting;
use App\Traits\GeneratedPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpensePrint extends Controller
{
    use GeneratedPdf;
    public function generatePDF($id)
    {

        $budget = Budget::with([
            'expenses',
            'summary',
            'filters'
        ])->where('id', $id)
            ->first();



        $pdfName = $budget->code . '.pdf';

        Storage::makeDirectory('app/public/expenses/');

        $storagePath = storage_path('app/public/expenses/' . $pdfName);

        $setting = Setting::first();

        $template = view('admin.print.expense-view',[
                'budget' => $budget,
                'expenses' => $budget->expenses,
                'filters' => $budget->filters,
                'setting' => $setting
            ])->render();;

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
    public function viewPrint($id)

    {
        $budget = Budget::with([
            'expenses',
            'summary',
            'filters'
        ])->where('id', $id)
            ->first();


        $setting = Setting::first();

        if(!$setting){

            return redirect()->route('setting.index');

        }

        return view('admin.print.expense-view',[
            'budget' => $budget,
            'expenses' => $budget->expenses,
            'filters' => $budget->filters,
            'setting' => $setting
        ])->render();

    }
}
