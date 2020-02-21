<?php
	include('../../config.php');
	// session_start();
	// if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	// 	header('Location: home.php');
	// }
	
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
        <script type="text/javascript" src="../js/jquery_bootstrap.js" defer></script>
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
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
<a href="mailto:tedo.tandilashvili@gmail.com"><button class="btn btn-danger">ტექნიკური დახმარება</button> </a> 
<center><p style="color: red;">(ტექნიკური დახმარებისთვის, დააჭირეთ ღილაკს, ან პრობლემა მოგვწერეთ მეილზე: tedo.tandilashvili@gmail.com)</p></center>
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>სახელი/კოდი</th>
        <th>ელ-ფოსტა</th>
        <th>ფაქტიური მისამართი</th>
        <th>ტელეფონი</th>
        <th>ჩართვის თარიღი</th>
        <th>მონტაჟის თარიღი</th>
        <th>მეტი</th>
        <th>ხელშეკრულება</th>
        <th>ობიექტის ნომერი</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$select = "SELECT * FROM csp ORDER BY tarigi DESC";
    	$select = mysqli_query($conn, $select);
    	// var_dump($select);
    	while($arr = mysqli_fetch_assoc($select)){
    	?>
      <tr>
        <td><?php echo $arr["name"]."\n".$arr["code"]; ?></td>
        <td><?php echo $arr["mail"]; ?></td>
        <td><?php echo $arr["addp"]."\n".$arr["city"]; ?></td>
        <td><?php echo $arr["phone"]; ?></td>
        <td><?php echo str_replace("-","/",$arr["tarigi"]); ?></td>
        <td><?php echo str_replace("-","/",$arr["tarigi"]); ?></td>
        <td><a href="edit.php?id=<?php echo $arr['id']; ?>"><button class="btn btn-primary">დეტალების ნახვა</button></a></td>
        <td><a href="invoice.php?id=<?php echo $arr['id'];?>"><button class="btn btn-success">ხელშეკრულების გაგზავნა</button></a></td>
        <td><?php echo $arr["gadamcemi"]; ?></td>

      </tr>
  <?php } ?>
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
        ],
        "order": [[ 5, "desc" ]]
    } );
} );
</script>
</html>
