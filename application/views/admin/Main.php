<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-10 col-lg-offset-2">
        <h1 class="page-header">Main Form</h1>
        <div class="col-lg-2 col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa fa-bookmark fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Booking</div>
                            <div class="huge"><?php echo $booking;?></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left">booking Today</span>
                        <span class="pull-right"><?php echo $booking;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

       <div class="col-lg-2 col-md-5">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list-alt fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Check-In</div>
                            <div class="huge"><?php echo $check_in;?></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left">Total Check-In</span>
                        <span class="pull-right"><?php echo $check_in?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-5">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-outdent fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Check-Out</div>
                            <div class="huge"><?php echo $check_out;?></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left">Check-Out today</span>
                        <span class="pull-right"><?php echo $check_out;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php  $dollar=0; $riels=0;
            if(isset($grand_total))
            {   
                foreach ($grand_total as $value) {
                    if($value->cash_currency=='d'){
                      $dollar+=$value->grand_total;
                    }elseif ($value->cash_currency=='r') {
                       $riels+=$value->grand_total;
                    }
                }
            }
        ?>

        <div class="col-lg-2 col-md-5">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa-3x">$</i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Grand Total</div>
                            <div><h3>$<?php echo $dollar;?></h3></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left">Dollar Total</span>
                        <span class="pull-right">$<?php echo $dollar;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa-3x">៛</i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Grand Total</div>
                            <div><h3><?php echo $riels?>៛</h3></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left">Riels Totals</span>
                        <span class="pull-right"><?php echo $riels?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-home fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Room</div>
                            <div class="huge"><?php  echo $all_room;?></div>                            
                        </div>
                    </div>
                </div>
                <a>
                    <div class="panel-footer">
                        <span class="pull-left">Room Total</span>
                        <span class="pull-right"><?php  echo $all_room;?></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <span class="badge">just now</span>
                            <i class="fa fa-fw fa-calendar"></i> Calendar updated
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">4 minutes ago</span>
                            <i class="fa fa-fw fa-comment"></i> Commented on a post
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">23 minutes ago</span>
                            <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">46 minutes ago</span>
                            <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">1 hour ago</span>
                            <i class="fa fa-fw fa-user"></i> A new user has been added
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">2 hours ago</span>
                            <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">yesterday</span>
                            <i class="fa fa-fw fa-globe"></i> Saved the world
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">two days ago</span>
                            <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
                        </a>
                    </div>
                    <div class="text-right">
                        <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Order Date</th>
                                    <th>Order Time</th>
                                    <th>Amount (USD)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3326</td>
                                    <td>10/21/2013</td>
                                    <td>3:29 PM</td>
                                    <td>$321.33</td>
                                </tr>
                                <tr>
                                    <td>3325</td>
                                    <td>10/21/2013</td>
                                    <td>3:20 PM</td>
                                    <td>$234.34</td>
                                </tr>
                                <tr>
                                    <td>3324</td>
                                    <td>10/21/2013</td>
                                    <td>3:03 PM</td>
                                    <td>$724.17</td>
                                </tr>
                                <tr>
                                    <td>3323</td>
                                    <td>10/21/2013</td>
                                    <td>3:00 PM</td>
                                    <td>$23.71</td>
                                </tr>
                                <tr>
                                    <td>3322</td>
                                    <td>10/21/2013</td>
                                    <td>2:49 PM</td>
                                    <td>$8345.23</td>
                                </tr>
                                <tr>
                                    <td>3321</td>
                                    <td>10/21/2013</td>
                                    <td>2:23 PM</td>
                                    <td>$245.12</td>
                                </tr>
                                <tr>
                                    <td>3320</td>
                                    <td>10/21/2013</td>
                                    <td>2:15 PM</td>
                                    <td>$5663.54</td>
                                </tr>
                                <tr>
                                    <td>3319</td>
                                    <td>10/21/2013</td>
                                    <td>2:13 PM</td>
                                    <td>$943.45</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="col-xs-12 text-right">
                                    <div>Room Status</div>
                                    <div class="pull-left" style="margin-top:20px">
                                        <div class="row">
                                            <div class="col-xs-6">Booking</div>
                                            <div class="col-xs-6">: <?php echo $room_book; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">Busy</div>
                                            <div class="col-xs-6">: <?php echo $busy; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">Free</div>
                                            <div class="col-xs-6">: <?php echo $free; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">Prepea</div>
                                            <div class="col-xs-6">: <?php echo $prepare; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">Repea</div>
                                            <div class="col-xs-6">: <?php echo $repair; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                               
                                </div>
                            </div><p></p>
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php //include("count_visitor.php") ?>
                                </div>                            
                            </div>
                        </div>                      
                    </div>
                    

                </div>
            </div>
        </div>
        
    </div>
</div>

