<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditinformerController extends Controller
{
     public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

}
