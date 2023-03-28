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
use App\Services\FilesService;
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
    public function index(Request $request)
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
            'Адрес установки',
            'Информация о потребителе',
            'Дополнительная информация',
            'Дата',
        ];
        if (Auth::user()->hasRole('company')) {
            $equipments = Equipment::with('status:id,color,title', 'type:id,title', 'company:id,name')
                ->where('company_id', Auth::id())
                ->get();
        } else {
            if ($request->query('company_id') != null && $request->query('status') != null) {
                $equipments = Equipment::with('status:id,color,title', 'type:id,title', 'company:id,name')
                    ->where('company_id', intval($request->query('company_id')))
                    ->where('status_id', intval($request->query('status')))
                    ->get();
            } elseif ($request->query('company_id') != null) {
                $equipments = Equipment::with('status:id,color,title', 'type:id,title', 'company:id,name')
                    ->where('company_id', intval($request->query('company_id')))
                    ->get();
            } else {
                if ($request->query('factory_number') != null) {
                    $equipments = Equipment::with('status:id,color,title', 'type:id,title', 'company:id,name')
                        ->where('factory_number', intval($request->query('factory_number')))
                        ->get();
                } else {
                    $equipments = Equipment::with('status:id,color,title', 'type:id,title', 'company:id,name')
                        //            ->select('id','status_id', '_email', 'phone', 'name', 'created_at')
                        ->get();
                }
            }
        }
        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        return view('admin.equipments.index', compact('columns', 'equipments', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = Status::where('model', 'equipment')
            ->select('id', 'color', 'title')
            ->get();
        $types = Type::where('model', 'device')->get();
        if (Auth::user()->hasRole('company')) {
            $masters = User::where('company_id', Auth::id())->get();
        } else {
            $masters = User::all();
        }
        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        return view('admin.equipments.credit', compact('statuses', 'types', 'masters', 'companies'));
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
        // dd($request->all());
        $item->description = $request->description;
        $item->consumer_info = $request->consumer_info;
        $item->additional_data = $request->additional_data;
        $item->installation_adress = $request->installation_adress;
        $item->user_id = Auth::id();
        if (Auth::user()->hasRole('company')) {
            $item->company_id = Auth::id();
        }
        $item->status_id = 1;
        $item->save();
        return redirect()->route('admin.equipments.edit', $item)->with('success', 'Информация успешно сохранена');
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
        $statuses = Status::where('model', 'equipment')
            ->select('id', 'color', 'title')
            ->get();
        $types = Type::where('model', 'device')->get();
        // $masters = User::all();
        if (Auth::user()->hasRole('company')) {
            $masters = User::where('company_id', Auth::id())->get();
        } else {
            $masters = User::all();
        }
        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        return view('admin.equipments.credit', compact('item', 'statuses', 'types', 'masters', 'companies'));
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
        $item->description = $request->description;
        $item->consumer_info = $request->consumer_info;
        $item->additional_data = $request->additional_data;
        $item->installation_adress = $request->installation_adress;
        $item->save();
        return back()->with('success', 'Информация успешно сохранена');
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
        if (Auth::user()->hasRole('company')) {
            $file->company_id = Auth::id();
        } else {
            $file->company_id = $request->company_id;
        }
        $file->title   = $request->file('csv')->getClientOriginalName();
        //        $file->save();

        Excel::import(new EquipmentsImport($file), $request->file('csv'));
        return back()->with('Данные файла добавлены');
    }
    public function photos($equipment_id, FilesService $service)
    {

        $equipment = Equipment::where('id', $equipment_id)->first();
        $full_path = '/storage/' . $service->getImagesDir();
        return view('admin.equipments.photos', ['factory_number' => $equipment->factory_number, 'photos' => $equipment->photos, 'images_path' => $full_path]);
    }
}
