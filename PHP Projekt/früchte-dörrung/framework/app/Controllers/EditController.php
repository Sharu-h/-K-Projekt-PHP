<?php

class EditController
{
    public function index()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Daten entgegennehmen
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefon = $_POST['telefon'] ?? '';

            // Daten bereinigen
            $name = trim($name);
            $email = trim($email);
            $telefon = trim($telefon);

            // Validieren
            if (strlen($name) === 0) {
                array_push($errors, 'Bitte geben Sie einen Namen ein.');
            }

            if (strlen($email) === 0) {
                array_push($errors, 'Bitte geben Sie eine Email ein.');
            } elseif (strpos($email, '@') < 1 === true) {
                array_push($errors, 'Bitte geben Sie eine gültige Email ein.');
            }

            if (strlen($telefon) === 0) {
                array_push($errors, 'Bitte geben Sie eine Telefonnummer ein.');
            } elseif (!preg_match('/^[\+\- 0-9]+$/', $telefon)) {
                array_push($errors, 'Bitte geben Sie eine gültige Telefonnummer ein.');
            }
        }
        require 'app/Views/edit.view.php';
    }

    public function edit()
    {
        require 'app/Models/EditModel.php';
        try {
            $id = trim($_POST['id']);
            $kunde = e(trim($_POST['name']));
            $telefon = trim($_POST['telefon']);
            $email = e(trim($_POST['email']));
            $frucht =  $_POST['frucht'];
            $status = $_POST['status'];

            $EditModel = new EditModel();
            $EditModel->edit($id, $kunde, $telefon, $email, $frucht, $status);
        } catch (PDOException $e) {
            echo 'Es ist ein Fehler aufgetreten.';
        }
        header("Location: " . ROOT_URL . "/edit");
    }

    public function fruit()
    {
        require 'app/Models/EditModel.php';
        $EditModel = new EditModel();
        $EditModel->fruit();
    }
}
