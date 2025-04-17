<?php
class Usuario
{
    private string $name, $email, $password;
    private int $id;

    function __construct($name = "", $email = "", $password = "")
    {
        $this->SetName($name);
        $this->SetEmail($email);
        $this->SetPassword($password);
        $this->SetId();
    }

    public function SetName(string $name): void
    {
        $this->name = $name;
    }

    public function SetEmail(string $email): void
    {
        $this->email = $email;
    }

    public function SetPassword(string $password): void
    {
        $this->password = $password;
    }

    public function SetId(): void
    {
        $this->id = rand(1, 20);
    }

    public function GetName(): string
    {
        return $this->name;
    }

    public function GetEmail(): string
    {
        return $this->email;
    }

    public function GetPassword(): string
    {
        return $this->password;
    }

    public function GetId(): string
    {
        return $this->id;
    }

    public function GetAll(): array
    {
        return array(
            "name" => $this->GetName(),
            "email" => $this->GetEmail(),
            "password" => $this->GetPassword(),
            "id" => $this->GetId()
        );
    }

    public function Log(): string
    {
        $values = $this->GetAll();
        return "Nome:" . $values["name"] . "<br>" . "Email:" . $values["email"] . "<br>" . "Senha: ********";
    }

}