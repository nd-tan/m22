
    <?php
    //  include '../../../mvc/views/layout/header.php' ;
    //  include '../../../mvc/views/layout/sidebar.php' ;
     include '../views/layout/header.php';
     include '../views/layout/sidebar.php';
    ?>
    <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

hello order
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Order</h1>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Color</th>
                            <th scope="col">Breed</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <?php foreach ($rows as $key => $item) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $item->name; ?></td>
                                <td><?php echo $item->age; ?></td>
                                <td><?php echo $item->color; ?></td>
                                <td><?php echo $item->breed; ?></td>
                                <td><?php echo $item->gender; ?></td>
                                <td><?php echo $item->price; ?></td>
                                <td><img src="../Img/img/<?php echo $item->image ?>" width="120px" height="120px" alt=""></td>
                                <td><?php echo $item->quantity; ?></td>
                                <td><?php echo $item->status; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>

                </table>


            </div>
        </main>

    </div>
</div>

