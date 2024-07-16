<?php

namespace QI\SistemaDeChamados\Model\Repository;

use QI\SistemaDeChamados\Model\Call;
use \PDO;

class CallRepository{

    private $connection;

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

/**
 * @param Call $call
 * @return bool
 */

    public function insert($call){

        $stmt = $this->connection->prepare("insert into calls values (null, ?, null, ?, ?, ?, ?, ?);");
            $stmt->bindParam(1, $call->open_date->format("Y-m-d"));
                $stmt->bindParam(2, $call->user->id);
                    $stmt->bindParam(3, $call->equipament->pc_number);
                $stmt->bindParam(4, $call->classfication);
            $stmt->bindParam(5, $call->description);
        $stmt->bindParam(6, $call->notes);

        return $stmt->execute();
    }

    public function findAll(){
            $stmt = $this->connection->query("select c.*,u.name from calls c inner join users u c.user_id = u.id order by classification desc;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    function findOne($id){
            $this->connection->query("select c.id, c.equipament_id, c.description, c.notes, u.name, u.email, e.floor, e.room from calls c inner join users u on c.user_id = u.id inner join equipments e on c. equipment_id = e.pc_number where c.id = $id;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function update($call){
        $stmt = $this->connection->prepare("update calls set classification = ?, description = ?, notes = ?, last_modify_date = ? where id = ?;");
                $stmt->bindParam(1, $call->classfication);
            $stmt->bindParam(2, $call->description);
        $stmt->bindParam(3, $call->notes);
            $stmt->bindParam(4, $call->last_modify_date->format("Y-m-d"));
                $stmt->bindParam(5, $call->id);
        
        return $stmt->execute();
    }

    function delete($id){
        $stmt = $this->connection->prepare("dele from calls where id=?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
