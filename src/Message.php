<?php

/**
 * Description of Message
 *
 * @author michal
 */
class Message {
    
    private $id;
    private $name;
    private $mail;
    private $phone;
    private $text;
    private $creationDate;
    
    public function __construct() {
        $this->id = -1;
        $this->name = '';
        $this->mail = '';
        $this->phone = 0;
        $this->text = '';
        $this->creationDate = 0;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setName($newName) {
        if(is_string($newName)) {
            $this->name = $newName;
        }
        return $this;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setMail($newMail) {
        if(filter_var($newMail, FILTER_VALIDATE_EMAIL)) {
            $this->mail = $newMail;
        }
        return $this;
    }
    
    public function getMail() {
        return $this->mail;
    }
    
    public function setPhone($newPhone) {
        if(is_numeric($newPhone)) {
            $this->phone = $newPhone;
        }
        return $this;
    }
    
    public function getPhone() {
        return $this->phone;
    }
    
    public function setText($newText) {
        if(is_string($newText)) {
            $this->text = $newText;
        }
        return $this;
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function setCreationDate($newCreationDate) {
        if ($newCreationDate === date('Y-m-d H:i:s')) {
            $this->creationDate = $newCreationDate;
        }
        return $this;
    }
    
    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function saveToDB(mysqli $connection) {

        if ($this->id == -1) {

            //Saving new message to DB

        $sql = "INSERT INTO Message(name, mail, phone, text)
               VALUES ('$this->name','$this->mail', '$this->phone',
                    '$this->text')";

            $result = $connection->query($sql);
            if ($result == true) {
                $this->id = $connection->insert_id;

                return true;
            }
        }
        return false;
    }    
    
    
}
