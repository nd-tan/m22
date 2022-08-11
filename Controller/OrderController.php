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
        $id=$_REQUEST['id'];
        $obj=new OrderModel;
        $object=$obj->getOne($id);
        include_once '../views/order/detail.php';
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $search = $_POST['search'];
            $obj = new OrderModel();
            $object = $obj->search($search);
            // $obj_cate=$obj->all();
            // print_r($search);
            // die();
            // header("Location: CategoryController.php?action=index");

        }
        include_once '../views/order/search.php';
    }

    // public function edit()
    // {
    //     $id = $_GET['id'];
    //     $object = new CategoryModel();
    //     $obj = $object->getOne($id);
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $object->update($id, $_REQUEST);
    //         // echo '<pre>';
    //         // print_r($_REQUEST);
    //         // die();
    //         $_SESSION['flash_message'] = "Chỉnh sửa danh mục thành công";
    //     header('Location:CategoryController.php?action=index');
    //     }

    //     include_once '../views/category/edit.php';
    // }
    // public function delete()
    // {
    //     $id = $_GET['id'];
    //     $object = new CategoryModel();
    //     $object->delete($id);
    //     // print_r($object);
    //     $_SESSION['flash_message'] = "Xóa danh mục thành công";
    //     header("Location: CategoryController.php?action=index");
    // }


    // public function add()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         //ket noi model
    //         $UserModel = new CategoryModel();
    //         $UserModel->create($_REQUEST);

    //         //chuyen huong ve 
    //         header("Location: CategoryController.php?action=index");
    //     }

    //     //goi view
    //     include_once '../views/category/add.php';
    // }
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
