<?php
// include_once './';
session_start();

include_once '../models/CustomerModel.php';
class CustomerController
{
    //lay toan bo records
    public function index()
    {
        !isset($_SESSION['user_name']) == true;
        if (isset($_SESSION['user_name']) == false) {
            header("location:  UserController.php?action=login");
        }
        //khoi tao doi tuong model
        $CustomerModel = new CustomerModel();
        $rows = $CustomerModel->all();
        // echo "<pre>";
        // print_r($rows);
        include_once '../views/customer/index.php';
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $search = $_POST['search'];
            $obj = new CustomerModel();
            $object = $obj->search($search);
            // print_r($search);
            // die();
        }
        include_once '../views/customer/search.php';
    }

    public function delete()
    {
        $id=$_REQUEST['id'];
        $obj=new CustomerModel;
        $object=$obj->destroy($id);
        header("location:  CustomerController.php?action=index");

    }
}

//khoi tao doi tuong
$objController = new CustomerController();

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
    case 'search':
        $objController->search();
        break;
    // case 'edit':
    //     $objController->edit();
    //     break;
    case 'delete':
        $objController->delete();
        break;
    default:
        ####
        break;
}
