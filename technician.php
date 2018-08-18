<?php
    session_start();

    require'class.php';
    $obj = new Dataphp();
    $link = $obj->re_login();

    if(!empty($_SESSION['member'])&&$_SESSION['member'] == true){
        $sql2 = 'SELECT `Fname`, `Lname` FROM `memberinformation` WHERE `Member_ID` = '.$_SESSION['id_show'];
        $data_member = mysqli_fetch_assoc(mysqli_query($link,$sql2));
    }
    $obj->workerinformation($_GET['id']);
    $data_worker = mysqli_fetch_assoc($obj->workerinformation);

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bethany Bootstrap Theme</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/star.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Bethany
    Theme URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body>
  <!--header-->
  <header class="main-header" id="header">
    <div class="bg-color">
      <!--nav-->
      <nav class="nav navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false"
                aria-controls="navbar">
                <span class="fa fa-bars"></span>
              </button>
              <a href="index.html" class="navbar-brand">FIXED</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="mynavbar">
              <ul class="nav navbar-nav">
                <li class="active">
                  <a href="index.html">หน้าหลัก</a>
                </li>
                <li>
                  <a href="search.php?type=1&page=1">ค้นหาช่าง</a>
                </li>
                <li>
                  <a href="#contact">ยินดีต้อนรับ 
                    <?php 
                      if(!empty($_SESSION['member'])&&$_SESSION['member'] == true)
                      {
                        echo 'คุณ '.$data_member['Fname'].' '.$data_member['Lname']; 
                      }
                    ?> 
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!--/ nav-->
      <div class="container text-center">
        <div class="wrapper wow fadeInUp delay-05s">
          <h2 class="top-title">เว็บไซต์สำหรับหาช่างทั่วประเทศไทย</h2>
          <h3 class="title">FIXED</h3>
          <h4 class="sub-title">เว็บหาช่างที่ดีที่สุดสำหรับคุณ</h4>
          <!--/<button type="submit" class="btn btn-submit">Download Now</button> -->
        </div>
      </div>
    </div>
  </header>
  <!--/ header-->
  <!---->
  <section id="cta-1">
    <div class="container">
      <div class="row">
        <div class="cta-info text-center">
          <div class="col-md-6 col-xs-4">
            <h2 class="head-title black">ไม่ใช่หมวดหมู่ที่คุณต้องการ ?
              <br>กลับสู่หน้าแรกสิ</h2>
            <a href="index.html" class="btn btn-warning">กลับสู่หน้าแรก</a>
            </br>
            <hr class="botm-line-search">
          </div>

          <div class="col-md-6 col-xs-4">
            <h2>
              <p class="sec-para black">ยังไม่ถูกใจ ?
                <br>กลับไปค้นหาอีกครั้งสิ</p>
            </h2>
            <a href="search.php?type=1&page=1" class="btn btn-primary">กลับสู่หน้าค้นหา</a>
          </div>
          <hr class="botm-line-search">
        </div>

      </div>


    </div>
  </section>
  <!---->
  <!---->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 wow fadeInLeft delay-05s">
          <div class="section-title">
            <h2 class="head-title">ชื่อ <?php echo $data_worker['Fname']; ?></h2>
            <hr class="botm-line">
            <p class="sec-para">รูป.........</p>
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md wow fadeInRight delay-02s">
            <div class="">
              <center>
                <img src="img/electric.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="technician.html">งาน : ไฟฟ้า</a>
              </h3>
              <p class="txt-para">ชื่อ :  <?php echo $data_worker['Fname'].' '.$data_worker['Lname']; ?></p>
              <p class="txt-para">คะแนน : <?php $obj->avg_star($_GET['id']); ?>/5</p>
              <p class="txt-para">เริ่มงานกับ FIXED ตั้งแต่วันที่ : .........</p>
              <p class="txt-para">เบอรโทรติดต่อ : <?php echo $data_worker['Phone']; ?></p>
              <p class="txt-para">รายละเอียด : <?php echo $data_worker['Extention']; ?></p>
              <p class="txt-para">ราคา : ..... - ...... บาท</p>

              <?php
                if(!empty($_SESSION['member'])&&$_SESSION['member'] == true)
                      {
                        if ($data_worker['IsConfirm']==NULL||$data_worker['IsConfirm']==0) {
                          echo '<a class="btn btn-success" href="search.php?type=1&page=1">ช่างยังไม่ได้รับการยืนยัน คลิกเพื่อกลับหนา้ค้นหา</a>';
                        }
                        else if ($data_worker['IsConfirm']==1) {
                         echo '<a class="btn btn-success" href="user-form/html/create_request.php?id_member='.$_SESSION['id_show'].'&id_worker='.$_GET['id'].'">จ้างช่างคนนี้</a>'; 
                        }
                      }
              ?>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>

  <section class="section-padding wow fadeInUp delay-02s" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="section-title">
            <h2 class="head-title">รีวิวช่าง</h2>
            <hr class="botm-line">
            <p class="sec-para">คะแนนรีวิวเหล่านี้มาจากคนที่เคยใช้บริการช่างคนนี้จริงๆ</p>
          </div>
        </div>
        <div class="col-md-9 col-sm-12">
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <p class="txt-para">คะแนนเรทติ้ง : 0/5</p>
              <p class="txt-para">คำอธิบาย : ..................</p>
              <p class="txt-para">โดย : ..................</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <p class="txt-para">คะแนนเรทติ้ง : 0/5</p>
              <p class="txt-para">คำอธิบาย : ..................</p>
              <p class="txt-para">โดย : ..................</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <p class="txt-para">คะแนนเรทติ้ง : 0/5</p>
              <p class="txt-para">คำอธิบาย : ..................</p>
              <p class="txt-para">โดย : ..................</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <p class="txt-para">คะแนนเรทติ้ง : 0/5</p>
              <p class="txt-para">คำอธิบาย : ..................</p>
              <p class="txt-para">โดย : ..................</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <p class="txt-para">คะแนนเรทติ้ง : 0/5</p>
              <p class="txt-para">คำอธิบาย : ..................</p>
              <p class="txt-para">โดย : ..................</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <p class="txt-para">คะแนนเรทติ้ง : 0/5</p>
              <p class="txt-para">คำอธิบาย : ..................</p>
              <p class="txt-para">โดย : ..................</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding wow fadeInUp delay-05s" id="contact" <?php 
                if(empty($_SESSION['member'])||$_SESSION['member'] == false)
                      echo 'style="display: none;"';
              ?>>
    <div class="container" style="margin-top: -3%;">
      <div class="row white">
        <div class="col-md-8 col-sm-12">
          <div class="section-title">
            <h2 class="head-title black">เพิ่มรีวิวสำหรับช่างคนนี้</h2>
            <hr class="botm-line">
            <p class="sec-para black">คุณสามารถให้คะแนนกับช่างคนนี้ได้ ถ้าหากคุณเคยจ้างงานช่างคนนี้</p>
          </div>
        </div>
        <div class="col-md-12 col-sm-12">

          <div class="col-md-4 col-sm-6" style="padding-left:0px;">
            <h3 class="cont-title">ให้คะแนน</h3>
            <!--/<div id="sendmessage">Your message has been sent. Thank you!</div>-->
            <div id="errormessage"></div>
            <div class="contact-info">
              <form action="" method="post" role="form" class="contactForm">
                <label>เต็ม 5 คะแนน คุณให้เท่าไร ?</label>
                <div class="form-group">
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <br> <br>
                  <label>รายละเอียด</label>
                  <textarea class="form-control" rows="5" placeholder="เขียนรีวิวสำหรับช่างคนนี้"></textarea>
                  <div class="validation"></div>
                </div>
                <button type="submit" class="btn btn-send" id="login">เพิ่มรีวิวสำหรับช่างคนนี้</button>
              </form>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-icon-container hidden-md hidden-sm hidden-xs">
              <span aria-hidden="true" class="fa fa-envelope-o"></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <footer class="" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 footer-copyright">
          © FIXED - All rights reserved
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bethany
            -->
            Designed by
            <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!---->
  <!--contact ends-->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>


</html>