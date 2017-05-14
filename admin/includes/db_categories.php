<?php

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
