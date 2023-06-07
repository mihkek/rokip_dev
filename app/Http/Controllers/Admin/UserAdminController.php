<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\SendPassword;
use App\Models\Status;
use App\Models\User;
use App\Services\UsersService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserAdminController extends Controller
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
            'Отгружено приборов',
            'Установлено',
            'Брак',
            'Остаток',
            'Файлы отгрузки',
            'Дата'
        ];
        $roles = Role::select('id', 'name')
            ->where('name', '!=', 'master')
            ->get();
        $users = User::with('status:id,color,title') // ->select('id', 'status_id', 'email', 'phone', 'name', 'created_at')
            ->role($roles)
            ->withCount('files')
            ->paginate();
        return view('admin.users.index', compact('columns', 'users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')
            ->where('name', '!=', 'master')
            ->get();
        $statuses = Status::where('model', 'user')->select('id', 'title')->get();
        $is_master = Str::contains(url()->previous(), 'masters');
        return view('admin.users.credit', compact('roles', 'statuses', 'is_master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $password = Hash::make($request->password);
        $item = new User;
        $item->fill($request->all());
        $item->password = $password;
        $item->save();
        $item->syncRoles(Role::find($request->only('role_id')));

        $item->visible_password = $password;
        Mail::to($item->email)->send(new SendPassword($item));


        return redirect()->route('admin.users.edit', $item)->with('success', 'Информация успешно сохранена');
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
        $item = $user;
        $roles = Role::select('id', 'name')
            ->get();
        $statuses = Status::where('model', 'user')->select('id', 'title')->get();
        return view('admin.users.credit', compact('item', 'roles', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->syncRoles(Role::find($request->role_id));

        return back()->with('success', 'Информация успешно сохранена');
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
