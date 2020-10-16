<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;

class ContactController {
    public static function get($userID) {
        return DB::table('contacts')->select()->where('user_id', '=', $userID)->get();
    }
    public function store(Request $req) {
        $user_id = $req->user_id;
        $icon = $req->icon;
        $value = $req->value;

        $saveData = DB::table('contacts')->create([
            'user_id' => $user_id,
            'icon' => $icon,
            'value' => $value
        ])->execute();

        return redirect('contact', [
            'message' => "Kontak berhasil ditambahkan"
        ]);
    }
    public function delete($id) {
        $deleteData = DB::table('contacts')->delete()->where('id', '=', $id)->execute();
        
        return redirect('contact', [
            'message' => "Kontak berhasil dihapus"
        ]);
    }
}