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

    <link rel="stylesheet" type="text/css" href="../../styles/dashboard-student.css" />

    <title>ClassMan Student | Check Attendance</title>
</head>

<body class="stop-transition-load" id="body-padding">
    <header class="header" id="header">
        <div class="header-toggle">
            <i class="fas fa-bars" id="header-toggle"></i>
        </div>

        <div class="header-img">
            <img src="../../images/png/codrin-img.png" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar first-navbar" id="navbar">
        <nav class="nav">
            <div>
                <a href="#" class="nav-logo">
                    <img src="../../images/svg/304315.svg" alt="Ripe Mango, ClassMan Logo" />
                    <div class="nav-logo-info">
                        <span class="name">ClassMan</span>
                        <span class="usertype">Student</span>
                    </div>

                </a>
                <div class="nav-list">
                    <!-- Navigation Section -->
                    <span class="nav-section">Navigation</span>
                    <a href="../account.html" class="nav-link">
                        <i class="far fa-user"></i>
                        <span class="nav-name">Your Account</span>
                    </a>
                    <a href="../security.html" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span class="nav-name">Security & Privacy</span>
                    </a>
                    <a href="../join-classroom.html" class="nav-link">
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
                            <a href="./class-information.html" class="nav-link">
                                <i class="fas fa-book-open"></i>
                                <span class="nav-name">Class Information</span>
                            </a>
                            <a href="./check-attendance.html" class="nav-link active">
                                <i class="fas fa-clock"></i>
                                <span class="nav-name">Check Attendance</span>
                            </a>
                            <a href="./class-documentation.html" class="nav-link">
                                <i class="fas fa-highlighter"></i>
                                <span class="nav-name">Class Documentation</span>
                            </a>
                            <a href="./homework-list.html" class="nav-link ">
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

    <!-- Dashboard Content  -->
    <div class="main-content">

        <section class="check-attendance">
            <div class="section-header">
                <h2>Insert code given by your professor/teacher</h2>
            </div>
            <div class="section-content">
                <form action="/nothing.js" target="blank">
                    <label for="">
                        <p>Attendance Code</p>
                        <input type="text" name="ClassCode" placeholder="###-###" required>

                    </label>

                    <button type="submit">Send code</button>
                </form>
            </div>
        </section>

        <section class="attendance-history">
            <div class="section-header">
                <h2>Your Attendance History</h2>
            </div>
            <div class="section-content">
                <div class="class-date">
                    <p>04/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>08/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>12/03</p>
                    <p class="attendance-status">Absent</p>
                </div>
                <div class="class-date">
                    <p>16/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>20/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>24/03</p>
                    <p class="attendance-status">Absent</p>
                </div>
                <div class="class-date">
                    <p>28/03</p>
                    <p class="attendance-status attended">Present</p>
                </div>
                <div class="class-date">
                    <p>04/04</p>
                    <p class="attendance-status">Absent</p>
                </div>
                <div class="class-date">
                    <p>08/04</p>
                    <p class="attendance-status attended">Present</p>
                </div>

            </div>
        </section>

        <section class="attendance-percentage width-half-L width-half-M">
            <div class="section-header">
                <h2>Attendance Percentage</h2>
            </div>
            <div class="section-content">

            </div>
        </section>

        <section class="attendance-information width-half-L width-half-M">
            <div class="section-header">
                <h2>Attendance Information</h2>
            </div>
            <div class="section-content">

            </div>
        </section>
    </div>

    <!-- JS Scripts -->
    <script>document.body.classList.remove('stop-transition-load')</script>
    <script src="../../scripts/dashboard-sidemenu.js"></script>
</body>

</html>