<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Switch the application locale.
     */
    public function switchLocale($locale): RedirectResponse
    {
        if (in_array($locale, config('app.supported_locales'))) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
