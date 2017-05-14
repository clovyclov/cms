<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

        <?php include 'includes/admin_nav.php'; ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small>Clovis' CMS</small>
                        </h1>


                    <div class="col-xs-12">

                      <?php

                        if(isset( $_GET['posts'] )) {

                          $source = $_GET['posts'];

                          switch( $source ) {
                            case "view_all" :
                              include 'posts_templates/posts_all.php';
                              break;
                            case "add_post" :
                              echo "<h2>Create a new post</h2>";
                              include 'posts_templates/add_post.php';
                              break;
                            default :
                              include 'posts_templates/posts_all.php';
                          }

                        }else {
                            include 'posts_templates/posts_all.php';
                        }

                       ?>

                    </div>



                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php'; ?>
