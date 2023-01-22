<?php

namespace App\Models\Contracts;



class MysqlModel extends BaseModel{

    public function __construct() {

        try {
            $this->connection = new \PDO('mysql:host=localhost;dbname=jooyeshgar', 'root', '');
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            
        } catch (\PDOException $e) {

            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }

    public function create($data)
    {
        
        try{

            $sql = "INSERT INTO user (name, password, description, role) VALUES (:name, :pass, :desc, :role)";
            $stmt= $this->connection->prepare($sql);
            $stmt->execute($data);
            $id = $this->connection->lastInsertId();
            return [
                'msg' => 'با موفقیت ثبت نام شدید',
                'id' => $id,
                'status' => true
            ];

        }catch(\Exception $e){

            if($e->getCode() == 23000){

                return [
                    'msg' => 'این نام قبلا استفاده شده',
                    'status' => false
                ];
            }

            return $e->getMessage();
        }
     
       
    }

    public function read($id)
    {
        
        $sql = "SELECT id, name, password,role FROM $this->table WHERE id = :id";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $sql = "UPDATE $this->table SET name=:name, password=:password WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            'name'    => $data['name'],
            'password'=> $data['password'],
            'id' => $data['id']
        ]);
        return $stmt->rowCount();
    }

    public function delete()
    {

    }

}