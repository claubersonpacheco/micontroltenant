<?php

namespace App\Livewire\Tenant\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Locale extends Component
{

    public $lang;

    public function change($lang)
    {

        $this->lang = $lang;

        if (!in_array($this->lang, ['en', 'es', 'pt_BR'])) {
            abort(400);
        }

        // salva na sessão
        Session::put('locale', $lang);

        // salva no banco (supondo que settings seja singleton)
        $setting = Setting::first();


        if ($setting) {
            $setting->update(['locale' => $lang]);
        }

        return redirect()->back();
    }

}
