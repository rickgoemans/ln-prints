<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class HomeController extends Controller
{
    use SEOToolsTrait;

    public function __invoke(Request $request): View
    {
        $this->seo()->setTitle(__('Home'));

        return view('home');
    }
}
