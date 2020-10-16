<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;

class EducationController {
    public static function get($userID) {
        $datas = DB::table('educations')
                    ->select()
                    ->where('user_id', '=', $userID)
                    ->orderBy('start', 'DESC')
                    ->get();

        $newData = [];
        foreach ($datas as $data) {
            $data->graduate = \Carbon\Carbon::parse($data->graduate)->format('M, Y');
            if ($data->still_here == 1) {
                $data->graduate = \Carbon\Carbon::parse(date('Y-m-d'))->format('M, Y');
            }
            array_push($newData, $data);
        }

        return json_decode(json_encode($newData), FALSE);
    }
    public function store(Request $req) {
        $name = $req->name;
        $majority = $req->majority;
        $start = $req->start;
        $graduate = $req->graduate;
        $still_here = $req->still_here == "true" ? 1 : 0;

        $saveData = DB::table('educations')->create([
            'user_id' => $req->user_id,
            'name' => $name,
            'majority' => $majority,
            'start' => $start,
            'graduate' => $graduate,
            'still_here' => $still_here
        ])->execute();

        redirect('education', [
            'message' => "Data pendidikan berhasil ditambahkan"
        ]);
    }
    public function delete($id) {
        $deleteData = DB::table('educations')->delete()->where('id', '=', $id)->execute();
        
        redirect('education', [
            'message' => "Data berhasil dihapus"
        ]);
    }
}
