<?php

class User {
    private $name;
    private $surname;
    private $username;
    private $email;
    private $password;

    public function __construct($name, $surname, $username, $email) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
    }

    public function setPassword($password) {
        if (strlen($password) >= 8) {
            $this->password = $password;
        }
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFullName() {
        return "$this->name $this->surname";
    }

    public function __destruct() {
    }
}

class AdminUser extends User {
    private $permissions = [];

    public function setPermissions(array $permissions) {
        $this->permissions = $permissions;
    }

    public function getPermissions() {
        return $this->permissions;
    }
}
?>