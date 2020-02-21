<?php
  session_start();
  include('../../config.php');

  if(isset($_POST["dasruleba"])){

    $itemra = $_SESSION["itemrao"];




    
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
    $select = "SELECT * FROM csp WHERE id = '$aidi'";
    $select = mysqli_query($conn, $select);
    $prod = mysqli_fetch_assoc($select);
    $shenishvna = $prod["shenishvna"];
    $_SESSION["shenishvna"] = $shenishvna;
    $name = $prod["name"];
    $_SESSION["name"] = $name;
    $code = $prod["code"];
    $_SESSION["code"] = $code;
    $city = $prod["city"];
    $_SESSION["city"] = $city;
    $tarigi = $prod["tarigi"];
    $_SESSION["tarigi"] = $tarigi;
    $type = $prod["type"];
    $_SESSION["type"] = $type;
    $mail = $prod["mail"];
    $_SESSION["mail"] = $mail;
    $addl = $prod["addl"];
    $_SESSION["addl"] = $addl;
    $addp = $prod["addp"];
    $_SESSION["addp"] = $addp;
    $phone = $prod["phone"];
    $_SESSION["phone"] = $phone;
    $contact = $prod["contact"];
    $_SESSION["contact"] = $contact;
    $cmobile = $prod["cmobile"];
    $_SESSION["cmobile"] = $cmobile;
    $gadamcemi = $prod["gadamcemi"];
    $_SESSION["gadamcemi"] = $gadamcemi;

    $own = $prod["own"];
    $_SESSION["own"] = $own;
    $gsm = $prod["gsm"];
    $_SESSION["gsm"] = $gsm;
    $price = $prod["price"];
    $_SESSION["price"] = $price;
    $zona = $prod["zona"];
    $_SESSION["zona"] = $zona;
    $msxvreva = $prod["msxvreva"];
    $_SESSION["msxvreva"] = $msxvreva;
    $saxandzro = $prod["saxandzro"];
    $_SESSION["saxandzro"] = $saxandzro;
    $aqcia = $prod["aqcia"];
    $_SESSION["aqcia"] = $aqcia;
    $saabonento = $prod["saabonento"];
    $_SESSION["saabonento"] = $saabonento;
    $tax = $prod["tax"];
    $_SESSION["tax"] = $tax;
    $pasuxismgebeli = $prod["pasuxismgebeli"];
    $_SESSION["pasuxismgebeli"] = $pasuxismgebeli;
    $vada = $prod["vada"];
    $_SESSION["vada"] = $vada;
    $cocxali = $prod["cocxali"];
    $_SESSION["cocxali"] = $cocxali;
    $chaxsna = $prod["chaxsna"];
    $_SESSION["chaxsna"] = $chaxsna;
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
   
<td><?php echo $_SESSION["shenishvna"]; ?></td>
  <form action="" method="POST">
    <table class="table"  style="padding-left: 5px; color: black; ">
    <thead>
<tr>
        <td>განაცხადის თარიღი</td>
        <td><?php echo $_SESSION["tarigi"]; ?></td>
      </tr>
      <tr>
        <td>ქალაქი</td>
        <td><?php echo $_SESSION["city"]; ?></td>
      </tr>
      <tr>
        <td>დამკვეთი (ობიექტი) - ორგანიზაცია</td>
        <td><?php echo $_SESSION["name"]; ?></td>
      </tr>
      <tr>
        <td>საიდენთიფიკაციო კოდი ან პ/ნ</td>
        <td><?php echo $_SESSION["code"]; ?></td>
      </tr>
      <tr>
        <td>ობიექტის ფაქტიური მისამართი</td>
        <td><?php echo $_SESSION["addp"]; ?></td>
      </tr>
      <tr>
        <td>ობიექტის იურიდიული მისამართი</td>
        <td><?php echo $_SESSION["addl"]; ?></td>
      </tr>
      <tr>
        <td>ობიექტის ტიპი</td>
        <td><?php echo $_SESSION["type"]; ?></td>
      </tr>
      <tr>
        <td>ობიექტი საკუთრების ფორმა</td>
        <td><?php echo $_SESSION["own"]; ?></td>
      </tr>
      <tr>
        <td>ელექტრონული ფოსტა</td>
        <td><?php echo $_SESSION["mail"]; ?></td>
      </tr>
      <tr>
        <td>მომსახურება: GPRS, KP, VIS, B2 -ზე ცენტრალურ სამეთვალყურეო პულტზე (ცსპ) ან საგანგაშო ღილაკზე დაცვის საათები</td>
        <td><?php echo $_SESSION["gsm"]; ?></td>
      </tr>
      <tr>
        <td>გადამცემის ნომერი</td>
        <td><?php echo $_SESSION["gadamcemi"]; ?></td>
      </tr>
      <tr>
        <td>გას. ფასის ჯამი</td>
        <td><?php echo $_SESSION["price"]; ?></td>
      </tr>
      <tr>
        <td>ზონების გაშიფვრა კი/არა</td>
        <td><?php echo $_SESSION["zona"]; ?></td>
      </tr>
      <tr>
        <td>მსხვრევის დეტექტორი</td>
        <td><?php echo $_SESSION["msxvreva"]; ?></td>
      </tr>
      <tr>
        <td>სახანძრო დეტექტორი</td>
        <td><?php echo $_SESSION["saxandzro"]; ?></td>
      </tr>
      <tr>
        <td>ხელშეკრულების სახეობა აქცია/არა</td>
        <td><?php echo $_SESSION["aqcia"]; ?></td>
      </tr>
      <tr>
        <td>ყოველთვიური სააბონენტო დღგ–ს ჩათვლით</td>
        <td><?php echo $_SESSION["saabonento"]; ?></td>
      </tr>
      <tr>
        <td>დღგ–ს გადამხდელი დღგ/არა</td>
        <td><?php echo $_SESSION["tax"]; ?></td>
      </tr>
      <tr>
        <td>ხელმძღვანელის გვარი, სახელი და თანამდებობა</td>
        <td><?php echo $_SESSION["contact"]; ?></td>
      </tr>
      <tr>
        <td>ხელმძღვანელის საკონტაქტო ტელეფონი</td>
        <td><?php echo $_SESSION["phone"]; ?></td>
      </tr>
      <tr>
        <td>პასუხისმგებელი პირის სახელი, გვარი, ტელეფონის ნომერი</td>
        <td><?php echo $_SESSION["pasuxismgebeli"]; ?></td>
      </tr>
      <tr>
        <td>ხელშეკრულების გაფორმების და მოქმედების ვადა (თარიღი)</td>
        <td><?php echo $_SESSION["vada"]; ?></td>
      </tr>
      <tr>
        <td>დაცულია თუ არა ობიექტი ცოცხალი ძალით (აღჭურვილობა, რაცია ან სხვა)</td>
        <td><?php echo $_SESSION["cocxali"]; ?></td>
      </tr>
      <tr>
        <td>ობიექტის ჩახსნის თარიღი</td>
        <td><?php echo $_SESSION["chaxsna"]; ?></td>
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
       <th>
            </div></th>
    
  <?php

    $selectt = "SELECT * FROM csp WHERE id = '$aidi'";
    $selectt = mysqli_query($conn, $selectt);
    // $tvj

    while($arr = mysqli_fetch_assoc($selectt)){

    ?>

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
    $per1 = (10 / 100) * $jami;
    $jami = $per1 + $jami;
    $jamii = (20 / 100) * $jami;
    $instalacia = $jamii;
    $jami = $jamii + $jami;
    $pro = "+10% + 20%";
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


  <br>
  <label>შენიშვნა:</label>
  <textarea class="form-control" name="shenishvna"><?php echo $_SESSION["shenishvna"]; ?></textarea>
  <br>
  <button type="submit" id="dasr" class="btn btn-success" name="dasruleba">დასრულება</button><br><br><br>
  </form>
</div>
  </body>
</html>
<?php }else{} ?>


<style type="text/css">
  .container {
    max-width: unset!important;
    width: 100%;
  }
</style>