<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request) {
        $request->user()->authorizeRoles(['user']);
        return 'Admin';
    }
}
