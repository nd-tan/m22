<?php
include '../views/layout/header.php';
include '../views/layout/sidebar.php';

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="CustomerController.php?action=search" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="left:665px; right: inherit">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" style="left:665px;">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col ">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($rows as $key => $item) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><?php echo $item->address; ?></td>
                                    <td><?php echo $item->email; ?></td>
                                    <td><?php echo $item->phone; ?></td>
                                    <td><a href="CustomerController.php?action=delete&id=<?=$item->id?>">Delete</a>
                                        <a href=""></a>
                                        <a href=""></a>
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
    include '../views/layout/footer.php';
    ?>