<?php

use App\Framework\Session;

class Admin {
    public function handle() {
        $data = Session::get('admin');
        if ($data == "") {
            redirect("admin/login", [
                'message' => "You have to login first"
            ]);
        }
    }
}
