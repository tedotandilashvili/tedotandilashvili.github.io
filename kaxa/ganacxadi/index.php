<?php
  session_start();
  include('config.php');
?>
<!DOCTYPE html>
<style type="text/css">
	.statusi {
		    position: absolute;
    z-index: 1;
    width: 59px;
    border-radius: 3px;
    border: none;
    height: 34px;
    background: none;
	}
</style>
<html>
	<head>
		<title>
			Victoria Security
		</title>
		<meta charset="utf-8">
		<?php include("head.tpl"); ?>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="../js/jquery_bootstrap.js" defer></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>	
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<meta http-equiv="refresh" content="60" >

	</head>
	<body>

<div class="cont" style="width: 90%;margin:auto; margin-top: 20px;">  
<a href="output.php"><button class="btn btn-info">სტატისტიკა</button> </a>   
<a href="index.php"><button class="btn btn-danger">ყველა ობიექტი</button> </a> 
<a href="index.php?status=ჩართული"><button class="btn btn-danger">ჩართული ობიექტები</button> </a>
<a href="index.php?status=გამორთული"><button class="btn btn-danger">ჩასართავი ობიექტები</button> </a>       


&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
<a href="mailto:tedo.tandilashvili@gmail.com"><button class="btn btn-danger">ტექნიკური დახმარება</button> </a> 
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
<center><p style="color: red;">(ტექნიკური დახმარებისთვის, დააჭირეთ ღილაკს, ან პრობლემა მოგვწერეთ მეილზე: tedo.tandilashvili@gmail.com)</p></center>
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>სახელი/კოდი</th>
        <th>გადამცემის ნომერი</th>
        <th>ფაქტიური მისამართი</th>
        <th>ტელეფონი</th>
        <th>თარიღი</th>
        <th>ობიექტის მენეჯერი</th>
        <th>კომენტარი</th>
        <th>სრული ინფორმაცია</th>
        <th>სტატუსი</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php
      $condition = "";
      if(isset($_GET['status'])){
        if($_GET['status']=="ჩასართავი"){
          $condition = " WHERE cspstatus=1 ";
        }elseif($_GET['status']=="გამორთული"){
          $condition = " WHERE cspstatus=0 ";
        }
      }

    	$select = "SELECT * FROM chanaweri WHERE gadamcemi!='' " . $condition . " ORDER BY mdate DESC ";
    	$select = mysqli_query($conn, $select);
    	// var_dump($select);
        
    	while($arr = mysqli_fetch_assoc($select)){
    	?>

      <tr>
        <td><?php echo $arr["name"]."\n".$arr["code"]; ?></td>
        <td><?php echo $arr["gadamcemi" ]; ?> </td>
        <td><?php echo $arr["addp"]."\n".$arr["city"]; ?></td>
        <td><?php echo $arr["phone"]; ?></td>
        <td><?php echo str_replace("-","/",$arr["cspdate"]); ?></td>
        <td><?php echo $arr["user"]; ?></td>
        <td><?php echo $arr["cspcomment"]; ?></td>
        <td><a href="ganacxadi.php?id=<?php echo $arr['id']; ?>"><button class="btn btn-danger">ნახვა</button></a></td>
  <td><?php 
  if($arr['cspstatus']){
    echo "ჩართული";
  }else{
    echo "არ არის ჩართული";
  }
  ?></td>

      </tr>
  <?php } ?>
    </tbody>
  </table><br><br><br>
</div>

<!-- modali -->



      <!-- Modal content-->
<!--       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ტექნიკური სამუშაოები</h4>
        </div>
        <center>
        <div class="modal-body">
          <p>მიმდინარეობს</p> 
          <p style="color: red"> ტექნიკური სამუშაოები</p> 
          <p>თუ რამე შეფერხება იქნება, <b> არ მიაქციოთ ყურადღება </b></p>
           <p style="color: red;"> მოგვარდება თუ მაცდით</p>
        </div>
        </center>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div> -->

<!-- modali -->

	</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'excelHtml5',
        ],
        "order": [[ 4, "desc" ]]
    } );
} );
</script>
</html>
