<?php
// include_once './';
session_start();

include_once '../models/ProductModel.php';
include_once '../models/CategoryModel.php';
class ProductController
{
    //lay toan bo records
    public function index()
    {
        !isset($_SESSION['user_name']) == true;
        if (isset($_SESSION['user_name']) == false) {
            header("location:  UserController.php?action=login");
        }
        //khoi tao doi tuong model
        $ProductModel = new ProductModel();
        $rows = $ProductModel->all();
        // echo "<pre>";
        // print_r($rows);
        include_once '../views/products/index.php';
    }

    public function edit()
    {
        $id = $_GET['id'];
        $object = new ProductModel();
        $obj = $object->getOne($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $object->update($id, $_REQUEST);
            // echo '<pre>';
            // print_r($_REQUEST);
            // die();
            $_SESSION['flash_message'] = "Chỉnh sửa danh mục thành công";
        header('Location:ProductController.php?action=index');
        }

        include_once '../views/products/edit.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $object = new ProductModel();
        $object->delete($id);
        // print_r($object);
        $_SESSION['flash_message'] = "Xóa danh mục thành công";
        header("Location:ProductController.php?action=index");
    }


    public function add()
    {
        $Category=new CategoryModel();
        $cate=$Category->all();
        $UserModel = new ProductModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name=$_POST['name'];
            $age=$_POST['age'];
            $color=$_POST['color'];
            $breed=$_POST['breed'];
            $gender=$_POST['gender'];
            $price=$_POST['price'];
            $img=$_POST['image'];
            $err=[];
            if($name==""){$err['name']="you can't leave it blank name off product";}
            if($age==""){$err['age']="you can't leave it blank age off product";}
            if($color==""){$err['color']="you can't leave it blank color off product";}
            if($breed==""){$err['breed']="you can't leave it blank breed off product";}
            if($gender==""){$err['gender']="you can't leave it blank gender off product";}
            if($price==""){$err['price']="you can't leave it blank price off product";}
            if($img==""){$err['img']="you can't leave it blank image off product";}
            if(empty($err)){
                //ket noi model
                $UserModel->create($_REQUEST);
                //chuyen huong ve 
                header("Location:ProductController.php?action=index");
            }
        }

        //goi view
        include_once '../views/products/add.php';
    }
    public function search()
    {
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $search= $_POST['search'];
            $obj=new ProductModel();
            $object=$obj->search($search);
            // print_r($search);
            // die();
            // header("Location: CategoryController.php?action=index");

        }
        include_once '../views/products/search.php';
    }
}

//khoi tao doi tuong
$objController = new ProductController();

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
