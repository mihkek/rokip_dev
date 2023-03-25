<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\EquipmentsImport;
use App\Models\Company;
use App\Models\Equipment;
use App\Models\FileEquipment;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EquipmentAdminController extends Controller
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
            'Тип ПУ | <i class="fas fa-cog"></i>',
            '№ отгрузки',
            'Заводской №',
            'Mодификация',
            'Сила тока',
            'Номинальное напряжение',
            'Компания',
            'Дата'
        ];
        $equipments = Equipment::with('status:id,color,title','type:id,title','company:id,name')
//            ->select('id','status_id', '_email', 'phone', 'name', 'created_at')
            ->get();
        $companies = User::role('company')
            ->select('id','name')
            ->orderBy('name')
            ->get();
        return view('admin.equipments.index', compact('columns','equipments', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = Status::where('model','equipment')
            ->select('id','color', 'title')
            ->get();
        $types = Type::where('model','device')->get();
        $masters = User::all();
        $companies = User::role('company')
            ->select('id','name')
            ->orderBy('name')
            ->get();
        return view('admin.equipments.credit', compact( 'statuses','types','masters','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $item = Equipment::add($request->all());
        $item->user_id = Auth::id();
        $item->status_id = 1;
        $item->save();
        return redirect()->route('admin.equipments.edit',$item)->with('success','Информация успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param Equipment $equipment
     * @return Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Equipment $equipment
     * @return Response
     */
    public function edit(Equipment $equipment)
    {
        $item = $equipment;
        $statuses = Status::where('model','equipment')
            ->select('id','color', 'title')
            ->get();
        $types = Type::where('model','device')->get();
        $masters = User::all();
        $companies = User::role('company')
            ->select('id','name')
            ->orderBy('name')
            ->get();
        return view('admin.equipments.credit', compact( 'item','statuses','types','masters','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Equipment $equipment
     * @return Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $item = $equipment;
        $item->edit($request->all());
        $item->save();
        return back()->with('success','Информация успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Equipment $equipment
     * @return Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }

    public function import(Request $request)
    {
        $file          = new FileEquipment();
        $file->user_id = Auth::id();
        $file->company_id = $request->company_id;
        $file->title   = $request->file('csv')->getClientOriginalName();
//        $file->save();

        Excel::import(new EquipmentsImport($file), $request->file('csv'));
        return back()->with('Данные файла добавлены');
    }
}
