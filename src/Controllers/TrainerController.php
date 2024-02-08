<?php

namespace App\Controllers;

class TrainerController
{
    public function index():void
    {
        include_once APP_PATH . '/views/pages/trainer.php';
    }
}