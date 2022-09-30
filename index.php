<?php include_once("includes/header.php"); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php
                       if(isset($_SESSION['userfullname'])){
                            echo "Hi " . $_SESSION['userfullname'] . "....";
                         }
                    ?>
                </h1>

                <!-- First Blog Post -->
                <?php
                     $query = "SELECT * FROM `posts` WHERE 1;";
                     $result = mysqli_query($conn, $query);
                     while($posts = mysqli_fetch_assoc($result)){
                ?>
                        <h2>
                            <a href="#"><?= $posts['title'] ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?= $posts['author'] ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on 
                            <?php 
                                $postdate = strtotime($posts['datecreated']);
                                echo date('l, d-M-Y', $postdate);
                            ?>
                        </p>
                        <hr>
                        <img class="img-responsive" src="assets/images/<?= $posts['image'] ?>" width="200px" height="200px" alt="">
                        <hr>
                        <p><?= $posts['content'] ?></p>
                        <a class="btn btn-primary" href="<?= 'post.php?id=' . $posts['id'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                <?php } ?>

 

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include_once('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include_once('includes/footer.php'); ?>