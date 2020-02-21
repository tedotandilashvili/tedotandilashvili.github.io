<?php
	$archeva = mysqli_query($conn,"SELECT * FROM eka");
		// $num = 1;
		$col = array();
		$pro = array();
		$rao = array();
		$gprice = array();
		$sprice = array();
		$gasjami = array();
		$tvitjami = array();

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
		$prods = implode(",", $pro);
		$raod = implode(",", $rao);
		$gpriced = implode(",", $gprice);
		$spriced = implode(",", $sprice);
		$gasjamid = implode(",", $gasjami);
		$tvitjamid = implode(",", $tvitjami);
		

		$ins = "INSERT INTO chanaweri (name, code, mail, addl, addp, phone, tarigi, produqti, raodenoba, tvjami, gasjami, price, saleprice, user) VALUES ('$os','$oc','$om','$oaddl','$oaddp','$ot','$ota','$prods','$raod','$gpriced','$spriced','$gasjamid','$tvitjamid','$logged_name')";
		// var_dump($ins);
		$ins = mysqli_query($conn, $ins);
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("forxl/testtemp.xls");

		$objPHPExcel->getActiveSheet()->setCellValue('E9', "დამკვეთი: " . $_SESSION["name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E11', "საიდენტიფიკაციო კოდი: " . $_SESSION["code"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E12', "მისამართი: " . $_SESSION["addp"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E13', "საკონტაქტო პირი: " . $_SESSION["addl"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E14', "ტელეფონის ნომერი: " . $_SESSION["phone"]);
		$objPHPExcel->getActiveSheet()->setCellValue('E15', "თარიღი: " . $_SESSION["tarigi"]);

		$baseRow = 18;
		foreach($col as $r => $dataRow) {
		$row = $baseRow + $r;
		$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $r + 1)
		                  			  ->setCellValue('C'.$row, $dataRow['name'])
		                  			  ->setCellValue('D'.$row, $dataRow['count'])
		                  			  ->setCellValue('E'.$row, $dataRow['price'])
		                  			  ->setCellValue('F'.$row, $dataRow['sumtvit'])
		                  			  ->setCellValue('G'.$row, $dataRow['gasayidi'])
		                  			  ->setCellValue('H'.$row, $dataRow['gassum']);
		         $num2 += 1;
		$gassumsum += $dataRow['gassum'];
		$tvitg += $dataRow['sumtvit'];
		if($num2 == $num){
			$m = $row + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$m, "ინსტალაციის ღირებულება: ");
			$per = ($gassumsum * 20) / 100;
			$gassumsum = $gassumsum + $per;
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$m, $tvitg);			
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$m, $gassumsum);			
		}else{

		}
		}


		$percentage = 20;
		// $totalWidth = 350;
		$ociproc = ($percentage / 100) * ($gasayidi * $tempquan);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));

		$to = 'sumoo.burduli@gmail.com';

		//sender
		// $from = 'sender@example.com';
		$fromName = 'noreply@securitas.ge';

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
					alert("<?php echo 'მადლობა, შეკვეთა მიღებულია. თქვენი არჩეული პროდუქტის + ინსტალაციის ღირებულება შეადგენს დაახლოებით: ' . json_encode($gassumsum);?>");
				// window.location.replace("home.php");
			</script>

			<?php
		}else{
			?>
				<script type="text/javascript">alert("მოხდა შეცდომა, სცადეთ თავიდან");</script>
			<?php
		}

?>