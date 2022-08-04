<?php
include "../../models/CategoryModel.php";
include "../../models/shop/CartModel.php";
session_start();

class CartController
{
    public function index()
    {
        $cate= new CategoryModel;
        $catesidebar=$cate->all();
        // $id= $_GET['id'];
        // $obj= new CartModel;
        // $object=$obj->getOne($id);
        // $_SESSION['cart']=$object;
        // print_r($_SESSION['cart']);
        // die();
        include_once "../../views/shop/cart/cart.php";
    }
    public function showcat()
    {
        $cate= new CategoryModel;
        $catesidebar=$cate->all();
        $id= $_GET['id'];
        $quantity = (isset($_REQUEST['quantityCart']) ? $_REQUEST['quantityCart'] : 1);
        $obj= new CartModel;
        $object=$obj->getOne($id);
        $item=[
            'id'=>$object->id,
            'name'=>$object->name,
            'price'=>$object->price,
            'img'=>$object->image,
            'quantityCart'=>$quantity
        ];
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantityCart'] +=  $quantity;
        } else {
            $_SESSION['cart'][$id] = $item;
        }
        include_once "../../views/shop/cart/cart.php";
    }
    public function delete()
    {
        $cate= new CategoryModel;
        $catesidebar=$cate->all();
        $id=$_REQUEST['id'];
        // var_dump($id);
        unset($_SESSION['cart'][$id]);
        include_once "../../views/shop/cart/cart.php";

    }
    public function update()
    {
        $cate= new CategoryModel;
        $catesidebar=$cate->all();
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $id=$_REQUEST['id'];
            $quantity=$_POST['quantityCart'];
            
        }
        include_once "../../views/shop/cart/cart.php";
    }
}
$obj=new CartController;
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'login';
}
switch($action){
    case 'index':
        $obj->index();
        break;
    case 'showcart':
        $obj->showcat();
        break;
    case 'delete':
        $obj->delete();
        break;
    case 'update':
        $obj->update();
        break;
}
