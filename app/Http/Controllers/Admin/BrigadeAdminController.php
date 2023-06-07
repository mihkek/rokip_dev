<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brigade;
use App\Models\Company;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrigadeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            'ID',
            'Статус | <i class="fas fa-cog"></i>',
            'Название',
            'Компания',
            'Бригада',
            'Дата'
        ];
        $brigades = Brigade::with('status','company','master','masters')
            ->get();
        return view('admin.brigades.index',compact('columns','brigades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::where('model','brigade')->select('id','title')->get();
        $companies = Company::select('id','title')
            ->orderBy('title')
            ->get();
        $masters = User::role('master')->get();
        return view('admin.brigades.credit',compact('statuses','companies','masters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Brigade::add($request->all());
        $item->user_id = Auth::id();
        $item->save();
        $item->sync_masters($request->masters);
        return redirect()->route('admin.brigades.index')->with('success','Информация успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function show(Brigade $brigade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function edit(Brigade $brigade)
    {
        $item = $brigade;
        $statuses = Status::where('model','brigade')->select('id','title')->get();
        $companies = Company::select('id','title')
            ->orderBy('title')
            ->get();
        $masters = User::role('master')->get();
        return view('admin.brigades.credit',compact('item','statuses','companies','masters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brigade $brigade)
    {
        $item = $brigade;
        $item->edit($request->all());
        $item->save();
        $item->sync_masters(array_diff($request->masters,[$request->master_id]));
        return redirect()->route('admin.brigades.index')->with('success','Информация успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brigade $brigade)
    {
        //
    }
}
