<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;

class CertificateController {
    public static function get($userID) {
        return DB::table('certificates')->select()->where('user_id', '=', $userID)->get();
    }
    public function store(Request $req) {
        $user_id = $req->user_id;
        $title = $req->title;
        $year = $req->year;

        $saveData = DB::table('certificates')->create([
            'user_id' => $user_id,
            'title' => $title,
            'year' => $year
        ])->execute();

        redirect('certificate', [
            'message' => "Data sertifikasi berhasil dihapus"
        ]);
    }
    public function delete($id) {
        $deleteData = DB::table('certificates')->delete()->where('id', '=', $id)->execute();
        
        redirect('certificate', [
            'message' => "Data sertifikasi berhasil dihapus"
        ]);
    }
}