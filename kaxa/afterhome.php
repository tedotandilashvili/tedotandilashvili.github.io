<?php 
	error_reporting(0);
		session_start();
		include('config.php');
		// require_once 'forxl/swift/lib/swift_required.php';
		require_once 'forxl/Classes/PHPExcel/IOFactory.php';

		include("head.tpl");
		mysqli_set_charset($conn, 'utf8');
			if($logged_permission != 'root'){
		header("Location:output.php");
	}
?>

<style type="text/css">
	body {
		margin: 30px;
	}

	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  background-color: lightgreen;
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}
</style>
<title>ინვოისის დამზადება</title>
<meta charset="utf-8">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<?php
	

	if(isset($_POST["done1"])){
		$archeva = mysqli_query($conn,"SELECT * FROM ekaw ORDER BY cat ASC");
		// $num = 1;
		$col = array();
		$pro = array();
		$rao = array();
		$gprice = array();
		$sprice = array();
		$gasjami = array();
		$tvitjami = array();
		$tab_type = $_POST["tab_type"];

		$num = 0;
		$raodenoba_archeuli = array();
		while($arr = mysqli_fetch_assoc($archeva)){
			$num += 1;

			$forname = $arr["id"]."-count";
			if($_POST[$forname] !== "0"){
// $raodenoba_archeuli += 1;
				// echo $arr["saleprice"]."<br>";
				if($forname == "71-count" || $forname == "72-count" || $forname == "73-count" ||$forname == "74-count" ||$forname == "75-count" ||$forname == "76-count" ||$forname == "77-count" ||$forname == "78-count" || $forname == "79-count" || $forname == "80-count"){
					array_push($raodenoba_archeuli, $_POST[$forname]);
				}

					// echo $forname;
				$tempname = $arr["name"]; # სახელი
				$tempquan = $_POST[$forname]; # რაოდენობა
				$tempprice = $arr["price"]; #ფასი
				$sumtvit = $tempprice * $tempquan;
				$gasayidi = $arr["saleprice"];
				$gassum = $gasayidi * $tempquan;
				array_push($pro, $tempname);
				array_push($rao, $tempquan);
				array_push($gprice, $tempprice);
				array_push($sprice, $gasayidi);
				array_push($gasjami, $gassum);
				array_push($tvitjami, $sumtvit);
					$col[] = array(
						"name" => $tempname, 
						"count" => $tempquan, 
						"price" => $tempprice,
						"sumtvit" => $sumtvit,
						"gasayidi" => $gasayidi,
						"gassum" => $gassum
					);


			}else{
				// echo "string";
			}
			// $num += 1;
		}

			$arch_sum = array_sum($raodenoba_archeuli);
		// print_r($raodenoba_archeuli);
		// exit();
		
		if($arch_sum > 12){
			?>
		<script>alert("არ უნდა იყოს მეტი 12 - ზე");</script>
		<a href="http://securitas.ge/kaxa/afterhome.php"><button class="btn btn-danger">უკან დაბრუნება</button></a>
 <?php		
		exit();
		}
        
        $type = $_SESSION["type"];
		$os = $_SESSION["name"];
		$oc = $_SESSION["code"];
		$om = $_SESSION["mail"];
		$ot = $_SESSION["phone"];
		$oaddl = $_SESSION["addl"];
		$oaddp = $_SESSION["addp"];
		$ota = $_SESSION["tarigi"];
		// axlebi
		$obtype = $_SESSION["obtype"];
		$sak = $_SESSION["sak"];
		$msxvreva = $_SESSION["msxvreva"];
		$sax = $_SESSION["sax"];
		$aqcia = $_SESSION["aqcia"];
		$saabonento = $_SESSION["saabonento"];
		$dgg = $_SESSION["dgg"];
		$xelshekruleba = $_SESSION["xelshekruleba"];
		$vada = $_SESSION["vada"];
		$cocxali = $_SESSION["cocxali"];
        $city = $_SESSION["city"];
        $contact = $_SESSION["contact"];
		$cmobile = $_SESSION["cmobile"];

		// axlebi
		$shenishvna = $_SESSION["shenishvna"];
		$prods = implode(",", $pro);
		$raod = implode(",", $rao);
		$gpriced = implode(",", $gprice);
		$spriced = implode(",", $sprice);
		$gasjamid = implode(",", $gasjami);
		$tvitjamid = implode(",", $tvitjami);
		// echo $gasjamid;
		// die();
		$dro = date('Y-m-d');

		$ins = "INSERT INTO chanaweri (type, name, code, mail, addl, addp, phone, tarigi, produqti, raodenoba, mdate, tvjami, gasjami, price, saleprice, user, shenishvna, select_type, obtype, sak, msxvreva, sax, aqcia, saabonento, dgg, xelshekruleba, vada, cocxali, city, contact, cmobile) VALUES ('$type', '$os','$oc','$om','$oaddl','$oaddp','$ot','$ota','$prods','$raod','$dro','$tvitjamid','$gasjamid','$gpriced','$spriced','$logged_name','$shenishvna', '$tab_type', '$obtype', '$sak', '$msxvreva', '$sax', '$aqcia', '$saabonento', '$dgg', '$xelshekruleba', '$vada', '$cocxali', '$city', '$contact', '$cmobile')";
		
		// var_dump($ins);
		$ins = mysqli_query($conn, $ins);
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("forxl/testtemp.xls");

		$objPHPExcel->getActiveSheet()->removeColumn('A');
		$objPHPExcel->getActiveSheet()->setCellValue('E9', "დამკვეთი: " . $_SESSION["name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E11', "საიდენტიფიკაციო კოდი: " . $_SESSION["code"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E12', "მისამართი: " . $_SESSION["addp"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E13', "საკონტაქტო პირი: " . $_SESSION["addl"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E14', "ტელეფონის ნომერი: " . $_SESSION["phone"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D15', "თარიღი: " . $_SESSION["tarigi"]);

		$baseRow = 18;
		foreach($col as $r => $dataRow) {
		$row = $baseRow + $r;
		$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r + 1)
		                  			  ->setCellValue('B'.$row, $dataRow['name'])
		                  			  ->setCellValue('C'.$row, $dataRow['count'])
		                  			  ->setCellValue('D'.$row, $dataRow['price'])
		                  			  ->setCellValue('E'.$row, $dataRow['sumtvit'])
		                  			  ->setCellValue('F'.$row, $dataRow['gasayidi'])
		                  			  ->setCellValue('G'.$row, $dataRow['gassum']);
 		$num2 += 1;
		$gassumsum += $dataRow['gassum'];
		}
			$m = $row + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$m, "ინსტალაციის ღირებულება: ");
			$per = (25 / 100) * $gassumsum;
			$gassumsum = $gassumsum + $per;
			$gassumsum = round($gassumsum);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$m, round($per));			
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$m, round($gassumsum));	
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));

		$to = 'anigelashvili7@gmail.com';

		//sender
		// $from = 'sender@example.com';
		$fromName = 'sales@vss.ge';

		//email subject
		$subject = 'ახალი ინვოისი'; 

		//attachment file path
		$file = "afterhome.xls";

		// //email body content
		$htmlContent = '<h1>ინვოისი</h1>
		<p>გადმოწერეთ ფაილი</p>';

		//header for sender info
		$headers = "From: $fromName"." <".$fromName.">";

		//boundary 
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

		//headers for attachment 
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

		//multipart boundary 
		$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

		//preparing attachment
		if(!empty($file) > 0){
		if(is_file($file)){
		$message .= "--{$mime_boundary}\n";
		$fp =    @fopen($file,"rb");
		$data =  @fread($fp,filesize($file));

		@fclose($fp);
		$data = chunk_split(base64_encode($data));
		$message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
		"Content-Description: ".basename($file)."\n" .
		"Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		}
		}
		$message .= "--{$mime_boundary}--";
		// $returnpath = "-f" . $from;

		//send email
		$mail = @mail($to, $subject, $message, $headers); 

		//email sending status
		if($mail){
			?>
				<script type="text/javascript">
					alert("<?php echo 'მადლობა, შეკვეთა მიღებულია. თქვენი არჩეული პროდუქტის + ინსტალაციის ღირებულება შეადგენს დაახლოებით: ' . json_encode(round($gassumsum));?>");
				window.location.replace("home.php");
			</script>

			<?php
		}else{
			?>
				<script type="text/javascript">alert("მოხდა შეცდომა, სცადეთ თავიდან");</script>
			<?php
		}
	}

	if(isset($_POST["done2"])){
// echo $_POST["select_type"];
		$archeva = mysqli_query($conn, "SELECT * FROM `".$_POST["select_type"]."` ORDER BY cat ASC");
		// echo $archeva;
		// var_dump(mysqli_num_rows($archeva));

		// $num = 1;
		$col = array();
		$pro = array();
		$rao = array();
		$gprice = array();
		$sprice = array();
		$gasjami = array();
		$tvitjami = array();
		$tab_type = $_POST["tab_type"];
		$num = 0;
		while($arr = mysqli_fetch_assoc($archeva)){
			$num += 1;
			$forname = $arr["id"]."-count";
			if($_POST[$forname] !== "0"){
				// echo $arr["saleprice"]."<br>";
				$tempname = $arr["name"]; # სახელი
				$tempquan = $_POST[$forname]; # რაოდენობა
				$tempprice = $arr["price"]; #ფასი
				$sumtvit = $tempprice * $tempquan;
				$gasayidi = $arr["saleprice"];
				// echo $tempquan;
				// echo $gasayidi."<br>";
				$gassum = $gasayidi * $tempquan;
				array_push($pro, $tempname);
				array_push($rao, $tempquan);
				array_push($gprice, $tempprice);
				array_push($sprice, $gasayidi);
				array_push($gasjami, $gassum);
				array_push($tvitjami, $sumtvit);
					$col[] = array(
						"name" => $tempname, 
						"count" => $tempquan, 
						"price" => $tempprice,
						"sumtvit" => $sumtvit,
						"gasayidi" => $gasayidi,
						"gassum" => $gassum
					);


			}else{
				// echo "string";
			}
			// $num += 1;
		}
        
		// print_r($col);

        $type = $_SESSION["type"];
		$os = $_SESSION["name"];
		$oc = $_SESSION["code"];
		$om = $_SESSION["mail"];
		$ot = $_SESSION["phone"];
		$oaddl = $_SESSION["addl"];
		$oaddp = $_SESSION["addp"];
		$ota = $_SESSION["tarigi"];
		// axlebi
		$obtype = $_SESSION["obtype"];
		$sak = $_SESSION["sak"];
		$msxvreva = $_SESSION["msxvreva"];
		$sax = $_SESSION["sax"];
		$aqcia = $_SESSION["aqcia"];
		$saabonento = $_SESSION["saabonento"];
		$dgg = $_SESSION["dgg"];
		$xelshekruleba = $_SESSION["xelshekruleba"];
		$vada = $_SESSION["vada"];
		$cocxali = $_SESSION["cocxali"];
		$contact = $_SESSION["contact"];
		$cmobile = $_SESSION["cmobile"];

		// axlebi
		$shenishvna = $_SESSION["shenishvna"];
		$prods = implode(",", $pro);
		$raod = implode(",", $rao);
		$gpriced = implode(",", $gprice);
		$spriced = implode(",", $sprice);
		$gasjamid = implode(",", $gasjami);
		$tvitjamid = implode(",", $tvitjami);
		
		$dro = date('Y-m-d');

		$ins = "INSERT INTO chanaweri (type, name, code, mail, addl, addp, phone, tarigi, produqti, raodenoba, mdate, tvjami, gasjami, price, saleprice, user, shenishvna, select_type, obtype, sak, msxvreva, sax, aqcia, saabonento, dgg, xelshekruleba, vada, cocxali, contact, cmobile) VALUES ('$type', '$os','$oc','$om','$oaddl','$oaddp','$ot','$ota','$prods','$raod','$dro','$tvitjamid','$gasjamid','$gpriced','$spriced','$logged_name','$shenishvna', '$tab_type', '$obtype', '$sak', '$msxvreva', '$sax', '$aqcia', '$saabonento', '$dgg', '$xelshekruleba', '$vada', '$cocxali', '$contact', '$cmobile')";
	
		// var_dump($ins);
		$ins = mysqli_query($conn, $ins);
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("forxl/testtemp.xls");

		$objPHPExcel->getActiveSheet()->removeColumn('A');
		$objPHPExcel->getActiveSheet()->setCellValue('E9', "დამკვეთი: " . $_SESSION["name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E11', "საიდენტიფიკაციო კოდი: " . $_SESSION["code"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E12', "მისამართი: " . $_SESSION["addp"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E13', "საკონტაქტო პირი: " . $_SESSION["addl"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E14', "ტელეფონის ნომერი: " . $_SESSION["phone"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D15', "თარიღი: " . $_SESSION["tarigi"]);

		$baseRow = 18;
		foreach($col as $r => $dataRow) {
		$row = $baseRow + $r;
		$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r + 1)
		                  			  ->setCellValue('B'.$row, $dataRow['name'])
		                  			  ->setCellValue('C'.$row, $dataRow['count'])
		                  			  ->setCellValue('D'.$row, $dataRow['price'])
		                  			  ->setCellValue('E'.$row, $dataRow['sumtvit'])
		                  			  ->setCellValue('F'.$row, $dataRow['gasayidi'])
		                  			  ->setCellValue('G'.$row, $dataRow['gassum']);
		  $num2 += 1;
		  // $tt = $dataRow['gassum'];
		  $gassumsum += $dataRow['gassum'];
		}
			$m = $row + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$m, "ინსტალაციის ღირებულება: ");
			// echo $tt;
			// $gassumsum = 12;
			// echo $_POST["tab_type"];
			// echo $gassumsum."<br>";
			if($_POST["tab_type"] == "უსადენო"){
				$per = (10 / 100) * $gassumsum;
				$gassumsum = $gassumsum + $per;
				// $per_2 = (20 / 100) * $gassumsum;
				// $gassumsum = $per_2 + $gassumsum;
			}else if($_POST["tab_type"] == "თორმეტზე_მეტი"){
				$per = (10 / 100) * $gassumsum;	
				$gassumsum = $gassumsum + $per;
				$per_2 = (20 / 100) * $gassumsum;
				$gassumsum = $per_2 + $gassumsum;
			}else if($_POST["tab_type"] == "HD_კამერები"){
				$per = (20 / 100) * $gassumsum;
				$gassumsum = $gassumsum + $per;
				$per_2 = (20 / 100) * $gassumsum;
				$gassumsum = $per_2 + $gassumsum;
			}else{
				// $per = (10 / 100) * $gassumsum;
				// $gassumsum = $gassumsum + $per;
			}
			$gassumsum = round($gassumsum);
			// die();
			// $per = (10 / 100) * $gassumsum;
			// $gassumsum = $gassumsum + $per;
			// $per_2 = (20 / 100) * $gassumsum;
			// $gassumsum = $per_2 + $gassumsum;
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$m, round($per));			
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$m, round($gassumsum));	

		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));

		$to = 'e.gabrielashvili@vss.ge';

		//sender
		// $from = 'sender@example.com';
		$fromName = 'sales@vss.ge';

		//email subject
		$subject = 'ახალი ინვოისი'; 

		//attachment file path
		$file = "afterhome.xls";

		// //email body content
		$htmlContent = '<h1>ინვოისი</h1>
		<p>გადმოწერეთ ფაილი</p>';

		//header for sender info
		$headers = "From: $fromName"." <".$fromName.">";

		//boundary 
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

		//headers for attachment 
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

		//multipart boundary 
		$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

		//preparing attachment
		if(!empty($file) > 0){
		if(is_file($file)){
		$message .= "--{$mime_boundary}\n";
		$fp =    @fopen($file,"rb");
		$data =  @fread($fp,filesize($file));

		@fclose($fp);
		$data = chunk_split(base64_encode($data));
		$message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
		"Content-Description: ".basename($file)."\n" .
		"Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		}
		}
		$message .= "--{$mime_boundary}--";
		// $returnpath = "-f" . $from;

		//send email
		$mail = @mail($to, $subject, $message, $headers); 

		//email sending status
		if($mail){
			?>
				<script type="text/javascript">
					alert("<?php echo 'მადლობა, შეკვეთა მიღებულია. თქვენი არჩეული პროდუქტის + ინსტალაციის ღირებულება შეადგენს დაახლოებით: ' . json_encode(round($gassumsum));?>");
				window.location.replace("home.php");
			</script>

			<?php
		}else{
			?>
				<script type="text/javascript">alert("მოხდა შეცდომა, სცადეთ თავიდან");</script>
			<?php
		}

	}

if(isset($_POST["done3"])){
	$archeva = mysqli_query($conn,"SELECT * FROM ekacamip  ORDER BY cat ASC");
		// $num = 1;
		$col = array();
		$pro = array();
		$rao = array();
		$gprice = array();
		$sprice = array();
		$gasjami = array();
		$tvitjami = array();
		$tab_type = $_POST["tab_type"];

		$num = 0;
		while($arr = mysqli_fetch_assoc($archeva)){
			$num += 1;
			$forname = $arr["id"]."-count";
			// echo $forname;
			if($_POST[$forname] !== "0"){
				// echo $arr["saleprice"]."<br>";
				$tempname = $arr["name"]; # სახელი
				$tempquan = $_POST[$forname]; # რაოდენობა
				$tempprice = $arr["price"]; #ფასი
				$sumtvit = $tempprice * $tempquan;
				$gasayidi = $arr["saleprice"];
				$gassum = $gasayidi * $tempquan;
				// echo $gassum;
				array_push($pro, $tempname);
				array_push($rao, $tempquan);
				array_push($gprice, $tempprice);
				array_push($sprice, $gasayidi);
				array_push($gasjami, $gassum);
				array_push($tvitjami, $sumtvit);
					$col[] = array(
						"name" => $tempname, 
						"count" => $tempquan, 
						"price" => $tempprice,
						"sumtvit" => $sumtvit,
						"gasayidi" => $gasayidi,
						"gassum" => $gassum
					);


			}else{
				
			}
			
		}

		// print_r($col);
        
        $type = $_SESSION["type"];
		$os = $_SESSION["name"];
		$oc = $_SESSION["code"];
		$om = $_SESSION["mail"];
		$ot = $_SESSION["phone"];
		$oaddl = $_SESSION["addl"];
		$oaddp = $_SESSION["addp"];
		$ota = $_SESSION["tarigi"];
		// axlebi
		$obtype = $_SESSION["obtype"];
		$sak = $_SESSION["sak"];
		$msxvreva = $_SESSION["msxvreva"];
		$sax = $_SESSION["sax"];
		$aqcia = $_SESSION["aqcia"];
		$saabonento = $_SESSION["saabonento"];
		$dgg = $_SESSION["dgg"];
		$xelshekruleba = $_SESSION["xelshekruleba"];
		$vada = $_SESSION["vada"];
		$cocxali = $_SESSION["cocxali"];
		$contact = $_SESSION["contact"];
		$cmobile = $_SESSION["cmobile"];
		// axlebi
		$shenishvna = $_SESSION["shenishvna"];
		$prods = implode(",", $pro);
		$raod = implode(",", $rao);
		$gpriced = implode(",", $gprice);
		$spriced = implode(",", $sprice);
		$gasjamid = implode(",", $gasjami);
		$tvitjamid = implode(",", $tvitjami);
		// echo $gasjamid;
		$dro = date('Y-m-d');

		$ins = "INSERT INTO chanaweri (type, name, code, mail, addl, addp, phone, tarigi, produqti, raodenoba, mdate, tvjami, gasjami, price, saleprice, user, shenishvna, select_type, obtype, sak, msxvreva, sax, aqcia, saabonento, dgg, xelshekruleba, vada, cocxali, contact, cmobile) VALUES ('$type', '$os','$oc','$om','$oaddl','$oaddp','$ot','$ota','$prods','$raod','$dro','$tvitjamid','$gasjamid','$gpriced','$spriced','$logged_name','$shenishvna', '$tab_type', '$obtype', '$sak', '$msxvreva', '$sax', '$aqcia', '$saabonento', '$dgg', '$xelshekruleba', '$vada', '$cocxali', '$contact', '$cmobile')";
		// die();
		// var_dump($ins);
		$ins = mysqli_query($conn, $ins);
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("forxl/testtemp.xls");

		$objPHPExcel->getActiveSheet()->removeColumn('A');
		$objPHPExcel->getActiveSheet()->setCellValue('E9', "დამკვეთი: " . $_SESSION["name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E11', "საიდენტიფიკაციო კოდი: " . $_SESSION["code"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E12', "მისამართი: " . $_SESSION["addp"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E13', "საკონტაქტო პირი: " . $_SESSION["addl"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E14', "ტელეფონის ნომერი: " . $_SESSION["phone"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D15', "თარიღი: " . $_SESSION["tarigi"]);

		$baseRow = 18;
		$gassumsum = 0;
		foreach($col as $r => $dataRow) {
		$row = $baseRow + $r;
		$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r + 1)
		                  			  ->setCellValue('B'.$row, $dataRow['name'])
		                  			  ->setCellValue('C'.$row, $dataRow['count'])
		                  			  ->setCellValue('D'.$row, $dataRow['price'])
		                  			  ->setCellValue('E'.$row, $dataRow['sumtvit'])
		                  			  ->setCellValue('F'.$row, $dataRow['gasayidi'])
		                  			  ->setCellValue('G'.$row, $dataRow['gassum']);
		         $num2 += 1;

		$gassumsum += $dataRow['gassum'];
		}
			$m = $row + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$m, "ინსტალაციის ღირებულება: ");
			
			$per = (20 / 100) * $gassumsum;
			$gassumsum = $gassumsum + $per;
			$per_2 = (20 / 100) * $gassumsum;
			$gassumsum = $per_2 + $gassumsum;
			$gassumsum = round($gassumsum);
			// echo $gassumsum;
			// exit();
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$m, round($per));			
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$m, round($gassumsum));			

		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));

		$to = 'e.gabrielashvili@vss.ge';

		//sender
		// $from = 'sender@example.com';
		$fromName = 'sales@vss.ge';

		//email subject
		$subject = 'ახალი ინვოისი'; 

		//attachment file path
		$file = "afterhome.xls";

		// //email body content
		$htmlContent = '<h1>ინვოისი</h1>
		<p>გადმოწერეთ ფაილი</p>';

		//header for sender info
		$headers = "From: $fromName"." <".$fromName.">";

		//boundary 
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

		//headers for attachment 
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

		//multipart boundary 
		$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

		//preparing attachment
		if(!empty($file) > 0){
		if(is_file($file)){
		$message .= "--{$mime_boundary}\n";
		$fp =    @fopen($file,"rb");
		$data =  @fread($fp,filesize($file));

		@fclose($fp);
		$data = chunk_split(base64_encode($data));
		$message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
		"Content-Description: ".basename($file)."\n" .
		"Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		}
		}
		$message .= "--{$mime_boundary}--";
		// $returnpath = "-f" . $from;

		//send email
		$mail = @mail($to, $subject, $message, $headers); 

		//email sending status
		if($mail){
			?>
				<script type="text/javascript">
					alert("<?php echo 'მადლობა, შეკვეთა მიღებულია. თქვენი არჩეული პროდუქტის + ინსტალაციის ღირებულება შეადგენს დაახლოებით: ' . json_encode(round($gassumsum));?>");
				window.location.replace("home.php");
			</script>

			<?php
		}else{
			?>
				<script type="text/javascript">alert("მოხდა შეცდომა, სცადეთ თავიდან");</script>
			<?php
		}
}	

if(isset($_POST["done4"])){

	$archeva = mysqli_query($conn,"SELECT * FROM `".$_POST["select_type"]."` ORDER BY cat ASC");
		// $num = 1;
		$col = array();
		$pro = array();
		$rao = array();
		$gprice = array();
		$sprice = array();
		$gasjami = array();
		$tvitjami = array();
		$tab_type = $_POST["tab_type"];
		$num = 0;
		while($arr = mysqli_fetch_assoc($archeva)){
			$num += 1;
			$forname = $arr["id"]."-count";
			if($_POST[$forname] !== "0"){
				// echo $arr["saleprice"]."<br>";
				$tempname = $arr["name"]; # სახელი
				$tempquan = $_POST[$forname]; # რაოდენობა
				$tempprice = $arr["price"]; #ფასი
				$sumtvit = $tempprice * $tempquan;
				$gasayidi = $arr["saleprice"];
				echo $gasayidi."<br>";
				$gassum = $gasayidi * $tempquan;
				array_push($pro, $tempname);
				array_push($rao, $tempquan);
				array_push($gprice, $tempprice);
				array_push($sprice, $gasayidi);
				array_push($gasjami, $gassum);
				array_push($tvitjami, $sumtvit);
					$col[] = array(
						"name" => $tempname, 
						"count" => $tempquan, 
						"price" => $tempprice,
						"sumtvit" => $sumtvit,
						"gasayidi" => $gasayidi,
						"gassum" => $gassum
					);


			}else{
				// echo "string";
			}
			// $num += 1;
		}
        
		$os = $_SESSION["name"];
		$oc = $_SESSION["code"];
		$om = $_SESSION["mail"];
		$ot = $_SESSION["phone"];
		$oaddl = $_SESSION["addl"];
		$oaddp = $_SESSION["addp"];
		$ota = $_SESSION["tarigi"];
		// axlebi
		$obtype = $_SESSION["obtype"];
		$sak = $_SESSION["sak"];
		$msxvreva = $_SESSION["msxvreva"];
		$sax = $_SESSION["sax"];
		$aqcia = $_SESSION["aqcia"];
		$saabonento = $_SESSION["saabonento"];
		$dgg = $_SESSION["dgg"];
		$xelshekruleba = $_SESSION["xelshekruleba"];
		$vada = $_SESSION["vada"];
		$cocxali = $_SESSION["cocxali"];
		$contact = $_SESSION["contact"];
		$cmobile = $_SESSION["cmobile"];
		// axlebi
		$shenishvna = $_SESSION["shenishvna"];
		$prods = implode(",", $pro);
		$raod = implode(",", $rao);
		$gpriced = implode(",", $gprice);
		$spriced = implode(",", $sprice);
		$gasjamid = implode(",", $gasjami);
		$tvitjamid = implode(",", $tvitjami);
		
		$dro = date('Y-m-d');

		$ins = "INSERT INTO chanaweri (type, name, code, mail, addl, addp, phone, contact, cmobile, tarigi, produqti, raodenoba, mdate, tvjami, gasjami, price, saleprice, user, shenishvna, select_type, obtype, sak, msxvreva, sax, aqcia, saabonento, dgg, xelshekruleba, vada, cocxali) VALUES ('$type', '$os','$oc','$om','$oaddl','$oaddp','$ot','$contact','$cmobile','$ota','$prods','$raod','$dro','$tvitjamid','$gasjamid','$gpriced','$spriced','$logged_name','$shenishvna', '$tab_type', '$obtype', '$sak', '$msxvreva', '$sax', '$aqcia', '$saabonento', '$dgg', '$xelshekruleba', '$vada', '$cocxali')";
	
		// var_dump($ins);
		$ins = mysqli_query($conn, $ins);
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("forxl/testtemp.xls");

		$objPHPExcel->getActiveSheet()->removeColumn('A');
		$objPHPExcel->getActiveSheet()->setCellValue('E9', "დამკვეთი: " . $_SESSION["name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E11', "საიდენტიფიკაციო კოდი: " . $_SESSION["code"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E12', "მისამართი: " . $_SESSION["addp"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E13', "საკონტაქტო პირი: " . $_SESSION["addl"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E14', "ტელეფონის ნომერი: " . $_SESSION["phone"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D15', "თარიღი: " . $_SESSION["tarigi"]);

		$baseRow = 18;
		foreach($col as $r => $dataRow) { 
		$row = $baseRow + $r;
		$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r + 1)
		                  			  ->setCellValue('B'.$row, $dataRow['name'])
		                  			  ->setCellValue('C'.$row, $dataRow['count'])
		                  			  ->setCellValue('D'.$row, $dataRow['price'])
		                  			  ->setCellValue('E'.$row, $dataRow['sumtvit'])
		                  			  ->setCellValue('F'.$row, $dataRow['gasayidi'])
		                  			  ->setCellValue('G'.$row, $dataRow['gassum']);
		 $num2 += 1;
		$gassumsum += $dataRow['gassum'];
		}
			$m = $row + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$m, "ინსტალაციის ღირებულება: ");
				$per = (20 / 100) * $gassumsum;
				$gassumsum = $gassumsum + $per;
				$per_2 = (20 / 100) * $gassumsum;
				$gassumsum = $per_2 + $gassumsum;
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$m, round($per));			
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$m, round($gassumsum));	
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
		$gassumsum = round($gassumsum);
		// die();
		$to = 'e.gabrielashvili@vss.ge';

		//sender
		// $from = 'sender@example.com';
		$fromName = 'sales@vss.ge';

		//email subject
		$subject = 'ახალი ინვოისი'; 

		//attachment file path
		$file = "afterhome.xls";

		// //email body content
		$htmlContent = '<h1>ინვოისი</h1>
		<p>გადმოწერეთ ფაილი</p>';

		//header for sender info
		$headers = "From: $fromName"." <".$fromName.">";

		//boundary 
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

		//headers for attachment 
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

		//multipart boundary 
		$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

		//preparing attachment
		if(!empty($file) > 0){
		if(is_file($file)){
		$message .= "--{$mime_boundary}\n";
		$fp =    @fopen($file,"rb");
		$data =  @fread($fp,filesize($file));

		@fclose($fp);
		$data = chunk_split(base64_encode($data));
		$message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
		"Content-Description: ".basename($file)."\n" .
		"Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		}
		}
		$message .= "--{$mime_boundary}--";
		// $returnpath = "-f" . $from;

		//send email
		$mail = @mail($to, $subject, $message, $headers); 

		//email sending status
		if($mail){
			?>
				<script type="text/javascript">
					alert("<?php echo 'მადლობა, შეკვეთა მიღებულია. თქვენი არჩეული პროდუქტის + ინსტალაციის ღირებულება შეადგენს დაახლოებით: ' . json_encode(round($gassumsum));?>");
				window.location.replace("home.php");
			</script>

			<?php
		}else{
			?>
				<script type="text/javascript">alert("მოხდა შეცდომა, სცადეთ თავიდან");</script>
			<?php
		}
}
?>

<div class="container" id="cont"><br><br><br>
  <ul class="nav nav-tabs">
    <button type="button" class="btn btn-default"> <li><a href="#menu1"><b>სადენიანი სიგნალიზაცია  (12 დეტექტორამდე)</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu6"><b>სადენიანი სიგნალიზაცია (12+ დეტექტორი)</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu2"><b>უსადენო სიგნალიზაცია</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu3"><b>IP კამერები</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu7"><b>HD კამერები</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu4"><b>დაშვების კონტროლი</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu5"><b>სამისამართო სახანძრო სისტემა</b></a></li></button>
    <button type="button" class="btn btn-default"><li><a href="#menu8"><b>დამატებითი მასალები</b></a></li></button>
  </ul>

  <div class="tab-content">
  	
    <div id="menu1" class="tab-pane fade">
      <h3>სადენიანი სიგნალიზაცია</h3><br>
      <form action="" method="post">
      	<input type="text" value="სადენიანი" name="tab_type" hidden>

      <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekaw  ORDER BY cat ASC");
      ?>
			<?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done1" class="btn btn-primary">დასრულება</button>
			</form>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>უსადენო სიგნალიზაცია</h3>
            <form action="" method="post">
            	<input type="text" value="უსადენო" name="tab_type" hidden>
            	            	<input type="text" value="eka" name="select_type" hidden>

       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM eka ORDER BY cat ASC");
      ?>
			<?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done2" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>IP კამერები</h3>
                  <form action="" method="post">
                  	<input type="text" value="IP_კამერები" name="tab_type" hidden>
       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekacamip ORDER BY cat ASC");
      ?>
 <?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done3" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>დაშვების სისტემები</h3>
                  <form action="" method="post">
                  	<input type="text" value="ekadashveba" name="select_type" hidden>
                  	<input type="text" value="დაშვება" name="tab_type" hidden>

       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekadashveba ORDER BY cat ASC");
      ?>
 <?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done4" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
     <div id="menu5" class="tab-pane fade">
      <h3>სახანძრო სისტემები</h3>
                  <form action="" method="post">
                  	                  	<input type="text" value="სახანძრო" name="tab_type" hidden>

                  	<input type="text" value="ekafire" name="select_type" hidden>

       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekafire ORDER BY cat ASC");
      ?>
 <?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done4" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
    <div id="menu6" class="tab-pane fade">
      <h3>სადენიანი სიგნალიზაცია 12+</h3>
            <form action="" method="post">
            	<input type="text" value="თორმეტზე_მეტი" name="tab_type" hidden>
            	<input type="text" value="ekaw12" name="select_type" hidden>
       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekaw12 ORDER BY cat ASC");
      ?>
			<?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done2" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
    <div id="menu7" class="tab-pane fade">
      <h3>HD კამერები</h3>
            <form action="" method="post">
            	<input type="text" value="HD_კამერები" name="tab_type" hidden>
            	            	<input type="text" value="ekacam" name="select_type" hidden>

       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekacam ORDER BY cat ASC");
      ?>
			<?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done2" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
    <div id="menu8" class="tab-pane fade">
      <h3>დამატებითი მასალები</h3>
            <form action="" method="post">
            	<input type="text" value="HD_კამერები" name="tab_type" hidden>
            	            	<input type="text" value="ekacam" name="select_type" hidden>

       <?php
      	$sel = mysqli_query($conn,"SELECT * FROM ekadamatebiti ORDER BY cat ASC");
      ?>
			<?php
				while($row = mysqli_fetch_assoc($sel)){
					    ?>
					        <input type="text" value="<?php echo $row['name']; ?>" class="form-control" style="float:left;margin-right: 10px;width: 75%;" name="" readonly>
					        <input type="number" value="0" name="<?php echo $row['id'].'-count' ?>" class="form-control" style="width: 15%;"><br>
					    <?php	
				}
			?>
		<br>
			<button name="done2" class="btn btn-primary">დასრულება</button>
		</form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
$("input").blur(function() {
    if($(this).val() == ''){
        $(this).val('0')
    }
});
</script>
