<?php

return array(
    //Слевая ЧПУ, справа Ч не очень ПУ
    
    
    'agreement' => 'site/agreement', //SiteController -> actionAgreement
    
    'registration' => 'user/register', //UserController -> actionRegister
    
    'login' => 'user/login', //UserController -> actionLogin
    
    'user/([0-9]+)' => 'user/logged/$1', //UserController -> actionLogged
    
    'logout' => 'user/logout', //UserController -> actionLogout
    
    '' => 'site/index', //SiteController -> actionIndex
    
);

