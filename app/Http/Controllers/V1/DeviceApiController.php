<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Mail\SendError;
use App\Models\Consumer;
use App\Models\ConsumerFilling;
use App\Models\ConsumerPhone;
use App\Models\Device;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeviceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $request = json_decode($request->getContent(), true);

            $consumer = Consumer::add([]);
            $consumer->status_id = Status::CONSUMER_ACTIVE;
            $consumer->user_id = auth()->id();
            $consumer->phone = $request['phone'] ?? null;
            $consumer->title = $request['name'] ?? null;
            $consumer->contract = $request['contract'] ?? null;
            $consumer->save();

            foreach ($request['seals'] as $seal) {
                $consumer_filling = ConsumerFilling::add([]);
                $consumer_filling->filling = $seal['seal'];
                $consumer_filling->consumer_id = $consumer->id;
                $consumer_filling->save();
            }

            $device = Device::add([]);
            $device->status_id = isset($request['reason']) && $request['reason'] != null
                ? Status::DEVICE_NOT_ACTIVE
                : Status::DEVICE_ACTIVE;
            $device->admin_id = auth()->id();
            $device->master_id = auth()->id();
            $device->consumer_id = $consumer->id;
            $device->year_issue = $request['year_issue'] ?? null;
            $device->images = $request['photos'] ?? null;
            $device->sim = $request['sim'] ?? null;
            $device->support = $request['support'] ?? null;
            $device->res = $request['res'] ?? null;
            $device->counter = $request['counter'] ?? null;
            $device->message = $request['message'] ?? null;
            $device->modification = $request['modification'] ?? null;
            $device->date = $request['date'] ?? null;
            $device->reason = $request['reason'] ?? null;
            $device->request = $request;
            $device->save();
            $response = [
                'consumer' => $consumer,
                'consumer_filling' => $consumer_filling,
                'device' => $device
            ];
            return response($response);
        } catch (\Exception $e) {
            return response()->json([
                'timestamp' => now(),
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
