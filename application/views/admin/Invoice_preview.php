
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Previw</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/js/angular.min.js"); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <style type="text/css">
    .text{text-indent: 30px;}
    .text_style{
      text-indent: 10px;
    }
    .tl th td {
      border: 1px solid black;
      border-collapse: collapse;
        }
        .tr {
            border: 1px solid black;
            border-collapse: collapse;}
        .th {
            border: 1px solid black;
            border-collapse: collapse;
         td {
            padding: 5px;
            text-align: left;
        }
  </style>
  <script type="text/javascript">
    function printContent(el)
    {      
      var restorepage = document.body.innerHTML;
      var restorepage = document.body.getElementByid(el).innerHTML;
      document.body.innerHTML=printcontent
      window.print();
      document.body.innerHTML=restorepage;
    }
  </script>
</head>
<!DOCTYPE html>
<html>
<head>
</script>
</head> 
</html>
    <body style="background-color:#ddd;" style="width:auto;">
      <div class="row">
        <div class="container">
          <div style=" width:1240px;">
            <a class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" href="" style="margin:10px 104px 10px 0px">Print</a>      
          </div>
           <div class="container">
        <div id="div1" style="padding:10; margin:auto; padding:0px"">
          <div style="width:1240px;">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="row">
                      <table>
                        <tr>
                          <td>
                             <img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin:-77px 0px 0px 97px;border: 1px solid;">
                          </td>
                          <td>
                            <img width="100px" src="<?php if(isset($acc_info->acc_photo)){echo base_url('assets/uploads/').'/'.$acc_info->acc_photo;}?>" style="margin:6px 0px 23px 435px;;border: 1px solid;"> 
                            <div style="margin-left:775px;">
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-2">
                            <div>Phone</div>
                          </div>
                          <div class="col-sm-6">
                            <div>0127777344</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <div>Email</div>
                          </div>
                          <div class="col-sm-6">
                            <div>Khmer-job@gmail.com</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <div>Website</div>
                          </div>
                          <div class="col-sm-6">
                            <div>www.KhmerJob.com</div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <div>Address</div>
                          </div>
                          <div class="col-sm-6">
                            <div>Sang Kat Tek Loak 2, Khan tul-Kok,Phnome Penh, St 120,12A</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-3">
                            <div>Name</div>
                          </div>
                          <div class='col-sm-6'>
                            <div><?php if(isset($acc_info->acc_name)){echo $acc_info->acc_name;}?></div>
                          </div>
                      </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <div>Phone</div>
                          </div>
                          <div class="col-sm-6">
                            <div><?php if(isset($acc_info->acc_phone)){echo $acc_info->acc_phone;} ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <div>Email</div>
                          </div>
                          <div class="col-sm-6">
                            <div><?php if(isset($acc_info->acc_email)){echo $acc_info->acc_email;} ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <div>Address</div>
                          </div>
                          <div class="col-sm-6">
                            <div><?php if(isset($acc_info->acc_addr)){echo $acc_info->acc_addr;} ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                          <b style="margin-left:-16px; margin-top:10px">Date:<?php echo $date=date("Y/m/d");?> |  Invoice No: <?php echo date("Ymdhis") ?></b>
                    </div>
                    <table   style="width:100%" class="table tb">
                      <tr class="tr">
                          <?php if(isset($tbl_hdr))
                          {
                              echo "<th class='tr'>No.</th>";
                              foreach($tbl_hdr as $th){echo "<th class='tr'>".$th."</th>";}
                          }?>                                
                      </tr>
                      <?php $i=1;$sum_price=0;$sum_discount=0;?>
                      <tr class="tr">
                          <?php $i=1;if(!empty($tbl_body[0])){foreach($tbl_body as $body)
                          {
                            echo "<tr class='th'>";                                    
                              echo "<td class='th'>".$i."</td>";
                              $j=0;
                              foreach($tbl_hdr as $th)
                              {
                                  echo "<td class='th'>".$body[$j]."</td>";
                                  $j++;
                              }
                               $sum_price +=$body[1];
                               $sum_discount+=$body[3];
                          ?>
                          <?php
                              echo "</tr>";
                          $i++;}}?>                            
                      </tr>
                      <tr class="tr">
                        <th class="th" colspan="<?php echo $j-1;?>" rowspan="6"></td>                 
                        <th class="th" style="text-align: right;">Sub Total :</th>
                        <th class="th" ><?php echo $sum_price."$";?></th>
                      </tr>               
                      <tr class="tr">            
                        <th class="th" style="text-align: right;">Discount :</th>
                        <th class="th"><?php echo $sum_discount."%";?></th>
                      </tr>
                      <tr class="tr">            
                        <th class="th" style="text-align: right;">Total :</th>           
                        <th class="th"><?php echo $total=$sum_price-(($sum_price*$sum_discount)/100)."$";?></th>
                      </tr>
                      <tr class="tr">            
                        <th class="th" style="text-align: right;">VAT :</th>
                        <th class="th" ><?php echo $VAT."%"; ?></th>
                      </tr>
                      <tr class="tr">
                      <input type="text" ng-init="grand='<?php echo $total;?>'" name="grand" ng-model="grand" id="grand" style="visibility: hidden;">                         
                        <th class="th" style="text-align: right;">Grand Total :</th>                                             
                        <th class="th" ><?php echo $total+($total*$VAT)/(100)."$";?></th>
                      </tr>                               
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </body>
</html>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>