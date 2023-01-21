<?php
namespace App\Models;

use App\Models\Contracts\MysqlModel;

class UserModel extends MysqlModel
{
    protected $table = 'user';

    public function haveUser($data)
    {
        $sql = "SELECT * FROM $this->table WHERE name=:name and password=:password";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function isUserAdmin($id)
    {
        $sql = "SELECT role FROM $this->table WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id'=> $id]);
        return $stmt->fetchColumn();
    }

    public function getAllUser()
    {
        $sql="SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDescription($id)
    {
        $sql = "SELECT description FROM $this->table WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id'=> $id]);
        return $stmt->fetchColumn();
    }

    public function updateDescription($data)
    {
        $sql = "UPDATE $this->table SET description=:description where id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([

            'description'=> $data['description'],
            'id' => $data['id']
        ]);
        return $stmt->rowCount();
    }

}