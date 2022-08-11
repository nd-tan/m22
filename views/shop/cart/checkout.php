<?php
include "./../../views/shop/layout/header.php";
include "./../../views/shop/layout/sidebar.php";
(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$total =0;
?>

<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="CartController.php?action=placeOrder" method ="post">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <?php if(isset($object)):?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" value="<?=$object->name?>" name ="name">
                                    <span><?php if(isset($err['name']))
                                    {
                                        echo $err['name'];
                                    } ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name ="last_name">
                                    <span><?php if(isset($err['last_name']))
                                    {
                                        echo $err['last_name'];
                                    } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name ="country">
                            <span><?php if(isset($err['country']))
                                    {
                                        echo $err['country'];
                                    } ?>
                                    </span>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" value="<?=$object->address?>" name ="address">
                            <span><?php if(isset($err['address']))
                                    {
                                        echo $err['address'];
                                    } ?>
                                    </span>
                            <!-- <input type="text" placeholder="Apartment, suite, unite ect (optinal)"> -->
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" value="<?=$object->phone?>" name ="phone">
                                    <span><?php if(isset($err['phone']))
                                    {
                                        echo $err['phone'];
                                    } ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" value="<?=$object->email?>" name ="email">
                                    <span><?php if(isset($err['email']))
                                    {
                                        echo $err['email'];
                                    } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p> -->
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text" name ="password">
                            <span><?php if(isset($err['password']))
                                    {
                                        echo $err['password'];
                                    } ?>
                                    </span>
                        </div>
                        <!-- <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div> -->
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name ="notes">
                        </div>
                        <?php else : ?>
                            <td>bạn chưa chọn sản phầm vui lòng quay lại shop</td>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                            <?php if(isset($_SESSION['cart'])): ?>
                                <?php foreach($_SESSION['cart'] as $key => $item ):
                                    $total+=$item['price']*$item['quantityCart'];
                                    ?>
                                <li><?=$item['name']?><span>$<?=$item['price']*$item['quantityCart']?></span></li>
                                <input type="hidden" name="id[]" value="<?=$item['id']?>">
                                <input type="hidden" name="quantity[]" value="<?=$item['quantityCart']?>">
                                <input type="hidden" name="total[]" value="<?=$item['price']*$item['quantityCart']?>">
                                <!-- <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li> -->
                                <?php endforeach; ?>
                                <?php endif;?>
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>$<?=$total?></span></div>
                            <div class="checkout__order__total">Total <span>$<?=$total?></span></div>
                            <input type="hidden" name="total_order" value="<?=$total?>">
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p> -->
                            <!-- <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<?php
include "./../../views/shop/layout/footer.php";
?>