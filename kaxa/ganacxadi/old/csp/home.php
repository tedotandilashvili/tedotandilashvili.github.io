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
        
        $type = $_POST['type'];
        $_SESSION["type"] = $name;
        $name = $_POST['name'];
        $_SESSION["name"] = $name;
        $code = $_POST['code'];
        $_SESSION["code"] = $code;
        $mail = $_POST['mail'];
        $_SESSION["mail"] = $mail;
        $_SESSION["city"] = $city;
        $addl = $_POST['city'];
        $addl = $_POST['addl'];
        $_SESSION["addl"] = $addl;
        $addp = $_POST['addp'];
        $_SESSION["addp"] = $addp;
        $phone = $_POST['phone'];
        $_SESSION["phone"] = $phone;
        $tarigi = $_POST['tarigi'];
        $_SESSION["tarigi"] = $tarigi;
        $contact = $_POST['contact'];
        $_SESSION["contact"] = $contact;
        $cmobile = $_POST['cmobile'];
        $_SESSION["cmobile"] = $cmobile;
        $shenishvna = $_POST["shenishvna"];
        $_SESSION["shenishvna"] = $shenishvna;
        $gadamcemi = $_POST['gadamcemi'];
        $_SESSION["gadamcemi"] = $gadamcemi;
        // $dro = date('Y-m-d');
        $save = "INSERT INTO csp (type, name, code, mail, city, addl, addp, phone, tarigi, contact, cmobile, gadamcemi) VALUES ('$type', '$name', '$code', '$mail', '$city', '$addl', '$addp', '$phone', '$tarigi', '$contact', '$cmobile', '$gadamcemi')";
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
                <input type="text" name="code" id="kodi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" />

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
                <input type="text" name="addl" class="form-control" autocomplete="off"></td>
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
                                </select></td>
        <td><label>ფაქტიური მისამართი<font color="red">*</font></label>
                <input type="text" name="addp" class="form-control"></td>
      </tr>
      <tr>
        <td><label>დამკვეთის საკონტაქტო ტელეფონი<font color="red">*</font></label>
                <input type="text" name="phone" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
        <td><label>პასუხისმგებელი პირი<font color="red">*</font></label>
                <input type="text" name="contact" class="form-control" autocomplete="off" minlength="2" maxlength="80" /></td>
        <td><label>პასუხისმგებელი პირის ტელეფონი<font color="red">*</font></label>
                <input type="text" name="cmobile" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
      </tr>
      <tr>
        <td> <label>მონტაჟის სასურველი თარიღი<font color="red">*</font></label>
                <input type="date" name="tarigi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
        <td><div class="input-group">
                <label>შენიშვნა</label><br>
                <textarea name="shenishvna"  class="form-control" rows="5" id="comment"></textarea>
            </div></td>
        <td> <label>საიდენტიფიკაციო კოდი<font color="red">*</font></label>
                <input type="text" name="code" id="kodi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" /></td>
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