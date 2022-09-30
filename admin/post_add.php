<?php include_once("includes/dbconnection.php"); ?>

<?php

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $posttitle      = $_POST['title'];
        $postcontent    = $_POST['content'];
        $postcategory   = $_POST['category'];
        $postimage      = $_FILES['image']['name'];
        $postauthor     = $_SESSION['userfullname'];
        $datecreated    = date("Y-m-d H:i:s");

        if(!empty($posttitle) && !empty($postcontent)){
            $query = "INSERT INTO posts (title, content, category, image, author, datecreated) VALUES ";
            $query .= "('$posttitle', '$postcontent', '$postcategory', '$postimage', '$postauthor', '$datecreated')";
            $result = mysqli_query($conn, $query);
            $_SESSION['post_addition'] = true;
            move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$postimage");
        }
        else{
            $_SESSION['post_addition'] = false;
        }

    }

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
                            <h1 class="m-0 font-weight-bold text-primary">Create a Post</h1>

                            <?php
                                if(isset($_SESSION['post_addition'])) {
                                    if(!empty($result)) {
                                        echo "<div class='alert alert-success' role='alert'> Post Added Successfully</div>";
                                    }
                                    else{
                                        echo "<div class='alert alert-danger' role='alert'> Something is empty...</div>";
                                        unset($_SESSION['post_addition']);
                                    }
                                }
                                
                            ?>
                        </div>
                        <div class="card-body">
                            <form action="post_add.php" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-floating form-group col-md-12">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" id="content" name="content" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="category">Category</label>
                                        <select class="custom-select mr-sm-2" id="category" name="category">
                                            <?php
                                                $categoriesquery = "SELECT * FROM categories";

                                                $categories = mysqli_query($conn, $categoriesquery);
                                                while($category = mysqli_fetch_assoc($categories)) {
                                                    echo "<option value=" . $category['categoryname'].">".$category['categoryname']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="image" class="form-label">Seelct image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control" id="author" value="<?= $_SESSION['userfullname'] ?>" name="author">
                                    </div>  
                                </div>
                                <button type="submit" class="btn btn-primary">Add Post</button>
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


   