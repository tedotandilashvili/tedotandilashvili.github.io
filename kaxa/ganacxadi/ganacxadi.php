<?php
  session_start();
  include('config.php');
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
  <img src="http://securitas.ge/kaxa/eka/invoice/logo.png" style="width: 80px;">
  </center>
  <br>
        <form action="" method="POST" name="forma">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <td>1</td>
        <td>განაცხადის თარიღი</td>
        <td><input type="text" value="<?php echo $obj->cspdate; ?>" name="cspdate" class="form-control" readonly> </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>2</td>
        <td>ქალაქი</td>
        <td><input type="text" value="<?php echo $obj->city; ?>" name="city" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>3</td>
        <td>დამკვეთი ორგანიზაცია</td>
        <td><input type="text" value="<?php echo $obj->name; ?>" name="name" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>4</td>
        <td>ს/კ ან პ/ნ</td>
        <td><input type="text" value="<?php echo $obj->code; ?>" name="code" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>5</td>
        <td>ფაქტიური მისამართი</td>
        <td><input type="text" value="<?php echo $obj->addp; ?>" name="addp" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>6</td>
        <td>იურიდიული მისამართი</td>
        <td><input type="text" value="<?php echo $obj->iuridiuli; ?>" name="iuridiuli" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>7</td>
        <td>ობიექტის ტიპი</td>
        <td><input type="text" value="<?php echo $obj->obtype; ?>" name="obtype" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>8</td>
        <td>ობიექტის საკუთრების ფორმა</td>
        <td><input type="text" value="<?php echo $obj->sak; ?>" name="sak" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>9</td>
        <td>ელ.ფოსტა</td>
        <td><input type="text" value="<?php echo $obj->mail; ?>" name="mail" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>10</td>
        <td>მომსახურება ცსპ-ზე/ საგანგაშო ღილაკზე დაცვის საათები</td>
        <td><input type="text" value="<?php echo $obj->csp; ?>" name="csp" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>11</td>
        <td>გადამცემის ნომერი</td>
        <td><input type="text" value="<?php echo $obj->gadamcemi; ?>" name="gadamcemi" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>12</td>
        <td>ზონების გაშიფვრა</td>
        <td><input type="text" value="<?php echo $obj->zone; ?>" name="zone" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>13</td>
        <td>მსხვრევის დეტექტორი</td>
        <td><input type="text" value="<?php echo $obj->msxvreva; ?>" name="msxvreva" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>14</td>
        <td>სახანძრო დეტექტორი</td>
        <td><input type="text" value="<?php echo $obj->sax; ?>" name="sax" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>15</td>
        <td>ხელშეკრულების სახეობა (აქცია)</td>
        <td><input type="text" value="<?php echo $obj->aqcia; ?>" name="aqcia" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>16</td>
        <td>ყოველთვიური სააბონენტო დღგ-ს ჩათვლით</td>
        <td><input type="text" value="<?php echo $obj->saabonento; ?>" name="saabonento" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>17</td>
        <td>დღგ-ს გადამხდელი</td>
        <td><input type="text" value="<?php echo $obj->dgg; ?>" name="dgg" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>18</td>
        <td>ხელმძღვანელის გვარი, სახელი და თანამდებობა</td>
        <td><input type="text" value="<?php echo $obj->addl; ?>" name="addl" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>19</td>
        <td>ხელმძღვანელის საკონტაქტო ნომერი</td>
        <td><input type="text" value="<?php echo $obj->phone; ?>" name="phone" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>20</td>
        <td>პასუხისმგებელი პირის სახელი, გვარი</td>
        <td><input type="text" value="<?php echo $obj->contact; ?>" name="contact" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>21</td>
        <td>პასუხისმგებელი პირის ტელეფონის ნომერი</td>
        <td><input type="text" value="<?php echo $obj->cmobile; ?>" name="contact" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>22</td>
        <td>ხელშეკრულების გაფორმების ვადა</td>
        <td><input type="text" value="<?php echo $obj->xelshekruleba; ?>" name="xelshekruleba" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>23</td>
        <td>ხელშეკრულების მოქმედების ვადა</td>
        <td><input type="text" value="<?php echo $obj->vada; ?>" name="vada" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>24</td>
        <td>დაცულია თუ არა ობიექტი ცოცხალი ძალით (აღჭ, რაცია, ან სხვ)</td>
        <td><input type="text" value="<?php echo $obj->cocxali; ?>" name="cocxali" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>25</td>
        <td>ობიექტის ჩახსნის თარიღი</td>
        <td><input type="text" value="<?php echo $obj->chaxsna; ?>" name="chaxsna" class="form-control" readonly> </td>
      </tr>
      <tr>
        <td>26</td>
        <td>შენიშვნა</td>
        <td><input type="text" value="<?php echo $obj->shenishvna; ?>" name="shenishvna" class="form-control" readonly> </td>
      </tr>

        <td>27</td>
        <td>ცსპ კომენტარი</td>
        <td><input type="text" value="<?php echo $obj->cspcomment; ?>" name="cspcomment" class="form-control"> </td>
      
      <tr>
        <td>28</td>
        <td>ჩართვა</td> 
        <td> <p style="color: red;"> გავეცანი განაცხადს და ჩავრთე ობიექტი</p><input type="checkbox" name="cspstatus" value="1" style="width: 350px;"<?php if($obj->cspstatus==1){ ?> checked <?php } ?> ><br></td>
      </tr>

    </tbody>

  </table>

</div>
<center>
<table>

  <?php 
    if($obj->cspstatus!=1){
  ?>

<td></td>
<td>
<div style="width: 250px;">
  <input type="submit" name="submit" class="form-control btn-danger" value="დამატება">
</div>
</td>
</tr>
</table>
</center>>
<?php } ?>
</form>
<?php 
  if(isset($_POST['submit']) && $_POST['submit']=="დამატება"){
    $id = $_POST['id'];
    // $insert = $conn->query("INSERT INTO chanaweri (cspcomment) VALUES ('$cspcomment')";
    $update = $conn->query("UPDATE chanaweri SET cspstatus=1 WHERE id=$id");
    if($update){
      echo "წარმატებით განახლდა";
    }else{
      echo "არ განახლდა. დაუკავშირდით ადმინისტრატორს";
    }
  }
?>


<br>
<br>
</body>
</html>
