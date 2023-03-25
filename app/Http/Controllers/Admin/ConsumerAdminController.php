<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ConsumerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $columns   = [
            'ID',
            'Статус | <i class="fas fa-cog"></i>',
            'ФИО/юр.лицо',
            'Телефон',
            'Договор №',
            'Пломбы №',
            'Дата'
        ];
        $consumers = Consumer::with('status:id,color,title', 'fillings:id,consumer_id,filling')
            ->select('id', 'status_id', 'phone', 'title', 'contract', 'created_at')
            ->paginate();

        return view('admin.consumers.index', compact('columns', 'consumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = Status::where('model', 'consumer')->get();
        return view('admin.consumers.credit', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $item          = Consumer::add($request->all());
        $item->user_id = Auth::id();
        if ($request->has('phones')) {
            $phones = [];
            $i      = 0;
            foreach ($request->phones['phone'] as $phone) {
                if ($phone != null) {
                    $phones[$i]['phone'] = $phone;
                    $phones[$i]['date']  = $request->phones['date'][$i] ?? now()->format('d.m.Y');
                    $i++;
                }
            }
        }
        $item->phones = $phones ?? null;
        if ($request->has('fillings')) {
            $fillings = [];
            $i        = 0;
            foreach ($request->fillings['filling'] as $filling) {
                if ($filling != null) {
                    $fillings[$i]['filling'] = $filling;
                    $fillings[$i]['date']    = $request->fillings['date'][$i] ?? now()->format('d.m.Y');
                    $i++;
                }
            }
        }
        $item->fillings = $fillings ?? null;
        $item->save();
        return redirect()->route('admin.consumers.edit', $item)->with('success', 'Информация успешно сохранена');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Consumer $consumer
     * @return Response
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Consumer $consumer
     * @return Response
     */
    public function edit(Consumer $consumer)
    {
        $item     = $consumer;
        $statuses = Status::where('model', 'consumer')->get();
        return view('admin.consumers.credit', compact('item', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Consumer $consumer
     * @return Response
     */
    public function update(Request $request, Consumer $consumer)
    {
        $item = $consumer;
        $item->edit($request->all());
        if ($request->has('phones')) {
            $phones = [];
            $i      = 0;
            foreach ($request->phones['phone'] as $phone) {
                if ($phone != null) {
                    $phones[$i]['phone'] = $phone;
                    $phones[$i]['date']  = $request->phones['date'][$i] ?? now()->format('d.m.Y');
                    $i++;
                }
            }
        }
        $item->phones = $phones ?? null;
        if ($request->has('fillings')) {
            $fillings = [];
            $i        = 0;
            foreach ($request->fillings['filling'] as $filling) {
                if ($filling != null) {
                    $fillings[$i]['filling'] = $filling;
                    $fillings[$i]['date']    = $request->fillings['date'][$i] ?? now()->format('d.m.Y');
                    $i++;
                }
            }
        }
        $item->fillings = $fillings ?? null;
        $item->save();
        return back()->with('success', 'Информация успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Consumer $consumer
     * @return Response
     */
    public function destroy(Consumer $consumer)
    {
        //
    }
}
