<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Validator\Validator;

class TrainerController extends Controller
{
    public function index():void
    {
        $this->getView('trainer');
    }

    public function add():void
    {
        $this->getView('admin/trainer/add');
    }

    public function store():void
    {
        $data = ['name'=>''];
        $rules = ['name'=>'required|min:3|max:20'];
        $validator = new Validator();
        dd($validator->validate($data,$rules),$validator->errors());



    }
}