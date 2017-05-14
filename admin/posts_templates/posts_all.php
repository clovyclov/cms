<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Author</th>
      <th>Date</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Comments</th>
      <th>Tags</th>
    </tr>
  </thead>

  <tbody>
    <? foreach($posts_result as $post) : ?>
    <tr>
      <td><?= $post['post_id'] ?></td>
      <td><?= $post['post_author'] ?></td>
      <td><?= $post['post_date'] ?></td>
      <td><?= $post['post_title'] ?></td>
      <td><?= $post['post_cat_id'] ?></td>
      <td><?= $post['post_status'] ?></td>
      <td><img class="post_admin_img img-responsive" style="max-width:250px;" src="uploads/<?= $post['post_img'] ?>" alt=""></td>
      <td><?= $post['post_comment_count'] ?></td>
      <td><?= $post['post_tags'] ?></td>
    </tr>
    <? endforeach ?>
  </tbody>
</table>
