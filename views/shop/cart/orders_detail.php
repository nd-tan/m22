<?php
include "./../../views/shop/layout/header.php";
include "./../../views/shop/layout/sidebar.php";
(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Color</th>
            <th scope="col">Gender</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Date</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <?php if (isset($object)) : ?>
        <?php foreach ($object as $key => $item) : ?>
            <tbody>
                <tr>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->age; ?></td>
                    <td><?= $item->color; ?></td>
                    <td><?= $item->gender; ?></td>
                    <td>$<?=number_format($item->price) ; ?></td>
                    <td><?= $item->quantity; ?></td>
                    <td><?= $item->date_add; ?></td>
                    <td><img src="../../Img/img/<?php echo $item->image ?>" width="100px" height="100px" alt=""></td>

                </tr>

            </tbody>
        <?php endforeach; ?>
    <?php else : ?>
        <label></label>
    <?php endif; ?>
</table>



<?php
include "./../../views/shop/layout/footer.php";
?>