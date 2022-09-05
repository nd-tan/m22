<?php
include '../views/layout/header.php';
include '../views/layout/sidebar.php';

// session_start();
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a class="btn-success"><?= $_SESSION['flash_message'] ?? ''; ?></a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <a class="btn btn-success" href="CategoryController.php?action=add">Add Category</a>
                    <a class="btn btn-warning " href="CategoryController.php?action=showRecicle">Recicle</a>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="CategoryController.php?action=search" method="post">
                        <div class="input-group">
                            <input name="search" type="text"  class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" style="left:553px; right: inherit">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="left:553px;">
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
                        <?php if(isset($rows)) : ?>
                        <?php foreach ($rows as $key => $item) { ?>
                            <tbody>
                                <tr>
                                    <td width="170px"><?php echo $key+1; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td width="250px">
                                        <a class="btn " href="CategoryController.php?action=edit&id=<?php echo $item->id ?>"><i class="bi bi-pencil-square h4" style="color:blue"></i></a>
                                        <a class="btn " href="CategoryController.php?action=recicle&id=<?php echo $item->id ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');"><i class="bi bi-trash h3" style="color:red"></i></a>
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
 include '../views/layout/footer.php' ;
 ?>