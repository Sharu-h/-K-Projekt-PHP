<?php

class FormController
{
    public function index()
    {
        require 'app/Views/form.view.php';
    }

    public function Form()
    {
        require 'app/Models/FormModel.php';
        $FormModel = new FormModel();
        $FormModel->Form();
    }
}
