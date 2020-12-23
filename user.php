<?php
class User extends Database{
    private $id;
    private $fullName;
    private $email;
    private $username;

    public function setInformation($id, $fullName, $email, $username) {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->username = $username;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->fullName;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getUsername() {
        return $this->username;
    }
}
?>