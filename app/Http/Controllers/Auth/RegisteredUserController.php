<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Point;
use App\Models\Optin;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterCompleteMail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register',[
            'history' => []
        ]);
    }

    public function history(Request $request)
    {
        return Inertia::render('Auth/Register',[
            'history' => $request
        ]);
    }

    public function confirm (Request $request) 
    {

        \Log::debug($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|confirmed|string|email|max:255|unique:users',
            'kana' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'post-domicile' => 'required|numeric|digits:7',
            'region-domicile' => 'required|string|max:255',
            'locality-domicile' => 'required|string|max:255',
            'street-domicile' => 'required|string|max:255',
            'password' => ['required', 'confirmed', 'max:20', Rules\Password::defaults()]
        ]);

        return Inertia::render('Auth/RegisterConfirm',
        [
            'request'  => $request
        ]);
    
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        \Log::debug($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'kana' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'post-domicile' => 'required|numeric|digits:7',
            'region-domicile' => 'required|string|max:255',
            'locality-domicile' => 'required|string|max:255',
            'street-domicile' => 'required|string|max:255',
            'password' => ['required', 'max:20', Rules\Password::defaults()]
        ]);

        DB::beginTransaction();

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
    
            Profile::create([
                'user_id' => $user->id,
                'kana' => $request->kana,
                'post' => $request['post-domicile'],
                'region' => $request['region-domicile'],
                'locality' => $request['locality-domicile'],
                'street' => $request['street-domicile'],
                'phone' => $request->phone
            ]);
    
            Point::create([
                'user_id' => $user->id,
                'point' => 0,
                'deadline' => null,
                'validity' => false
            ]);

            DB::commit();

            event(new Registered($user));

            Optin::create([
                'user_id' => $user->id,
                'optin' => ($request->canRegister ? 1 : 0)
            ]);

        } catch (\Exception $e) {

            \Log::debug($e);

            DB::rollback();

        }

        Auth::login($user);

        Mail::send(new RegisterCompleteMail(
            $request->name,
            $request->email
        ));

        return Inertia::render('Auth/RegisterComplete');
    }
}
