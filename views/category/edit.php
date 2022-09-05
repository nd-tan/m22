<?php
include '../views/layout/header.php';
include '../views/layout/sidebar.php';
// session_start();
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
        <a class="btn-success"><?= $_SESSION['flash_message'] ?? ''; ?></a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
        <form method="post" action="">
            <?php if(isset($obj->name)):?>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?php echo $obj->name;?>">
                <span style="color:red"><?php if (isset($err['name_1'])) {
                    echo $err['name_1'];
                }if (isset($err['name'])) {
                    echo $err['name'];
                }
                ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="CategoryController.php?action=index" class="btn btn-danger">cancel</a>
            <?php else : echo ""; endif; ?>
        </form>
        </div>
    </div>
<?php
 include '../views/layout/footer.php' ;
 ?>
