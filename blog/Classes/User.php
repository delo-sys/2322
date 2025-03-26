<?php

class User {
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    // register user
    public function register ($data){
        $this->$db->query('INSERT INTO user (username, email, password) VALUES(:username,:email,:password)');
        // Bind values
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',password_hash($data['email'],PASSWORD_DEFAULT));

        // execute
        if ($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }
    // login user
    public function login ($username,$password){
        $this->db->query('SELECT * FROM users WHERE username=:username');
        $this->db->bind(':username', $username);

        $row =$this->single();

        if ($row){
            $hashed_password = $row->password;
            if (password_verify($password,$hashed_password)){
                return $row;
            }else{
                return false; 
            }
        }else {
            return false;
        }
    }
    // find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind(':email', $username);

        $row =$this->single();

        if ($this->db->rowcount () >0) {
            return true; 
        }else{
            return false;
        }
    }

    // find user by username 
    public function findUserByUsername($username){
        $this->db->query('SELECT * FROM users WHERE username=:username');
        $this->db->bind(':username', $username);

        $row =$this->single();

        if ($this->db->rowcount () >0) {
            return true; 
        }else{
            return false;
        }
    }
    // get user by ID 
    public function findUserID($email){
        $this->db->query('SELECT * FROM users WHERE id=:id');
        $this->db->bind(':id', $id);

        $row =$this->single();
    }
}