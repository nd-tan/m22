<?php
include "./../../views/shop/layout/header.php";
include "./../../views/shop/layout/sidebar.php";
// print_r($_SESSION['cart']);
// die();
// session_destroy();
// $total=0;
?>
 <div class="row featured__filter">
    <?php if(isset($object)) : ?>
            <?php foreach ($object as $item) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="./../../Img/img/<?= $item->image ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="CartController.php?action=showcart&id=<?=$item->id?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="ShowController.php?action=product_detail&id=<?=$item->id?>"><?=$item->name?></a></h6>
                            <h5>$<?=number_format($item->price);?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php else : echo ""; endif; ?>
        </div>




<?php
include "./../../views/shop/layout/footer.php";
// include "../layout/footer.php";
?>