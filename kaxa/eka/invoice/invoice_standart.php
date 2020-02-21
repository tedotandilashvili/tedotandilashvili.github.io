<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<?php
	
	session_start();
	include("../../head.tpl");

	include('../../config.php');
	if(isset($_POST["dasturi"])){
		$sid = $_SESSION["sid"];
		
		require_once '../../forxl/Classes/PHPExcel/IOFactory.php';
		
		$sel = "SELECT * FROM chanaweri WHERE id = '$sid'";
		$sel = mysqli_query($conn, $sel);
		$arr = mysqli_fetch_assoc($sel);

		$pro = explode(",", $arr["produqti"]);
		$rao = explode(",", $arr["raodenoba"]);
		$pr = explode(",", $arr["saleprice"]);
		// $prjami = array_sum($pr);
		// print_r($pr);
		$arrlength = count($pro);
		// echo $prjami;
		
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("test.xls");
		$objPHPExcel->getActiveSheet()->removeColumn('A');

		$objPHPExcel->getActiveSheet()->setCellValue('E6', "თარიღი: " . $arr["mdate"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D9', $arr["name"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D10', "ს/კ: " . $arr["code"]);
		// $objPHPExcel->getActiveSheet()->setCellValue('D11', "ქალაქი: " . $arr["city"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D11', "მისამართი: " . $arr["addp"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D12', "საკონტაქტო პირი: " . $arr["addl"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D13', "ტელეფონის ნომერი: " . $arr["phone"]);
		$objPHPExcel->getActiveSheet()->setCellValue('D14', "ელ-ფოსტა: " . $arr["mail"]);

		// $sell = "SELECT * FROM chanaweri WHERE id = '$sid'";
		// $sell = mysqli_query($conn, $sell);

		$rigi = 18;
		$ric = 1;
		// while($fet = mysqli_fetch_assoc($sell)){	
			
			$jami = 0;
			for($x = 0; $x < $arrlength; $x++) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$rigi, $ric)
												->setCellValue('B'.$rigi, $pro[$x])
												->setCellValue('C'.$rigi, $rao[$x])
												->setCellValue('D'.$rigi, $pr[$x])
												->setCellValue('E'.$rigi, $pr[$x] * $rao[$x]);
												$jami = ($pr[$x] * $rao[$x]) + $jami;
				$rigi++;
				$ric++;
			}

			$objPHPExcel->getActiveSheet()->getStyle('A17:C17:D17:E17:F17')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$tvra = 18;
			while($tvra <= $rigi){
				$objPHPExcel->getActiveSheet()->getStyle('A'.$tvra)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('C'.$tvra)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('D'.$tvra)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('E'.$tvra)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$tvra++;
			}
			// $jamiinsta = (20 / 100) * $jami;
			  $seltype = $arr["select_type"];
			  if($seltype == "თორმეტზე_მეტი"){
					$per1 = (10 / 100) * $jami;
					// echo $per1;
					$jami = $per1 + $jami;
					// echo $jami;
					$jamii = (20 / 100) * $jami;

					$instalacia = $jamii;
					$jami = $jamii + $jami;
					$pro = "+10% + 20%";
					// $jami = 0;
					}else if($seltype == "სადენიანი"){
					$per1 = (25 / 100) * $jami;
					$instalacia = $per1;
					$jami = $jami + $per1; 
					// $per1 = 0;
					$ara = "ara";
					$pro = "+25%";
					}else if($seltype == "უსადენო"){
					$per1 = (10 / 100) * $jami;
					$jami = $jami + $per1; 
					$instalacia = (10 / 100) * $jami;
					$pro = "+10%";
					// $per1 = 0;
					$ara = "ara";
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
			// $jamii = $jami + $instalacia;
			// echo round($jamii);
			// echo "<br>";
			// echo $jami;
			// $rigi = $rigi + 1;
			// echo $seltype;
			// exit();
			
			if($ara !== "ara"){
					$objPHPExcel->getActiveSheet()->setCellValue('B'.$rigi, "დამატებითი მასალები: ");
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$rigi, $per1);
				// echo "ტესტ";
			}

			// exit();

			$rigi = $rigi + 1;
					$objPHPExcel->getActiveSheet()->setCellValue('B'.$rigi, "ინსტალაციის საფასური: ");
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$rigi, $instalacia)->getStyle('E'.$rigi)->getAlignment()->applyFromArray(
    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);
			$rigi = $rigi + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$rigi, "ჯამური ღირებულება: ");
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$rigi, $jami." ლარი")->getStyle('E'.$rigi)->getAlignment()->applyFromArray(
    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);;
			$objPHPExcel->getActiveSheet()->getStyle('D'.$rigi)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$rigi)->getFont()->setBold(true);
			$rigi = $rigi + 3;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$rigi, "შენიშვნა: ". wordwrap($arr["shenishvna"],450,"\n"));
			// $objPHPExcel->getActiveSheet()->getStyle('A'.$rigi)->getFont()->setSize(16);

			
			// $objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);


		// }
			// echo $per1."<br>";
			// echo $instalacia."<br>";
			// echo $jamii;
			// exit();

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
		if($arr["mail"] == $_POST["maili"]){
			$maili = $arr["mail"];
			// echo "string";
		}else{
			$maili = $_POST["maili"];
		}

		$mailebi = explode(",", $arr["sentmails"]);
		// $sig = count($mailebi);
		// $tvla = 0;
		$date = date('Y-m-d');
		if($arr["sentmails"] == ""){
			$upd = "UPDATE chanaweri SET sentmails = '$maili', sentdate = '$date'  WHERE id = '$sid'";
			// var_dump($upd);
			$upd = mysqli_query($conn,$upd);
		}else{
			if(in_array($maili, $mailebi)){

			}else{
				array_push($mailebi, $maili);
				$mailebi = implode(",", $mailebi);
				$upd = "UPDATE chanaweri SET sentmails = '$mailebi', sentdate = '$date' WHERE id = '$sid'";
				// var_dump($upd);
				$upd = mysqli_query($conn, $upd);
			}
			// print_r($mailebi);
		}

		$to = $maili;		// echo $maili;
// exit();
		//sender
		// $from = 'sender@example.com';
		$fromName = 'sales@vss.ge';

		//email subject
		$subject = 'ახალი ინვოისი'; 

		//attachment file path
		$file = "invoice.xls";

		// //email body content
		$htmlContent = '<h1>მოგესალმებით, გთხოვთ, იხილოდ ჩვენს მიერ წარმოდგენილი ინვოისი</h1>
		<p>გადმოწერეთ ფაილი, გისურვებთ წარმატებებს</p>';

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
					alert("ინვოისი წარმატებით გაიგზავნა");
				window.location.replace("index.php");
			</script>

			<?php
		}else{
			?>
				<script type="text/javascript">alert("მოხდა შეცდომა, სცადეთ თავიდან");</script>
			<?php
		}

	}
	if(isset($_GET["id"])){
		$_SESSION["sid"] = $_GET["id"];
		// if($_SERVER['HTTP_REFERER'] != "http://securitas.ge/kaxa/eka/invoice/index.php"){
		// 	// sleep(2);
		// 	// header("location: index.php");
		// 	break;
		// }else{
			
		// }
		?>	
		<div class="center" style="width: 500px;
    height: 200px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -250px;">
			<?php
					$sid = $_SESSION["sid"];

				$sel = "SELECT * FROM chanaweri WHERE id = '$sid'";
				// var_dump($sel);
				$sel = mysqli_query($conn, $sel);
				$arr = mysqli_fetch_assoc($sel);
			?>
			<form method="post" action="">
				<label class="usr">მიმღები:</label><br>
				<input type="mail" value="<?php echo $arr['mail'];?>" name="maili" class="form-control">
				<br><div class="alert alert-warning">
				<strong>ყურადღება !</strong> ნამდვილად გსურთ ქმედების განხორციელება?
				</div>

				<button name="dasturi" class="btn btn-success">ვადასტურებ</button>
			</form>
			<label>გადაგზავნილია შემდეგ მისამართებზე:</label><br><br>
			<ul class="list-group">
				<?php $listi = explode(",",$arr["sentmails"]);?>
				<?php foreach($listi as $value){ ?>	
					<li class="list-group-item"><?php echo $value; ?></li>
				<?php } ?>
			</ul>
		</div>
		<?php
	}else{
		header("location: index.php");
	}
?>

