<?php

session_start();
include 'includes/config.php';
include 'includes/log_out.php';
include 'includes/delete_photo_liked.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Rover's Eyes</title>
    <!-- fav icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="assets/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  </head>

  <body class="accueil">

    <div class="loader"></div>

    <div class="dropdown" data-toggle="false">
      <button class="dropbtn">MENU</button>
      <div class="dropdown_menu">
        <a href="#gallery_anchor" title="Gallery" id="gallery">GALLERY</a>
        <?php 
        if(!array_key_exists('user', $_SESSION)){
          echo '<a href="pages/sign_up.php" title="SignUp">SUBSCRIBE</a>';
          echo '<a href="pages/sign_in.php" title="SignIn">LOGIN</a>';
        }else {
          echo '<a href="pages/collection.php" title="Collection">MY COLLECTION</a>';
          echo '<a href="index.php?log_out=true" title="LogOut" class="log_out">LOGOUT</a>';
        }
        ?>   
      </div>
    </div>

    <header class="preload">
      <nav>
        <a href="index.php" target="_self" title="Home" id="home">R<img src="assets/img/logo_mars.png" alt="Logo">VER'S EYES</a>
        <div class="nav_links">
          <a href="#gallery_anchor" title="Gallery" id="gallery" class="target">GALLERY</a>
          <?php 
          if(!array_key_exists('user', $_SESSION)){
            echo '<a href="pages/sign_up.php" title="SignUp">SUBSCRIBE</a>';
            echo '<a href="pages/sign_in.php" title="SignIn">LOGIN</a>';
          }else {
            echo '<a href="pages/collection.php" title="galery">MY COLLECTION</a>';
            echo '<a href="index.php?log_out=true" title="Log out" class="log_out">LOG OUT</a>';
          }

          ?>    
        </div>
      </nav>
    </header>

    <div id="content" class="container preload">

      <div class="intro">
        <h1>CU<em>RIOSITY'S GALLERY</em></h1>
        <div class="intro_line_left"></div>
        <div class="intro_line_right"></div>
        <div class="texts">
          <span id="discover">DISCOVER</span>
          <span id="explore">EXPLORE</span>
          <span id="live">LIVE MARS THROUGH THE PHOTOGRAPHIES</span>
        </div>
        <div class="intro_line_up"></div>
        <div class="intro_line_down"></div>
        <img src="assets/img/mars-landscape.png" alt="Mars">
      </div>

      <div class="description">
        <div class="description_image">
          <h2>WHAT IS<br><em>CURIOSITY</em></h2>
          <img src="assets/img/mars-mission.JPG" alt="Mission Image">
        </div>
        <div class="description_text">
          <h3>MISSION OVERVIEW</h3>
          <p>
            Launch Date : NOVEMBER 26, 2011 11:02:00 UTC<br>
            Landing Date : AUGUST 6, 2012, 05:17:57 UTC<br><br>
            NASA’s Mars Science Laboratory mission set
            down a large, mobile laboratory — the rover
            Curiosity — at Gale Crater, using precision
            landing technology that made one of Mars’
            most intriguing regions a viable destination for
            the first time.<br><br>
            Within the first eight months of
            a 23-month primary mission, Curiosity met its
            major objective of finding evidence of a past
            environment well suited to supporting microbial
            life.<br>
            The rover studies the geology and environment
            of selected areas in the crater and analyzes
            samples drilled from rocks or scooped
            from the ground.
            Curiosity carries the most advanced payload
            of scientific gear ever used on Mars’ surface,
            a payload more than 10 times as massive as
            those of earlier Mars rovers.<br><br>
            Its assignment : 
            Investigate whether conditions have been
            favorable for microbial life and for preserving
            clues in the rocks about possible past life.
          </p>
        </div>
        <div class="description_line_down"></div>
      </div>

      <div class="instruments">
        <div class="instruments_image">
          <h2>CURIOSITY<br><em>INSTRUMENTS</em></h2>
          <img src="assets/img/mars-rover.JPG" alt="Rover Image">
        </div>
        <div class="instruments_text">
          <h3>ROVER OVERVIEW</h3>
          <p>
            The instruments are state-of-the-art tools for acquiring information about the geology, atmosphere, environmental conditions, and potential biosignatures on Mars.<br><br>
            Cameras :<br>
            - Mast Camera (MastCam)<br>
            - Mars Hand Lens Imager (MAHLI)<br>
            - Mars Descent Imager (MARDI)<br><br>
            Spectrometers :<br>
            - Alpha Particle X-Ray Spectrometer (APXS)<br>
            - Chemistry & Camera (ChemCam)<br>
            - Chemistry & Mineralogy X-Ray Diffreaction (CheMin)<br>
            - Sample Analysis at Mars Instrument Suite (SAM)<br><br>
            Detectors & Sensors :<br>
            - Radiation Assessment Detector (RAD)<br>
            - Dynamic Albedo of Neutrons (DAN)<br>
            - Rover Environmental Monitoring Station (REMS)<br>
            - Mars Science Laboratory Entry Descent and Landing Instrument (MEDLI)
          </p>
        </div>
        <div class="instruments_line_down"></div>
      </div>

      <div class="gallery" id="gallery_anchor">
        <div class="gallery_title"><h2>PHOTOS GALLERY</h2></div>
        <div class="gallery_display">

        </div>
        <div class="add_popup"><a href="pages/collection.php" alt="aller voir ma collection de photo de mars">PHOTO ADDED TO YOUR COLLECTION</a></div>

      </div>
    </div>

    <a class="back_top"><img src="assets/img/cd-top-arrow.svg"></a>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>

  </body>
</html>