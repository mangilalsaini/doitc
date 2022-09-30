<?php include_once("includes/dbconnection.php") ?>
<?php include_once("includes/header.php") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">


<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include_once("includes/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include_once("includes/topbar.php") ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">All Posts</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank"
                        href="https://datatables.net">official DataTables documentation</a>
                </p>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a href="post_add.php" class="btn btn-primary">Add Post</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                 /*           if(isset($_SESSION['update_operation'])){
                                if($_SESSION['update_operation']===true){
                                    echo '<div class="alert alert-success" role="alert">
                                            User Updated Successfully!
                                        </div>';
                                    unset($_SESSION['update_operation']);
                                }
                                else if($_SESSION['update_operation']===false){
                                    echo '<div class="alert alert-danger" role="alert">
                                            User Update Failed!
                                        </div>';
                                    unset($_SESSION['update_operation']);
                                }
                            }
                 */       ?>
                        <table class="table table-sm" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Create On</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Create On</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'doitc');
                                    $query = "SELECT * FROM posts LIMIT 10";
                                    $result = mysqli_query($conn, $query);
                                    while($row= mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo substr($row['content'],0,100) . "....."; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo "<img width='100px' src='../assets/images/" . $row['image'] . "'/>"; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><?php echo $row['datecreated']; ?></td>
                                    <td><a href="post_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a></td>
                                    <td><a href="post_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<?php include_once("includes/logoutmodule.php"); ?>

<?php include_once("includes/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
            } );
        
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );
    </script>


   