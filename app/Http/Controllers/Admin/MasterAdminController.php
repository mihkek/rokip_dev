<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MasterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
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
        if (Auth::user()->hasRole('company')) {
            $masters = User::role('master')->with('status', 'company')->where('company_id', Auth::id())->get();
        } else {
            if ($request->query('company_id') != null) {
                $masters = User::role('master')->with('status', 'company')->where('company_id', intval($request->company_id))->get();
            } else {
                $masters = User::role('master')->with('status', 'company')->get();
            }
        }
        return view('admin.masters.index', compact('columns', 'masters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $roles = Role::select('id', 'name')
            ->get();
        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        $company_id = null;
        if ($request->query('company_id') != null) {
            $company_id = intval($request->query('company_id'));
        }

        return view('admin.masters.credit', compact('roles', 'companies', 'company_id'));
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
        if (Auth::user()->hasRole('company')) {
            $item->company_id = Auth::id();
        } else {
            $item->company_id = $request->company_id;
        }
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
    public function edit(Request $request, User $master)
    {
        $item = $master;
        // dd($item);
        $roles = Role::select('id', 'name')
            ->get();
        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        $company_id = null;
        if ($request->query('company_id') != null) {
            $company_id = intval($request->query('company_id'));
        }

        return view('admin.masters.credit', compact('roles', 'companies', 'company_id', 'item'));
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
        $item = User::where('id', $request->id)->first();
        $item->fill($request->all());
        $item->status_id = 1;
        if (Auth::user()->hasRole('company')) {
            $item->company_id = Auth::id();
        } else {
            $item->company_id = $request->company_id;
        }
        $item->save();
        $item->syncRoles(Role::where('name', 'master')->pluck('id'));
        return redirect()->route('admin.masters.index');
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
    public function remove(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->delete();
        return redirect()->route('admin.masters.index')->with('success', 'Мастер успешно удален');
    }
}
