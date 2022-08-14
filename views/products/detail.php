<?php
    //  include '../../../mvc/views/layout/header.php' ;
    //  include '../../../mvc/views/layout/sidebar.php' ;
    include '../views/layout/header.php';
    include '../views/layout/sidebar.php';
    //  session_start();
    ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product Detail</h1>
            <a class="btn-success"><?= $_SESSION['flash_message'] ?? ''; ?></a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <a class="btn btn-success" href="ProductController.php?action=index">Back to Product</a>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Price($)</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <?php if(isset($object)): ?>
                                <tbody>
                                    <tr>
                                        <td width="170px"><?php echo $object->id; ?></td>
                                        <td><?php echo $object->name; ?></td>
                                        <td><?php echo $object->categoryname; ?></td>
                                        <td><?php echo $object->color; ?></td>
                                        <td><?php echo $object->gender; ?></td>
                                        <td><?php echo $object->age; ?></td>
                                        <td><?php echo number_format($object->price); ?></td>
                                        <td><?php echo $object->quantity; ?></td>
                                    </tr>
                                </tbody>
                            <?php else : ?>
                                <label></label>
                            <?php endif; ?>
                        </table>
                    </div>
                </main>
            </div>
        </div>
<?php
 include '../views/layout/footer.php' ;
 ?>