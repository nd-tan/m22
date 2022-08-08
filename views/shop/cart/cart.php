<?php
include "./../../views/shop/layout/header.php";
include "./../../views/shop/layout/sidebar.php";
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
                                    <?php if(isset($_SESSION['cart'])): ?>
                                <?php foreach($_SESSION['cart'] as $key => $item) : 
                                   $total+= $item['price']*$item['quantityCart'];
                                   ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="../../Img/img/<?php echo $item['img']?>" width="120px" height="120px" alt="">
                                        <h5><?=$item['name']; ?></h5>
                                        <input type="hidden" name="id[]" value="<?=$item['id'];?>">
                                        <input type="hidden" name="dfghjk" value="<?=$item['quantitymax'];?>">
                                    </td>
                                    <td class="shoping__cart__price">
                                        $<?=$item['price'];?>
                                    </td>
                                    <td class="">
                                        <div class="">
                                            <div class="">
                                                <input type="number" value="<?=$item['quantityCart']?>" name ="quantityCart[]" min="0" max="<?=$item['quantitymax']?>">
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
                                <?php else : ?>
                                    <tr>
                                        <td>giỏ hàng đang rỗng vui lòng quay lại cửa hàng</td>
                                    </tr>
                                <?php endif; ?>
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
                        <button class="primary-btn cart-btn cart-btn-right" type="submit" value="update">UPDATE CART</button>
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
                        <a href="CartController.php?action=checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
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
