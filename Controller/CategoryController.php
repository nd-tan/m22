<?php
// include_once './';
session_start();


include_once '../models/CategoryModel.php';
class CategoryController
{
    //lay toan bo records
    public function index()
    {
        !isset($_SESSION['user_name']) == true;
        if (isset($_SESSION['user_name']) == false) {
            header("location:  UserController.php?action=login");
        }
        //khoi tao doi tuong model
        $CategoryModel = new CategoryModel();
        $rows = $CategoryModel->all();
        // echo "<pre>";
        // print_r($rows);
        include_once '../views/category/index.php';
    }

    public function edit()
    {
        $id = $_GET['id'];
        $err = [];
        $object = new CategoryModel();

        $obj = $object->getOne($id);
        $rows = $object->all();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            if ($name == "") {
                $err['name_1'] = "bạn không được để trống mục này";
            }
            foreach ($rows as $key => $row) {
                if ($row->name == $name && $id != $row->id) {
                    $err['name'] = "đã tồn tại";
                }
            }
            if (empty($err)) {
                $object->update($id, $_REQUEST);
                // echo '<pre>';
                // print_r($_REQUEST);
                // die();
                // $_SESSION['flash_message'] = "Chỉnh sửa danh mục thành công";
                header('Location:CategoryController.php?action=index');
            }
        }

        include_once '../views/category/edit.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $object = new CategoryModel();
        $object->delete($id);
        // print_r($object);
        // $_SESSION['flash_message'] = "Xóa danh mục thành công";
        header("Location: CategoryController.php?action=index");
    }


    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //ket noi model
            $name = $_POST['name'];
            $err = [];
            $UserModel = new CategoryModel();
            $rows = $UserModel->all();
            if ($name == "") {
                $err['name_1'] = "bạn không thể để trống";
            }
            foreach ($rows as $row) {
                if ($row->name == $name) {
                    $err['name'] = "đã tồn tại";
                }
            }
            if (empty($err)) {
                $UserModel->create($_REQUEST);
                //chuyen huong ve 
                header("Location: CategoryController.php?action=index");
            }
        }
        //goi view
        include_once '../views/category/add.php';
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $search = $_POST['search'];
            $obj = new CategoryModel();
            $object = $obj->search($search);
            // print_r($search);
            // die();
        }
        include_once '../views/category/search.php';
    }
}
//khoi tao doi tuong
$objController = new CategoryController();

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
    case 'add':
        $objController->add();
        break;
    case 'edit':
        $objController->edit();
        break;
    case 'delete':
        $objController->delete();
        break;
    case 'search':
        $objController->search();
        break;
    default:
        ####
        break;
}
