<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FabricsController extends Controller
{
    use SEOToolsTrait;

    public function __invoke(Request $request): View
    {
        $this->seo()->setTitle(__('Fabrics'));

        $fabrics = Fabric::with([
            'media',
        ])
            ->where('active', true)
            ->get();

        return view('fabrics')
            ->with([
                'fabrics' => $fabrics,
            ]);
    }
}
