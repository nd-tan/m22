<?php
include "./../../views/shop/layout/header.php";
include "./../../views/shop/layout/sidebar.php";
(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
// print_r($_SESSION['cart']);
// die();
// session_destroy();
$total=0;
?>
   
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <form action="" method = "post">
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="CartController.php?action=update" method="post">
                                <?php foreach($_SESSION['cart'] as $key => $item) : 
                                   $total+= $item['price']*$item['quantityCart'];
                                   ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5><?=$item['name']; ?></h5>
                                        <input type="text" name="id[]" value="<?=$item['id'];?>">
                                    </td>
                                    <td class="shoping__cart__price">
                                        $<?=$item['price'];?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="<?=$item['quantityCart']?>" name ="quantityCart[]">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $<?=$item['price']*$item['quantityCart']?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a class="icon_close" href="CartController.php?action=delete&id=<?=$item['id']?>"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="ShowController.php?action=index" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <!-- <a href="CartController.php?action=update" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a> -->
                        <button type="submit" value="update">update</button>
                    </div>
                </div>
            </form>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span>$<?=$total?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
<?php
include "./../../views/shop/layout/footer.php";
// include "../layout/footer.php";
?>
