<?php
namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;

use App\Models\Machine; 

class HomeController extends Controller
{
    public function index()
    {
        $machines = Machine::where('active', 1)->with(['images', 'category'])->get();
        return view('pages.home', compact('machines'));
    }
    
}
