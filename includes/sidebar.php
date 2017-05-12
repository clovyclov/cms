<div class="col-md-4">




    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>
        <form action="" method="post">
          <div class="input-group">
              <input type="text" name="search" class="form-control">
              <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                      <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
        </form>
        <!-- /.input-group -->
    </div>




    <!-- Blog Categories Well -->
    <div class="well">


        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                  <? foreach($cat_result as $key => $cat) : ?>
                     <li><a href="#"><?= $cat['cat_title'] ?></a></li>
                  <? endforeach ?>
                  
                </ul>
            </div>


        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
