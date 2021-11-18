<?php

class InsertController
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

        require 'app/Views/insert.view.php';
    }

    public function insert()
    {
        require 'app/Models/InsertModel.php';
        if (isset($_POST['name']) && isset($_POST['telefon']) && isset($_POST['email'])) {
            try {
                $name = e(trim($_POST['name']));
                $telefon = trim($_POST['telefon']);
                $email = e(trim($_POST['email']));
                switch ($_POST['mengenkategorie']) {
                    case 5:
                        $kg = '0-5 KG / 5 Dörr Tage(+0)';
                        break;
                    case 11:
                        $kg = '5-10 KG / 8 Dörr Tage(+3)';
                        break;
                    case 19:
                        $kg = '10-15 KG / 12 Dörr Tage(+7)';
                        break;
                    case 31:
                        $kg = '15-20 KG / 18 Dörr Tage(+13)';
                        break;
                }
                $datum = date_add(new DateTime(date('Y-m-d H:i:s')), new DateInterval('P' . $_POST['mengenkategorie'] . 'D'))->format('Y-m-d');
                $frucht = $_POST['frucht'];

                $insertModel = new InsertModel();
                $insertModel->insert($name, $telefon, $email, $datum, $kg, $frucht);
            } catch (PDOException $e) {
                echo $e->getMessage() . 'fehler aufgefangen';
            }
        }
        header("Location: " . ROOT_URL . "/insert");
    }

    public function fruit()
    {
        require 'app/Models/InsertModel.php';
        $insertModel = new InsertModel();
        $insertModel->fruit();
    }
}
