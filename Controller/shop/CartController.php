<?php
include "../../models/CategoryModel.php";
include "../../models/shop/CartModel.php";
session_start();

class CartController
{
    public function index()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all(); ///////hiển thị sidebaz
        // $obj=new CartModel;

        !isset($_SESSION['user_name']) == true; /////////chưa login thì khong vào được giỏ hàng
        if (isset($_SESSION['user_name']) == false) {
            header("location:  CartController.php?action=login");
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") { ////update quantity cart
            $id = $_REQUEST['id'];
            $quantity = $_POST['quantityCart'];
            // print_r($id);
            for ($i = 0; $i < count($id); $i++) {
                $_SESSION['cart'][$id[$i]]['quantityCart'] = $quantity[$i];
            }
        }


        include_once "../../views/shop/cart/cart.php";
    }

    public function showcat()
    {

        $cate = new CategoryModel;
        $catesidebar = $cate->all(); ///hiển thị sidebar

        $id = $_GET['id'];
        $quantity = (isset($_REQUEST['quantityCart']) ? $_REQUEST['quantityCart'] : 1);
        $obj = new CartModel;
        $object = $obj->getOne($id);
        $item = [
            'id' => $object->id,
            'name' => $object->name,
            'price' => $object->price,
            'img' => $object->image,
            'quantityCart' => $quantity,
            'quantitymax' => $object->quantity
        ];
        // echo $object->quantity;
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantityCart'] +=  $quantity;
        } else {
            $_SESSION['cart'][$id] = $item;
        }
        header("Location: CartController.php?action=index");

        include_once "../../views/shop/cart/cart.php";
    }

    public function delete()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all();
        $id = $_REQUEST['id'];
        // var_dump($id);
        unset($_SESSION['cart'][$id]);
        header("Location: CartController.php?action=index");
        include_once "../../views/shop/cart/cart.php";
    }

    public function checkOut()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all();
        // print_r($_SESSION['user_id']);
        $obj = new CartModel;
        $object = $obj->getCustomer($_SESSION['user_id']);

        !isset($_SESSION['user_name']) == true; /////////chưa login thì khong vào được giỏ hàng
        if (isset($_SESSION['user_name']) == false) {
            header("location:  CartController.php?action=login");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name']; /////////dữ liệu update bảng customers
            $last_name = $_POST['last_name'];
            $country = $_POST['country'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $notes = $_POST['notes'];
            $total_order = $_POST['total_order'];
            $id_customer = $_SESSION['user_id'];
            $updateCustomers = new CartModel;

            $err = []; /////////xử lý rỗng
            $fields = ['name', 'last_name', 'country', 'address', 'phone', 'email'];
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $err[$field] = "You cannot leave " . $field . " blank!";
                }
            }

            $data = []; ///////////dữ liệu thêm vào bảng orders
            $data['name'] = $name;
            $data['last_name'] = $last_name;
            $data['country'] = $country;
            $data['address'] = $address;
            $data['phone'] = $phone;
            $data['email'] = $email;
            $data['notes'] = $notes;
            $data['customers_id'] = $id_customer;
            $data['total_order'] = $total_order;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i');
            $data['date'] = $date;

            $products_id = $_POST['id']; ///lấy id và số lượng sản phẩm được mua để cập nhật bảng products
            $quantity = $_POST['quantity']; ////

            $total = $_POST['total'];

            if (empty($err)) {
                $updateCus = $updateCustomers->update($id_customer, $_POST); ///update cai thông tin bảng customer
                $addOrders = $updateCustomers->create_order($data); ///them vao bảng giỏ hàng
                $rows = $updateCustomers->all_orders(); ///lấy hết bảng order để tìm ra id của đơn hàng mới thêm
                $max = 0;
                $data_orders = []; ////max là id của đơn hàng mới thêm
                foreach ($rows as $item) {
                    if ($item->id > $max) {
                        $max = $item->id;
                    }
                }
                for ($i = 0; $i < count($quantity); $i++) {
                    $data_orders['orders_id'] = $max;
                    $data_orders['quantity'] = $quantity[$i];
                    $data_orders['products_id'] = $products_id[$i];
                    $data_orders['total_price'] = $total[$i];

                    $add_order_detail = $updateCustomers->create_order_detail($data_orders); ///them vào bảng orders_detail
                }
                $products = $updateCustomers->all_products(); ///lấy dữ liệu từ bảng products
                $datas = [];
                foreach ($products as $product) {
                    foreach ($products_id as $key => $item) {
                        // var_dump($product->id == $item);
                        // die();

                        if ($product->id == $item) {

                            $datas['quantity'] = $product->quantity - $quantity[$key];
                            $row = $updateCustomers->update_products($product->id, $datas['quantity']);
                        }
                    }
                }
                header("Location: CartController.php?action=orderDetail");
            }
        }
        include_once "../../views/shop/cart/checkout.php";
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
                header("Location: CartController.php?action=login");
            }
        }

        include_once "../../views/shop/register.php";
    }

    public function logout()
    {
        header("Location: CartController.php?action=login");
    }

    public function showOrder_detail()
    {
        $cate = new CategoryModel;
        $catesidebar = $cate->all(); ///hiển thị sidebar
        $id_customer = $_SESSION['user_id'];
        $obj = new CartModel;
        $object = $obj->getOrders($id_customer);
        // echo "<pre>";
        // print_r($object);
        include_once "../../views/shop/cart/orders_detail.php";
    }
}
$obj = new CartController;
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'login';
}
switch ($action) {
    case 'index':
        $obj->index();
        break;
    case 'showcart':
        $obj->showcat();
        break;
    case 'delete':
        $obj->delete();
        break;
    case 'checkout':
        $obj->checkOut();
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
    case 'orderDetail':
        $obj->showOrder_detail();
        break;
}
