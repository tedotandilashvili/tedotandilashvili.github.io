<?php
	include('../../config.php');
	// session_start();
	// if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	// 	header('Location: home.php');
	// }
	if(isset($_POST["statusi"])){
		$aidi = $_POST["statusii"];
		$sel = mysqli_query($conn,"SELECT statu FROM chanaweri WHERE id = $aidi");
		$fet = mysqli_fetch_assoc($sel);
		// var_dump($fet["statu"];)
		if($fet["statu"] == "0"){
			$ondate = date("Y-m-d");
			$upd = mysqli_query($conn,"UPDATE chanaweri SET statu = '1', ondate = '$ondate' WHERE id = $aidi");
			header("Location: index.php");
			// echo "string";
		}else{

		}
		if($fet["statu"] == "1"){
			$upd = mysqli_query($conn,"UPDATE chanaweri SET statu = '0', ondate = '' WHERE id = $aidi");
			header("Location: index.php");
		}else{

		}
		// echo "string";
	}
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
		<?php include("../../head.tpl"); ?>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>	
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	</head>
	<body>
<div class="cont" style="width: 90%;margin:auto; margin-top: 20px;">  
<a href="output.php"><button class="btn btn-info">სტატისტიკა</button> </a>   
<a href="index.php"><button class="btn btn-danger">ყველა ინვოისი</button> </a>       
<a href="gagzavnili.php"><button class="btn btn-warning">გაგზავნილი</button> </a>  
<a href="statusi.php"><button class="btn btn-success">დასრულებული</button> </a>           
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>სახელი/კოდი</th>
        <th>ელ-ფოსტა</th>
        <th>ფაქტიური მისამართი</th>
        <th>ტელეფონი</th>
        <th>თარიღი</th>
        <th>მონტაჟის თარიღი</th>
        <th>ინვოისის ჩასწორება</th>
        <th>ინვოისის გაგზავნა</th>
        <th>ინვოისის ავტორი</th>
        <th>სტატუსი</th>
        <th>სია</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$select = "SELECT * FROM chanaweri WHERE sentmails<>'' ORDER BY id DESC";
    	$select = mysqli_query($conn, $select);
    	// var_dump($select);
        $ricxv = 1;
    	while($arr = mysqli_fetch_assoc($select)){
    	?>
      <tr>
        <td><?php echo $arr["name"]."\n".$arr["code"]; ?></td>
        <td><?php echo $arr["mail"]; ?></td>
        <td><?php echo $arr["addp"]; ?></td>
        <td><?php echo $arr["phone"]; ?></td>
        <td><?php echo str_replace("-","/",$arr["tarigi"]); ?></td>
        <td><?php

        	
   $dro = $arr["tarigi"]; 
            $tomorrow = date("Y-m-d", strtotime('yesterday'));
            // var_dump($tomorrow);
            // $curr = date("Y-m-j");
            if($tomorrow == $dro){
                echo '<p style="color: red; text-align: center">
      '.str_replace("-","/",$dro).'
      </p>';
            }else{
                echo str_replace("-","/", $dro);
            }
        ?></td>
        <td><a href="edit.php?id=<?php echo $arr['id']; ?>"><button class="btn btn-primary">ინვოისის ჩასწორება</button></a></td>
        <td><a href="invoice.php?id=<?php echo $arr['id'];?>"><button class="btn btn-success">ინვოისის გაგზავნა</button></a></td>
        <td><?php echo $arr["user"]; ?></td>
        <td><form method="post" action=""><button name="statusi" class="statusi"></button><input type="text" name="statusii" value="<?php echo $arr['id']?>" hidden><input type="checkbox" <?php if($arr["statu"] == '1'){echo "checked";}else{}?> data-toggle="toggle"></form></td>
       <td>
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $ricxv; ?>">ჩამოშალე</button>
 <div class="modal fade" id="myModal<?php echo $ricxv; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">სია</h4>
        </div>
        <div class="modal-body">
          <?php echo str_replace(",", "<br>", $arr["sentmails"]); ?>
          თარიღი:
          <?php echo str_replace(",", "<br> ", $arr["sentdate"]); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">დახურვა</button>
        </div>
      </div>
      
    </div>
  </div>
       </td>
      </tr>
  <?php $ricxv++; } ?>
    </tbody>
  </table><br><br><br>
</div>

	</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'excelHtml5',
        ]
    } );
} );
</script>
</html>
