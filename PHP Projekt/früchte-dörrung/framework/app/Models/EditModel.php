<?php

class EditModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = db();
    }

    public function edit($id, $kunde, $telefon, $email, $frucht, $status)
    {
        $statement = $this->pdo->prepare('UPDATE `kunde` SET name = :kunde , telefon = :telefon , 
                         email = :email , frucht = :fruchtid , status = :status WHERE Id = :id');
        $statement->bindParam('id', $id);
        $statement->bindParam('kunde', $kunde);
        $statement->bindParam('telefon', $telefon);
        $statement->bindParam('email', $email);
        $statement->bindParam('fruchtid', $frucht);
        $statement->bindParam('status', $status);
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
