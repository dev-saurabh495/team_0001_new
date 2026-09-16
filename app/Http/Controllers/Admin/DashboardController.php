<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'members'  => 0, 
            'events'   => 0,  
            'news'     => 0,  
            'messages' => 0,  
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
