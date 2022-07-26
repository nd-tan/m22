

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
    <h1 class="h3 mb-0 text-gray-800">Products</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <a class="btn btn-success" href="ProductController.php?action=add">Add Product</a>
                    <a class="btn-success"><?= $_SESSION['flash_message'] ?? ''; ?></a>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Color</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Price($)</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($rows as $key => $item) { ?>

                            <tbody>
                                <tr>
                                    <td width="170px"><?php echo $item->id; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><?php echo $item->color; ?></td>
                                    <td><?php echo $item->gender; ?></td>
                                    <td><?php echo $item->price; ?></td>
                                    <td><img src="../Img/img/<?php echo $item->image ?>" width="120px" height="120px" alt=""></td>
                                    <td width="250px">
                                        <a class="btn btn-success" href="ProductController.php?action=edit&id=<?php echo $item->id ?>">Edit</a>
                                        <a class="btn btn-danger" href="ProductController.php?action=delete&id=<?php echo $item->id ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </main>
        </div>
    </div>
