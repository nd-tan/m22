<?php
// include "./../MVC";
        // echo "<pre>";
        // print_r($catesidebar);
        // die();
?>

<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php foreach($catesidebar as $item): ?>
                            <li><a href="ShowController.php?action=show&id=<?=$item->id?>"><?=$item->name?></a></li>
                            <?php endforeach  ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="Showcontroller.php?action=search" method='post'>
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?" name="search">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 762 783 458</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    