<?php
require_once 'includes/db.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';

?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <!-- Blog Entries Column -->
            <div class="col-md-8">




              <h1 class="page-header">
                  CS Media Web Blog
                  <small>Secondary Text</small>
              </h1>


              <?php if( isset($_POST['search']) ){

                if( $s_results === 1 ){
                  echo "<h3 class=\"search-results\"> $s_results Result </h3>";
                } else {
                  echo "<h3 class=\"search-results\"> $s_results Results </h3>";
                }

                ?>
                <? foreach($search_result as $res_post) : ?>

                <h2>
                    <a href="#"><?= $res_post['post_title'] ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"> <?= $res_post['post_author'] ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $res_post['post_date'] ?></p>
                <hr>
                <img class="img-responsive" src="images/<?= $res_post['post_img'] ?>" alt="">
                <hr>
                <p><?= $res_post['post_content'] ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <? endforeach ?>

              <?php } else { ?>

              <? foreach($posts_result as $result ) : ?>

              <h2>
                  <a href="#"><?= $result['post_title'] ?></a>
              </h2>
              <p class="lead">
                  by <a href="index.php"> <?= $result['post_author'] ?> </a>
              </p>
              <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $result['post_date'] ?></p>
              <hr>
              <img class="img-responsive" src="images/<?= $result['post_img'] ?>" alt="">
              <hr>
              <p><?= $result['post_content'] ?></p>
              <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

              <hr>

            <? endforeach; ?>

            <?php } ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php require_once 'includes/sidebar.php' ?>

        </div>
        <!-- /.row -->

        <hr>



<?php require_once 'includes/footer.php'; ?>
