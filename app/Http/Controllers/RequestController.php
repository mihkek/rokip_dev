<?php

namespace App\Http\Controllers;

use App\Http\Services\Service;
use App\Models\Brigade;
use App\Models\Gbr;
use App\Models\Qualification;
use App\Models\Region;
use App\Models\Status;
use App\Models\Trigger;
use App\Models\User;
use App\Models\Working;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    public function company_masters(Request $request)
    {
        $master_ids = Brigade::where('company_id',$request->company_id)
            ->pluck('master_id');
        $masters_query = User::where('status_id',Status::USER_ACTIVE)
            ->whereIn('id',$master_ids)
            ->select('id','name');
        $masters = $masters_query->orderBy('name')->get();
        return response()->json($masters);
    }
}
