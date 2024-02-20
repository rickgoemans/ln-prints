<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class ChangeLocaleController
 * @package App\Http\Controllers
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class ChangeLocaleController extends Controller
{
    public function __invoke(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, config('ln-prints.locales'))) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
