<?php
   session_start();
   require "conn.php";
   error_reporting(0);  
  $aidi = $_GET["id"];   
 // $id = $_SESSION["id"];
 $id = $_SESSION["ID"];
   $sele = mysqli_query($connection, "SELECT * FROM users WHERE id = '$id'");
   $sele = mysqli_fetch_assoc($sele);
   if($_SESSION["ID"] == ""){
    header("Location: index.php");
   }else{
   }
   $sel = mysqli_query($connection,"SELECT * FROM obieqtebi WHERE id = '$aidi'");
   $sel1 = mysqli_fetch_assoc($sel);

?>
<?php

  if(isset($_POST["dasturi"])){
$cxrilistarigi = $_POST["cxrilistarigi"];
    $mcv_rao = $_POST["mcv_rao"];
    $comment = $_POST["comment"];
    $mcvelebi = implode(",", $_POST["saxeli"]);
    $telefoni = implode(",", $_POST["nomeri"]);

    $x = 1; 
    $dgeebi = array();
    while($x <= $mcv_rao){
      $pos = "dge".$x;
      $pu = implode(",", $_POST[$pos]);
      $dgeebi[] = $pu;
      $dgeebi[] = "-";
      $x++;
    }
    $dgeebi = implode("", $dgeebi);
    $dgeebi = explode("-", $dgeebi);
array_pop($dgeebi);
  $dgeebi = implode("-", $dgeebi);


  $shetana = "UPDATE obieqtebi SET morige = '$mcvelebi', phone = '$telefoni', dge1 = '$dgeebi', cxrilistarigi = '$cxrilistarigi', comment = '$comment' WHERE id = $aidi";
  //var_dump($shetana);
  $shetana = mysqli_query($connection, $shetana);
  if($shetana){
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
       header("Location: $actual_link");?>
        <script type="text/javascript">alert("წარმატება");</script>
<?php
  }else{

  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
       header("Location: $actual_link");?>
          <script type="text/javascript">alert("მოხდა შეცდომა");</script>
<?php
  } 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>მორიგეობის გრაფიკი</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="overflow-x:scroll;margin: 20px; ">
<div style="font-size: 16px;"><p>ვამტკიცებ</p><p>შ.პ.ს. "ვიქტორია სექიურითი"-ს </p><p>კადრების სამსახურის უფროსი &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp /მ.ლეონიძე/</p></div> 
    <form method="POST" action="">
<td><input type="date" name="cxrilistarigi" class="form-control" style="width: 165px;" value='<?php echo $sel1["cxrilistarigi"];?>'> </td>
<center><img src="logo.png" style=" width: 250px; text-align: right;"></center>
<p style="text-align: right; padding-right: 40px; font-size: 18px;">საძახისის ნომერი: |<?php echo $sel1["sadzaxisi"];?>|</p>
<center><b style="font-size: 20px;"><?php echo $sel1["dasaxeleba"];?></b></center>
<center><b style="font-size: 20px;"><u><i>მორიგეობის გრაფიკი</i></u></b></center><br><br>


          <table class="table" id="table">
  <thead class="thead-light">
    <tr>
   <th scope="col">მცველის სახელი, გვარი</th>
      <th scope="col">ტელ. ნომერი</th>
    <?php
        for ($i=1; $i <=31 ; $i++) { 
          ?>
          <th scope="col"><?php echo $i ?></th>
          <?php
        }
      ?>
    </tr>
  </thead>
  <tbody>
      <?php
        if($sel1["morige"]){
          // echo $sel1["morige"];
          // $morige = $sel1["morige"];
          $ricx = $sel1["morige"];
          $teles = $sel1["phone"];
          $days = $sel1["dge1"];
          $morige = explode(",", $ricx);
          $teles = explode(",", $teles);
          $days = explode("-", $days);
          //array_pop($days);
          // $days = implode(",", $days);
          // echo $days;


          $ricx = explode(",", $ricx);
          $ricx = count($ricx);
          $lr = 1;
          while($lr <= $ricx){
            $dd = explode(",", $days[$lr-1]);
             
            ?>
               <tr>
     <td><input type="text" name="saxeli[]"  value="<?php echo $morige[$lr-1]?>"></td>
        <td><input type="text" name="nomeri[]"  value="<?php echo $teles[$lr-1]?>"></td>
      
      <?php
        for ($i=1; $i <=31 ; $i++) { 
    if(in_array($i, $dd)){          
  ?>
          <td><input type="checkbox" name="dge<?php echo $lr;?>[]" value="<?php echo $i?>" checked></td>
          <?php
}else{?>
            <td><input type="checkbox" name="dge<?php echo $lr;?>[]" value="<?php echo $i?>" ></td>
<?php
}
        }
      ?>

      </tr>
            <?php
            $lr++;
          }
        }else{
          ?>
      <tr>
     <td><input type="text" name="saxeli[]" placeholder="სახელი, გვარი"></td>
        <td><input type="text" name="nomeri[]"  placeholder="ტელ. ნომერი"></td>
      
      <?php
        for ($i=1; $i <=31 ; $i++) { 
          ?>
          <td><input type="checkbox" name="dge1[]" value="<?php echo $i?>"></td>
          <?php
        }
      ?>

      </tr>
          <?php
        }
      ?>
    </tbody>
</table>
<style>
body {
  -webkit-print-color-adjust: exact !important;
}
@media print {
	body {margin: 20px;}
  #printPageButton{
    display: none;
  }
  #ted{
    display: none;
  }
  #mtavari{
    display: none;
  }
    #mcvrao{
    display: none;
  }
  #comment{
    display: none;
  }
  #add {display:none;}
input {border: none;}
}
</style>
<input type="text" class="form-control" id="comment" placeholder="მიუთითეთ კომენტარი" value="<?php echo $sel1['comment']?>" name="comment"><br><br>
<?php
  if($sele["permission"] == "root"){
?>
<input type="number" class="form-control" id="mcvrao" placeholder="მიუთითეთ მცველების რაოდენობა" name="mcv_rao" required><br><br>

<button id="mtavari" onclick="window.location.href='/racia/home.php'" class="btn btn-primary">მთავარი გვერდი</button><br><br>
      <button id="ted" class="btn btn-success" name="dasturi">დამახსოვრება</button>
      <button id="add" class="btn btn-primary">ახლის დამატება</button><br><br>
<?php } ?>
      <br><br></form>
      <button id="printPageButton" onClick="window.print();" class="btn btn-primary">ამობეჭდვა / შენახვა</button>

<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"
  ></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
<style type="text/css">
  #table th, td {
    border: 1px solid black;
  }
</style>
<script>  
 $(document).ready(function(){  
      var i = <?php if($lr > 0){echo $lr;}else{echo "2";} ?>;
var i = i - 1;  
      $('#add').click(function(){  
           i++;  
           $('#table').append('<tr id="row'+i+'"><td><input type="text" name="saxeli[]" placeholder="სახელი, გვარი" name_list" /></td><td><input type="text" name="nomeri[]" placeholder="ტელ. ნომერი" name_list" /></td><td><input type="checkbox" name="dge'+i+'[]" value="1"></td><td><input type="checkbox" name="dge'+i+'[]" value="2"></td><td><input type="checkbox" name="dge'+i+'[]" value="3"></td><td><input type="checkbox" name="dge'+i+'[]" value="4"></td><td><input type="checkbox" name="dge'+i+'[]" value="5"></td><td><input type="checkbox" name="dge'+i+'[]" value="6"></td><td><input type="checkbox" name="dge'+i+'[]" value="7"></td><td><input type="checkbox" name="dge'+i+'[]" value="8"></td><td><input type="checkbox" name="dge'+i+'[]" value="9"></td><td><input type="checkbox" name="dge'+i+'[]" value="10"></td><td><input type="checkbox" name="dge'+i+'[]" value="11"></td><td><input type="checkbox" name="dge'+i+'[]" value="12"></td><td><input type="checkbox" name="dge'+i+'[]" value="13"></td><td><input type="checkbox" name="dge'+i+'[]" value="14"></td><td><input type="checkbox" name="dge'+i+'[]" value="15"></td><td><input type="checkbox" name="dge'+i+'[]" value="16"></td><td><input type="checkbox" name="dge'+i+'[]" value="17"></td><td><input type="checkbox" name="dge'+i+'[]" value="18"></td><td><input type="checkbox" name="dge'+i+'[]" value="19"></td><td><input type="checkbox" name="dge'+i+'[]" value="20"></td><td><input type="checkbox" name="dge'+i+'[]" value="21"></td><td><input type="checkbox" name="dge'+i+'[]" value="22"></td><td><input type="checkbox" name="dge'+i+'[]" value="23"></td><td><input type="checkbox" name="dge'+i+'[]" value="24"></td><td><input type="checkbox" name="dge'+i+'[]" value="25"></td><td><input type="checkbox" name="dge'+i+'[]" value="26"></td><td><input type="checkbox" name="dge'+i+'[]" value="27"></td><td><input type="checkbox" name="dge'+i+'[]" value="28"></td><td><input type="checkbox" name="dge'+i+'[]" value="29"></td><td><input type="checkbox" name="dge'+i+'[]" value="30"></td><td><input type="checkbox" name="dge'+i+'[]" value="31"></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
</html>