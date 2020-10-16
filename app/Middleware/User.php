<?php

use App\Framework\Session;

class User {
    public function handle() {
        $data = Session::get('user');
        if ($data == "") {
            redirect("login", [
                'message' => "Maaf, kamu harus login terlebih dahulu"
            ]);
        }else if ($data->status == 0) {
            redirect("login", [
                'message' => "Tidak dapat login karena email belum diverifikasi"
            ]);
        }
    }
}
