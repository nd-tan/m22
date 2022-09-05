<?php
//  include '../../../mvc/views/layout/header.php' ;
//  include '../../../mvc/views/layout/sidebar.php' ;
include '../views/layout/header.php';
include '../views/layout/sidebar.php';
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="OrderController.php?action=search" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="left:765px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="left:765px;">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                                <!-- <th scope="col">Gender</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th> -->
                            </tr>
                        </thead>
                        <?php if(isset($rows)) : ?>
                        <?php foreach ($rows as $key => $item) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $item->id; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><?php echo $item->address; ?></td>
                                    <td><?php echo $item->phone; ?></td>
                                    <td>$<?php echo number_format($item->total_order); ?></td>
                                    <td><?php echo $item->date_add; ?></td>
                                    <td width="250px">
                                        <a class="btn " href="OrderController.php?action=detail&id=<?php echo $item->id ?>"><i class="bi bi-eye h4" style="color:chocolate"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <?php else : echo ""; endif; ?>

                    </table>


                </div>
            </main>

        </div>
    </div>

    <?php
    include '../views/layout/footer.php';
    ?>