<?php include ('config.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ( "inc_metadata.php"); ?>
</head>

<body>
  <?php include ( "inc_header.php"); ?>


  <style>
    span{font-size: 15px;
           color:white;
    }
.bg, h3{
    color:white;
}
  </style>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(style/img/flavor1.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Nolum music app</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Best music app <span>Forever</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(style/img/Flavour2.png);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Get your best music</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Your satisfaction <span>Is our priority</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class='latest-albums-area section-padding-100'>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                    <div class='section-heading style-2'>
                        <p>See what’s new</p>
                        <h2>Latest Albums</h2>
                    </div>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-12 col-lg-9'>
                    <div class='ablums-text text-center mb-70'>
                        <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                    </div>
                </div>
            </div>

    <?php 
        
      
        $result= "SELECT * FROM `uploads` WHERE `uploads`.`status` = 'approved' ORDER BY sn ASC";
        $query=mysqli_query($conn, $result);
       
        if($query){
            while($row= mysqli_fetch_assoc($query)){
            $upload_id = $row['upload_id'];
            $title= $row['title'];
            $artist= $row['artist'];
            $audio_file= $row['upath'];
            $image= $row['cover'];
            $date= $row['date'];
            $accept= 'status';

            echo "
    
            <div class='row'>
                <div class='col-12'>
                    <div class='albums-slideshow owl-carousel'>
                        <!-- Single Album -->
                        <div class='single-album'>
                        <img src='uploads/cover/$image' alt=''>
                            <div class='album-info'>
                                <a href=''>
                                    <h5><span>$artist<span/></h5>
                                </a>
                                <p>$title</p>
                                <audio preload='auto' controls>
                             <source src='uploads/audio/$audio_file' type='audio/mp3'>
                            </audio>
                            </div>
                        </div>  
                    </div>
                        </div>  
                    </div>
                        "; echo "<br><br>";} };?>
</div>
                    </section>




                    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(style/img/bg-4.jpg);">
        <div class='container'>
            <div class='row align-items-end'>
                <div class='col-12 col-md-5 col-lg-4'>
                    <div class='featured-artist-thumb'>
                   <?php echo" <img src='uploads/cover/$image' alt=''>"; ?>
                    </div>
                </div>
                <div class='col-12 col-md-7 col-lg-8'>
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                        </div>
                        <p>Your hit track of the week.</p>
                        <div class="song-play-area">
                            <div class="song-name">
                            <?php echo"   <p>01. Main Hit Song by <h5><span>$artist<span/></h5> </p>"; ?>
                            </div>
                            <?php echo" <audio preload='auto' controls>
                             <source src='uploads/audio/$audio_file' type='audio/mp3'>
                            </audio>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    
    
<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(style/img/bg-4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include ('inc_footer.php'); ?>
</body>

</html>


