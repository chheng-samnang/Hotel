
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
      <div class="container" style="display: none;">
        <div id="div1" style="padding:10; margin:auto; padding:0px"">
          <div style="width:1240px;">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="row">
                      <table>
                      kkzdvmzksvm.,s
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