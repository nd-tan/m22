<?php
//  include '../../../mvc/views/layout/header.php' ;
//  include '../../../mvc/views/layout/sidebar.php' ;
include '../views/layout/header.php';
include '../views/layout/sidebar.php';
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                <a class="btn btn-success" href="OrderController.php?action=index">Back to Orders</a>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Color</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total_Price</th>
                                <th scope="col">Image</th>
                                <!-- <th scope="col">Quantity</th> -->
                                <!-- <th scope="col">Status</th> -->
                            </tr>
                        </thead>
                        <?php if(isset($object)): ?>
                        <?php foreach ($object as $item) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $item->orders_id; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><?php echo $item->color; ?></td>
                                    <td><?php echo $item->gender; ?></td>
                                    <td>$<?php echo $item->price; ?></td>
                                    <td><?php echo $item->quantity; ?></td>
                                    <td>$<?php echo $item->totalPrice; ?></td>
                                    <td><img src="../Img/img/<?php echo $item->image ?>" width="100px" height="100px" alt=""></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <?php else : ?>
                            <td>No orders have been selected, please return to the order page!!</td>
                        <?php endif; ?>

                    </table>


                </div>
            </main>

        </div>
    </div>

    <?php
    include '../views/layout/footer.php';
    ?>