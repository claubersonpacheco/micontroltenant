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

        $expense = Expense::with('budget')->where('budget_id', $id)
            ->first();

        $setting = Setting::first();

        if(!$setting){

            return redirect()->route('setting.index');

        }

        return view('admin.print.expense-view', compact('expense', 'setting'))->render();

    }
}
