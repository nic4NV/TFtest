<?php

class SiteController 
{
    public function actionIndex() //стартовая страница
    {
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
    
    public function actionAgreement()  //страница с соглашением
    {
        require_once(ROOT . '/views/site/agreement.php');
        return true;
    }

}
