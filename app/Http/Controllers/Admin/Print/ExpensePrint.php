<?php

namespace App\Http\Controllers\Admin\Print;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Expense;
use App\Models\Setting;
use Illuminate\Http\Request;

class ExpensePrint extends Controller
{

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
