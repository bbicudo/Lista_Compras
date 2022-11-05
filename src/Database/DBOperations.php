<?php

namespace ListaCompras\Database;

use ListaCompras\Config\DBConnect;

class DBOperations extends DBConnect {

    public function __construct()
    {
        
    }

     /**
     * Select data from the DATABASE.
     */
    public function select($sql,$params=null){
        $query=self::getConnection()->prepare($sql);
        $query->execute($params);
         
        $rs = $query->fetchAll(\PDO::FETCH_OBJ) or die(print_r($query->errorInfo(), true));
        self::__destruct();
        return $rs;
    }
     
    /**
     * Inserts data into the DATABASE.
     */
    public function insert($sql,$params=null){
        $conn=self::getConnection();
        $query=$conn->prepare($sql);
        $query->execute($params);
  
        $rs = $conn->lastInsertId() or die(print_r($query->errorInfo(), true));
        self::__destruct();
        return $rs;
    }
     
    /**
     * Updates data from the DATABASE.
     */
    public function update($sql,$params=null){
        $query=self::getConnection()->prepare($sql);
        $query->execute($params);
        $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
        self::__destruct();
        return $rs;
    }
     
    /**
     * Deletes data from the DATABASE. 
     */
    public function delete($sql,$params=null){
        $query=self::getConnection()->prepare($sql);
        $query->execute($params);
        $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
        self::__destruct();
        return $rs;
    }
}
