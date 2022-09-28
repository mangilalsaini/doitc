<?php 
    include_once("includes/dbconnection.php"); 

    $id = $_GET['id'];

/*
  $age = 20;
  print ($age >= 18) ? "Adult" : "Not Adult";

*/
    $query = "SELECT * FROM users WHERE id = $id";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

?>

<?php include_once("includes/header.php") ?>

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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="m-0 font-weight-bold text-primary">Update a User</h1>

                            <?php
                                if(isset($addition_operation)){
                                    if(!empty($result)){
                                        echo "<div class='alert alert-success' role='alert'> User Added Successfully</div>";
                                    }
                                    else{
                                        echo "<div class='alert alert-danger' role='alert'> Something is empty...</div>";

                                    }
                                }
                            ?>
                        </div>
                        <div class="card-body">
                            <form action="user_update.php" method="POST">
                                <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" value="<?= $row['email'] ?>" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" value="<?= $row['firstname'] ?>" class="form-control" id="firstname" name="firstname">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" value="<?= $row['lastname'] ?>" class="form-control" id="lastname" name="lastname">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="role">Role</label>
                                            <select class="custom-select mr-sm-2" id="role" name="role">
                                                <option disabled>Select Role</option>
                                                <option <?php print ($row['role']=="0") ? "selected" : ""; ?> value="0">User</option>;
                                                <option <?php print ($row['role']=="1") ? "selected" : ""; ?> value="1">Admin</option>;
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="userstate">Status</label>
                                            <select class="custom-select mr-sm-2" id="userstate" name="userstate">
                                                <option disabled>Select Statis</option>
                                                <option <?php print ($row['active']=="1") ? "selected" : ""; ?> value="1" selected>Active</option>
                                                <option <?php print ($row['active']=="0") ? "selected" : ""; ?> value="0">In-active</option>
                                            </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </form>
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


   