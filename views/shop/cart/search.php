<?php
include "./../../views/shop/layout/header.php";
include "./../../views/shop/layout/sidebar.php";
// print_r($object);
// die();
// session_destroy();
// $total=0;
?>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Color</th>
            <th scope="col">Gender</th>
            <th scope="col">Price($)</th>
            <th scope="col">Breed</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <?php if (isset($object)) : ?>
    <?php foreach($object as $value) : ?>
            <tbody>
                <tr>
                    <td><?= $value->name; ?></td>
                    <td><?= $value->age; ?></td>
                    <td><?= $value->color; ?></td>
                    <td><?= $value->gender; ?></td>
                    <td><?=number_format($value->price) ; ?></td>
                    <td><?= $value->name_cate; ?></td>
                    <td><img src="../../Img/img/<?php echo $value->image ?>" width="100px" height="100px" alt=""></td>
                    <td><a class="btn btn-success" href="CartController.php?action=showcart&id=<?=$value->id?>">Add to Cart</a></td>
                </tr>
            </tbody>
    <?php endforeach; ?>
    <?php else : ""; endif;?>
</table>




<?php
include "./../../views/shop/layout/footer.php";
// include "../layout/footer.php";
?>