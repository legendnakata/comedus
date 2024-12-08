<?php
namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Restaurant;
use App\Models\User; 
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurantpage($cafe_id, $user_id)
    {
        $restaurantId = $cafe_id; // 変数名の整合性を確認
        $taste_reputation = 0;
        $price_reputation = 0;
        $comments = [];
        $users = [];
        
        // レストランを取得
        $restaurants = Restaurant::where('restaurant_id', $restaurantId)->get();
        $cafedata = Cafe::where('id', $cafe_id)->first();
        
        if ($restaurants->isEmpty()) {
            return back()->with('error', 'レストランが見つかりません。');
        }

        foreach ($restaurants as $restaurant) {
            $taste_reputation += $restaurant->taste;
            $price_reputation += $restaurant->price; 
            $comments[] = $restaurant->comment; 
            $user = User::where('user_id', $restaurant->user_id)->select('user_name')->first(); 
            if ($user) {
                $users[] = $user->user_name; 
            }
        }

        $average_taste = $taste_reputation / count($restaurants);
        $average_price = $price_reputation / count($restaurants);

        return view('restaurantpage', compact('restaurants', 'user_id', 'cafedata', 'average_taste', 'average_price', 'comments', 'users'));
    }

    public function roulettepage(Request $request)
    {
        $group_id = $request->input('group_id');
        $user_id = $request->input('user_id');
        $group_lati = $request->input('group_lati');
        $group_long = $request->input('group_long');

        return view('roulettepage', compact('group_id', 'user_id', 'group_lati', 'group_long'));
    }

    public function reputation(Request $request)
    {
        $user_id = $request->user_id;
        $group_id = $request->group_id;
        $cafe_id = $request->id; // ここでcafe_idを取得
        $cafedata = Cafe::where('id', $cafe_id)->first();

        if (!$cafedata) {
            return back()->with('error', 'カフェが見つかりません。');
        }

        $restaurant = new Restaurant();
        $restaurant->name = $cafedata->name;
        $restaurant->taste = $request->taste;
        $restaurant->comment = $request->comment;
        $restaurant->user_id = $user_id; // ユーザーIDを設定
        $restaurant->restaurant_id = $cafe_id; // ここでrestaurant_idを設定
        $restaurant->save();

        // 評価の計算を共通メソッドにすることを検討
        return view('restaurantpage', compact('restaurants', 'user_id', 'cafedata', 'average_taste', 'average_price', 'comments', 'users'));
    }
}
