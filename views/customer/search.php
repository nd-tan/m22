<?php
//  include '../../../mvc/views/layout/header.php' ;
//  include '../../../mvc/views/layout/sidebar.php' ;
include '../views/layout/header.php';
include '../views/layout/sidebar.php';

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <a class="btn btn-success" href="CustomerController.php?action=index">Back to Customers</a>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="CustomerController.php?action=search" method="post">
                        <div class="input-group">
                            <input name="search" type="text" value="<?php if(isset($search)){echo $search; }else{echo "";}?>" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="left:597px; right: inherit">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="left:597px;">
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
                                <th scope="col ">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <!-- <th scope="col">Email</th> -->
                            </tr>
                        </thead>
                        <?php if(isset($object)) :  ?>
                        <?php foreach ($object as $key => $item) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><?php echo $item->address; ?></td>
                                    <td><?php echo $item->email; ?></td>
                                    <td><?php echo $item->phone; ?></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <?php else : ?>
                            <label>Selected keywords to search!!</label>
                        <?php endif; ?>
                    </table>
                </div>
            </main>
        </div>
    </div>