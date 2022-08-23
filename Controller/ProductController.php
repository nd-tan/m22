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
        $category_id = new CategoryModel();
        $category = $category_id->all();

        $obj = new ProductModel();
        $pagination = $obj->page_1();

        $total_records = $pagination['total_records']; //45
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; //2
        $limit = 5;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;


        $ProductModel = new ProductModel();
        $rows = $ProductModel->page_2($start,$limit);

        // echo "<pre>";
        // print_r($rows);
        include_once '../views/products/index.php';
    }

    public function edit()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $object = new ProductModel();
            $obj = $object->getOne($id);
            // print_r($obj->image);

            $Category = new CategoryModel(); //////lấy bảng cate để sổ danh mục trong phần edit
            $cate = $Category->all();
            // print_r($cate);
            // die();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_REQUEST['name'];
                $age = $_REQUEST['age'];
                $color = $_REQUEST['color'];
                $breed = $_REQUEST['breed'];
                $gender = $_REQUEST['gender'];
                $price = $_REQUEST['price'];
                // $img=$_REQUEST['img'];
                $quantity = $_REQUEST['quantity'];

                if (isset($_FILES['image'])) {
                    $img = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], '../Img/img/' . $_FILES['image']['name']);
                }
                $_REQUEST['img'] = $img; ///////////request image ấy thông qua FILES chứ k lấy trực tiếp từ request được
                // print_r($_REQUEST['img']);
                // print_r($obj->image);
                // die();
                $err = [];
                $fields = ['name', 'age', 'color', 'price', 'gender', 'quantity'];
                foreach ($fields as $field) {
                    if (empty($_REQUEST[$field])) {
                        $err[$field] = "You can't leave " . $field . "blank!";
                    }
                }
                if ($_REQUEST['img'] == "") {
                    $_REQUEST['img'] = $obj->image;
                }
                // print_r($_REQUEST['img']);
                // print_r($obj->image);
                // die();
                if (empty($err)) {
                    $object->update($id, $_REQUEST);
                    header('Location:ProductController.php?action=index');
                }
            }
        } else {
            header('Location:ProductController.php?action=index');
        }

        include_once '../views/products/edit.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $object = new ProductModel();
        $object->delete($id);
        header("Location:ProductController.php?action=showRecicle");
    }
    public function recicle()
    {
        $id = $_GET['id'];
        $object = new ProductModel();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d');
        $object->recicle($id, $date);
        header("Location:ProductController.php?action=index");
    }

    public function add()
    {
        $Category = new CategoryModel();
        $cate = $Category->all(); //////lấy bảng cate để sổ danh mục trong phần add
        $UserModel = new ProductModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $color = $_REQUEST['color'];
            $breed = $_REQUEST['breed'];
            $gender = $_REQUEST['gender'];
            $price = $_REQUEST['price'];
            // $img = $_REQUEST['image'];
            $quantity = $_REQUEST['quantity'];

            if (isset($_FILES['image'])) {
                $image = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../Img/img/' . $_FILES['image']['name']);
            }
            $_REQUEST['image'] = $image; ///////////request image ấy thông qua FILES chứ k lấy trực tiếp từ request được
            $err = [];
            $fields = ['name', 'age', 'color', 'breed', 'price', 'image', 'gender', 'quantity'];
            foreach ($fields as $field) {
                if (empty($_REQUEST[$field])) {
                    $err[$field] = "You can't leave " . $field . " blank!";
                }
            }

            if (empty($err)) {
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
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $search = $_POST['search'];
            $obj = new ProductModel();
            $object = $obj->search($search);
            $obj_cate = $obj->all();
            // print_r($search);
            // die();
            // header("Location: CategoryController.php?action=index");

        }
        include_once '../views/products/search.php';
    }
    public function detail()
    {
        $id = $_REQUEST['id'];
        $obj = new ProductModel;
        $object = $obj->find($id);
        include_once '../views/products/detail.php';
    }
    public function showRecicle()
    {
        $obj = new ProductModel;
        $object = $obj->ShowRecicle();
        include_once '../views/products/Recicle.php';
    }
    public function Restore()
    {
        $id = $_REQUEST['id'];
        $obj = new ProductModel;
        $object = $obj->restore($id);
        header("Location:ProductController.php?action=showRecicle");
        include_once '../views/products/Recicle.php';
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
    case 'detail':
        $objController->detail();
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
