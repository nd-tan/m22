<?php
include '../views/layout/header.php';
include '../views/layout/sidebar.php';
// session_start();
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <a class="btn btn-success" href="CategoryController.php?action=add">Add Categories</a>
                    <a class="btn-success"><?= $_SESSION['flash_message'] ?? ''; ?></a>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($rows as $key => $item) { ?>

                            <tbody>
                                <tr>
                                    <td width="170px"><?php echo $item->id; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td width="250px">
                                        <a class="btn btn-success" href="CategoryController.php?action=edit&id=<?php echo $item->id ?>">Edit</a>
                                        <a class="btn btn-danger" href="CategoryController.php?action=delete&id=<?php echo $item->id ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </main>
        </div>
    </div>