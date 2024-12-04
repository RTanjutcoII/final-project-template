<?php

namespace app\controllers;
use app\models\User;

class UserController extends Controller {
    public function getUsers() {
        $userModel = new User();
        $users = $userModel->getAllUsers();
        $this->returnJSON($users);
        exit();
    }

    public function saveUser() {

    }

    public function usersView() {
        $this->returnView('./assets/views/users/asksView.html');
    }

}