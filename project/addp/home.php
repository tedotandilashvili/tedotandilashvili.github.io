<?php 
    session_start();
    include "config.php";
    if(empty($_SESSION['user_id']))
    {
        header("Location: index.php");
    }
    else
    {
        // echo $_SESSION['user_id'];
    }
?>
<?php 
    if(isset($_POST["register"])){
        if(strlen($_POST["piradinomeri"]) > 0){
            $piradinomeri = $_POST["piradinomeri"];
        }else{
            $piradinomeri = $_POST["sid"];
        }
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $object = $_POST["object"];
        $graph = $_POST["graph"];
        $omismarti = $_POST["misamarti"];
        $date = $_POST["date"];

        $shetana = "INSERT INTO cocxali (piradinomeri, name, address, phone, object, graph, misamarti, date) VALUES ('$piradinomeri','$name','$address','$phone','$object','$graph','$omismarti', '$date')";
        $shetana = mysqli_query($conn,$shetana);
        if($shetana){
            $_SESSION["pnomeri"] = $piradinomeri;
            header("Location: after_reg.php");
            
            echo "<script>alert('წარმატება');</script>";
        }else{
            echo "<script>alert('შეცდომა');</script>";
        }
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
            შრომითი ხელშეკრულება
        </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://shoparea.ge/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        
        <script src="geo.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <a target="_blank" href="http://vss.ge">
                            <img src="logo.png" width="280" height="80" title="მთავარი გვერდი" alt="მთავარი გვერდი" />
                        </a>
                        <h4>ვიქტორია სექიურითი - შრომითი ხელშეკრულება</h4>                    
                        <a href="logout.php">გასვლა</a>
                    </center>  
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    <form method="POST" action="">
                        <?php include('errors.php'); ?>
                        <input checked="checked" id="geoKeys" type="hidden" />                
                        <div class="col-sm-12">
                            <script type="text/javascript">
                                function get_users(){
                                    var pnom = $("#sid").val();
                                    $.ajax({
                                        url: 'get_users.php',
                                        type: 'GET',
                                        data: {pnom:pnom},
                                        success: function(data) {
                                            $("#user_list").html('');
                                            var choose = "<li class='list-group-item'><b>აირჩიეთ</b></li>";
                                            $("#user_list").append(choose);
                                            var users = data.split("*");
                                            for(var i=0; i<users.length-1; i++){
                                                var kk = String(users[i]);
                                                var k = "<li class='list-group-item'><a href='javascript:;' onclick=get_info('"+kk+"');> #" + kk + "</a></li>";
                                                $("#user_list").append(k);
                                            }
                                        }
                                    });
                                }
                                function get_info(sid2){
                                    $.ajax({
                                        url: 'get_info.php',
                                        type: 'GET',
                                        data: {sid:sid2},
                                        success: function(data) {
                                           var results = data.split("#");
                                           $("#piradinomeri").val(results[0]);
                                           $("#name").val(results[1]);
                                           $("#address").val(results[2]);
                                           $("#phone").val(results[3]);
                                        }
                                    });
                                }
                            </script>
                            <div class="form-group">
                                <label>პირადი ნომერი<font color="red">*</font></label>
                                <input type="text" name="sid" id="sid" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="11" maxlength="11" onchange="get_users();"/>
                                <input type="hidden" name="piradinomeri" id="piradinomeri">
                            </div>
                            <ul class="list-group" id="user_list">
                                                              
                            </ul>
                            <div class="form-group">
                                <label>სახელი, გვარი<font color="red">*</font></label>
                                <input type="text" name="name" id="name" class="form-control" autocomplete="off" onkeypress="return makeGeo(this,event);">
                            </div>
                            <div class="form-group">
                                <label>მისამართი<font color="red">*</font></label>
                                <input type="text" name="address" id="address" class="form-control" autocomplete="off" onkeypress="return makeGeo(this,event)" minlength="3" maxlength="111" />
                            </div>
                            <div class="form-group">
                                <label>ტელეფონი</label>
                                <input type="text" name="phone" id="phone" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" />
                            </div>
                            <script type="text/javascript">
                                function get_address(){
                                    var object = $("#object_search").val();
                                    $.ajax({
                                        url: 'get_address.php',
                                        type: 'GET',
                                        data: {object:object},
                                        success: function(data) {
                                            var results = data.split("#");
                                            $("#misamarti").val(results[0]);
                                            $("#graph").val(results[1]);
                                            $("#object").val(results[2]);
                                        }
                                    });
                                }
                            </script>
                            <div class="form-group">
                                <label>ობიექტი:<font color="red">*</font></label>
                                <select id="object_search" name="object" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" onchange="get_address();">
                                    <option value="0">აირჩიეთ</option> 
                                    <?php 
                                        $select = mysqli_query($conn,"SELECT * FROM obieqti");
                                        while($arr = mysqli_fetch_assoc($select)){
                                    ?>
                                    <option value="<?php echo $arr['id']; ?>" ><?php echo $arr["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input name="object" type="hidden" id="object">
                            </div>
                            <div class="form-group">
                                <label>ობიექტის მისამართი<font color="red">*</font></label>
                                <input type="text" name="misamarti" class="form-control" readonly id="misamarti">
                            </div>
                            <div class="form-group">
                                <label>გრაფიკი<font color="red">*</font></label>
                                <input type="text" name="graph" class="form-control" readonly id="graph">
                            </div>
                            <div class="form-group">
                                <label>დღევანდელი თარიღი<font color="red">*</font></label>
                                <input type="text" name="date" class="form-control" autocomplete="off" readonly value="<?php echo date('Y-m-d'); ?>" >
                            </div>
                        </div>
                        <center>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <br />
                                    <input id="button" name="register" type="submit" value="დამახსოვრება და გაგრძელება" class="form-control btn btn-danger" style="width: 100%;"/>
                                    <br /><br /><br />
                                </div>
                            </div>
                        </center>
                    </form>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    function selectCountry(val) {
        var aname = val;
        $("#pnom").val(val);
        $("#ss").hide();
        if(aname){
            $.ajax({
                type: 'POST',
                url: 'result.php',
                data: {
                    anom: aname,
                },
                success: function (response){
                    $("#display_info").html(response);
                }
            });
        }
    }
</script>