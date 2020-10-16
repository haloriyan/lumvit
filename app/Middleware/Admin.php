<?php

use App\Framework\Session;

class Admin {
    public function handle() {
        $data = Session::get('admin');
        if ($data == "" or count($data) == 0) {
            redirect("admin/login", [
                'message' => "You have to login first"
            ]);
        }
    }
}
