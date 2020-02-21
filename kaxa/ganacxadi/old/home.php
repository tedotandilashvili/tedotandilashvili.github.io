<?php 
	session_start();
	include('config.php');
	// var_dump($user_id);
	if($logged_permission!='root'){
		header("Location:output.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<script> 
			function isNumber(evt) {
			    evt = (evt) ? evt : window.event;
			    var charCode = (evt.which) ? evt.which : evt.keyCode;
			    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			        return false;
			    }
			    return true;
			}
		</script>

		<title>
			Victoria Security
		</title>
		<script type="text/javascript" src="geokbd.js"></script>
		<meta charset="utf-8">
		<?php include("head.tpl"); ?>
        <link href="css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="jquery_bootstrap.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  background-color: lightgrey;
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}
</style>
            <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script> -->

	</head>
	<body>
		

		<!-- pirveli -->

	                 <?php 
    if(isset($_POST['register'])){
        
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
    $_SESSION["gadamcemi"] = $gadamcemi; ///ახლები
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
        // $dro = date('Y-m-d');
        $save = "INSERT INTO csp (type, name, code, mail, city, addp, phone, tarigi, contact, cmobile, gadamcemi, own, gsm, price, zona, msxvreva, saxandzro, aqcia, saabonento, tax, pasuxismgebeli, vada, cocxali, chaxsna) VALUES ('$type', '$name', '$code', '$mail', '$city', '$addp', '$phone', '$tarigi', '$contact', '$cmobile', '$gadamcemi', '$own', '$gsm', '$price', '$zona', '$msxvreva', '$saxandzro', '$aqcia', '$saabonento', '$tax', '$pasuxismgebeli', '$vada', '$cocxali', '$chaxsna')";
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

<!-- meore -->


<style type="text/css">
	.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
    position: absolute;
    left: 50%!important;
    margin-left: -62px!important;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
	color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
    width: 160px;
    text-align: center!important;
}

</style>
<script>
	$('select').on('change', function() {
  alert( this.value );
});
</script>

		<div class="line"></div>
		<div class="container">
			<?php include("top.tpl"); ?>     
        </div>
        <a href="mailto:tedo.tandilashvili@gmail.com"><button class="btn btn-danger">ტექნიკური დახმარება</button> </a> 
<p style="color: red;">(ტექნიკური დახმარებისთვის, დააჭირეთ ღილაკს, ან პრობლემა მოგვწერეთ მეილზე: tedo.tandilashvili@gmail.com)</p>
<p>გთხოვთ,ველები შეავსეთ მხოლოდ ქართული ფონტით</p>
        <div class="container" style="margin-top: 50px;"> 
<br/><br>
            	<!-- <br> -->

<script type="text/javascript">
            function sturu(){
                if($("#type").val()=="ფიზიკური პირი"){
                    $("#kodi").attr('maxlength', '9');
                }else{
                    $("#kodi").attr('maxlength', '11');
                }
            }
        </script>

        <form action="" method="POST" name="forma">
                 <center>
                        <div class="input-group">
           <label>საიდენტიფიკაციო კოდი<font color="red">*</font></label>
                <input type="text" name="code" id="kodi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" maxlength="11" minlength="9" />

            </div>
            </center>
    <div class="tab-pane fade in" id="tab1">
            <div class="input-group">
                <div class="input-group">
<table class="table">
    <thead>
      <tr>
        <th><label>ორგანიზაციის სამართლებრივი ფორმა<font color="red">*</font></label>
                                <select name="type" id="type" onchange="sturu();" class="form-control">   
                                    <option value="შპს">შეზღუდული პასუხისმგებლობის საზოგადოება</option>
                                    <option value="ინდივიდუალური მეწარმე">ინდივიდუალური მეწარმე</option>
                                    <option value="ფიზიკური პირი">ფიზიკური პირი</option>
                                    <option value="სოლიდალური პასუხისმგებლობის საზოგადოება">სოლიდალური პასუხისმგებლობის საზოგადოება</option>
                                    <option value="კოოპერატივი">კოოპერატივი</option>
                                    <option value="შეზღუდული პასუხისმგებლობის საზოგადოება">შეზღუდული პასუხისმგებლობის საზოგადოება</option>
                                    <option value="სააქციო საზოგადოება">სააქციო საზოგადოება</option>
                                    <option value="კომანდიტური საზოგადოება">კომანდიტური საზოგადოება</option>
                                    <option value="არასამეწარმეო (არაკომერციული) იურიდ. პირი">არასამეწარმეო (არაკომერციული) იურიდ. პირი</option>
                                    <option value="საჯარო სამართლის იურიდიული პირი">საჯარო სამართლის იურიდიული პირი</option>
                                    <option value="უცხოური საწარმოს ფილიალი">უცხოური საწარმოს ფილიალი</option>
                                    <option value="უცხოური არასამეწარმეო იურ. პირის ფილიალი">უცხოური არასამეწარმეო იურ. პირის ფილიალი</option>
                                    <option value="ამხანაგობა">ამხანაგობა</option>
                                </select></th>
        <th><label>ორგანიზაციის სახელი
        <input type="text" name="name" class="form-control" autocomplete="off"></label></th>
        <th><label>ელექტრონული ფოსტა</label>
                <input type="mail" id="maili" name="mail" class="form-control" autocomplete="off" onkeypress=""></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <label>გადამცემის ნომერი<font color="red">*</font></label>
                <input type="text" name="gadamcemi" class="form-control" autocomplete="off">
        </td>
        <td> <label>საკონტაქტო პირი<font color="red">*</font></label>
                <input type="text" name="contact" class="form-control" autocomplete="off"></td>
        <td> <label>ქალაქი<font color="red">*</font></label>
                                <select name="city" class="form-control">   
                                    <option value="თბილისი">თბილისი</option>
                                    <option value="აბაშა">აბაშა</option>
                                    <option value="ახალი ათონი">ახალი ათონი</option>
                                    <option value="ახალქალაქი">ახალქალაქი</option>
                                    <option value="ახალციხე">ახალციხე</option>
                                    <option value="ახმეტა">ახმეტა</option>
                                    <option value="ბათუმი">ბათუმი</option>
                                    <option value="ბაღდათი">ბაღდათი</option>
                                    <option value="ბორჯომი">ბორჯომი</option>
                                    <option value="გალი">გალი</option>
                                    <option value="გარდაბანი">გარდაბანი</option>
                                    <option value="გორი">გორი</option>
                                    <option value="გუდაუთა">გუდაუთა</option>
                                    <option value="გურჯაანი">გურჯაანი</option>
                                    <option value="გუდაუთა">დედოფლისწყარო</option>
                                    <option value="დმანისი">დმანისი</option>
                                    <option value="დუშეთი">დუშეთი</option>
                                    <option value="ვალე">ვალე</option>
                                    <option value="ზესტაფონი">ზესტაფონი</option>
                                    <option value="ზუგდიდი">ზუგდიდი</option>
                                    <option value="თეთრიწყარო">თეთრიწყარო</option>
                                    <option value="თელავი">თელავი</option>
                                    <option value="კასპი">კასპი</option>
                                    <option value="ლანჩხუთი">ლანჩხუთი</option>
                                    <option value="მარნეული">მარნეული</option>
                                    <option value="მარტვილი">მარტვილი</option>
                                    <option value="მცხეთა">მცხეთა</option>
                                    <option value="ნინოწმინდა">ნინოწმინდა</option>
                                    <option value="ოზურგეთი">ოზურგეთი</option>
                                    <option value="ონი">ონი</option>
                                    <option value="ოჩამჩირე">ოჩამჩირე</option>
                                    <option value="რუსთავი">რუსთავი</option>
                                    <option value="საგარეჯო">საგარეჯო</option>
                                    <option value="სამტრედია">სამტრედია</option>
                                    <option value="საჩხერე">საჩხერე</option>
                                    <option value="სიღნაღი">სიღნაღი</option>
                                    <option value="ტყვარჩელი">ტყვარჩელი</option>
                                    <option value="ტყიბული">ტყიბული</option>
                                    <option value="ფოთი">ფოთი</option>
                                    <option value="ქარელი">ქარელი</option>
                                    <option value="ქობულეთი">ქობულეთი</option>
                                    <option value="ქუთაისი">ქუთაისი</option>
                                    <option value="ყვარელი">ყვარელი</option>
                                    <option value="ცაგერი">ცაგერი</option>
                                    <option value="ცხინვალი">ცხინვალი</option>
                                    <option value="წალკა">წალკა</option>
                                    <option value="წნორი">წნორი</option>
                                    <option value="ჭიათურა">ჭიათურა</option>
                                    <option value="ხაშური">ხაშური</option>
                                    <option value="ხონი">ხონი</option>
                                </select></td></tr> <tr>
        <td><label>ფაქტიური მისამართი<font color="red">*</font></label>
                <input type="text" name="addp" class="form-control"></td>
      
     
        <td><label>დამკვეთის საკონტაქტო ტელეფონი<font color="red">*</font></label>
                <input type="text" name="phone" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
        <td><label>პასუხისმგებელი პირი<font color="red">*</font></label>
                <input type="text" name="pasuxismgebeli" class="form-control" autocomplete="off" minlength="2" maxlength="80" /></td>

      </tr>
      <tr>
        <td> <label>მონტაჟის სასურველი თარიღი<font color="red">*</font></label>
                <input type="date" name="tarigi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
                <td> <label>საიდენტიფიკაციო კოდი<font color="red">*</font></label>
                <input type="text" name="code" id="kodi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" /></td>
        <td>
             <label>პასუხისმგებელი პირის ტელეფონი<font color="red">*</font></label>
                <input type="text" name="cmobile" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>

               <tr>
                <td><label>ობიექტი საკუთრების ფორმა<font color="red">*</font></label>
                <input type="text" name="own" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>მომსახურება: GPRS, KP, VIS, B2 -ზე ცენტრალურ სამეთვალყურეო პულტზე (ცსპ) ან საგანგაშო ღილაკზე დაცვის საათები<font color="red">*</font></label>
                <input type="text" name="gsm" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>გას. ფასის ჯამი <font color="red">*</font></label>
                <input type="text" name="price" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <tr>
                <td><label>ზონების გაშიფვრა კი/არა<font color="red">*</font></label>
                <input type="text" name="zona" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>მსხვრევის დეტექტორი<font color="red">*</font></label>
                <input type="text" name="msxvreva" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>სახანძრო დეტექტორი<font color="red">*</font></label>
                <input type="text" name="saxandzro" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <tr>
                <td><label>ხელშეკრულების სახეობა აქცია/არა<font color="red">*</font></label>
                <input type="text" name="aqcia" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>ყოველთვიური სააბონენტო დღგ–ს ჩათვლით<font color="red">*</font></label>
                <input type="text" name="saabonento" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>დღგ–ს გადამხდელი დღგ/არა<font color="red">*</font></label>
                <input type="text" name="tax" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <tr>
                <td><label>ხელშეკრულების გაფორმების და მოქმედების ვადა (თარიღი)<font color="red">*</font></label>
                <input type="text" name="vada" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>დაცულია თუ არა ობიექტი ცოცხალი ძალით (აღჭურვილობა, რაცია ან სხვა)<font color="red">*</font></label>
                <input type="text" name="cocxali" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>ობიექტის ჩახსნის თარიღი<font color="red">*</font></label>
                <input type="text" name="chaxsna" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <td>         <td><label>შენიშვნა</label><br>
                <textarea name="shenishvna"  class="form-control" rows="5" id="comment"></textarea></td></td>


      </tr>
    </tbody>
  </table>
            <div class="input-group">
                
                <br />
                <input type="submit" name="register" class="form-control btn-danger" value="დამატება">
            </div>
        </form>
    </div>
    
</div>
            </div>
	
        </div>
		<br><br><br>
    <script type="text/javascript">
                
                // $("#maili").keypress(function(event){
GeoKBD.mapForm('forma', ['name', 'addl','addp']);
                // });
    </script>
    <script type="text/javascript">
      // run pre selected options
      	$('#my-select').multiSelect();
      </script>
      <script type="text/javascript">
          $(document).ready(function () {

    $('.nav-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        if( $(this).is(".dropdown-menu li a")){
            $("#dropdownTabName").html($(this).html());
            $("#dropDownTabsLink").dropdown("toggle");
        }
    });
});
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
            $("#gshe").click(function(){
                $(".aftercon").css("display","block");
            });
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
              $("#kodi").change(function(){
                 var kodi = $("#kodi").val();
                 $.ajax({
                    type: "POST",
                        url: "gamotana.php",
                        data: {
                            kodi: kodi
                        },
                    success: function(result){
                        $("#tab1").html(result);
                    }
                 });
              });
          });
      </script>
</body>
</html>