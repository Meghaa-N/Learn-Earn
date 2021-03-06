<?php
session_start();
if(isset($_SESSION['task_id'])==true)
{
  include "db_connect.php";
  //echo "<script>window.alert($_SESSION[task_id])</script>"
  //$_SESSION['task_id']=1;
?>

<!DOCTYPE html>
<html lang="en">
<style>
.tab
{
  padding-left: 0%;
}
#q_pdf
{
  display: block;
  border: 0.5px solid rgba(30,40,50,0.1);
  padding: 1%;
  padding-left: 3%;
  
  color: black;
  background-color:rgba(34,45,50,0.05) ;
  /*border-radius: 10px;*/
  font-weight: 600;
  /*box-shadow:0px 0 10px rgba(34,45,50,0.3);*/

}

#a_pdf
{
  display: block;
  border: 0.5px solid rgba(50,40,50,0.3);
  padding: 1%;
  padding-left: 3%;
  
  color: black;
  background-color:rgba(34,45,50,0.05) ;
  /*border-radius: 10px;*/
  font-weight: 600;
  /*box-shadow:0px 0 10px rgba(34,45,50,0.3);*/

}
.question_div
{
  margin-top: 10%;
}

#submission_button
{
 -webkit-user-select: none;
}

#submit{
  border: 1px solid #009CEA;
  margin-top: 5%;
  color: white;
  background-color: rgba(0,156,254,1);
  border-radius: 5px;
  padding: 2%;
  width: 25%;

}
}
</style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Scaffold Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold - v4.3.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">Scaffold</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="#about">About Us</a></li>
              <li><a class="nav-link scrollto" href="#team">Team</a></li>
              <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto active" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        
        <h2>Assignment</h2>

      </div>
    </section><!-- End Breadcrumbs -->
<?php $sql="select * from tasks where Task_id=$_SESSION[task_id]";
       $result=mysqli_query($conn,$sql);
       $val = mysqli_fetch_assoc($result);?>
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4" >

          <div class="col-lg-8 " data-aos="zoom-in">
            <div>
          <h1 style="text-align:center;"><?php echo $val['Task_Title'] ?></h1>
          <p style="text-align:center; margin-top: 5%;"><?php echo $val['Description'] ?></p>
          
          <?php if(!is_null($val['Task_PDF']))
            { ?><div class="question_div">

          <p>Reference material</p>
          <a id="q_pdf" href="<?php echo $val['Task_PDF'] ?>" target="_blank"><?php echo $val['Task_PDF'] ?></a>
        </div >
      <?php } ?>

      <?php if(is_null($val['Submission_file']))
      { ?>
          <form style="margin-top: 5%;" method="post" enctype="multipart/form-data" action="upload_handle.php">
            <label style="display:block;">Your Submission</label>
          <input style="margin-top: 2%;display: block;" id="submission_button" type="file" name="answer">
          <p style="text-align:center"><input type="submit" name="is_submit" id="submit"></p>
        </form>
        <?php }
        else
        {?>
          <div class="question_div">

          <p>Your submission</p>
          <a id="a_pdf" href="assignments/<?php echo $val['Submission_file'] ?>" target="_blank"><?php echo $val['Submission_Name'] ?></a>
        </div >
      <?php } ?>


        </div>
          </div>

          <div class="col-lg-4" data-aos="fade-left">
            <div class="portfolio-info">
              <h3>DETAILS</h3>
              
                <table>
                  <tr>
                  <th ><strong>Due</strong>:</th>
                  <td class="tab" ><?php echo $val['Due_Timestamp'] ?></td>
                </tr>
                <tr>
                 <?php if(!is_null($val['Submission_date_timestamp'])){?>
                  <td ><strong>Submitted on</strong>:</td><td class="tab"> <?php echo $val['Submission_date_timestamp'] ?></td>
                  <?php } ?>
                </tr>
                <tr>

                <?php if($val['Marks_possible']==0){?>
                  <td ><strong>Marks possible</strong>:</td><td class="tab">No Points</td>
                  <?php }

                  else { ?>  
                <td ><strong>Marks possible</strong>:</td><td class="tab"> <?php echo $val['Marks_possible'] ?></td>
              <?php } ?>
            </tr>
            <tr>
               <?php if(!is_null($val['Marks'])){?>
                  <td ><strong>Marks obtained</strong>: </td><td class="tab"><?php echo $val['Marks'] ?></td>
                  <?php } ?>



                </table>


               
               
               
              
             
          
            </div>
            <div class="portfolio-description">
              <h2>Comments from your teacher</h2>
              <p><?php if(!is_null($val['Comment']))
              {
                echo $val['Comment'];
              }
              else
              {
                echo "No Comments yet!";
              }
              ?>
              </p>
              
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Scaffold</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Scaffold</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
  }
  else
  {
    echo "<script>window.alert('Invalid access')</script>";
    echo "<script>window.location.href='index.php'</script>";
  }
?>