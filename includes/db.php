<?php

//Database connection
try{
  $db = new PDO('mysql:host=127.0.0.1;dbname=cms', 'root', '');
}catch(PDOException $e) {
  die("Sorry, something went wrong!");
}

//Insert category into DB
if( isset($_POST['cat_title']) ){
  if(!empty($_POST['cat_title'])) {
    $cat_submitted = $_POST['cat_title'];
    $add_cat_statement = $db->prepare("INSERT INTO categories (cat_title) VALUES ('{$cat_submitted}')");
    $add_cat_statement->execute();
  }else {
    $cat_submit_error = "Please enter your Category name";
  }
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
