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
<body>
	<?php 
	if(isset($_POST['register'])){
        
        $type = $_POST['type'];
		$name = $_POST['name'];
		$code = $_POST['code'];
		$mail = $_POST['mail'];
        $addl = $_POST['city'];
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
        $iuridiuli["cocxali"] = $iuridiuli;
        $csp = $_POST["csp"];
        $gadamcemi = $_POST["gadamcemi"];
        $zone = $_POST["zone"];
        // $dro = date('Y-m-d');
		$save = "INSERT INTO chanaweri (type, name, code, mail, city, addl, addp, phone, tarigi, contact, cmobile, obtype, sak, msxvreva, sax, aqcia, saabonento, dgg, xelshekruleba, vada, cocxali, iuridiuli, csp, gadamcemi, zone, shenishvna) VALUES ('$type', '$name', '$code', '$mail', '$city', '$addl', '$addp', '$phone', '$tarigi', '$contact', '$cmobile', '$obtype', '$sak', '$msxvreva', '$sax', '$aqcia', '$saabonento', '$dgg', '$xelshekruleba', '$vada', '$cocxali', '$iuridiuli', '$csp', '$gadamcemi', '$zone', '$shenishvna')";
		// var_dump($save);
		$save = $conn->query($save);
		
		if($save){
			echo "<script>alert('წარმატება');</script>";
			header("Location: home.php");
		}else{
			echo "<script>alert('შეცდომა, შეამოწმეთ შევსებული ველები ან დაუკავშირდით ადმინისტრატორს');</script>";
		}
	}
?>
        <form action="" method="POST" name="forma">
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <td>1</td>
        <td>განაცხადის თარიღი</td>
        <td><?php echo ($_SESSION["tarigi"]); ?></td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>2</td>
        <td>ქალაქი</td>
        <td><?php echo ($_SESSION["city"]); ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>დამკვეთი ორგანიზაცია</td>
        <td><?php echo ($_SESSION["name"]); ?></td>
      </tr>
      <tr>
        <td>4</td>
        <td>ს/კ ან პ/ნ</td>
        <td><?php echo ($_SESSION["code"]); ?></td>
      </tr>
      <tr>
        <td>5</td>
        <td>ფაქტიური მისამართი</td>
        <td><?php echo ($_SESSION["addp"]); ?></td>
      </tr>
      <tr>
        <td>6</td>
        <td>იურიდიული მისამართი</td>
        <td><input type="text" value="<?php echo $arr['iuridiuli']?>" name="iuridiuli"> </td>
      </tr>
      <tr>
        <td>7</td>
        <td>ობიექტის ტიპი</td>
        <td><?php echo ($_SESSION["obtype"]); ?></td>
      </tr>
      <tr>
        <td>8</td>
        <td>ობიექტის საკუთრების ფორმა</td>
        <td><?php echo ($_SESSION["sak"]); ?></td>
      </tr>
      <tr>
        <td>9</td>
        <td>ელ.ფოსტა</td>
       <td><input type="text" <?php echo $_SESSION["mail"]; ?> name="mail"> </td>
      </tr>
      <tr>
        <td>10</td>
        <td>მომსახურება ცსპ-ზე/ საგანგაშო ღილაკზე დაცვის საათები</td>
        <td><input type="text" value="<?php echo $arr['csp']?>" name="csp"> </td>
      </tr>
      <tr>
        <td>11</td>
        <td>გადამცემის ნომერი</td>
        <td><input type="text" value="<?php echo $arr['gadamcemi']?>" name="gadamcemi"> </td>
      </tr>
      <tr>
        <td>12</td>
        <td>ზონების გაშიფვრა</td>
        <td><input type="text" value="<?php echo $arr['zone']?>" name="zone"> </td>
      </tr>
      <tr>
        <td>13</td>
        <td>მსხვრევის დეტექტორი</td>
        <td><?php echo ($_SESSION["msxvreva"]); ?></td>
      </tr>
      <tr>
        <td>14</td>
        <td>სახანძრო დეტექტორი</td>
        <td><?php echo ($_SESSION["sax"]); ?></td>
      </tr>
      <tr>
        <td>15</td>
        <td>ხელშეკრულების სახეობა (აქცია)</td>
        <td><?php echo ($_SESSION["aqcia"]); ?></td>
      </tr>
      <tr>
        <td>16</td>
        <td>ყოველთვიური სააბონენტო დღგ-ს ჩათვლით</td>
        <td><?php echo ($_SESSION["saabonento"]); ?></td>
      </tr>
      <tr>
        <td>17</td>
        <td>დღგ-ს გადამხდელი</td>
        <td><?php echo ($_SESSION["dgg"]); ?></td>
      </tr>
      <tr>
        <td>18</td>
        <td>ხელმძღვანელის გვარი, სახელი და თანამდებობა</td>
        <td><?php echo ($_SESSION["addl"]); ?></td>
      </tr>
      <tr>
        <td>19</td>
        <td>ხელმძღვანელის საკონტაქტო ნომერი</td>
        <td><?php echo ($_SESSION["phone"]); ?></td>
      </tr>
      <tr>
        <td>20</td>
        <td>პასუხისმგებელი პირის სახელი, გვარი, ტელეფონის ნომერი</td>
        <td><?php echo ($_SESSION["contact"]); ?></td>
      </tr>
      <tr>
        <td>21</td>
        <td>ხელშეკრულების გაფორმების ვადა</td>
        <td><?php echo ($_SESSION["xelshekruleba"]); ?></td>
      </tr>
      <tr>
        <td>22</td>
        <td>ხელშეკრულების მოქმედების ვადა</td>
        <td><?php echo ($_SESSION["vada"]); ?></td>
      </tr>
      <tr>
        <td>23</td>
        <td>დაცულია თუ არა ობიექტი ცოცხალი ძალით (აღჭ, რაცია, ან სხვ)</td>
        <td><?php echo ($_SESSION["cocxali"]); ?></td>
      </tr>
      <tr>
        <td>24</td>
        <td>ობიექტის ჩახსნის თარიღი</td>
        <td><input type="text" value="<?php echo $arr['chaxsna']?>" name="chaxsna"> </td>
      </tr>
      <tr>
        <td>25</td>
        <td>შენიშვნა</td>
        <td><td><td><input type="text" value="<?php echo $arr['shenishvna']?>" name="shenishvna"> </td></td></td>
      </tr>
    </tbody>
  </table>
                  <input type="submit" name="register" class="form-control btn-danger" value="დამატება">

</div>

</body>
</html>
