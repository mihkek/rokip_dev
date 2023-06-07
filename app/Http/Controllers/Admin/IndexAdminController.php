<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleXMLElement;

class IndexAdminController extends Controller
{
    public function home()
    {
        return view('admin.home.index');
    }
}
