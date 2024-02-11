<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;
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
        $validation= $this->getRequest()->getValidator([
            'name' => 'required|min:3|max:50',
        ]);
        if (!$validation){
            foreach ($this->getRequest()->errors() as $field => $errors)
            {
                $this->getSession()->set('errors', [$field => $errors]);

            }


            $this->getRedirect('/admin/trainer/add');
        }



    }
}