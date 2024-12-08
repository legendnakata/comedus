<?php
namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Cafe;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function search(Request $request){
        $user_id = $request->user_id;
        $groups = Group::where('name', 'like', '%' . $request->group_name . '%')->get();
        return view("mypage", compact('groups', 'user_id'));
    }

    public function grouppage($user_id, $group_id){
        // グループ情報を取得
        $groupdata = Group::find($group_id);

        if (!$groupdata) {
            return redirect()->route('group.search')->with('error', 'グループが見つかりません。');
        }

        // 重複を除外してnameを取得
        $group_restdata = Restaurant::where('group_id', $group_id)
            ->select('name')
            ->distinct()
            ->get(); // get()を追加

        // Cafeモデルから関連情報を取得するための配列
        $cafe_data = [];

        foreach ($group_restdata as $group) {
            // nameを使用してCafeを取得
            $cafe = Cafe::where('name', $group->name)->first(); 
            if ($cafe) {
                $cafe_data[] = $cafe; // cafe情報を配列に追加
            }
        }
        return view('grouppage', compact('user_id', 'groupdata', 'cafe_data')); // $cafe_dataをビューに渡す
    }
}

