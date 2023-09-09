<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Lottery;
use App\Models\PurchaseDate;
use App\Models\PurchaseWindow;
use App\Models\UnpaidOrder;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\DB;
use App\Models\Point;
use App\Models\Optin;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $points = Point::where([['user_id', Auth::id()],['validity', '=', 1]])->get();

        $total_point = function () use ($points) {
            $point = 0;
            foreach ($points as $key => $value) {
                $point += $value->point;
            }
            return $point;
        };

        $oldest_point = function () use ($points) {
            $oldest = (Object) [ 'deadline' => now()->format('Y-m-d') ];
            foreach ($points as $key => $value) {
                if ($value->deadline !== null && $value->validity === 1) {
                    if (strtotime($oldest->deadline) > strtotime($value->deadline)) {
                        $oldest = $value;
                    }
                }
            }
            return $oldest;
        };

        $profile = Profile::where('user_id', Auth::id())->first();
        $optin = Optin::where('user_id', Auth::id())->first();

        return Inertia::render('Dashboard', [
            'login_user_point' => $total_point(),
            'login_user_profile' => Profile::where('user_id', Auth::id())->first(),
            'login_user_optin' => Optin::where('user_id', Auth::id())->first(),
            'oldest_point' => $oldest_point()
        ]);
    }

    public function edit(Request $request)
    {

        $user = Auth::user();
        $point = Point::where('user_id', Auth::id())->first();
        $profile = Profile::where('user_id', Auth::id())->first();
        $optin = Optin::where('user_id', Auth::id())->first();

        return Inertia::render('User/Edit',[
            'user' => Auth::user(),
            'login_user_point' => Point::where('user_id', Auth::id())->first(),
            'login_user_profile' => Profile::where('user_id', Auth::id())->first(),
            'login_user_optin' => Optin::where('user_id', Auth::id())->first()
        ]);
    }

    public function log(Request $request)
    {

        $user = Auth::user();
        $point = Point::where('user_id', Auth::id())->first();
        $profile = Profile::where('user_id', Auth::id())->first();
        $optin = Optin::where('user_id', Auth::id())->first();

        return Inertia::render('User/Log',[
            'user' => Auth::user(),
            'login_user_point' => Point::where('user_id', Auth::id())->first(),
            'login_user_profile' => Profile::where('user_id', Auth::id())->first(),
            'login_user_optin' => Optin::where('user_id', Auth::id())->first()
        ]);
    }

    public function save (Request $request)
    {
        \Log::debug($request);

        $request->validate([
            'name-kanji' => 'required|string|max:255',
            'name-kana' => 'required|string|max:255',
            'post-domicile' => 'required|numeric|digits:7',
            'region-domicile' => 'required|string|max:255',
            'locality-domicile' => 'required|string|max:255',
            'street-domicile' => 'required|string|max:255',
            'phone' => 'required|numeric'
        ]);

        \Log::debug($request);

        DB::beginTransaction();

        try {

            User::where('id', '=', Auth::id())->update([
                'name' => $request['name-kanji']
            ]);

            Profile::where('user_id', '=', Auth::id())->update([
                'kana' => $request['name-kana'],
                'post' => $request['post-domicile'],
                'region' => $request['region-domicile'],
                'locality' => $request['locality-domicile'],
                'street' => $request['street-domicile'],
                'phone' => $request['phone'],
            ]);

            Optin::where('user_id', '=', Auth::id())->update([
                'optin' => ($request['canRegister'] ? $request['canRegister'] : 0)
            ]);

            DB::commit();

        } catch (\Exception $e) {

            \Log::debug($e);

            DB::rollback();

        }

        return Inertia::render('User/EditComplete',[
            'user' => Auth::user(),
            'login_user_point' => Point::where('user_id', Auth::id())->first(),
            'login_user_profile' => Profile::where('user_id', Auth::id())->first(),
            'login_user_optin' => Optin::where('user_id', Auth::id())->first()
        ]);
    }
}
