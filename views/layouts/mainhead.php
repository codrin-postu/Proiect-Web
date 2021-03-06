<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A class manager to help you stay connected and up to date with your classes!">
  <meta name="author" content="Created by Vlad Ghiorghita, Victor Rosca and Codrin Postu">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/86fe649324.js" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="<?php echo array_key_exists("relPath", $data) ? $data["relPath"] : "public" ?>"/assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo array_key_exists("relPath", $data) ? $data["relPath"].'/assets/styles/'.$data["stylesheet"] : 'public/assets/stylesheet/index.css'?>">

  <title>ClassMa <?php echo array_key_exists("pageTitle", $data) ? "| ".$data["pageTitle"] : ''?></title>
</head>

{{content}}