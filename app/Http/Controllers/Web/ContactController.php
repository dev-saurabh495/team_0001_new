<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {


        $contactSettings = [
            'email' => config('contact.email'),
            'phone' => config('contact.phone'),
            'address' => config('contact.address'),
        ];




        $socialLinks = [
            [
                'name' => 'Instagram',
                'url' => config('contact.instagram'),
                'icon' => '◎',
            ],

            [
                'name' => 'YouTube',
                'url' => config('contact.youtube'),
                'icon' => '▶',
            ],

            [
                'name' => 'Facebook',
                'url' => config('contact.facebook'),
                'icon' => 'f',
            ],

            [
                'name' => 'LinkedIn',
                'url' => config('contact.linkedin'),
                'icon' => 'in',
            ],
        ];




        return view('Web.pages.contact', [
            'contactSettings' => $contactSettings,
            'socialLinks' => $socialLinks,
            'pageTitle' => __('contact.title'),
        ]);
    }



    public function submit(Request $request)
    {


        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:150',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:10',
            ],
            // data nhi ja rha 

            'subject' => [
                'required',
                'string',
                'max:50',
            ],

            'message' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            [
                'phone.digits' => 'Phone number must be exactly 10 digits.',
            ]

        ]);



        return redirect()
            ->route('contact')
            ->with(
                'success',
                __('contact.success_message'),

            );
    }
}
