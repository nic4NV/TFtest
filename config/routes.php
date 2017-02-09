<?php

return array(
    //Слевая ЧПУ, справа Ч не очень ПУ
    'user/logout' => 'user/logout', //UserController -> actionLogout
    
    'agreement' => 'site/agreement', //SiteController -> actionAgreement
    
    'registration' => 'user/register', //UserController -> actionRegister
    
    'login' => 'user/login', //UserController -> actionLogin
    
    'user/([0-9]+)' => 'user/logged/$1', //UserController -> actionLogged
    
    '' => 'site/index', //SiteController -> actionIndex
    
);

