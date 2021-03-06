<?php

use core\Application;
use controllers\generate\Navigation;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/86fe649324.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo array_key_exists("relPath", $data) ? $data["relPath"] . '/assets/styles/' . $data["stylesheet"] : '/assets/stylesheet/dashboard.css' ?>" />

    <title>ClassMa <?php echo array_key_exists("pageTitle", $data) ? "| " . $data["pageTitle"] : '' ?></title>
</head>

<body class="stop-transition-load" id="body-padding">
    <header class="header" id="header">
        <div class="header-toggle">
            <i class="fas fa-bars" id="header-toggle"></i>
        </div>

        <div class="header-account">
            <div class="header-img">
                <img src="<?php echo array_key_exists("relPath", $data) ? $data["relPath"] . '/assets/images/png/default.png' : '/assets/images/png/default.png' ?>" alt="Profile Picture">

            </div>
            <a href="/logout">Logout</a>
        </div>
    </header>
    <div class="l-navbar first-navbar" id="navbar">
        <nav class="nav">
            <div>
                <a href="/dashboard/welcome" class="nav-logo">
                    <img src="<?php echo array_key_exists("relPath", $data) ? $data["relPath"] . '/assets/images/svg/304315.svg' : '/assets/images/png/304315.svg' ?>" alt="Ripe Mango, ClassMa Logo" />
                    <div class="nav-logo-info">
                        <span class="name">ClassMa</span>
                        <span class="usertype"><?php echo Application::$application->user->getUserType() ?></span>
                    </div>

                </a>
                <!-- TODO: Must be generated like the forms -->
                <div class="nav-list">
                    <!-- Navigation Section -->
                    <span class="nav-section">Navigation</span>
                    <a href="/dashboard/account" class="nav-link">
                        <i class="far fa-user"></i>
                        <span class="nav-name">Your Account</span>
                    </a>
                    <a href="/dashboard/security" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span class="nav-name">Security & Privacy</span>
                    </a>
                    <?php if (Application::$application->user->isAcademic()) : ?>
                        <a href="/dashboard/classroom/create" class="nav-link">
                            <i class="far fa-sticky-note"></i>
                            <span class="nav-name">Create A Classroom</span>
                        </a>
                    <?php else : ?>
                        <a href="/dashboard/classroom/join" class="nav-link">
                            <i class="far fa-sticky-note"></i>
                            <span class="nav-name">Join A Classroom</span>
                        </a>
                    <?php endif; ?>

                    <!-- Your Classes section -->
                    <span class="nav-section">Your Classes</span>
                    <?php echo Navigation::loadClasses() ?>
                    <!-- <div class="nav-class"> -->


                </div>
            </div>
    </div>
    </nav>
    </div>

    {{content}}