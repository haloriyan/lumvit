<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;

class SkillController {
    public static function get($userID) {
        return DB::table('skills')->select()->where('user_id', '=', $userID)->get();
    }
    public function store(Request $req) {
        $user_id = $req->user_id;
        $title = $req->title;
        $level = $req->level;

        $saveData = DB::table('skills')->create([
            'user_id' => $user_id,
            'title' => $title,
            'level' => $level
        ])->execute();

        redirect('skill', [
            'message' => "Keahlian baru berhasil ditambahkan"
        ]);
    }
    public function delete($id) {
        $deleteData = DB::table('skills')->delete()->where('id', $id)->execute();
    }
}