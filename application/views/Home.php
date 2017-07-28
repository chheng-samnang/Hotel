      <!-- herder and top -->
    <!-- /header -->
    <!-- parallax -->
      <!-- slide -->
    <!-- /parallax -->
    <!-- chose best rooms -->
    <section class="best-room">
      <div class="container">
        <div class="title-main">
          <h2 class="h2">Best Offer For Weekend<span class="title-secondary">Look Our Featured Rooms</span></h2>
        </div>
        <div class="best-room-carousel">
          <ul class="row best-room_ul">
            <?php
              if(isset($room_info)){
                foreach ($room_info as $value) {
            ?>
            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12 best-room_li">
              <div class="best-room_img">
                <a href="<a href="<?php echo base_url();?>Home/room_detail/<?php echo $value->room_id; ?>"><img src="<?php echo base_url();?>assets/uploads/<?php echo $value->photo;?>" alt=""/></a>
                <div class="best-room_overlay">
                  <div class="overlay_icn"><a href="<?php echo base_url();?>Home/room_detail/<?php echo $value->room_id; ?>"></a></div>
                </div>
              </div>
              <div class="best-room-info">
                <div class="best-room_t"><a href="<?php echo base_url();?>Home/room_detail/<?php echo $value->room_id; ?>"><?php echo $value->room_type_name; ?></a></div>
                <div class="best-room_desc"><?php $value->remark; ?>
                </div>
                <div class="best-room_price">
                  <span>$<?php echo $value->price;?></span> /One days
                </div>
              </div>
           </li>
            <?php
             }
              }
            ?>
          </ul>
        </div>
      </div>
    </section>

    <!-- /choose best rooms -->
    <!-- lux banner parallax -->
    <!-- /lux banner parallax -->
    <!-- enjoy our services -->
    <!-- /enjoy our services -->
    <!-- testiomonials -->
    <section class="testimonials">
      <div class="container">
        <div class="title-main"><h2 class="h2">Some Testimonails<span class="title-secondary">People Says About Us</span></h2></div>
        <div class="owl-carousel">
          <div class="item">
            <div class="testimonials-block_i">
              <div class="testimonials-block_t">Great <span>Service</span></div>
              <p>Old unsatiable our now but considered travelling impression. In excuse hardly summer in basket misery. By rent an part need. At wrong of of water those linen. Needed oppose seemed how all</p>
            </div>
            <div class="testimonials-block_user">
                <div class="user_img"><img src="<?php echo base_url();?>assets/uploads/mike.jpg" alt=""/></div>
                <div class="user_n">Garry Carlson</div>
            </div>
          </div>
          <div class="item">
            <div class="testimonials-block_i">
              <div class="testimonials-block_t">Thank You Very Much <span>I Am Happy!</span></div>
              <p>Certainty listening no no behaviour existence assurance situation is. Because add why not esteems amiable him. Interested the unaffected mrs law friendship add principles.</p>
            </div>
            <div class="testimonials-block_user">
                <div class="user_img"><img src="<?php echo base_url();?>assets/uploads/mila.png" alt=""/></div>
                <div class="user_n">Mila Markovna</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /testiomonials -->
    <!-- map -->
    <!-- /map -->
  <!-- /main wrapper -->
  <!-- footer -->
  <!-- /footer -->
  <!-- /Scripts -->
