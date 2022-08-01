<?php
include '../views/layout/header.php';
include '../views/layout/sidebar.php';
// session_start();
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Search Categories</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <a class="btn btn-success" href="CategoryController.php?action=index">Back to Categories</a>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="CategoryController.php?action=search" method="post">
                        <div class="input-group">
                            <input name="search" type="text" value="<?=$search?>" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" style="left:475px; right: inherit">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="left:475px;">
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($object as $key => $item) { ?>

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
<?php
 include '../views/layout/footer.php' ;
 ?>