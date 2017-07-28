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
                <div class="item"><p><?php if(isset($contant_info->map)){echo $contant_info->map;} ?></p></div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <h3>Contact Us</h3><hr>
            <table class="simple">
                <tr>
                  <td><strong><i class="fa fa-phone-square"></i> Phone</strong></td>
                  <td><span>: <?php if(isset($contant_info->phone1)){echo $contant_info->phone1." / ".$contant_info->phone2." / ".$contant_info->phone3;} ?></span></td>
                </tr>
                <tr>
                  <td><strong><i class="fa fa-envelope"></i> Email</strong></td>
                  <td><?php if(isset($contant_info->email)){echo $contant_info->email;} ?></td>
                </tr>
                <tr>
                  <td><strong><i class="fa fa-map-marker"></i> Address</strong></td>
                  <td><?php if(isset($contant_info->addr)){echo $contant_info->addr; } ?></td>
                </tr>
                <tr>
                  <td><strong><i class="fa fa-facebook-square"></i> Facebook</strong></td>
                  <td><?php if(isset($contant_info->fb_messager)){echo $contant_info->fb_messager;}?></td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /room details -->
    <!-- chose best rooms -->
    <!-- /choose best rooms -->
  <!-- footer -->
  