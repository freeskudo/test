<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

class OrderController extends Controller
{
    public function form(Request $request)
    {

        $user = Auth::user();

        $total_point = 0;
        $profile = null;

        if (isset($user->id)) {
            $points = Point::get()->where('user_id',$user->id);
            foreach ($points as $key => $value){
                $total_point += $value->point;
            }
            $profile = Profile::where('user_id', $user->id)->first();
        }

        return Inertia::render('Order/Form',[
            'user' => $user,
            'total_point' => $total_point,
            'lotteries' => Lottery::all(),
            'purchase_dates' => PurchaseDate::all(),
            'purchase_windows' => PurchaseWindow::all(),
            'login_user_profile' => $profile,
            'history' => []
        ]);
    }

    public function history(Request $request)
    {

        $user = Auth::user();

        $total_point = 0;
        $profile = null;

        if (isset($user->id)) {
            $points = Point::get()->where('user_id',$user->id);
            foreach ($points as $key => $value){
                $total_point += $value->point;
            }
            $profile = Profile::where('user_id', $user->id)->first();
        }

        return Inertia::render('Order/Form',[
            'user' => $user,
            'total_point' => $total_point,
            'lotteries' => Lottery::all(),
            'purchase_dates' => PurchaseDate::all(),
            'purchase_windows' => PurchaseWindow::all(),
            'login_user_profile' => $profile,
            'history' => $request
        ]);
    }

    public function confirm(Request $request)
    {

        \Log::debug($request);

        $request->validate([
            'nonZeroSheets' => 'required',
            'date-purchase' => 'required|string|max:255',
            'name-window' => 'required|numeric|max:255',
            'name-kanji' => 'required|string|max:255',
            'name-kana' => 'required|string|max:255',
            'post-domicile' => 'required|numeric|digits:7',
            'region-domicile' => 'required|string|max:255',
            'locality-domicile' => 'required|string|max:255',
            'street-domicile' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|confirmed|string|email|max:255',
            'isSameAddress' => 'required|string|max:255'
        ]);

        if ( $request['isSameAddress'] === 'other' ) {

            $request->validate([
                'name-kanji-delivery' => 'required|string|max:255',
                'name-kana-delivery' => 'required|string|max:255',
                'post-delivery' => 'required|numeric|digits:7',
                'region-delivery' => 'required|string|max:255',
                'locality-delivery' => 'required|string|max:255',
                'street-delivery' => 'required|string|max:255',
                'phone-delivery' => 'required|numeric',
            ]);

        }

        return Inertia::render('Order/Confirm',[
            'lotteries' => Lottery::all(),
            'purchase_dates' => PurchaseDate::all(),
            'purchase_windows' => PurchaseWindow::all(),
            'request' => $request
        ]);
    }

    public function buy(Request $request)
    {

        // TODO: 所持しているポイント以上は利用できないようチェックする
        // TODO: 手数料の計算に関するバリデーションを行う

        \Log::debug("non-zero: ".$request['order']['nonZeroSheets']);

        $listCommissionRate = [
            10 => 52,
            20 => 38,
            30 => 31,
            40 => 25,
            50 => 23,
            60 => 21,
            70 => 19,
            80 => 18,
            90 => 16,
            100 => 13,
            200 => 10
        ];

        DB::beginTransaction();

        try {

            if ( // $request['order']['numSheets']['summerJumbo']['lotteryId'] ||
                $request['order']['numSheets']['summerJumbo']['renban']['centenary'] ||
                $request['order']['numSheets']['summerJumbo']['renban']['denary'] ||
                $request['order']['numSheets']['summerJumbo']['fukuren']['centenary'] ||
                $request['order']['numSheets']['summerJumbo']['bara']['centenary'] ||
                $request['order']['numSheets']['summerJumbo']['bara']['denary'] ||
                $request['order']['numSheets']['summerJumbo']['sanrenbara']['tricenary'] ||
                $request['order']['numSheets']['summerJumbo']['fukubara']['centenary'] ) {

                \Log::debug("summerJumbo::::".($request['order']['numSheets']['summerJumbo']['lotteryId']."|".
                $request['order']['numSheets']['summerJumbo']['renban']['centenary']."|".
                $request['order']['numSheets']['summerJumbo']['renban']['denary']."|".
                $request['order']['numSheets']['summerJumbo']['fukuren']['centenary']."|".
                $request['order']['numSheets']['summerJumbo']['bara']['centenary']."|".
                $request['order']['numSheets']['summerJumbo']['bara']['denary']."|".
                $request['order']['numSheets']['summerJumbo']['sanrenbara']['tricenary']."|".
                $request['order']['numSheets']['summerJumbo']['fukubara']['centenary']));

                $order = new UnpaidOrder();

                $order->lottery_id = $request['order']['numSheets']['summerJumbo']['lotteryId'];
                $order->renban_centenary = $request['order']['numSheets']['summerJumbo']['renban']['centenary'];
                $order->renban_denary = $request['order']['numSheets']['summerJumbo']['renban']['denary'];
                $order->fukuren_centenary = $request['order']['numSheets']['summerJumbo']['fukuren']['centenary'];
                $order->bara_centenary = $request['order']['numSheets']['summerJumbo']['bara']['centenary'];
                $order->bara_denary = $request['order']['numSheets']['summerJumbo']['bara']['denary'];
                $order->sanrenbara_tricenary = $request['order']['numSheets']['summerJumbo']['sanrenbara']['tricenary'];
                $order->fukubara_centenary = $request['order']['numSheets']['summerJumbo']['fukubara']['centenary'];

                if ( $request['order']['isSameAddress'] === 'other' ) {

                    $order->post_delivery = $request['order']['post-delivery'];
                    $order->region_delivery = $request['order']['region-delivery'];
                    $order->locality_delivery = $request['order']['locality-delivery'];
                    $order->street_delivery = $request['order']['street-delivery'];

                } else {

                    $order->post_delivery = $request['order']['post-domicile'];
                    $order->region_delivery = $request['order']['region-domicile'];
                    $order->locality_delivery = $request['order']['locality-domicile'];
                    $order->street_delivery = $request['order']['street-domicile'];

                }

                $order->date_purchase = $request['order']['date-purchase'];

                $order->save();

                $order_detail = new OrderDetail();

                $order_detail->order_id = $order->id;
                $order_detail->name_window = $request['order']['name-window'];
                $order_detail->name_kanji = $request['order']['name-kanji'];
                $order_detail->name_kana = $request['order']['name-kana'];
                $order_detail->post_domicile = $request['order']['post-domicile'];
                $order_detail->region_domicile = $request['order']['region-domicile'];
                $order_detail->locality_domicile = $request['order']['locality-domicile'];
                $order_detail->street_domicile = $request['order']['street-domicile'];
                $order_detail->phone = $request['order']['phone'];
                $order_detail->email = $request['order']['email'];
                $order_detail->remarks = $request['order']['remarks'];
                $order_detail->user_id = Auth::id();

                $order_detail->save();

            }

            if ( // $request['order']['numSheets']['summerJumboMini']['lotteryId'] ||
                $request['order']['numSheets']['summerJumboMini']['renban']['centenary'] ||
                $request['order']['numSheets']['summerJumboMini']['renban']['denary'] ||
                $request['order']['numSheets']['summerJumboMini']['fukuren']['centenary'] ||
                $request['order']['numSheets']['summerJumboMini']['bara']['centenary'] ||
                $request['order']['numSheets']['summerJumboMini']['bara']['denary'] ||
                $request['order']['numSheets']['summerJumboMini']['sanrenbara']['tricenary'] ||
                $request['order']['numSheets']['summerJumboMini']['fukubara']['centenary'] ) {

                \Log::debug("summerJumboMini::::".($request['order']['numSheets']['summerJumboMini']['lotteryId']."|".
                $request['order']['numSheets']['summerJumboMini']['renban']['centenary']."|".
                $request['order']['numSheets']['summerJumboMini']['renban']['denary']."|".
                $request['order']['numSheets']['summerJumboMini']['fukuren']['centenary']."|".
                $request['order']['numSheets']['summerJumboMini']['bara']['centenary']."|".
                $request['order']['numSheets']['summerJumboMini']['bara']['denary']."|".
                $request['order']['numSheets']['summerJumboMini']['sanrenbara']['tricenary']."|".
                $request['order']['numSheets']['summerJumboMini']['fukubara']['centenary']));

                $order = new UnpaidOrder();

                $order->lottery_id = $request['order']['numSheets']['summerJumboMini']['lotteryId'];
                $order->renban_centenary = $request['order']['numSheets']['summerJumboMini']['renban']['centenary'];
                $order->renban_denary = $request['order']['numSheets']['summerJumboMini']['renban']['denary'];
                $order->fukuren_centenary = $request['order']['numSheets']['summerJumboMini']['fukuren']['centenary'];
                $order->bara_centenary = $request['order']['numSheets']['summerJumboMini']['bara']['centenary'];
                $order->bara_denary = $request['order']['numSheets']['summerJumboMini']['bara']['denary'];
                $order->sanrenbara_tricenary = $request['order']['numSheets']['summerJumboMini']['sanrenbara']['tricenary'];
                $order->fukubara_centenary = $request['order']['numSheets']['summerJumboMini']['fukubara']['centenary'];

                if ($request['order']['isSameAddress'] === 'other') {

                    $order->post_delivery = $request['order']['post-delivery'];
                    $order->region_delivery = $request['order']['region-delivery'];
                    $order->locality_delivery = $request['order']['locality-delivery'];
                    $order->street_delivery = $request['order']['street-delivery'];

                } else {

                    $order->post_delivery = $request['order']['post-domicile'];
                    $order->region_delivery = $request['order']['region-domicile'];
                    $order->locality_delivery = $request['order']['locality-domicile'];
                    $order->street_delivery = $request['order']['street-domicile'];

                }

                $order->date_purchase = $request['order']['date-purchase'];

                $order->save();

                $order_detail = new OrderDetail();

                $order_detail->order_id = $order->id;
                $order_detail->name_window = $request['order']['name-window'];
                $order_detail->name_kanji = $request['order']['name-kanji'];
                $order_detail->name_kana = $request['order']['name-kana'];
                $order_detail->post_domicile = $request['order']['post-domicile'];
                $order_detail->region_domicile = $request['order']['region-domicile'];
                $order_detail->locality_domicile = $request['order']['locality-domicile'];
                $order_detail->street_domicile = $request['order']['street-domicile'];
                $order_detail->phone = $request['order']['phone'];
                $order_detail->email = $request['order']['email'];
                $order_detail->remarks = $request['order']['remarks'];
                $order_detail->user_id = Auth::id();
                $order_detail->save();

            }

            DB::commit();

        } catch (\Exception $e) {

            \Log::debug($e);

            DB::rollback();

        }

        $id = Auth::id();

        if ($id) {

            $points = Point::where('user_id', Auth::id())->get();

            $oldest_point = function () {
                $points = Point::where('user_id', Auth::id())->get();
                $oldest = (Object) [ 'deadline' => date('Y-m-d', strtotime(now()->format('Y-m-d')." 1 month"." 1 day")) ];
                foreach ($points as $key => $value) {
                    if ($value->deadline !== null && $value->validity === 1) {
                        if (strtotime($oldest->deadline) > strtotime($value->deadline)) {
                            // NOTE: DB の上から検索を前提
                            $oldest = $value;
                        }
                    }
                }
                \Log::debug($oldest->point);
                return $oldest;
            };

            $use_point = $request['order']['point'];
            if ($use_point) {
                while ($use_point > 0) {
                    $oldest = $oldest_point();
                    if ($oldest->point > $use_point) {
                        Point::where('id', $oldest->id)->update(['point' => ((int)$oldest->point - (int)$use_point)]);
                        $use_point = 0;
                    } else {
                        Point::where('id', $oldest->id)->update(['point' => 0, 'validity' => 0]);
                        $use_point = (int)$use_point - (int)$oldest->point;
                    }
                }

            }

            \Log::debug(($request['order']['total-payment']-$request['order']['point'])*0.5);

            Point::create([
                'user_id' => $id,
                'point' => ($request['order']['total-payment']-$request['order']['point'])*0.5,
                'deadline' => date('Y-m-d', strtotime(now()->format('Y-m-d')." 1 month")),
                'validity' => 1
            ]);

        }

        $tel = "xxx-xxxx-xxxx";
        $email = "xxx@example.com";

        return Inertia::render('Order/Complete',[
            'tel' => $tel,
            'email' => $email
        ]);

    }

}
