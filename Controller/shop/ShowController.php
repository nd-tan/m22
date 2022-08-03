<?php
include "../../models/shop/ShowModel.php";
include "../../models/CategoryModel.php";
// include "../../models/ProductModel.php";
class ShowController
{
    public function index()
    {
        $showController = new showModel;
        $show=$showController->all();
        $cate= new CategoryModel;
        $catesidebar=$cate->all();

        include_once "../../views/shop/index/index.php";
        // include_once "../../views/shop/layout/sidebar.php";

    }
    // public function cate()
    // {
    //     $cate= new CategoryModel;
    //     $catesidebar=$cate->all();
    //     $obj= new 
    //     include_once "../../views/shop/cart/cart.php";

    // }

}
$obj=new ShowController;
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'login';
}
switch($action){
    case 'index':
        $obj->index();
        break;
    // case 'cate':
    //     $obj->cate();
    //     break;

}