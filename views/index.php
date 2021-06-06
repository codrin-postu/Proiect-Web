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

  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?=ASSETS?>styles/index.css">

  <title><?= $data['page_title']?></title>
</head>

<body>

  <!--Navbar-->
  <header>
    <nav>
      <div class="logo">
        <a href="#top">
          <img src="<?=ASSETS?>images/svg/304315.svg" alt="Ripe Mango" />
          <p>ClassMan</p>
        </a>
      </div>
      <button class="hamburger" id="hamburger">
        <i class="fas fa-fw fa-bars"></i>
      </button>
      <ul class="nav-bar" id="nav-bar">
        <li><a href="#how-it-works">How It Works</a></li>
        <li><a href="#about-us">About Us</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="login" class="login">Login</a></li>
      </ul>
    </nav>
  </header>

  <!-- Top Section    -->
  <section id="top">
    <div class="top container">
      <div>
        <h1>ClassMan</h1>
        <p>The easiest way to keep track of your classes.</p>
        <p>Create a...</p>
        <div class="buttons">
          <a href="registerstudent" class="cta">Student Account</a>
          <a href="registeracademic" class="cta">Academic Account</a>
        </div>
      </div>
      <div>
        <img src="<?=ASSETS?>images/svg/index-topsection.svg" alt="Student on a book." />
      </div>
    </div>
  </section>

  <!-- How It Works Section  -->
  <section id="how-it-works">
    <div class="info container">
      <div>
        <h2>How it Works</h2>
        <p>After you Sign Up, you add the <span>Unique Code</span> given to you by your Professor or the Administrator.
        </p>
        <p>Once you join the class, you can use it to track your grades, send Homework and check-in for attendance.</p>
      </div>
      <div>
        <img src="<?=ASSETS?>images/svg/how-it-works_img.svg" alt="Student setting goals." />
      </div>
    </div>
  </section>

  <!-- About Us Section  -->
  <section id="about-us">
    <div class="about container">
      <div class="about-top">
        <div>
          <h2>About Us</h2>
        </div>
        <div>
          <p>We are a team of students dedicated to providing the best experience for the users of our application</p>
        </div>
      </div>

      <div class="about-bottom">
        <div class="about-dev">
          <div class="icon"><img src="<?=ASSETS?>/images/png/vlad-img.png" alt="Picture of team member Vlad"></div>
          <div class="text">
            <h3>Vlad</h3>
            <p>Student, interested in Unity, Web Development, producing music and speedrunning games.</p>
          </div>
        </div>
        <div class="about-dev">
          <div class="icon"><img src="<?=ASSETS?>/images/png/victor-img.png" alt="Picture of team member Victor"></div>
          <div class="text">
            <h3>Victor</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit expedita</p>
          </div>
        </div>
        <div class="about-dev">
          <div class="icon"><img src="<?=ASSETS?>/images/png/codrin-img.png" alt="Picture of team member Codrin"></div>
          <div class="text">
            <h3>Codrin</h3>
            <p>Currently a student, with a passion for Web Development and Java</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer (Contact Section) -->
  <footer id="contact">
    <div class="contact">
      <div class="contact-form">
        <h2>Ask us any questions.</h2>
        <form action="/nothing.js" target="_self">
          <p>
            <input class="input" type="text" placeholder="Name" name="Name" required />
          </p>
          <p>
            <input class="input" type="email" placeholder="Email" name="Email" required />
          </p>
          <p>
            <input class="input" type="text" placeholder="Subject" name="Subject" required />
          </p>
          <p>
            <input class="input" type="text" placeholder="Message" name="Message" required />
          </p>
          <button type="submit">Send</button>
        </form>
      </div>
      <div class="contact-info">
        <h2>Contact Us</h2>
        <hr>
        <p><i class="fas fa-fw fa-map-marker"></i> Romania, Iasi, Non-existent Street, 4, 700592</p>
        <p><i class="fas fa-fw fa-phone"></i> (+40) 7123 4567</p>
        <p>
          <i class="fas fa-fw fa-envelope-open"></i> questions@classman.com
        </p>
      </div>

    </div>
    <div class="bottom-bar">
      </a><p>classMan 2021. Class project.</p> <a style="color: #fff" href="./scholarly.html">Scholarly</a> <!-- TODO: Not currently linked! To finish  -->
    </div>
  </footer>
  <script src="<?=ASSETS?>/scripts/index.js"></script>
</body>

</html>