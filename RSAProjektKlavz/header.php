<!DOCTYPE html>
<?php
include_once 'connection.php';
include_once 'session.php';

?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Apartmaji - Domov</title>
        <link type="text/css" rel="stylesheet" href="css/header_style.css" />
        <link type="text/css" rel="stylesheet" href="css/background_style.css" />
        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="nav-menu">
              <ul>
                <li class="current_page_item"><a href="index.php" title="Home">DOMOV</a></li>
                <li class="page_item page-item-26"><a href="#">IZDELKI</a></li>
                    <?php
                      if(isset($_SESSION['ID'])){
                          echo '<li class="page_item page-item-9"><a href="logout.php">Odjava ('.$_SESSION['username'].')</a></li>';
                      }
                      else{
                          echo '<li class="page_item page-item-9"><a href="login.php">PRIJAVA</a></li>';
                          echo '<li class="page_item page-item-9"><a href="register.php">REGISTRACIJA</a></li>';
                      }
                              ?>
              </ul>
            </div><!-- .nav-menu -->
        </nav><!-- #site-navigation -->
        <div class="bg-img">