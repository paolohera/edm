<?php
include_once('../controller/database.php');
include_once '../static/query.php';
include_once('../model/userModel.php');
include_once('../controller/userController.php');

if (isset($_POST['type'])) {
    switch ($_POST['type']) {
        case 'login':
            $ctr = new userController();
            echo $ctr->user_login($_POST['identifier'], $_POST['password']);
            break;

        case 'register':
            $ctr = new userController();
            echo $ctr->user_register($_POST);
            break;

        case 'logout':
            $ctr = new userController();
            echo $ctr->user_logout($_POST);
            break;

        default:
            echo "Invalid request type";
            break;
    }
}
