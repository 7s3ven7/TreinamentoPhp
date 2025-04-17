<?php


namespace aprendizado\PDO\class;

use aprendizado\PDO\class\Sql;

class Usuario
{

    private int $id;
    private string $nome, $email, $senha;

    public function setId(int $id): void
    {

        $this->id = $id;

    }

    public function getId(): int
    {

        return $this->id;

    }

    public function getNome(): string
    {

        return $this->nome;

    }

    public function setNome(string $nome): void
    {

        $this->nome = $nome;

    }

    public function getEmail(): string
    {

        return $this->email;

    }

    public function setEmail(string $email): void
    {

        $this->email = $email;

    }

    public function getSenha(): string
    {

        return $this->senha;

    }

    public function setSenha(string $senha): void
    {

        $this->senha = $senha;

    }

    public function loadById(int $id): string
    {

        $sql = new Sql();
        $resultado = $sql->select("SELECT * FROM cadastrados WHERE id = :id", array("id" => $id));
        if (isset($resultado[0])) {
            $row = $resultado[0];
            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setEmail($row['email']);
            $this->setSenha($row['senha']);
            return true;
        } else {
            return "not found datas.";
        }

    }

    public function loadByEmail(): bool
    {

        $sql = new Sql();
        $resultado = $sql->select("SELECT * FROM cadastrados WHERE email = :email", array("email" => $this->getEmail()));
        if (isset($resultado[0])) {
            return true;
        } else {
            return false;
        }

    }

    public static function getList(): array
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM cadastrados ORDER BY nome ASC");

    }

    public static function searchPerson($login): array
    {

        $sql = new Sql();
        return $sql->select("SELECT * FROM cadastrados WHERE nome LIKE :nome", array(":nome" => '%' . $login . '%'));

    }

    public function login(string $login, string $senha): void
    {

        $sql = new Sql();
        $resultado = $sql->select("SELECT * FROM cadastrados WHERE email = :email AND senha = :senha", array("email" => $login, 'senha' => $senha));
        if (isset($resultado[0])) {
            $row = $resultado[0];
            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setEmail($row['email']);
            $this->setSenha($row['senha']);
            echo "Login efetuado com sucesso!\n";
        }

    }

    public function insert(): void
    {

        $cadastrar = new Sql();
        if ($this->loadByEmail()) {
            echo "Email ja existente!\n";
        } else {
            $cadastrar->consult("INSERT INTO cadastrados (email,senha,nome) VALUES (:email,:senha,:nome)",
                array("email" => $this->getEmail(), 'senha' => $this->getSenha(), "nome" => $this->getNome()));
            echo "Cadastrado com sucesso!\n";
        }

    }

    public function Update($email, $senha, $nome): void
    {

        $sql = new Sql();
        $sql->consult("UPDATE cadastrados SET email = :email, senha = :senha, nome = :nome WHERE id = :id", array(
            "email" => $email, "senha" => $senha, "nome" => $nome, "id" => $this->getId()));

    }

    public function Delete(): void
    {

        $sql = new Sql();
        $sql->consult("DELETE FROM cadastrados WHERE id = :id", array("id" => $this->getId()));
        $this->setId(0);
        $this->setNome("");
        $this->setEmail("");
        $this->setSenha("");
        echo "DELETADO\n";

    }

    public function __construct($nome = "", $login = "", $password = "")
    {

        $this->setNome($nome);
        $this->setEmail($login);
        $this->setSenha($password);
        $this->insert();
        $this->login($login, $password);
        echo "construido com sucesso!\n";

    }

    public function __toString(): string
    {

        return Json_encode(array(
            "id" => $this->getId(),
            "nome" => $this->getNome(),
            "email" => $this->getEmail(),
            "senha" => $this->getSenha()
        ));

    }

}