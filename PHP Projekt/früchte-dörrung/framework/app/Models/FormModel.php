<?php

class FormModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = db();
    }

    public function Form()
    {
        $statement = $this->pdo->prepare('SELECT kunde.Id, kunde.name, kunde.telefon, 
        kunde.email, fruits.frucht, kunde.mengenkategorie, kunde.datum 
        FROM `kunde` RIGHT JOIN `fruits` ON kunde.frucht = fruits.id WHERE status = 0 ORDER BY datum ASC');
        $statement->execute();
        echo '<table border="1"><tr><th>Id</th><th>Name</th><th>Telefonnummer</th><th>Email</th><th>Frucht</th><th>Mengenkategorie</th><th>OK?</th></tr>';
        foreach ($statement as $value) {
            echo '<tr><td>' . $value['Id'] . '</td><td>' . $value['name'] . '</td><td>' .
                $value['telefon'] . '</td><td>' . $value['email'] . '</td><td>' .
                $value['frucht'] . '</td><td>' . $value['mengenkategorie'] . '</td>';
            if (date('d.m.Y') > $value['datum']) {
                echo '<td>' . $value['datum'] . '🥔</td>';
            } else {
                echo '<td>' . $value['datum'] . '🍎</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
