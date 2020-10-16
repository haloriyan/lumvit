<?php

$routes = [
    'password' => function() {
        echo base64_encode("riyan.satria.619@gmail.com");
    },
    
    '/' => 'GET:UserController@index',
    'tentang' => 'GET:UserController@tentang',
    'bantuan' => 'GET:UserController@bantuan',
    'term' => 'GET:UserController@term',
    'loginAction' => "POST:UserController@login",
    'registerAction' => "POST:UserController@register",
    'login' => "GET:UserController@loginPage",
    'logout' => "GET:UserController@logout",
    'register' => "GET:UserController@registerPage",
    'success-register' => "GET:UserController@successRegister",
    'account-verification/{email}' => "GET:UserController@accountVerification",

    'export' => "GET:UserController@exportPage",
    'export/{theme}' => "GET:UserController@export",

    'home' => "GET:UserController@home",
    'profile' => "GET:UserController@profile",
    'experience' => "GET:UserController@experience",
    'education' => "GET:UserController@education",
    'skill' => "GET:UserController@skill",
    'certificate' => "GET:UserController@certificate",
    'contact' => "GET:UserController@contact",

    'contact/store' => "POST:ContactController@store",
    'contact/{id}/delete' => "GET:ContactController@delete",

    'certificate/store' => "POST:CertificateController@store",
    'certificate/{id}/delete' => "GET:CertificateController@delete",
    
    'skill/store' => "POST:SkillController@store",
    'skill/{id}/delete' => "GET:SkillController@delete",

    'profile/{id}/update' => "POST:UserController@update",
    'profile/photo' => "POST:UserController@uploadPhoto",

    'experience/store' => "POST:ExperienceController@store",
    'experience/{id}/delete' => "GET:ExperienceController@delete",

    'education/store' => "POST:EducationController@store",
    'education/{id}/delete' => "GET:EducationController@delete",
];
