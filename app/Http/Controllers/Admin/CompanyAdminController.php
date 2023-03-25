<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\SendPassword;
use App\Models\Company;
use App\Models\Status;
use App\Models\User;
use App\Services\CompaniesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class CompanyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CompaniesService $service)
    {
        $columns = [
            'ID',
            'Статус | <i class="fas fa-cog"></i>',
            'Название',
            'Е-мейл',
            'Телефон',
            'Отгружено приборов',
            'Установлено',
            'Брак',
            'Остаток',
            'Файлы отгрузки',
            'Мастера',
            'Дата'
        ];

        $companies = User::role('company')
            ->with('status')
            ->withCount('files')
            ->get();
        return view('admin.companies.index', compact('columns', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = Status::where('model', 'company')->select('id', 'title')->get();
        return view('admin.companies.credit', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $password = $request->password;
        $item = new User;
        $item->fill($request->all());
        $item->password = Hash::make($request->password);
        $item->save();
        $item->assignRole('company');

        $item->visible_password = $password;
        Mail::to($item->email)->send(new SendPassword($item));
        return redirect()->route('admin.companies.edit', $item)->with('success', 'Информация успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $item = $user;
        $statuses = Status::where('model', 'company')->select('id', 'title')->get();
        return view('admin.companies.credit', compact('item', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($request->has('password')) {
            $password = $request->password;
            $user->visible_password = $password;
            Mail::to($user->email)->send(new SendPassword($user));
        }
        return back()->with('success', 'Информация успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
