<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Point;

class PointController extends Controller
{
    public function point (Request $request)
    {
        \Log::debug($request);
        $point = Point::where('user_id', Auth::id())->first();
        \Log::debug(json_encode($point));
        if ($request['type'] == 'plus') {
            $point->point += $request['point'];
        } elseif ($request['type'] == 'minus') {
            $point->point -= $request['point'];
        }
        $point->save();
    }

}
