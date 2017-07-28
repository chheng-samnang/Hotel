  <!-- <header> -->
    <!-- breadcrumbs -->
    <section class="breadcrumbs" style="background-image: url(assets/images/breadcrumbs/best-room.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="h1">Room Details</h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb">
              <li><a href="#">Home</a><i class="fa fa-angle-right"></i></li>
              <li><a href="#">Rooms</a><i class="fa fa-angle-right"></i></li>
              <li class="active">Room Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- /breadcrumbs -->
    <!-- room details-->
    <section class="room-detail">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row reservation-top">
              <div class="module __reservation">
                <div class="module-block">
                  <form class="form-planner form-horizontal">
                      <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label>Check in</label>
                            <input class="form-control __plannerInput" id="datetimepicker1" type="text" placeholder="10-05-2015"/>
                        </div>
                      </div>
                      <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label>Check out</label>
                            <input class="form-control __plannerInput" id="datetimepicker2" type="text" placeholder="17-05-2015"/>
                        </div>
                      </div>
                      <div class="col-md-2 col-xs-6">
                        <div class="form-group">
                            <label>Adults</label>
                            <div class="theme-select">
                              <select class="form-control __plannerSelect">
                                <option value="">1</option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-xs-6">
                        <div class="form-group">
                            <label>Kids</label>
                            <div class="theme-select">
                              <select class="form-control __plannerSelect">
                                <option value="">1</option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-xs-12">
                        <div class="form-group">
                            <a href="wizzard-step2.html" class="btn btn-default wizzard-search-btn">Search</a>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 marg50"><h2 class="h2">Superior Room - Two Bed</h2></div>
          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="owl-carousel owl_gallery">
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/<?php if(isset($room_detail->photo)){echo $room_detail->photo;} ?>"></div>
               <!--  <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/2.jpg"></div>
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/1.jpg"></div>
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/4.jpg"></div>
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/5.jpg"></div>
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/6.jpg"></div>
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/7.jpg"></div>
                <div class="item"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/8.jpg"></div> -->
              </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="room-detail_overview">
              <table class="simple">
                <tr>
                  <td><strong>Price:</strong></td>
                  <td><span>$ <?php if(isset($room_detail->price)){echo $room_detail->price;} ?></span> / a night</td>
                </tr>
                <tr>
                  <td><strong>Room size:</strong></td>
                  <td>150 sqm</td>
                </tr>
                <tr>
                  <td><strong>Bed:</strong></td>
                  <td>2 King Beds</td>
                </tr>
                <tr>
                  <td><strong>Max people:</strong></td>
                  <td><?php if(isset($room_detail->maximum_people)){echo $room_detail->maximum_people;} ?> people</td>
                </tr>
                <tr>
                  <td><strong>Wi-Fi:</strong></td>
                  <td>Avaible</td>
                </tr>
                <tr>
                  <td><strong>Room Service:</strong></td>
                  <td>Avaible</td>
                </tr>
                <tr>
                  <td><strong>Breakfast:</strong></td>
                  <td>Included</td>
                </tr>
                <tr>
                  <td><strong>Laundry:</strong></td>
                  <td>Avaible</td>
                </tr>
                <tr>
                  <td><strong>Taxi to Airport:</strong></td>
                  <td>Yes</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /room details -->
    <!-- chose best rooms -->
    <section class="best-room">
      <div class="container">
        <h2 class="h2">Recent rooms</h2>
        <div class="best-room-carousel">
          <ul class="row best-room_ul">
            <?php
              if(isset($similer_room))
              {
                foreach ($similer_room as $value) {
             ?>
            <li class="col-md-4 col-sm-6 col-xs-12 best-room_li">
              <div class="best-room_img">
                <a href="<?php echo base_url("Home/room_detail/$value->room_id");?>"><img src="<?php echo base_url("assets/uploads/$value->photo");?>" alt=""/></a>
                <div class="best-room_overlay">
                  <div class="overlay_icn"><a href="<?php echo base_url("Home/room_detail/$value->room_id");?>"></a></div>
                </div>
              </div>
              <div class="best-room-info">
                <div class="best-room_t"><a href="<?php echo base_url("Home/room_detail/$value->room_id");?>"></a></div>
                <div class="best-room_desc">
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui
                  blanditiis praesentium voluptatum deleniti atque corrupti quos
                  dolores et quas molestias excepturi
                </div>
                <div class="best-room_price">
                  Night<span>$ 370</span>
                </div>
              </div>
            </li>
            <?php }} ?>
          </ul>
        </div>
      </div>
    </section>
    <!-- /choose best rooms -->
  <!-- footer -->
  