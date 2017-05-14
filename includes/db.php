<?php

//Database connection
try{
  $db = new PDO('mysql:host=127.0.0.1;dbname=cms', 'root', '');
}catch(PDOException $e) {
  die("Sorry, something went wrong!");
}

//Add category
if( isset($_POST['cat_title']) ){
  if(!empty($_POST['cat_title'])) {
    $cat_submitted = $_POST['cat_title'];
    $add_cat_statement = $db->prepare("INSERT INTO categories (cat_title) VALUES ('{$cat_submitted}')");
    $add_cat_statement->execute();
  }else {
    $cat_submit_error = "Please enter your Category name";
  }
}

//Edit category
if(isset($_GET['cat_edit_submit'])){
  $id_edit_cat = $_GET['cat_edit_id'];
  $cat_title_edit = $_GET['cat_title_edit'];
  $del_cat_statement = $db->prepare("UPDATE categories SET cat_title='{$cat_title_edit}' WHERE cat_id='{$id_edit_cat}'");
  $del_cat_statement->execute();
}

//Delete category
if(isset($_GET['cat_delete'])){
  $delete_cat = $_GET['cat_delete'];
  $del_cat_statement = $db->prepare("DELETE FROM categories WHERE cat_id = '{$delete_cat}'");
  $del_cat_statement->execute();
}

//Select everything from `categories` table
$cat_statement = $db->prepare("SELECT * FROM categories");
$exe = $cat_statement->execute();
$cat_result = $cat_statement->fetchAll(PDO::FETCH_ASSOC);

//Select everything from `posts` table
$posts_statement = $db->prepare("SELECT * FROM posts");
$exe = $posts_statement->execute();
$posts_result = $posts_statement->fetchAll(PDO::FETCH_ASSOC);

//Search Functionality
if( isset($_POST['search']) ){
  $search = $_POST['search'];
  $search_statement = $db->prepare("SELECT * FROM posts WHERE post_tags LIKE '%{$search}%'");
  $exe = $search_statement->execute();
  $search_result = $search_statement->fetchAll(PDO::FETCH_ASSOC);
  $s_results = $search_statement->rowCount();
}

//Add A Post Functionality
if(isset( $_POST['post_submit']) ){

  $post_title          = $_POST['post_title'];
  $post_content        = $_POST['post_content'];
  $post_cat_id         = $_POST['post_cat_id'];
  $post_post_author    = $_POST['post_author'];
  $post_status         = $_POST['post_status'];
  $post_tags           = $_POST['post_tags'];
  $post_image          = $_FILES['post_image']['name'];
  $post_image_tmp      = $_FILES['post_image']['tmp_name'];
  $post_date           = date('d-m-t');

  $post_image_ext = explode('.', $post_image);
  //$post_image_ext = strtolower(end($post_image));
  $allowed = ['jpg', 'png'];
  $img_destination_admin = 'uploads/' . $post_image;
  $img_destination_front = '../images/' . $post_image;
  move_uploaded_file($post_image_tmp, $img_destination_admin);
  move_uploaded_file($post_image_tmp, $img_destination_front);

  $add_post_statement = $db->prepare("INSERT INTO
    posts (post_cat_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_comment_count, post_status)
    VALUES ('{$post_cat_id}', '{$post_title}', '{$post_post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '4', '{$post_status}' )");
    $img_exe = $add_post_statement->execute();

}
