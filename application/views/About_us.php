  <!-- <header> -->
    <!-- breadcrumbs -->
    <!-- /breadcrumbs -->
    <!-- room details-->
    <section class="room-detail">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 marg50"><h2 class="h2" style="color:#f0ad4e">WELCOME TO MIN HOTEL</h2></div>
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="owl-carousel owl_gallery">
                <div class="item"><img class="img-responsive" src="<?php echo base_url("assets/uploads/".$about_info->photo);?>"></div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <h3>About Us</h3>
            <div class="room-detail_overview">
              <?php if(isset($about_info->descr)){echo $about_info->descr;} ?>
            </div>
            <h3>History</h3>
            <div class="room-detail_overview">
              <?php if(isset($about_info->history)){echo $about_info->history;} ?>
            </div>
            <h3>Our Svervice</h3>
            <div class="room-detail_overview">
              <?php if(isset($about_info->services)){echo $about_info->services;} ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /room details -->
    <!-- chose best rooms -->
    <!-- /choose best rooms -->
  <!-- footer -->
  