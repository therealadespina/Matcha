<?php

class Model_Main extends Model
{
    public function authuser($username, $password)
    {
        $connection = $this->get_connect();
        $request = 'SELECT passwd FROM users WHERE username = ?';
        $stmt = $connection->prepare($request);
        $stmt->execute(array($username));
        $res = $stmt->fetch(); 
        //die (var_dump($res));
        return (password_verify($password, $res['passwd']));
    }

    public function createuser($username, $password, $email)
    {   
        $data = $username.time();
        $vkey = hash('md5', $data);
        $registration = $this->get_connect();
        $request = 'INSERT INTO users (username, email, passwd, vkey) VALUES (?,?,?,?)';
        $stmt = $registration->prepare($request);
        $res = $stmt->execute(array($username, $email, $password, $vkey));
        return ($vkey);
        //$res = $stmt->fetch(FETCH_ASSOC);
    }

    public function verify($key)
    {
        $connection = $this->get_connect();
        $request = 'UPDATE users SET acstatus = 1 WHERE vkey = :vkey';
        $stmt = $connection->prepare($request);
        $stmt->execute(array('vkey' => $key));
        $res = $stmt->rowCount();
        if ($res > 0)
            return TRUE;
    }