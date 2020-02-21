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
            <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>	
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
	<body>
<div class="cont" style="width: 90%;margin:auto; margin-top: 20px;">  
    <a href="index.php"><button class="btn btn-primary">მთავარი გვერდი</button></a><br>   <br>    
   <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <!-- <td>აქედან:</td> -->
                <td><input name="min" id="min" type="text" class="form-control" placeholder="საწყისი თარიღი"></td>
            </tr>
            <tr style="margin-top: 15px;
    display: block;">
                <!-- <td>აქამდე:</td> -->
                <td><input name="max" id="max" type="text" class="form-control" placeholder="საბოლოო თარიღი"></td>
            </tr>
        </tbody>
    </table>
 <table class="table" id="myTable">
    <thead>
      <tr>
        <th>სახელი/კოდი</th>
        <!-- <th>ელ-ფოსტა</th> -->
        <!-- <th>ფიზიკური მისამართი</th> -->
        <!-- <th>ტელეფონი</th> -->
        <th>თარიღი</th>
        <th>შესრულების თარიღი</th>
        <!-- <th>ინვოისის ნახვა/ჩასწორება</th> -->
        <!-- <th>ინვოისის გაგზავნა</th> -->
        <th>ინვოისის ავტორი</th>
        <th>სტატუსი</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$select = "SELECT * FROM chanaweri ORDER BY id DESC";
    	$select = mysqli_query($conn, $select);
    	// var_dump($select);
    	while($arr = mysqli_fetch_assoc($select)){
    	?>
      <tr>
        <td><?php echo $arr["name"]; ?></td>
        <td><?php echo str_replace("-","/",$arr["mdate"]); ?></td>
        <td><?php echo str_replace("-","/",$arr["ondate"]); ?></td>
        <td><?php echo $arr["user"]; ?></td>
        <td><button name="statusi" class="statusi"></button><input type="text" name="statusii" value="<?php echo $arr['id']?>" hidden><input type="checkbox" <?php if($arr["statu"] == '1'){echo "checked";}else{}?> data-toggle="toggle" disabled></td>
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
        ]
    } );
} );
</script>
<script type="text/javascript">
         $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[5]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

       
            $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            var table = $('#myTable').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>
</html>
