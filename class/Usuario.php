<?php

class Usuario
{
    private int $id;
    private String $nome,$email,$senha;

    public function setId(int $id):void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): String
    {
        return $this->nome;
    }

    public function setNome(String $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): String
    {
        return $this->email;
    }

    public function setEmail(String $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): String
    {
        return $this->senha;
    }

    public function setSenha(String $senha): void
    {
        $this->senha = $senha;
    }

    public function loadById(int $id):string{
        $sql = new Sql();
        $resultado = $sql->select("SELECT * FROM cadastrados WHERE id = :id",array("id"=>$id));
        if(isset($resultado[0])){
            $row = $resultado[0];
            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setEmail($row['email']);
            $this->setSenha($row['senha']);
            return true;
        }else{
            return "not found datas.";
        }
    }
    public static function getList():array{
        $sql = new Sql();
        return $resultado = $sql->select("SELECT * FROM cadastrados ORDER BY nome ASC");
    }

    public static function searchPerson($login):array
    {
        $sql = new Sql();
        return $resultado = $sql->select("SELECT * FROM cadastrados WHERE nome LIKE :nome",array(":nome"=>"%".$login."%"));
    }
    public function __toString():string
    {
        return  Json_encode(array(
            "id" => $this->getId(),
            "nome" => $this->getNome(),
            "email" => $this->getEmail(),
            "senha" => $this->getSenha()
        ));
    }
}
