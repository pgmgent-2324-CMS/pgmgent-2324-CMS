<?php

class User {

    public int $id = 0;
    public string $firstname;
    public string $lastname;
    public int $age;

    public function __construct(string $firstname = "John", string $lastname = "Doe")
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFullName() : string {
        return $this->firstname . " " . $this->lastname;
    }

    public static function getUserById($id) : User {
        //connecteren met db
        //query runnen
        
        $result = new User();
        $result->id = $id;
        $result->firstname = "Dieter";
        $result->lastname = "De Weirdt";
        return $result;

    }
}
