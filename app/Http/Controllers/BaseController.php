<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($message = '') 
    {
        return redirect()->back()->with('success', $message);
    }
}
