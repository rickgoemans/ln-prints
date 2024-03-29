<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    use SEOToolsTrait;

    public function __invoke(Request $request): View
    {
        $this->seo()->setTitle(__('Projects'));

        $projects = Project::with([
            'media',
        ])
            ->get();

        return view('projects')
            ->with([
                'projects' => $projects,
            ]);
    }
}
