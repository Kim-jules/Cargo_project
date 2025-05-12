<?php

require_once '../../models/Manager.php';
session_start();

class ManagerController
{
    private $manager;

    public function __construct($conn)
    {
        $this->manager = new Manager($conn);
    }

    public function register($username, $password)
    {
        $user = $this->manager->getManagerByUsername($username);

        if ($user) {
            return 'Username is already taken.';
        }
        if ($this->manager->addManager($username, $password)) {
            header('Location: login.php');
            exit();
        } else {
            return 'Unable to register a user';
        }
    }

    public function login($username, $password)
    {
        $user = $this->manager->getManagerByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location: ../../index.php');
            exit();
        } else {
            return 'Invalid credentials';
        }
    }
}
