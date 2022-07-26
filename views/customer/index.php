
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
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>


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
                            <!-- <th scope="col">Email</th> -->
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
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </main>
    </div>
</div>

