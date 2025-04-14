<?php

class Sql
{
    private object $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=db", "roott", "");
    }

    public function setParams($prepare, $params = array()): void
    {
        foreach ($params as $key => $value) {
            $this->setParam($prepare, $key, $value);
        }
    }

    public function setParam($prepare, $key, $value):void{
        $prepare->bindValue($key, $value);
    }

    public function consult($rawQuery, $params = array())
    {
        $prepare = $this->conn->prepare($rawQuery);
        $this->setParams($prepare, $params);
        $prepare->execute();
        return $prepare;
    }

    public function select($rawQuery, $params = array()): array
    {
        $prepare = $this->consult($rawQuery, $params);
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

}
