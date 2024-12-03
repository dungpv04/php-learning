<?php
require_once '../models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->getAllUsers();
        session_start();
        $_SESSION['data'] = [];
        foreach ($users as $user) {
            $_SESSION['data'][$user['Id']] = $user;
        }
        
        include '../views/user/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if ($this->userModel->createUser($name, $email, $phone, $address)) {
                header("Location: ../public/index.php");
                exit();
            }
        }
    }

    public function edit()
    {
        include '../views/user/edit.php';
    }

    public function submitEdit($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if ($this->userModel->updateUser($id, $name, $email, $phone, $address)) {
                header("Location: ../public/index.php");
                exit();
            }
        }
    }

    public function delete($id)
    {
        if ($this->userModel->deleteUser($id)) {
            header("Location: ../public/index.php");
            exit();
        }
    }

}
?>
