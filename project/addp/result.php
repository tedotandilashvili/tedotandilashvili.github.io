<?php
	$servername = "213.131.53.246";
	$username = "root";
	$password = "zipo*8";
	$dbname = "kadrebi";


	$conn = new mysqli($servername, $username, $password, $dbname);

	if(isset($_POST["anom"])){
		$anom = $_POST["anom"];
		$select = "SELECT * FROM cocxali WHERE piradinomeri = '$anom'";
		$select = mysqli_query($conn,$select);
		
		if(mysqli_num_rows($select)>0){
			$arr = mysqli_fetch_assoc($select);
			?>
			        <div class="input-group">
                <label>სახელი, გვარი<font color="red">*</font></label>
                <input type="text" name="name" class="form-control" value="<?php echo $arr['name'];?>" autocomplete="off" onkeypress="return makeGeo(this,event);">
              </div>
              <div class="input-group">
                <label>მისამართი<font color="red">*</font></label>
                <input type="text" name="address" class="form-control" autocomplete="off" value="<?php echo $arr['address'];?>" onkeypress="return makeGeo(this,event)" minlength="3" maxlength="6" />
             </div>
              <div class="input-group">
                <label>ტელეფონი</label>
                <input type="text" name="phone" class="form-control" autocomplete="off" value="<?php echo $arr['phone'];?>" onkeypress="return isNumber(event)" />
                </div>
			<?php
		}else{
			?>
			        <div class="input-group">
                <label>სახელი, გვარი<font color="red">*</font></label>
                <input type="text" name="name" class="form-control" autocomplete="off" onkeypress="return makeGeo(this,event);">
              </div>
              <div class="input-group">
                <label>მისამართი<font color="red">*</font></label>
                <input type="text" name="address" class="form-control" autocomplete="off" onkeypress="return makeGeo(this,event)" minlength="3" maxlength="6" />
             </div>
              <div class="input-group">
                <label>ტელეფონი</label>
                <input type="text" name="phone" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" />
                </div>
			<?php
		}
	}
?>