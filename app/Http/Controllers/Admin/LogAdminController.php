<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class LogAdminController extends Controller
{

    public function index()
    {
        $columns = ['№','Объект','Пользователи','Свойства','Дата'];
        $logs = Log::with('user','subject')
            ->latest()
            ->paginate()
            ->withQueryString();
        return view('admin.logs.index',compact('columns','logs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
