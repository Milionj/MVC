<?php

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {

        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $this->db->bind(':password', $data['password'], PDO::PARAM_STR);
        $res = $this->db->execute();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function login($data)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $result = $this->db->findOne();
        if (password_verify($data['password'], $result->password)) {
            return $result;
        } else {
            return false;
        }
    }




    public function findUserByEmail($email)
    {

        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email, PDO::PARAM_STR);
        $result = $this->db->findOne();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }
}
