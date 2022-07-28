<?php
session_start();
include_once '../models/UserModel.php';
class UserController
{
    //lay toan bo records
    public function index()
    {
        !isset($_SESSION['user_name']) == true;
        if (isset($_SESSION['user_name']) == false) {
            header("location:  UserController.php?action=login");
        }
        $UserModel = new UserModel();
        // global $id;
        $rows = $UserModel->all();
        // $user=$UserModel->find($id);
        include_once '../views/index/index.php';
        // include_once "../views/layout/header.php";

    }
    public function login()
    {
        session_destroy();
        session_start();
        $UserModel = new UserModel();
        $rows = $UserModel->all();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //ket noi model
            $email = $_POST['email'];
            $password = $_POST['password'];
            $err = [];
            if ($email == "") {
                $err['email'] = "bạn không thể để trống email";
            }
            if ($password == "") {
                $err['password'] = "bạn không thể để trống password";
            }
            if (empty($err)) {
                $check = $UserModel->sigin($email, $password);
                if ($check) {
                    //chuyen huong ve 
                    // $_SESSION['admin']=$rows->user_name;
                    foreach ($rows as $row) {
                        if ($email == $row->email && $password == $row->password) {
                            $_SESSION['user_name'] = $row->user_name;
                        }
                    }
                    header("Location: UserController.php?action=index");
                } else {
                    $err['ep'] = "email hoặc mật khẩu không đúng";
                }
            }
        }
        include_once '../views/users/sigin.php';
    }
    public function category()
    {
        include "../views/category/index.php";
    }
    public function home()
    {
        include "../views/index/index.php";
    }
    public function customer()
    {
        include "../views/customer/index.php";
    }
    public function order()
    {
        include "../views/order/index.php";
    }
    public function product()
    {
        include "../views/products/index.php";
    }
    public function logout()
    {
        // session_destroy();
        // include "../views/users/logout.php";
        header("Location: UserController.php?action=login");
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserModel = new UserModel();
            $user_name = $_POST['user_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $err = [];
            if ($user_name == "") {
                $err['name'] = "bạn không thể để trống tên người dùng";
            }
            if ($phone == "") {
                $err['phone'] = "bạn không thể để trống số điện thoại người dùng";
            }
            if ($address == "") {
                $err['address'] = "bạn không thể để trống địa chỉ người dùng";
            }
            if ($email == "") {
                $err['email'] = "bạn không thể để trống email người dùng";
            }
            if ($password == "") {
                $err['password'] = "bạn không thể để trống mật khẩu người dùng";
            }
            if ($confirmpassword == "") {
                $err['confirmpassword'] = "bạn không thể để trống nhập lại mật khẩu người dùng";
            } else
                if ($password != $confirmpassword) {
                $err['pw'] = "mật khẩu nhập lại không đúng";
            }
            if (empty($err)) {
                $UserModel->create($_REQUEST);
                //         //chuyen huong ve 
                header("Location: UserController.php?action=login");
            }
        }
        // include "../views/products/index.php";
        include "../views/users/register.php";
    }
}

//khoi tao doi tuong
$objController = new UserController();

//lay action tu url
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'login';
}

switch ($action) {
    case 'index':
        $objController->index();
        break;
    case 'home':
        $objController->home();
        break;
    case 'customer':
        $objController->customer();
        break;
    case 'category':
        $objController->category();
        break;
    case 'login':
        $objController->login();
        break;
    case 'order':
        $objController->order();
        break;
    case 'product':
        $objController->product();
        break;
    case 'logout':
        $objController->logout();
        break;
    case 'register':
        $objController->register();
        break;
    default:
        ####
        break;
}
