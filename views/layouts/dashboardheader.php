<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/86fe649324.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="<?php

use core\Application;

echo array_key_exists("relPath", $data) ? $data["relPath"].'/assets/styles/'.$data["stylesheet"] : '/assets/stylesheet/dashboard.css'?>"/>

    <title>ClassMa <?php echo array_key_exists("pageTitle", $data) ? "| ".$data["pageTitle"] : ''?></title>
</head>

<body class="stop-transition-load" id="body-padding">
    <header class="header" id="header">
        <div class="header-toggle">
            <i class="fas fa-bars" id="header-toggle"></i>
        </div>

        <div class="header-img">
            <img src="<?php echo array_key_exists("relPath", $data) ? $data["relPath"].'/assets/images/png/codrin-img.png' : '/assets/images/png/codrin-img.png'?>" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar first-navbar" id="navbar">
        <nav class="nav">
            <div>
                <a href="#" class="nav-logo">
                    <img src="<?php echo array_key_exists("relPath", $data) ? $data["relPath"].'/assets/images/svg/304315.svg' : '/assets/images/png/304315.svg'?>" alt="Ripe Mango, ClassMa Logo" />
                    <div class="nav-logo-info">
                        <span class="name">ClassMa</span>
                        <span class="usertype"><?php echo Application::$application->user->getUserType() ?></span>
                    </div>

                </a>
                <!-- Must be generated like the forms -->
                <div class="nav-list">
                    <!-- Navigation Section -->
                    <span class="nav-section">Navigation</span>
                    <a href="./account.html" class="nav-link">
                        <i class="far fa-user"></i>
                        <span class="nav-name">Your Account</span>
                    </a>
                    <a href="./security.html" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span class="nav-name">Security & Privacy</span>
                    </a>
                    <a href="./join-classroom.html" class="nav-link">
                        <i class="far fa-sticky-note"></i>
                        <span class="nav-name">Join A Classroom</span>
                    </a>
                    <!-- Your Classes section -->
                    <span class="nav-section">Your Classes</span>
                    <div class="nav-class">
                        <div class="class-select">
                            <i class="fas fa-chevron-right"></i>
                            <span class="class-title">Web Technologies</span>
                        </div>
                        <div class="class-links">
                            <a href="./classroom/class-information.html" class="nav-link">
                                <i class="fas fa-book-open"></i>
                                <span class="nav-name">Class Information</span>
                            </a>
                            <a href="./classroom/check-attendance.html" class="nav-link">
                                <i class="fas fa-clock"></i>
                                <span class="nav-name">Check Attendance</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-highlighter"></i>
                                <span class="nav-name">Class Documentation</span>
                            </a>
                            <a href="./classroom/homework-list.html" class="nav-link">
                                <i class="fas fa-paperclip"></i>
                                <span class="nav-name">Homework</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-percentage"></i>
                                <span class="nav-name">Grades</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-class">
                        <div class="class-select">
                            <i class="fas fa-chevron-right"></i>
                            <span class="class-title">Advanced Programming</span>
                        </div>
                        <div class="class-links">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book-open"></i>
                                <span class="nav-name">Class Information</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-clock"></i>
                                <span class="nav-name">Check Attendance</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-highlighter"></i>
                                <span class="nav-name">Class Documentation</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-paperclip"></i>
                                <span class="nav-name">Homework</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-percentage"></i>
                                <span class="nav-name">Grades</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-class">
                        <div class="class-select">
                            <i class="fas fa-chevron-right"></i>
                            <span class="class-title">Discrete Mathematics</span>
                        </div>
                        <div class="class-links">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book-open"></i>
                                <span class="nav-name">Class Information</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-clock"></i>
                                <span class="nav-name">Check Attendance</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-highlighter"></i>
                                <span class="nav-name">Class Documentation</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-paperclip"></i>
                                <span class="nav-name">Homework</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-percentage"></i>
                                <span class="nav-name">Grades</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-class">
                        <div class="class-select">
                            <i class="fas fa-chevron-right"></i>
                            <span class="class-title">Discrete Mathematics</span>
                        </div>
                        <div class="class-links">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book-open"></i>
                                <span class="nav-name">Class Information</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-clock"></i>
                                <span class="nav-name">Check Attendance</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-highlighter"></i>
                                <span class="nav-name">Class Documentation</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-paperclip"></i>
                                <span class="nav-name">Homework</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-percentage"></i>
                                <span class="nav-name">Grades</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

{{content}}