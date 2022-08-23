<?php
// include_once './';
session_start();

include_once '../models/OrderModel.php';
class OrderController
{
    //lay toan bo records
    public function index()
    {
        !isset($_SESSION['user_name']) == true;
        if (isset($_SESSION['user_name']) == false) {
            header("location:  UserController.php?action=login");
        }
        //khoi tao doi tuong model
        $OrderModel = new OrderModel();
        $rows = $OrderModel->all();
        // echo "<pre>";
        // print_r($rows);
        include_once '../views/order/index.php';
    }
    public function detail()
    {
        if(isset($_REQUEST['id']))
        {
            $id = $_REQUEST['id'];
            $obj = new OrderModel;
            $object = $obj->getOne($id);
            include_once '../views/order/detail.php';
        }else
        {
            header("location:  OrderController.php?action=index");
        }
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $search = $_POST['search'];
            $obj = new OrderModel();
            $object = $obj->search($search);
        }
        include_once '../views/order/search.php';
    }
}

//khoi tao doi tuong
$objController = new OrderController();

//lay action tu url
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'index';
}

switch ($action) {
    case 'index':
        $objController->index();
        break;
    case 'detail':
        $objController->detail();
        break;
    case 'search':
        $objController->search();
        break;
        // case 'delete':
        //     $objController->delete();
        //     break;
    default:
        ####
        break;
}
