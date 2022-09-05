<?php
include "../../models/shop/ShowModel.php";
include "../../models/CategoryModel.php";
include "../../models/shop/CartModel.php";
session_start();

// include "../../models/ProductModel.php";
class ShowController
{
    public function index()
    {
        $showController = new showModel;
        $show = $showController->all();
        $cate = new CategoryModel;
        $catesidebar = $cate->all();

        include_once "../../views/shop/index/index.php";
        // include_once "../../views/shop/layout/sidebar.php";

    }
    public function login()
    {
        session_destroy();
        session_start();
        $CustomerModel = new CartModel();
        $rows = $CustomerModel->all();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //ket noi model
            $email = $_POST['email'];
            $password = $_POST['password'];
            $err = [];
            if ($email == "") {
                $err['email'] = "You can't leave it blank this part";
            }
            if ($password == "") {
                $err['password'] = "You can't leave it blank this part";
            }
            if (empty($err)) {
                $check = $CustomerModel->sigin($email, $password);
                if ($check) {
                    foreach ($rows as $row) {
                        if ($email == $row->email && $password == $row->password) {
                            $_SESSION['user_name'] = $row->name;
                            $_SESSION['user_id'] = $row->id;
                        }
                    }
                    header("Location: ShowController.php?action=index");
                } else {
                    $err['ep'] = "email or password is not correct";
                }
            }
        }
        include_once "../../views/shop/login.php";
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserModel = new CartModel();
            $user_name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $confirmpassword = md5($_POST['confirmpassword']);
            $err = []; /////////xử lý rỗng
            $fields = ['name', 'password', 'confirmpassword', 'address', 'phone', 'email'];
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $err[$field] = "You cannot leave " . $field . " blank!";
                }
            }
            if ($password != $confirmpassword) {
                $err['pw'] = "confirm password is not correct";
            }
            if (empty($err)) {
                $UserModel->create($_REQUEST);
                //         //chuyen huong ve 
                header("Location: ShowController.php?action=login");
            }
        }

        include_once "../../views/shop/register.php";
    }

    public function logout()
    {
        header("Location: ShowController.php?action=login");
    }
    public function show()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all();

        if($_REQUEST['id'] !="")
        {
            $id=$_REQUEST['id'];
            $obj= new showModel;
            $object=$obj->show($id);
            // print_r($object);
            // die();
            include_once "../../views/shop/cart/show.php";
        }else
        {
        header("Location: ShowController.php?action=index");
        }
    }
    public function product_detail()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all();
        if($_REQUEST['id'] !="")
        {
            $id=$_REQUEST['id'];
            $obj= new showModel;
            $object=$obj->detail($id);
            // print_r($object);
            // die();
            include_once "../../views/shop/cart/detail_product.php";
        }else
        {
        header("Location: ShowController.php?action=index");
        }

    }
    public function search()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all();
        $obj=new showModel;
        if(isset($_REQUEST['search']))
        {
            $search=$_REQUEST['search'];
            $object=$obj->search_2($search);

        }
        include_once "../../views/shop/cart/search.php";
    }
}
$obj = new ShowController;
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'login';
}
switch ($action) {
    case 'index':
        $obj->index();
        break;
    case 'login':
        $obj->login();
        break;
    case 'register':
        $obj->register();
        break;
    case 'logout':
        $obj->logout();
        break;
    case 'show':
        $obj->show();
        break;
    case 'product_detail':
        $obj->product_detail();
        break;
    case 'search':
        $obj->search();
        break;
}
