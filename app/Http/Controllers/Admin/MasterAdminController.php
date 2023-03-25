<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MasterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $columns = [
            'ID',
            'Статус | <i class="fas fa-cog"></i>',
            'Роль',
            'ФИО',
            'Емейл',
            'Телефон',
            'Компания',
            'Заявки',
            'Дата'
        ];
        $masters = User::role('master')->with('status')->get();
        return view('admin.masters.index', compact('columns', 'masters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')
            ->get();
        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        return view('admin.masters.credit', compact('roles', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $item = new User();
        $item->fill($request->all());
        $item->status_id = 1;
        $item->password = Hash::make($request->password);
        $item->save();
        $item->syncRoles(Role::where('name', 'master')->pluck('id'));
        return redirect()->route('admin.masters.index'); //, $item)->with('success', 'Информация успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
