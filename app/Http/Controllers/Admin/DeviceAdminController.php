<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Device;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceAdminController extends Controller
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
            'Потребитель',
            'Тип',
            'Мастер',
            'Название | Описание',
            'Дата'
        ];
        $devices_query = Device::query();
        $devices_query = $devices_query->with('status:id,color,title','master','type:id,title','consumer:id,title');
        $devices = $devices_query->latest()
            ->paginate(100);
        return view('admin.devices.index',compact('columns','devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::where('model','device')->get();
        $types = Type::where('model','device')->get();
        $masters = User::role('master')->get();
        $consumers = Consumer::select('id','title')->get();
        return view('admin.devices.credit',compact('statuses','types','masters','consumers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Device::add($request->all());
        $item->uploadImages($request->images, ['folder' => 'devices']);
        $item->admin_id = Auth::id();
        $item->save();
        return redirect()->route('admin.devices.edit',$item)->with('success','Информация успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $item = $device;
        $statuses = Status::where('model','device')->get();
        $types = Type::where('model','device')->get();
        $masters = User::role('master')->get();
        $consumers = Consumer::select('id','title')->get();
        return view('admin.devices.credit',compact('item','statuses','types','masters','consumers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $item = $device;
        $item->edit($request->all());
        $item->uploadImages($request->images, ['folder' => 'devices']);
        $item->save();
        return back()->with('success','Информация успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
