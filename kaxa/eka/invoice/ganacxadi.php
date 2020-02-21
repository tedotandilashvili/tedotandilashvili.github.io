<?php
  	session_start();
  	include('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Victoria Security</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: ghostwhite;">
	<?php 
	  	$id = $_GET['id'];
	    $obj = $conn->query("SELECT * FROM chanaweri WHERE id=$id")->fetch_object();
	?>
  	<a href="index.php"><button class="btn btn-danger">უკან დაბრუნება</button></a>
	<center> 
	  <img src="logo.png" style="width: 80px;">
	  </center>
	  <br>
        <form action="" method="POST" name="forma">
        	<input type="hidden" name="id" value="<?php echo $id; ?>;">
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <td>1</td>
        <td>განაცხადის თარიღი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->mdate; ?>" name="cspdate"> </td>
      </tr>
    </thead>

    <tbody>
      <tr>
      	<td></td>
        <td>ორგანიზაციის სამართლებრივი ფორმა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->type; ?>" name="type"> </td>
      </tr>
      <tr>
        <td>2</td>
        <td>ქალაქი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->city; ?>" name="city"> </td>
      </tr>
      <tr>
        <td>3</td>
        <td>დამკვეთი ორგანიზაცია</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->name; ?>" name="name"> </td>
      </tr>
      <tr>
        <td>4</td>
        <td>ს/კ ან პ/ნ</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->code; ?>" name="code"> </td>
      </tr>
      <tr>
        <td>5</td>
        <td>ფაქტიური მისამართი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->addp; ?>" name="addp"> </td>
      </tr>
      <tr>
        <td>6</td>
        <td>იურიდიული მისამართი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->iuridiuli; ?>" name="iuridiuli"> </td>
      </tr>
      <tr>
        <td>7</td>
        <td>ობიექტის ტიპი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->obtype; ?>" name="obtype"> </td>
      </tr>
      <tr>
        <td>8</td>
        <td>ობიექტის საკუთრების ფორმა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->sak; ?>" name="sak"> </td>
      </tr>
      <tr>
        <td>9</td>
        <td>ელ.ფოსტა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->mail; ?>" name="mail"> </td>
      </tr>
      <tr>
        <td>10</td>
        <td>მომსახურება ცსპ-ზე/ საგანგაშო ღილაკზე დაცვის საათები</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->csp; ?>" name="csp"> </td>
      </tr>
      <tr>
        <td>11</td>
        <td>გადამცემის ნომერი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->gadamcemi; ?>" name="gadamcemi"> </td>
      </tr>
      <tr>
        <td>12</td>
        <td>ზონების გაშიფვრა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->zone; ?>" name="zone"> </td>
      </tr>
      <tr>
        <td>13</td>
        <td>მსხვრევის დეტექტორი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->msxvreva; ?>" name="msxvreva"> </td>
      </tr>
      <tr>
        <td>14</td>
        <td>სახანძრო დეტექტორი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->sax; ?>" name="sax"> </td>
      </tr>
      <tr>
        <td>15</td>
        <td>ხელშეკრულების სახეობა (აქცია)</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->aqcia; ?>" name="aqcia"> </td>
      </tr>
      <tr>
        <td>16</td>
        <td>ყოველთვიური სააბონენტო დღგ-ს ჩათვლით</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->saabonento; ?>" name="saabonento"> </td>
      </tr>
      <tr>
        <td>17</td>
        <td>დღგ-ს გადამხდელი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->dgg; ?>" name="dgg"> </td>
      </tr>
      <tr>
        <td>18</td>
        <td>ხელმძღვანელის გვარი, სახელი და თანამდებობა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->addl; ?>" name="addl" > </td>
      </tr>
      <tr>
        <td>19</td>
        <td>ხელმძღვანელის საკონტაქტო ნომერი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->phone; ?>" name="phone"> </td>
      </tr>
      <tr>
        <td>20</td>
        <td>პასუხისმგებელი პირის სახელი, გვარი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->contact; ?>" name="contact"> </td>
      </tr>
        <td>21</td>
        <td>პასუხისმგებელი პირის ტელეფონის ნომერი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->cmobile; ?>" name="cmobile"> </td>
      </tr>
      <tr>
        <td>22</td>
        <td>ხელშეკრულების გაფორმების ვადა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->xelshekruleba; ?>" name="xelshekruleba"> </td>
      </tr>
      <tr>
        <td>23</td>
        <td>ხელშეკრულების მოქმედების ვადა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->vada; ?>" name="vada"> </td>
      </tr>
      <tr>
        <td>24</td>
        <td>დაცულია თუ არა ობიექტი ცოცხალი ძალით (აღჭ, რაცია, ან სხვ)</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->cocxali; ?>" name="cocxali"> </td>
      </tr>
      <tr>
        <td>25</td>
        <td>ობიექტის ჩახსნის თარიღი</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->chaxsna; ?>" name="chaxsna"> </td>
      </tr>
      <tr>
        <td>26</td>
        <td>შენიშვნა</td>
        <td><input type="text" class="form-control" value="<?php echo $obj->shenishvna; ?>" name="shenishvna"> </td>
      </tr>
    </tbody>

  </table>
  <br />
  <center>
	<div style="width: 250px;">
	  <input type="submit" name="submit" class="form-control btn-danger" value="დამატება">
	</div>
	</center>
</div>
</form>
</div>

<br>

<?php
	if(isset($_POST['submit']) && $_POST['submit']=="დამატება"){
        $id = $_POST['id'];
        $type = $_POST['type'];
		$name = $_POST['name'];
		$code = $_POST['code'];
		$mail = $_POST['mail'];
        $city = $_POST['city'];
        $addl = $_POST['addl'];
		$addp = $_POST['addp'];
		$phone = $_POST['phone'];
        $tarigi = $_POST['tarigi'];
        $contact = $_POST['contact'];
        $cmobile = $_POST['cmobile'];
        $shenishvna = $_POST["shenishvna"];
        $obtype = $_POST["obtype"];
        $sak = $_POST["sak"];
        $msxvreva = $_POST["msxvreva"];
        $sax = $_POST["sax"];
        $aqcia = $_POST["aqcia"];
        $saabonento = $_POST["saabonento"];
        $dgg = $_POST["dgg"];
        $xelshekruleba = $_POST["xelshekruleba"];
        $vada = $_POST["vada"];
        $cocxali = $_POST["cocxali"];
        $iuridiuli = $_POST["iuridiuli"];
        $csp = $_POST["csp"];
        $gadamcemi = $_POST["gadamcemi"];
        $zone = $_POST["zone"];
        $date = $_POST["cspdate"];

        $date = date("Y-m-d");

        // $dro = date('Y-m-d');
		//$save = "INSERT INTO chanaweri (type, name, code, mail, city, addl, addp, phone, tarigi, contact, cmobile, obtype, sak, msxvreva, sax, aqcia, saabonento, dgg, xelshekruleba, vada, cocxali, iuridiuli, csp, gadamcemi, zone, shenishvna) VALUES ('$type', '$name', '$code', '$mail', '$city', '$addl', '$addp', '$phone', '$tarigi', '$contact', '$cmobile', '$obtype', '$sak', '$msxvreva', '$sax', '$aqcia', '$saabonento', '$dgg', '$xelshekruleba', '$vada', '$cocxali', '$iuridiuli', '$csp', '$gadamcemi', '$zone', '$shenishvna')";
		// var_dump($save);

		$update = "UPDATE chanaweri SET type='$type', name='$name', cspdate='$date', code='$code', mail='$mail', city='$city', addl='$addl', addp='$addp', phone='$phone', tarigi='$tarigi', contact='$contact', cmobile='$cmobile', shenishvna='$shenishvna', obtype='$obtype', sak='$sak', msxvreva='$msxvreva', sax='$sax', aqcia='$aqcia', saabonento='$saabonento', dgg='$dgg', xelshekruleba='$xelshekruleba', vada='$vada', cocxali='$cocxali', iuridiuli='$iuridiuli',csp='$csp', gadamcemi='$gadamcemi', zone='$zone'  WHERE id=$id";
		echo $update;
		$save = $conn->query($update);
		
		if($save){
			echo "<script>alert('წარმატება');</script>";
			header("Location: index.php");
		}else{
			echo "<script>alert('შეცდომა, შეამოწმეთ შევსებული ველები ან დაუკავშირდით ადმინისტრატორს');</script>";
		}
	}
	?>
<br>
</body>
</html>
