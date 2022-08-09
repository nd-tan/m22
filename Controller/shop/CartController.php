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
        // echo "<pre>";
        // print_r($object);

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
                $err['email'] = "bạn không thể để trống email";
            }
            if ($password == "") {
                $err['password'] = "bạn không thể để trống password";
            }
            if (empty($err)) {
                $check = $CustomerModel->sigin($email, $password);
                if ($check) {
                    //chuyen huong ve 
                    // $_SESSION['admin']=$rows->user_name;
                    foreach ($rows as $row) {
                        if ($email == $row->email && $password == $row->password) {
                            $_SESSION['user_name'] = $row->name;
                            $_SESSION['user_id'] = $row->id;

                            // print_r($_SESSION['user_name']) ; die();
                        }
                    }
                    header("Location: ShowController.php?action=index");
                } else {
                    $err['ep'] = "email hoặc mật khẩu không đúng";
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
                header("Location: CartController.php?action=login");
            }
        }

        include_once "../../views/shop/register.php";
    }

    public function logout()
    {
        header("Location: CartController.php?action=login");
    }
    public function placeOrder()
    {
        !isset($_SESSION['user_name']) == true; /////////chưa login thì khong vào được giỏ hàng
        if (isset($_SESSION['user_name']) == false) {
            header("location:  CartController.php?action=login");
        }
        // session_destroy();
        // die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name']; /////////dữ liệu update bảng customers
            $last_name = $_POST['last_name'];
            $country = $_POST['country'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $notes = $_POST['notes'];
            $id_customer = $_SESSION['user_id'];
            $updateCustomers = new CartModel;

            $data = []; ///////////dữ liệu thêm vào bảng orders
            $data['name'] = $name;
            $data['last_name'] = $last_name;
            $data['country'] = $country;
            $data['address'] = $address;
            $data['phone'] = $phone;
            $data['email'] = $email;
            $data['notes'] = $notes;
            $data['customers_id'] = $id_customer;

            $products_id = $_POST['id'];
            $quantity = $_POST['quantity'];
            // echo "<pre>";
            // print_r($quantity);
            // die();
            $total = $_POST['total'];


            $err = []; /////////xử lý rỗng
            $fields = ['name', 'last_name', 'country', 'address', 'email', 'notes'];
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $err[$field] = "You can't leave it blank this part";
                }
            }
            if (empty($err)) {
                $updateCus = $updateCustomers->update($id_customer, $_POST); ///update cai thông tin bảng customer
                $addOrders = $updateCustomers->create_order($data); ///them vao bảng giỏ hàng
                $rows = $updateCustomers->all_orders();///lấy hết bảng order để tìm ra id của đơn hàng mới thêm
                $max = 0;
                $data_orders = [];////max là id của đơn hàng mới thêm
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

                    $add_order_detail = $updateCustomers->create_order_detail($data_orders);///them vào bảng orders_detail
                }
                $products=$updateCustomers->all_products();
                $datas=[];
                for($i=0;$i<count($products);$i++)
                {
                    if($products[$i]->id==$products_id[$i])
                    {
                        // echo $products[$i]->quantity."<br>";//////số lượng trong kho
                        // die();
                        $datas['quantity']=$products[$i]->quantity - $quantity[$i];
                        
                        // echo "<pre>mua";
                        // print_r($quantity[$i]);////số lượng đã đặt hàng
                        // echo $datas['quantity']."<br>tru roi";//////số lượng sau khi cập nhật
                        // echo $products[$i]->id;
                        // die();
                        $row=$updateCustomers->update_products($products[$i]->id,$datas['quantity']);
                        /////////////cập nhật lại số lượng sản phẩm trong kho
                    }
                }
                session_unset();
                // session_destroy();
                header("Location: showController.php?action=index");
            }
        }
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
    case 'placeOrder':
        $obj->placeOrder();
        break;
}
