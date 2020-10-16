<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;
use \Carbon\Carbon as Carbon;

class ExperienceController {
    public static function get($userID) {
        $datas = DB::table('experiences')
                    ->select()
                    ->where('user_id', '=', $userID)
                    ->orderBy('start', 'DESC')
                    ->get();

        $newData = [];
        foreach ($datas as $data) {
            if ($data->still_here == 1) {
                $data->end = "Sekarang";
            }else {
                $data->end = Carbon::parse($data->end)->format('M, Y');
            }
            array_push($newData, $data);
        }

        return json_decode(json_encode($newData), FALSE);
    }
    public function store(Request $req) {
        $user_id = $req->user_id;
        $title = $req->title;
        $company = $req->company;
        $start = $req->start;
        $end = $req->graduate == "" ? date('Y-m-d') : $req->graduate;
        $still_here = $req->still_here == "true" ? 1 : 0;

        $saveData = DB::table('experiences')->create([
            'user_id' => $user_id,
            'title' => $title,
            'company' => $company,
            'start' => $start,
            'end' => $end,
            'still_here' => $still_here
        ])->execute();

        redirect('experience', [
            'message' => "Pengalaman berhasil ditambahkan"
        ]);
    }
    public function edit($id) {
        // $experience = 
    }
    public function update(Request $req) {
        // 
    }
    public function delete($id) {
        $deleteData = DB::table('experiences')->delete()->where('id', '=', $id)->execute();
        
        redirect('experience', [
            'message' => "Pengalaman berhasil dihapus"
        ]);
    }
}