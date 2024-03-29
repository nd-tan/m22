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
            <a class="btn-success"><?= $_SESSION['flash_message'] ?? ''; ?></a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <a class="btn btn-success" href="ProductController.php?action=add">Add Product</a>
                        <a class="btn btn-warning" href="ProductController.php?action=showRecicle">Recicle</a>
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="ProductController.php?action=search" method="post">
                            <div class="input-group">
                                <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="left:562px; right: inherit">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" style="left:562px;">
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
                                    <th scope="col">Breed</th>
                                    <!-- <th scope="col">Color</th>
                                    <th scope="col">Gender</th> -->
                                    <!-- <th scope="col">Price($)</th> -->
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php foreach ($rows as $key => $item) { ?>

                                <tbody>
                                    <tr>
                                        <td width="170px"><?php echo $key+1; ?></td>
                                        <td><?php echo $item->name; ?></td>
                                        <td><?php echo $item->categoryName; ?></td>
                                        <td><img src="../Img/img/<?php echo $item->image ?>" width="120px" height="120px" alt=""></td>
                                        <td width="250px">
                                            <a class="btn " href="ProductController.php?action=edit&id=<?php echo $item->id ?>"><i class="bi bi-pencil-square h4" style="color:blue"></i></a>
                                            <a class="btn " href="ProductController.php?action=recicle&id=<?php echo $item->id ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');"><i class="bi bi-trash h4" style="color:red"></i></a>
                                            <a class="btn " href="ProductController.php?action=detail&id=<?php echo $item->id ?>"><i class="bi bi-eye h4" style="color:chocolate"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <div class="container">
                            <!-- <nav class="pagination"> -->
                            <div class="pagination">
                                <?php
                                if ($current_page > 1 && $total_page > 1) {
                                    echo '<a href="ProductController.php?action=index&page=' . ($current_page - 1) . '">Prev</a>';
                                }
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $current_page) {
                                        echo '<a class="active">' . $i . '</a>';
                                    } else {
                                        echo '<a href="ProductController.php?action=index&page=' . $i . '">' . $i . '</a>';
                                    }
                                }
                                if ($current_page < $total_page && $total_page > 1) {
                                    echo '<a href="ProductController.php?action=index&page=' . ($current_page + 1) . '">Next</a>';
                                }
                                ?>
                            </div>
                            <!-- </nav> -->
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php
        include '../views/layout/footer.php';
        ?>