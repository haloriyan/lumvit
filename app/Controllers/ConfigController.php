<?php
namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;

use App\Model\Article;

class ConfigController {
    public function belajar() {
        echo Article::toSql();
        // $art = new Article();
        // echo $art->toSql();
    }
    public function get() {
        $cfg = DB::table('config')->select()->first();
        $cfg->coordinate = self::splitLatLng($cfg->coordinate);
        return $cfg;
    }
    public static function splitLatLng($coord) {
        $c = explode(",", $coord);
        $ret = [
            'latitude' => $c[0],
            'longitude' => $c[1]
        ];
        return json_decode(json_encode($ret), FALSE);
    }
    public function update(Request $req) {
        $hotel_name = $req->hotel_name;
        $address = $req->address;
        $latitude = $req->latitude;
        $longitude = $req->longitude;
        $coordinate = $latitude.",".$longitude;
        $phone = $req->phone;
        $email = $req->email;

        $updating = DB::table('config')->update([
            'hotel_name' => $hotel_name,
            'address' => $address,
            'coordinate' => $coordinate,
            'phone' => $phone,
            'email' => $email,
        ])
        ->execute();

        redirect('admin/settings', [
            'message' => "Setting has been updated"
        ]);
    }
    public function install() {
        redirect('install/step-1');
    }
    public function installation($step = "step-1") {
        return view('install', [
            'step' => $step
        ]);
    }
    public function saveFirstStep(Request $req) {
        $hotel_name = $req->hotel_name;
        $address = $req->address;
        $latitude = $req->latitude;
        $longitude = $req->longitude;
        $coordinate = $latitude.",".$longitude;
        $phone = $req->phone;
        $email = $req->email;

        $store = DB::table('config')->create([
            'hotel_name' => $hotel_name,
            'address' => $address,
            'coordinate' => $coordinate,
            'phone' => $phone,
            'email' => $email,
        ])
        ->execute();

        redirect('install/step-2');
    }
    public function getName($email) {
        return explode("@", $email)[0];
    }
    public function saveSecondStep(Request $req) {
        $email = $req->email;
        $name = $this->getName($email);
        $password = $req->password;

        $reg = DB::table('admins')->create([
            'email' => $email,
            'password' => md5($password),
            'name' => $name,
        ])
        ->execute();

        redirect('admin/login', [
            'message' => "Your website has been succesfully installed. You can login now",
            'isTrue' => 1
        ]);
    }
}