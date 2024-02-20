<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class ProcessController
 * @package App\Http\Controllers
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class ProcessController extends Controller
{
    use SEOToolsTrait;

    public function __invoke(Request $request): View
    {
        $this->seo()->setTitle(__('Process'));

        return view('process');
    }
}
