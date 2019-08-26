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
else{
  $countVisit = 0;
}
if(isset($_COOKIE['lastVisit'])){
$lastVisit = $_COOKIE['lastVisit'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
}
  setcookie('user', date("d-m-Y"),USER_COOKIE ,PASS_COOKIE, time()+72000);//set usr cookie
// set cookie for countVisit
setcookie('countVisit', ++$countVisit,  time()+360000);
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
    $result = fwrite($fd,"Date: ".$date."| IP: ".$remote_addr."| usr/loggedin: ".USER_COOKIE."HTTP UA".$user_agent."| Req-Script: ".$request_uri."| Msg: ".$message." | Last Visit:".$lastVisit." | Visit Count: [".$countVisit."]\n");
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

<!-- includ REACT.js for testing purp-->
<script src="https://unpkg.com/react@16.4.1/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.4.1/umd/react-dom.production.min.js"></script>

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
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#links">Links</a>
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
        <div class="subheading mb-5">Zurich, Switzerland · Application Engineer · 3D & Graphicdesigner · Security Engineer
          <a href="mailto:name@email.com">dominik@lawlez.ch</a>
        </div>
        <p class="lead mb-5">
          

        </p>
        <div class="social-icons">
          <a href="https://linkedin.com/in/dominik-feger/">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="https://github.com/Lawlez">
            <i class="fab fa-github"></i>
          </a>
          <a href="https://www.behance.net/lawlez">
            <i class="fab fa-behance-square"></i>
          </a>
          <a href="https://instagram.com/lawlez_render/">
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
            <i class="fab fa-wordpress"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-php"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-node-js"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-bitcoin"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-ethereum"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-wordpress"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-magento"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-github"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-npm"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-linux"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-adobe"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-bootstrap"></i>
          </li>
        </ul>
<div width="900" height="500">
       <canvas id="skillchart" width="400" height="400"></canvas>
</div>

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
            OO Programming</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Beautiful usable Material Design</li>
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
            <p>Maintaining IT infrastructure, maintaining in house security, updating
Website.
Preparing studios, equipment, lights etc for shoots. TriCaster Operation.
DMX configuration / Light planning. Training / coaching new staff &
trainees. Camera man & Cutter.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">Jan 2018 - August 2019</span>
          </div>
        </div>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0">Broadcast Supporter & Graphics Operator</h3>
            <div class="subheading mb-3">CNN Money Switzerland</div>
            <p>Maintaining Broadcast Hardware, staying calm in stressful ‘Live TV’
environment to fix issues with IT Hard/Software.
Graphics playout, Dalet & TriCaster. Remote Camera & Light operator</p>
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
            <h3 class="mb-0">Application Engineer</h3>
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
            <div class="subheading mb-3">IT Application Engineer EFZ</div>
            <p>GPA: 4.4</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"> 2012 - July 2016</span>
          </div>
        </div>

      </div>
    </section>

    

   

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="awards">
      <div class="w-100">
        <h2 class="mb-5">Awards &amp; Certifications</h2>
        <ul class="fa-ul mb-0">
          <li>
            <a href="/img/ECDL_Dominik Feger_2013.pdf"><i class="fa-li fa fa-trophy text-warning"></i>
            ICDL Expert Certificate</li></a>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            CEH Beginners Course</li>
          <li>
             <a href="/img/xpressoc4d.pdf"><i class="fa-li fa fa-trophy text-warning"></i>
            Basics Of XPresso Cinema 4D</li></a>
            <li>
            <a href="/img/c4dbeginner.pdf"><i class="fa-li fa fa-trophy text-warning"></i>
            Cinema 4D Beginner</li></a>
<li>
            <a href="https://eu.udacity.com/course/android-basics-nanodegree-by-google--nd803"><i class="fa-li fa fa-trophy text-warning"></i>
            Google's Android Beginner Scholarship 2017</li></a>
        </ul>
        <div>
          <h3 class="mb-5">Pluralsight Skill IQs</h3>
          <img width="100%" src="img/skilliq.png">
        </div>
      </div>
    </section>
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <div class="w-100">
        <h2 class="mb-5">Interests</h2>
        <p>Apart from being a web developer, I enjoy doing creative work on my Computer using tools such as Cinema 4D, Octane & Photoshop.</p>
        
        <p class="mb-0">Early on I caught interest in Blockchain technology and Cryptocurrencies, which I have been mining and trading for a while. Through the Blockchain industry I got interested in Cybersecurity, which is why today I often practice my penetration testing skills at home on my own infrastructure or with the help of online quests. </p>
      </div>
    </section>

    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="links">
      <div class="w-100">
        <h2 class="mb-5">Projects</h2>
        <p>Some Websites i have been working on:</p>
        <ul class="fa-ul mb-0">
        <li><i class="fa-li fas fa-globe text-warning"></i>
            <a href="https://autofaszination.ch/">https://autofaszination.ch/</a> - Django CMS</li>
          <li>  <i class="fa-li fa fa-globe text-warning"></i>
            <a href="https://autofaszination.de/">https://autofaszination.de/</a> - Magento</li>
            <li><i class="fa-li fa fa-globe text-warning"></i>
            <a href="https://www.allegria-sargans.ch">https://www.allegria-sargans.ch</a> - Bootstrap</li>
            <li><i class="fa-li fa fa-globe text-warning"></i>
            <a href="https://lawlez.ch/">https://lawlez.ch/</a> - PHP, HTML, CSS</li>

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

gradient.addColorStop(0, 'rgba(65,20,93,.2)');
gradient.addColorStop(0.3, 'rgba(17,119,171,.5)');
gradient.addColorStop(.5, 'rgba(37,119,151,.6)');
gradient.addColorStop(.8, 'rgba(17,119,171,1)');

var myChart = new Chart(ctx, {
    type: 'radar',
    options: {
     
    scale: {
    ticks: {
        beginAtZero: true,
        max: 100,
        min: 0,
        stepSize: 5
    }
},
    layout: {
            padding: {
                left: 50,
                right: 40,
                top: 5,
                bottom: 0
            }
        },
    animation:{
      // Boolean - Whether to animate the chart
  duration: 2800,

  // Number - Number of animation steps
  numSteps: 90,
  easing: "easeInOutCirc"
    }
},

    data: {
        labels: [ 'PHP', 'JS', 'jQuery', 'HTML', 'CSS', 'mySQL', 'Solidity', 'Databases', 'CMS', 'Bootstrap', 'Magento', 'Django', 'Kali Linux','Json', 'Apache', 'Git', 'SEO', 'Social Engineering', 'Penetration Testing', 'XSS', 'SMM', 'SEM', 'Debugging', 'Digital Design', 'Blockchain', 'Teamwork', 'Motivation' ],
        datasets: [{
          data: [65,55,60,85,90,65,40,50,90,86,85,88,75,25,63,80,85,69,70,75,85,70,70,86,80,90,100],

          lineTension: 0.2,
            label: 'Proficiency',
            
            pointbackgroundColor: [
                'rgba(255, 99, 132, 0.5)'
                
            ],
            pointborderColor: [
                'rgba(255, 99, 132, 1)',
                
            ],
            borderColor: [
                'rgba(218,107,224,1)',
                
            ],
            backgroundColor: gradient,
            borderWidth: 3
        }]
    }
});
</script>
</body>

</html>
