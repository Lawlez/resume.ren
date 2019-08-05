<!-- get constants & error reporting-->
<?php
require 'constants.php';
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<!-- Log collect-->
<?php
write_log("visit");
define("DEFAULT_LOG","logs/weblog.lwlx");
 
function write_log($message, $logfile = 'logs/weblog.lwlx') {
  if($logfile == '') {
    if (defined(DEFAULT_LOG) == TRUE) {
        $logfile = DEFAULT_LOG;
    }
    else {
        error_log('No log file defined!',0);
        return array(status => false, message => 'No log file defined!');
    }
  }

if(isset($_COOKIE['countVisit'])){
$countVisit = $_COOKIE['countVisit'];
}
if(isset($_COOKIE['lastVisit'])){
$lastVisit = $_COOKIE['lastVisit'];

}
  if(isset($_COOKIE['cpuser'])){
$cpuser = $_COOKIE['cpuser'];

}
  setcookie('cpuser', date("d-m-Y"),USER_COOKIE ,PASS_COOKIE, time()+72000);//set usr cookie
// set cookie for countVisit
setcookie('countVisit', $countVisit++,  time()+360000);
// set cookie for last visit
setcookie('lastVisit', date("d-m-Y H:i:s"),  time()+360000);


  if( ($time = $_SERVER['REQUEST_TIME']) == '') {
    $time = time();
  }
 
  if( ($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
    $remote_addr = "REMOTE_ADDR_UNKNOWN";
  }
 
  if( ($request_uri = $_SERVER['REQUEST_URI']) == '') {
    $request_uri = "REQUEST_URI_UNKNOWN";
  }
  $date = date("Y-m-d H:i:s", $time);
  if($fd = @fopen($logfile, "a")) {
    $result = fwrite($fd,"Date: ".$date."| IP: ".$remote_addr."| usr/loggedin: ".USER_COOKIE."/".LOGGED_IN_COOKIE."| Req-Script: ".$request_uri."| Msg: ".$message." | Last Visit:".$lastVisit." | Visit Count: [".$countVisit."]\n");
    fclose($fd);

}
}
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>skills.rendered.ch</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Dominik W. Feger</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">Education</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#awards">Certificates</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0">Dominik
          <span class="text-primary">Feger</span>
        </h1>
        <div class="subheading mb-5">Zurich, Switzerland · Appliation Engineer · 3D & Graphicdesigner · Security Engineer
          <a href="mailto:name@email.com">dominik@lawlez.ch</a>
        </div>
        <p class="lead mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#">
            <i class="fab fa-github"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </section>


    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
      <div class="w-100">
        <h2 class="mb-5">Skills</h2>

        <div class="subheading mb-3">Programming Languages &amp; Tools</div>
        <div class="p"></div>

       <canvas id="skillchart" width="400" height="400"></canvas>

        <ul class="list-inline dev-icons">
          <li class="list-inline-item">
            <i class="fab fa-html5"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-css3-alt"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-js-square"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-angular"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-php"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-node-js"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-sass"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-less"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-wordpress"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-gulp"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-grunt"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-npm"></i>
          </li>
        </ul>

        <div class="subheading mb-3">Workflow</div>
        <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-check"></i>
            Mobile-First, Responsive Design</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Cross Browser Testing &amp; Debugging</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Cross Functional Teams</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Agile Development &amp; Scrum</li>
        </ul>
      </div>
    </section>
    <hr class="m-0">
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Experience</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">IT Engineer & Studio Operator</h3>
            <div class="subheading mb-3">Contentpark Operations AG</div>
            <p>WE NEED TO REPLACE THIS TEXT RIGHT HERE WITH REAL INFO AND STUFF OK?</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">Jan 2018 - August 2019</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Broadcast Supporter & Graphics Operator</h3>
            <div class="subheading mb-3">CNN Money Switzerland</div>
            <p>WE NEED TO REPLACE THIS TEXT RIGHT HERE WITH REAL INFO AND STUFF OK?</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">Jan 2018 - July 2019</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Web Designer, 3D Generalist & Photographer</h3>
            <div class="subheading mb-3">lwlx. Web & 3D Design</div>
            <p>Creating and designing websites for small business owners and individuals, ranging from portfolios over galleries to fully fledged online Shops. 
            Creating 3D Animations and images for clients.
            Offering Photoshoots of still life and weddings.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">August 2016 - Today</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Junior Web Designer</h3>
            <div class="subheading mb-3">Pixelplus AG</div>
            <p>Creating Bootstrap Web experiences from Design Templates, Working with clients, realizing their wishes and changes. Working with HTML, CSS, JS & some PHP.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">March 2016 - July 2016</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
          <div class="resume-content">
            <h3 class="mb-0">Web Design Intern</h3>
            <div class="subheading mb-3">Automotive industry Onlineshop</div>
            <p>Managing 2 Onlineshops with 15k+ daily users. Newsletter, SEO & Managing social media. Planned and created Multilingual Webshops in magento.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">August 2014 - February 2016</span>
          </div>
        </div>

      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
      <div class="w-100">
        <h2 class="mb-5">Education</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">pluralsight.com</h3>
            <div class="subheading mb-3">Ethical Hacker Beginner</div>
            <div>CEH Preparation - notably Vulnerability scanning, security fundamentals, Social Engineering & forensics </div>
            <p>Rank: Proficent 
               Score: 179</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"> May 2018 - August 2018</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
          <div class="resume-content">
            <h3 class="mb-0">Benedict Schule Zürich</h3>
            <div class="subheading mb-3">Informatiker Applikationsentwickler EFZ</div>
            <p>GPA: 4.4</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"> 2012 - July 2016</span>
          </div>
        </div>

      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <div class="w-100">
        <h2 class="mb-5">Interests</h2>
        <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
        <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="awards">
      <div class="w-100">
        <h2 class="mb-5">Awards &amp; Certifications</h2>
        <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            ICDL Expert Certificate</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            CEH Beginners Course</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Cinema 4D Xpresso Basic</li>
            
        </ul>
      </div>
    </section>

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Plugin charts.js -->
  <script src="js/Chart.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

  <!-- skills chart script-->
<script>
var ctx = document.getElementById('skillchart');
var chart    = document.getElementById('skillchart').getContext('2d');
var gradient = chart.createRadialGradient(550, 550, 10, 550,550,500);

gradient.addColorStop(0, 'rgba(171,78,160,.8)');
gradient.addColorStop(0.5, 'rgba(59,58,228,.8)');
gradient.addColorStop(1, 'rgba(128,96,133,.3)');

var myChart = new Chart(ctx, {
    type: 'radar',
    options: {
    scale: {
        // Hides the scale
        display: true
    }
    layout: {
            padding: {
                left: 100,
                right: 100,
                top: 0,
                bottom: 0
            }
        }
},

    data: {
        labels: ['Json', 'PHP', 'JS', 'jQuery', 'HTML', 'CSS', 'mySQL', 'Solidity', 'Databases', 'CMS', 'Bootstrap', 'Magento', 'Django', 'Kali Linux', 'Apache', 'Git', 'SEO', 'Social Engineering', 'Penetration Testing', 'XSS', 'SMM', 'SEM', 'Debugging', 'Digital Design' ],
        datasets: [{
            label: '% Proficiency',
            data: [90, 86, 30, 50, 60, 30,70,40,80,80,86,90,50,80,68,98,78,69,89,84,85,78,54,1],
            pointbackgroundColor: [
                'rgba(255, 99, 132, 0.9)'
                
            ],
            pointborderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 59, 80, .8)',
                
            ],
            backgroundColor: gradient,
            borderWidth: 3
        }]
    }
});
</script>
</body>

</html>
