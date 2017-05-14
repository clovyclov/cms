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



                        <div class="col-xs-6">

                          <? if( isset($cat_submit_error) ) : ?>
                            <?= $cat_submit_error; ?>
                          <? endif ?>
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat_title">Add Category</label>
                              <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="cat_submit" value="Add Category">
                            </div>
                          </form>

                          <?php if( isset($_GET['cat_edit']) ) { ?>

                          <form action="" method="">
                            <div class="form-group">
                              <input type="text" name="cat_edit_id" class="hidden" value="<?php echo $_GET['cat_edit']; ?>">

                              <label for="cat_title">Edit Category</label>
                              <input class="form-control" type="text" name="cat_title_edit" value="<?php echo $_GET['cat_title_edit']; ?>">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="cat_edit_submit" value="Edit Category">
                            </div>
                          </form>

                          <?php } ?>

                        </div>

                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>Edit Category</th>
                                <th>Delete Category</th>
                              </tr>
                            </thead>
                            <tbody>

                              <? foreach( $cat_result as $result ) : ?>
                              <tr>
                                <td><?= $result['cat_id'] ?></td>
                                <td><?= $result['cat_title'] ?></td>
                                <td><?php echo "<a href=\"categories.php?cat_edit={$result['cat_id']}&cat_title_edit={$result['cat_title']}\">Edit</a>" ?></td>
                                <td><?php echo "<a href=\"categories.php?cat_delete={$result['cat_id']}\">Delete</a>" ?></td>
                              </tr>
                            <? endforeach ?>

                            </tbody>
                          </table>
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
