<section class="bg-parallax parallax-window">
        <div class="overlay">
          <img class="img img-responsice" src="<?php echo base_url()?>assets/uploads/<?php if(isset($banner_info->img)){echo $banner_info->img;} ?>">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="parallax-text">
                <h2 class="parallax_t __white"><?php if(isset($banner_info->title)){ echo $banner_info->title;}?></h2>
                <!-- <h2 class="parallax_t __green">available from 10.12.2016</h2> -->
                <p><?php if(isset($banner_info->descr)){ echo $banner_info->descr;}?></p>
              </div>
            </div>
            <!-- planner-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 planner">
              <div class="planner-block">
                <form class="form-planner form-horizontal">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Check in</label>
                        <input class="form-control __plannerInput" id="datetimepicker1" type="text" placeholder="10-05-2015"/>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Check out</label>
                        <input class="form-control __plannerInput" id="datetimepicker2" type="text" placeholder="17-05-2015"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                          <label>Room type</label>
                          <div class="theme-select">
                            <select class="form-control __plannerSelect">
                              <option value="">Select a room</option>
                            </select>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                      <div class="form-group">
                          <label>Adults</label>
                          <div class="theme-select">
                            <select class="form-control __plannerSelect">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                              <option value="">5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                      <div class="form-group">
                          <label>Kids</label>
                          <div class="theme-select">
                            <select class="form-control __plannerSelect">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                              <option value="">5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Enter your email</label>
                          <input type="email" class="form-control" placeholder="E-mail"/>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                          <label>Price range</label>
                          <div id="slider-range"></div>
                          <div id="amount"><span id="amount1"></span><span id="amount2"></span></div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="planner-check-availability">
                        <a href="wizzard-step1.html" class="btn btn-default">Check availability</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /planner-->
          </div>
        </div>
    </section>