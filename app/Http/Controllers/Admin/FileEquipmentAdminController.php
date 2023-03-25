<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileEquipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileEquipmentAdminController extends Controller
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
            'Админ',
            'Компания',
            'Файл',
            'Всего оборудования',
            'Повторы',
            'Дата'
        ];

        $files_query = FileEquipment::with('user', 'company')
            ->select('id','user_id','title','count','count_double','created_at');

        $files_query = isset($_GET['company'])
            ? $files_query->where('company_id', $_GET['company'])
            : $files_query;

        $files = $files_query->latest()
            ->get();

        $companies = User::role('company')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        return view('admin.file_equipments.index', compact('columns','files','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param FileEquipment $fileEquipment
     * @return Response
     */
    public function show(FileEquipment $fileEquipment)
    {
        $item = $fileEquipment;
        return view('admin.file_equipments.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FileEquipment $fileEquipment
     * @return Response
     */
    public function edit(FileEquipment $fileEquipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FileEquipment $fileEquipment
     * @return Response
     */
    public function update(Request $request, FileEquipment $fileEquipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FileEquipment $fileEquipment
     * @return Response
     */
    public function destroy(FileEquipment $fileEquipment)
    {
        //
    }
}
