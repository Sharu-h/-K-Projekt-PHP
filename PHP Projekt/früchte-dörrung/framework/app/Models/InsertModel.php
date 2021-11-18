<?php

class InsertModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = db();
    }

    public function insert($name, $telefon, $email, $datum, $kg, $frucht)
    {
        $statement = $this->pdo->prepare('INSERT INTO `kunde` 
                        (name, telefon, email, mengenkategorie, frucht, status, datum) VALUES 
                        (:name, :telefon, :email, :mengenkategorie, :frucht, 0,:datum)');
        $statement->bindParam('name', $name);
        $statement->bindParam('telefon', $telefon);
        $statement->bindParam('email', $email);
        $statement->bindParam('mengenkategorie', $kg);
        $statement->bindParam('frucht', $frucht);
        $statement->bindParam('datum', $datum);
        $statement->execute();
    }

    public function fruit()
    {
        $statement = $this->pdo->prepare('SELECT id, frucht FROM `fruits`');
        $statement->execute();
        foreach ($statement as $value) {
            echo '<option value="' . $value['id'] . '">' . $value['frucht'] . '</option>';
        }
    }
}
