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
            <tbody>
                <tr>
                    <td><?= $object->name; ?></td>
                    <td><?= $object->age; ?></td>
                    <td><?= $object->color; ?></td>
                    <td><?= $object->gender; ?></td>
                    <td><?=number_format($object->price) ; ?></td>
                    <td><?= $object->cate_name; ?></td>
                    <td><img src="../../Img/img/<?php echo $object->image ?>" width="100px" height="100px" alt=""></td>
                    <td><a class="btn btn-success" href="CartController.php?action=showcart&id=<?=$object->id?>">Add to Cart</a></td>

                </tr>

            </tbody>
    <?php else : ?>
        <label></label>
    <?php endif; ?>
</table>




<?php
include "./../../views/shop/layout/footer.php";
// include "../layout/footer.php";
?>