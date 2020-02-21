<?php
  session_start();
  include('../../config.php');


  $sel_ekas = mysqli_query($conn, "SELECT * FROM eka"); // უსადენო
  $sel_ekaw = mysqli_query($conn, "SELECT * FROM ekaw"); // 12 მდე
  $sel_ekaw12 = mysqli_query($conn, "SELECT * FROM ekaw12"); // 12+
	$sel_ekafire = mysqli_query($conn, "SELECT * FROM ekafire"); // სახანძრო
  $sel_ekaip = mysqli_query($conn, "SELECT * FROM ekacamip"); // იპ კამერები
  $sel_ekacam = mysqli_query($conn, "SELECT * FROM ekacam"); // ჰდ კამერები
	$sel_ekadashveba = mysqli_query($conn, "SELECT * FROM ekadashveba"); // დაშვება
  $sel_ekadamatebiti = mysqli_query($conn, "SELECT * FROM ekadamatebiti"); // დაშვება
  $sel_ekademontaji = mysqli_query($conn, "SELECT * FROM ekademontaji"); // დემონტაჟი
	
	$ekas_array = array();
	while($eka = mysqli_fetch_assoc($sel_ekas)){
		$tt = $eka["name"]."=".$eka["price"]."=".$eka["saleprice"];
		array_push($ekas_array, $tt);
	}

  $ekaw_array = array();
  while($ekaw = mysqli_fetch_assoc($sel_ekaw)){
    $tt = $ekaw["name"]."=".$ekaw["price"]."=".$ekaw["saleprice"];
    array_push($ekaw_array, $tt);
  }

    $ekaw12_array = array();
  while($ekaw12 = mysqli_fetch_assoc($sel_ekaw12)){
    $tt = $ekaw12["name"]."=".$ekaw12["price"]."=".$ekaw12["saleprice"];
    array_push($ekaw12_array, $tt);
  }

  // var_dump(mysqli_num_rows($ekafire));
  $ekafire_array = array();
  while($ekafire = mysqli_fetch_assoc($sel_ekafire)){
    // echo $ekafire["name"]."<br>";
    $tt = $ekafire["name"]."=".$ekafire["price"]."=".$ekafire["saleprice"];
    array_push($ekafire_array, $tt);
  }

    $ekaip_array = array();
  while($ekaip = mysqli_fetch_assoc($sel_ekaip)){
    // echo $ekafire["name"]."<br>";
    $tt = $ekaip["name"]."=".$ekaip["price"]."=".$ekaip["saleprice"];
    array_push($ekaip_array, $tt);
  }

  // print_r($ekafire_array);
	$ekacam_array = array();
	while($ekacam = mysqli_fetch_assoc($sel_ekacam)){
		$tt = $ekacam["name"]."=".$ekacam["price"]."=".$ekacam["saleprice"];
		array_push($ekacam_array, $tt);
	}

	$ekadashveba_array = array();
	while($ekadashveba = mysqli_fetch_assoc($sel_ekadashveba)){
		$tt = $ekadashveba["name"]."=".$ekadashveba["price"]."=".$ekadashveba["saleprice"];
		array_push($ekadashveba_array, $tt);
	}
  $ekadamatebiti_array = array();
  while($ekadamatebiti = mysqli_fetch_assoc($sel_ekadamatebiti)){
    $tt = $ekadamatebiti["name"]."=".$ekadamatebiti["price"]."=".$ekadamatebiti["saleprice"];
    array_push($ekadamatebiti_array, $tt);
  }
  $ekademontaji_array = array();
  while($ekademontaji = mysqli_fetch_assoc($sel_ekademontaji)){
    $tt = $ekademontaji["name"]."=".$ekademontaji["price"]."=".$ekademontaji["saleprice"];
    array_push($ekademontaji_array, $tt);
  }

  // session_start();
  // if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
  //  header('Location: home.php');
  // }

  if(isset($_POST["dasruleba"])){

    $itemra = $_SESSION["itemrao"];

    $satauri = implode(',', $_POST["satauri"]);
    $fasi = implode(',', $_POST["tvit"]);
    $tvijami = implode(',', $_POST["tvitjami"]);
    $gasfasi = implode(',', $_POST["gasfasi"]);
   	$qunatity = implode(',', $_POST["erteuli"]);
    $gasjami = implode(',', $_POST["gasfasijami"]);


    // print_r($qunatity);
    // echo "თვითღირებულება: ".$fasi."<br>";
    // echo "თვ.ჯამი: ". $tvijami."<br>";
    // echo "გასაყიდი ფასი: ".$gasfasi."<br>";
    // echo "გასაყიდი ფასის ჯამი". $gasjami;
    // echo "რაოდენობა: ". $qunatity;
    // echo $_POST["sumelji"];
    // print_r($_POST["gasfasi"]);
    // $count_gasjam = $_POST["gasfasijami"];
    // $instfasi = array_sum($count_gasjam);
    // $percentage = 35;
    // $totalWidth = 350;

    // $instfasi = (25 / 100) * $instfasi;
    // round($instfasi);
    // $instfasi = gas
    // $instfasi = $_POST["instalacia"];



    
    $gas_jam = $_SESSION["gas_jam"];

  //   if($gasjami == $gas_jam){
  //     $gasjami = array();
  //         for ($i=0; $i < count($gasfasi); $i++) {
  //           $gasjami[] = $qunatity[$i] * $gasfasi[$i];
  //         }
  //         $gasjami = implode(',', $gasjami);
  //   }else{

  //   }
  //   $gasfasi = implode(",", $gasfasi);
  //   $fasi = implode(",", $fasi);
    	$aid = $_GET["id"];
   		$shen = $_POST["shenishvna"];
      $instalacia = $_POST["installation"];

    $update = "UPDATE chanaweri SET produqti = '$satauri', raodenoba = '$qunatity', tvjami = '$tvijami', gasjami = '$gasjami', price = '$fasi', saleprice = '$gasfasi',  installation = '$instalacia', shenishvna = '$shen' WHERE id = '$aid'";
    
    // var_dump($update);
    $update = mysqli_query($conn, $update);
    
    if($update){
      echo "<script>alert('წარმატება');</script>";
      // header("Location: index.php");
     ?>
        <script type="text/javascript">window.location.replace("index.php");</script>
      <?php
    }
  }
  
  if(isset($_GET["id"])){

    // $arc = "SELECT *"
        $jami = array();


    // 
    $aidi = $_GET["id"];
    $select = "SELECT * FROM chanaweri WHERE id = '$aidi'";
    $select = mysqli_query($conn, $select);
    $prod = mysqli_fetch_assoc($select);
    $shenishvna = $prod["shenishvna"];
    $_SESSION["shenishvna"] = $shenishvna;
    $gas_jam = $prod["gasjami"];
    $_SESSION["gas_jam"] = $gas_jam;
    // echo "string";
    $insta = $prod["installation"];
    // echo $prod["raodenoba"];
    // echo $prod["produqti"];
    $prodarr = explode(",", $prod["produqti"]);
    // Print_r($prodarr);
    $raodarr = explode(",", $prod["raodenoba"]);
?>


<!DOCTYPE html>
<html>
  <head>
    <title>
      Victoria Security
    </title>
    <meta charset="utf-8">
    <?php include("../../head.tpl"); ?>
      <!-- <script src="https://cdnjs.cloud.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
  </head>
  <body>
<div class="container" style="margin-top: 20px;">  
  <a href="index.php"><button class="btn btn-primary">უკან დაბრუნება</button></a><br><br>    
  
<!--  <?php $select2 = "SELECT name, code FROM chanaweri WHERE id = '$aidi'"; 
 $select2 = mysqli_query($conn, $select2);
    $arr = mysqli_fetch_assoc($select);
    $name = $prod["name"];
    $_SESSION["name"] = $name;
    $code = $prod["code"];
    $_SESSION["code"] = $code;
    var_dump($code)
 ?>
  <a href="index.php"><button class="btn btn-primary"><?php echo $arr["name"]."\n".var_dump($name); ?></button></a><br><br>  -->
  <center>
<?php
  $sql = "SELECT name, code, addp FROM chanaweri WHERE id = '$aidi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> მისამართი: ". $row["addp"]. " <br> დასახელება: ". $row["name"]. "<br> საიდენთიფიკაციო კოდი: " . $row["code"] . "<br>";
      }
    }
   
?>
</center>
<br>
<br>
  <form action="" method="POST">
    <table class="table">
    <thead>
      <tr>
        <th>დასახელება</th>
        <th>ერთეული</th>
        <th>თვ. ღირ.</th>
        <th>თვ. ღირ. ჯამი</th>
        <th>გას. ფასი</th>
        <th>გას. ფასის ჯამი</th>
      </tr>
    </thead>  
    <tbody> 
    <?php
    $num = 1;
    $itemrao = 1;
    foreach($prodarr as $index => $prod) {
    ?>
    <!-- <a type="button" id="del_rec" style="display: none;">წაშლა</a> -->
    <tr>
      <td width="40%"><input type="text" value="<?php echo $prod ?>" class="form-control" name="satauri[]" readonly></td>
      <td width="10%"><input type="number" value="<?php echo $raodarr[$index]; ?>" name="erteuli[]" class="form-control" id="raod"></td>
    
  <?php

    $selectt = "SELECT * FROM chanaweri WHERE id = '$aidi'";
    $selectt = mysqli_query($conn, $selectt);
    // $tvj

    while($arr = mysqli_fetch_assoc($selectt)){
      $seltype = $arr["select_type"];
    $ts = explode(",", $arr["price"]);
    $tss = explode(",", $arr["saleprice"]);
    $gasj = explode(",", $arr["gasjami"]);
    $tvj = explode(",", $arr["tvjami"]);
    ?>
      <td width="10%"><input type="text" value="<?php echo $ts[$index]; ?>" class="form-control" name="tvit[]" id="tvit_add" ></td>
      <td width="10%"><input type="text" value="<?php if($arr['tvjami'] == ""){echo $ts[$index] * $raodarr[$index];}else{ echo $tvj[$index];} ?>" class="form-control" name="tvitjami[]"></td>
      <td width="10%"><input type="text" value="<?php echo $tss[$index]; ?>" class="form-control" id="gasfasi" name="gasfasi[]"></td>
      <td width="10%"><input type="text" value="<?php if($arr['gasjami'] == ""){ echo $tss[$index] * $raodarr[$index];}else{echo $gasj[$index];} ?>" class="form-control" name="gasfasijami[]"></td>
      <td width="10%"><button type="button" class="btn btn-danger del_rec">წაშლა</button></td>
      </tr>
    <?php
    $num = $num - 39;
    $itemrao++;
   }
    $_SESSION["itemrao"] = $itemrao;
  }
  $jami = array_sum($gasj);
  $jami_sum = array_sum($gasj);
  $tvjj = array_sum($tvj);
  if($seltype == "თორმეტზე_მეტი"){
    $per1 = (5 / 100) * $jami;
    $jami = $per1 + $jami;
    $jamii = (20 / 100) * $jami;
    $instalacia = $jamii;
    $jami = $jamii + $jami;
    $pro = "+5% + 20%";
  }else if($seltype == "სადენიანი"){
    $jamii = (25 / 100) * $jami;
    $instalacia = $jamii;
    $jami = $jami + $jamii; 
    $pro = "+25%";
  }else if($seltype == "უსადენო"){
    $jamii = (10 / 100) * $jami;
    $jami = $jami + $jamii; 
    $instalacia = (10 / 100) * $jami;
    $pro = "+10%";
  }else{
    $per1 = (20 / 100) * $jami;
    // echo $per1;
    $jami = $per1 + $jami;
    // echo $jami;
    $jamii = (20 / 100) * $jami;

    $instalacia = $jamii;
    $jami = $jamii + $jami;
    $pro = "+20% + 20%";
  }
  ?>
</tbody>
</table>
<h3>ახლის დამატება:</h3>
<select  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="new_item">
	<option value=""></option>
	<optgroup label="უსადენო">
	<?php
		foreach ($ekas_array as $value) {
			$opti = explode ("=", $value);
			$opti = $opti[0];
		    ?>
		    <option value="<?php echo $value?>"><?php echo $opti ?></option>
		    <?php
		}
	?>
	</optgroup>
		<optgroup label="სადენიანი">
    <?php
        foreach ($ekaw_array as $value) {
          $opti = explode ("=", $value);
          $opti = $opti[0];
            ?>
            <option value="<?php echo $value?>"><?php echo $opti ?></option>
            <?php
        }
      ?>
    </optgroup>
    <optgroup label="სადენიანი სიგნალიზაცია (12+)">
    <?php
        foreach ($ekaw12_array as $value) {
          $opti = explode ("=", $value);
          $opti = $opti[0];
            ?>
            <option value="<?php echo $value?>"><?php echo $opti ?></option>
            <?php
        }
      ?>
    </optgroup>
		<optgroup label="სახანძრო">
			<?php
				foreach ($ekafire_array as $value) {
					$opti = explode ("=", $value);
					$opti = $opti[0];
				    ?>
				    <option value="<?php echo $value?>"><?php echo $opti ?></option>
				    <?php
				}
			?>
		</optgroup>

				<optgroup label="დაშების სისტემები">
			<?php
				foreach ($ekadashveba_array as $value) {
					$opti = explode ("=", $value);
					$opti = $opti[0];
				    ?>
				    <option value="<?php echo $value?>"><?php echo $opti ?></option>
				    <?php
				}
			?>
		</optgroup>
            <optgroup label="IP კამერები">
      <?php
        foreach ($ekaip_array as $value) {
          $opti = explode ("=", $value);
          $opti = $opti[0];
            ?>
            <option value="<?php echo $value?>"><?php echo $opti ?></option>
            <?php
        }
      ?>
    </optgroup>
                <optgroup label="HD კამერები">
      <?php
        foreach ($ekacam_array as $value) {
          $opti = explode ("=", $value);
          $opti = $opti[0];
            ?>
            <option value="<?php echo $value?>"><?php echo $opti ?></option>
            <?php
        }
      ?>
    </optgroup>
    <optgroup label="დამატებითი მასალები">
      <?php
        foreach ($ekadamatebiti_array as $value) {
          $opti = explode ("=", $value);
          $opti = $opti[0];
            ?>
            <option value="<?php echo $value?>"><?php echo $opti ?></option>
            <?php
        }
      ?>
    </optgroup>
    <optgroup label="დემონტაჟის საშუალებები">
      <?php
        foreach ($ekademontaji_array as $value) {
          $opti = explode ("=", $value);
          $opti = $opti[0];
            ?>
            <option value="<?php echo $value?>"><?php echo $opti ?></option>
            <?php
        }
      ?>
    </optgroup>
</select><br><br>
<button id="axalisdamateba" type="button" class="btn btn-primary">დამატება</button><br><br>
  <label>ინსტალაციის საფასური:</label>
  <input type="text" value="<?php echo $instalacia;?>" class="form-control" name="instalacia">
  <br>
  <label>სახარჯი მასალა:</label>
  <input type="text" value="<?php echo $per1;?>" class="form-control" name="per1" readonly>
  <br>

  <!-- <label></label> -->
  <div class="fle" style="display: flex;justify-content: space-between;">
    <input type="text" value="თვით.ფასების ჯამი: <?php echo $tvjj;?>" class="form-control" name="" style="width: 33%;float: left;" readonly>
  <input type="text" value="გას.ფასების ჯამი: <?php echo $jami_sum;?>" class="form-control" name="" style="width: 33%; float: left;" readonly>
  <input type="text" value="სხვაობა: <?php echo  $jami_sum-$tvjj?>" class="form-control" name="" style="width: 33%; float: left;" readonly>
  </div><br>


 <div class="fle" style="display: flex;justify-content: space-between;">
    <input type="text" value="თვით.ფასების ჯამი: <?php   echo $tvjj; ?>" class="form-control" name="" style="width: 33%;float: left;" readonly>
  <input type="text" value="გას.ფასების ჯამი<?php echo $pro?>: <?php echo $jami;?>" class="form-control" name="" style="width: 33%; float: left;" readonly>
  <input type="text" value="სხვაობა: <?php echo  $jami-$tvjj?>" class="form-control" name="" style="width: 33%; float: left;" readonly>
  </div>
  <br>
  <label>შენიშვნა:</label>
  <textarea class="form-control" name="shenishvna"><?php echo $_SESSION["shenishvna"]; ?></textarea>
  <br>
  <button type="submit" id="dasr" class="btn btn-success" name="dasruleba">შენახვა და დასრულება</button><br><br><br>
  </form>
</div>
  </body>
</html>
<?php }else{} ?>

<script type="text/javascript">
	 $(document).ready(function(){  
	$("#axalisdamateba").on('click', function(){
		var selected = $("#new_item").val();
		var split_selected = selected.split("=");
		var saxeli = split_selected[0];
		var tvit = split_selected[1];
		var gas = split_selected[2];
    if(tvit.includes(",")){
      tvit = tvit.replace(",", ".");
      // tvi
    } 
    if(gas.includes(",")){
      gas = gas.replace(",", ".");
    }

    // console.log(tvit);
    // console.log(gas);
		// debugger
		// saxelebi = new Array();

		// $.ajax({
		// 	type: 'POST',
		// 	url: 'fetch_prods.php',
		// 	// dataType:"json",
		// 	success:function(msg){
		// 	// var result_parsed = JSON.parse(msg);
		// 		// alert(msg);
		// 	saxelebi = msg;	
		// 	},
		// 	    dataType:"json"
		// });

		// alert("dsada");
		var html = '<tr>' + 
       '<td width="40%"><input type="text" value="'+saxeli+'" class="form-control" name="satauri[]"></td>' + 
       '<td width="10%"><input type="text" value="1" name="erteuli[]" id="raod" class="form-control" ></td>' +
       '<td width="10%"><input type="text" value="'+tvit+'" id="tvit_add" class="form-control" name="tvit[]" ></td>' +
       '<td width="10%""><input type="text" value="'+tvit+'" class="form-control" name="tvitjami[]"></td>' + 
       '<td width="10%"><input type="text" value="'+gas+'" class="form-control" name="gasfasi[]" id="gasfasi"></td>' +
       '<td width="10%"><input type="text" value="'+gas+'" class="form-control" name="gasfasijami[]"></td>' + 
       '<td width="10%"><button type="button" class="btn btn-danger" id="del_rec">წაშლა</button></td>' +
      '</tr>';
  			// var html = "<input name='satauri1'>";
			$(".table").append(html);
	});
	});
		$(document).on('keyup', '#tvit_add', function(){
	     	var wina = $(this).closest("td").prev().children("input").val();
	     	var tv_it = $(this).val();
	     	$(this).closest("td").next().children("input").val((wina * tv_it).toFixed(2));
	 	});

	 	$(document).on('keyup', '#gasfasi', function(){
	     	var wina = $(this).closest("td").prevAll().slice(2,3).children("input").val();
	     	// alert(wina);
	     	var tv_it = $(this).val();
	     	$(this).closest("td").next().children("input").val((wina * tv_it).toFixed(2));
	 	});

		$(document).on('keyup', '#raod', function(){
	     	var shemdegi = $(this).closest("td").next().children("input").val();
	     	var curr_val = $(this).val();
	     	
	     	// გასაყიდი ფასი
	     	var gasayidi = $(this).closest("td").nextAll().slice(2, 3).children("input").val();
	     	// gasayidi = gasayidi.toFixed(2);

	     	$(this).closest("td").nextAll().slice(1, 2).children("input").val((shemdegi * curr_val).toFixed(2));
	     	$(this).closest("td").nextAll().slice(3, 4).children("input").val((gasayidi * curr_val).toFixed(2));
	  	});
</script>

<script type="text/javascript">
  $(".del_rec").on('click', function(){
    $(this).closest('tr').empty();
  });
</script>

<style type="text/css">
  .container {
    max-width: unset!important;
    width: 100%;
  }
</style>