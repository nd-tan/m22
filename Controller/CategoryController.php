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
        if(isset($_GET['id']))
        {

            $id = $_GET['id'];
            $err = [];
            $object = new CategoryModel();
    
            $obj = $object->getOne($id);
            $rows = $object->all();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                if ($name == "") {
                    $err['name_1'] = "You can't leave name blank!";
                }
                foreach ($rows as $key => $row) {
                    if ($row->name == $name && $id != $row->id) {
                        $err['name'] = "Category already exists";
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
        }else
        {
            header('Location:CategoryController.php?action=index');

        }

        include_once '../views/category/edit.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $object = new CategoryModel();
        $item=$object->count_product($id);
        $err=[];
        if(empty($item)){
            $object->delete($id);
            header("Location: CategoryController.php?action=showRecicle");
        }
        foreach($item as $value)
        {

            if($value->soluong > 0)
            {
                $err['delete']="this category have a lot of products, so can't delete!!";
            }
        }
        include_once '../views/category/recicle.php';

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
                $err['name_1'] = "You can't leave name blank!";
            }
            foreach ($rows as $row) {
                if ($row->name == $name) {
                    $err['name'] = "Category already exists";
                }
            }
            if (empty($err)) {
                $UserModel->create($_REQUEST);
                //chuyen huong ve 
                $notification = array(
                    'message' => 'Thêm danh mục thành công',
                    'alert-type' => 'success'
                );
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
        }
        include_once '../views/category/search.php';
    }

    public function recicle()
    {
        $id = $_GET['id'];
        $object = new CategoryModel();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d');
        $object->recicle($id,$date);
        header("Location:CategoryController.php?action=index");
    }
    public function showRecicle()
    {
        $obj=new CategoryModel;
        $object=$obj->ShowRecicle();
        include_once '../views/category/recicle.php';
    }
    public function Restore()
    {
        $id=$_REQUEST['id'];
        $obj=new CategoryModel;
        $object=$obj->restore($id);
        header("Location:CategoryController.php?action=showRecicle");
        include_once '../views/category/recicle.php';
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
    case 'recicle':
        $objController->recicle();
        break;
    case 'showRecicle':
        $objController->showRecicle();
        break;
    case 'Restore':
        $objController->Restore();
        break;
    default:
        ####
        break;
}
