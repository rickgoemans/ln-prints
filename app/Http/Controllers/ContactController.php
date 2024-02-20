<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class ContactController
 *
 * @package App\Http\Controllers
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class ContactController extends Controller
{
    use SEOToolsTrait;

    public function view(Request $request): View
    {
        $this->seo()->setTitle(__('Contact'));

        $subject = $request->input('subject', '');
        
        return view('contact')
            ->with([
                'subject' => $subject,
            ]);
    }

    public function mail(ContactRequest $request): RedirectResponse
    {
        Mail::send(new Contact($request->validated()));

        flash(__('contact.message.success'))
            ->success()
            ->important();

        return redirect()->route('contact.view');

    }
}
