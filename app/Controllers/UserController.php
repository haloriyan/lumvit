<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Curl;
use App\Framework\Session;
use App\Framework\Request;
use App\Framework\Storage;
use App\Framework\Mailer;

use App\Controllers\Controller as App;
use App\Controllers\SkillController as SkillCtrl;
use App\Controllers\ContactController as ContactCtrl;
use App\Controllers\EducationController as EducationCtrl;
use App\Controllers\ExperienceController as ExperienceCtrl;
use App\Controllers\CertificateController as CertificateCtrl;

class UserController {
    public function __construct() {
        App::middleware('User', ['loginPage','registerPage','successRegister','login','register','index','tentang','bantuan','logout','accountVerification','tentang','term','bantuan','test']);
    }
    public function hasLoggedIn() {
        $user = Session::get('user');
        if ($user != "") {
            redirect('profile');
        }
    }
    public static function me() {
        $id = Session::get('user')->id;
        return DB::table('users')->select()->where('id', '=', $id)->first();
    }
    public function index() {
        return view('index');
    }
    public function tentang() {
        return view('pages.tentang');
    }
    public function term() {
        return view('pages.term');
    }
    public function bantuan() {
        return view('pages.bantuan');
    }
    public function loginPage() {
        $this->hasLoggedIn();
        return view('login');
    }
    public function registerPage() {
        $this->hasLoggedIn();
        return view('register');
    }
    public function isUserExists($name, $email) {
        $u = DB::table('users')->select('name', 'email')->where([
            ['name', '=', $name],
            ['email', '=', $email]
        ])->first();

        if ($u == "") {
            return false;
        }
        return true;
    }
    public function login(Request $req) {
        $email = $req->email;
        $password = md5($req->password);
        $isUsingGoogle = $req->isUsingGoogle;
        $loginCriteria = [
            ['email', '=', $email],
            ['password', '=', $password]
        ];
        
        if ($isUsingGoogle == "1") {
            $name = $req->name;
            $password = md5("withgoogle");
            $loginCriteria = [
                ['email', '=', $email]
            ];
            if (!$this->isUserExists($name, $email)) {
                $this->registerWithGoogle($name, $email, $password);
            }
        }

        $loggingIn = DB::table('users')
                        ->select('id', 'status')
                        ->where($loginCriteria)
                        ->first();

        if ($loggingIn == "") {
            if ($isUsingGoogle != 1) {
                return redirect('login', [
                    'message' => "Email / Password salah"
                ]);
            }else {
                echo json_encode([
                    'status' => 400,
                    'message' => "Email / Password salah"
                ]);
            }
            return false;
        }

        Session::set('user', $loggingIn);
        if ($isUsingGoogle != 1) {
            redirect('profile');
        }else {
            echo json_encode([
                'status' => 200,
                'message' => "Berhasil login"
            ]);
        }
    }
    public function registerWithGoogle($name, $email, $password) {
        return Curl::post(route('registerAction'), [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'isUsingGoogle' => 1
        ]);
    }
    public function logout() {
        Session::unset('user');
        return redirect('login');
    }
    public function isEmailHasUsed($email) {
        $check = DB::table('users')->select('email')->where('email', '=', $email)->first();
        if ($check == "") {
            return false;
        }
        return true;
    }
    public function register(Request $req) {
        $baseUrl = env('BASE_URL');
        $name = $req->name;
        $email = $req->email;
        $password = md5($req->password);
        $isUsingGoogle = $req->isUsingGoogle;
        $status = $isUsingGoogle == 1 ? 1 : 0;

        if ($this->isEmailHasUsed($email)) {
            if ($req->withGoogle != "1") {
                redirect('register', [
                    'message' => "Email sudah terdaftar. Mohon masukkan email yang lainnya",
                    'isError' => "true"
                ]);
            }
        }

        $saveData = DB::table('users')->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'status' => $status,
            'photo' => "default.png",
        ])->execute();

        if ($isUsingGoogle != 1) {
            $sendMail = Mailer::to($email, $name)
                    ->subject("Selesaikan Pendaftaran di BikinCV App")
                    ->from(env('MAIL_USERNAME'), env('APP_NAME'))
                    ->send(
                        view('email.verifyEmail', [
                            'name' => $name,
                            'email' => base64_encode($email),
                            'baseUrl' => $baseUrl
                        ])
                    );
        }

        if (!$saveData) {
            if ($isUsingGoogle != 1) {
                return redirect('register', [
                    'message' => "Gagal mendaftar",
                    'isError' => "true"
                ]);
            }else {
                return json_encode([
                    'status' => 400,
                    'message' => "Gagal register"
                ]);
            }
        }
        if ($isUsingGoogle != 1) {
            return redirect('success-register');
        }else {
            return json_encode([
                'status' => 200,
                'message' => "Sukses register"
            ]);
        }
    }
    public function successRegister() {
        return view('successRegister');
    }
    public function home() {
        $myData = self::me();

        return view('home', [
            'myData' => $myData
        ]);
    }
    public function profile() {
        $myData = self::me();

        return view('profile', [
            'myData' => $myData
        ]);
    }
    public function update($id, Request $req) {
        $name = $req->name;
        $job_role = $req->job_role;
        $address = $req->address;
        $short_bio = $req->short_bio;

        $updatingData = DB::table('users')->update([
            'name' => $name,
            'role' => $job_role,
            'short_bio' => $short_bio,
            'address' => $address
        ])
        ->where('id', '=', $id)
        ->execute();

        redirect('profile', [
            'message' => "Informasi berhasil diubah"
        ]);
    }
    public function uploadPhoto(Request $req) {
        $user_id = $req->user_id;
        $photo = $_FILES['photo'];

        $storePhoto = Storage::disk('photo')->store('/', $photo);
        $updatePhoto = DB::table('users')->update([
            'photo' => $photo['name']
        ])
        ->where('id', '=', $user_id)
        ->execute();
        
        echo json_encode([
            'status' => 200,
            'message' => "Foto berhasil diubah",
            'fileName' => $photo['name']
        ]);
    }
    public function experience() {
        $myData = self::me();
        
        $experiences = ExperienceCtrl::get($myData->id);

        return view('experience', [
            'myData' => $myData,
            'experiences' => $experiences
        ]);
    }
    public function education() {
        $myData = self::me();
        $educations = EducationCtrl::get($myData->id);

        return view('education', [
            'myData' => $myData,
            'educations' => $educations,
        ]);
    }
    public function skill() {
        $myData = self::me();
        $skills = SkillCtrl::get($myData->id);
        
        return view('skill', [
            'myData' => $myData,
            'skills' => $skills
        ]);
    }
    public function contact() {
        $myData = self::me();
        $contacts = ContactCtrl::get($myData->id);

        return view('contact', [
            'myData' => $myData,
            'contacts' => $contacts
        ]);
    }
    public function certificate() {
        $myData = self::me();
        $certificates = CertificateCtrl::get($myData->id);

        return view('certificate', [
            'myData' => $myData,
            'certificates' => $certificates
        ]);
    }
    public function export($theme) {
        $myData = self::me();
        $contacts = ContactCtrl::get($myData->id);
        $experiences = ExperienceCtrl::get($myData->id);
        $skills = SkillCtrl::get($myData->id);
        $educations = EducationCtrl::get($myData->id);
        $certificates = CertificateCtrl::get($myData->id);

        $increased = $myData->has_exported_file + 1;
        $increaseExportCount = DB::table('users')->update([
            'has_exported_file' => $increased
        ])
        ->where('id', '=', $myData->id)
        ->execute();

        return view('export', [
            'theme' => $theme,
            'myData' => $myData,
            'skills' => $skills,
            'contacts' => $contacts,
            'educations' => $educations,
            'certificates' => $certificates,
            'experiences' => $experiences
        ]);
    }
    public function accountVerification($email) {
        $email = base64_decode($email);
        $db = DB::table('users');
        $user = $db->select()->where('email', '=', $email)->first();
        $db->update(['status' => 1])->where('email', '=', $email)->execute();

        return view('accountVerification', [
            'user' => $user
        ]);
    }
    public function exportPage() {
        $myData = self::me();

        return view('exportPage', [
            'myData' => $myData
        ]);
    }
}
