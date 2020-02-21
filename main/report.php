<form method="post" action="//submit.form" onSubmit="return validateForm();">
<div style="width: 400px;">
</div>
<div style="padding-bottom: 18px;font-size : 24px;">პრობლემის შეტყობინება</div>
<div style="padding-bottom: 18px;">შეტყობინების გამგზავნი<span style="color: red;"> *</span><br/>
<input type="text" id="data_2" name="data_2" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">პრობლემის დონე<br/>
<select id="data_3" name="data_3" style="width : 300px;" class="form-control"><option>კრიტიკალური</option>
<option>საშუალო</option>
<option>დაბალი</option>
</select>
</div>
<div style="padding-bottom: 18px;">სიხშირე<br/>
<select id="data_5" name="data_5" style="width : 300px;" class="form-control"><option>10%</option>
<option>25%</option>
<option>50%</option>
<option>75%</option>
<option>100%</option>
</select>
</div>
<div style="padding-bottom: 18px;">დაასათაურეთ პრობლემა<span style="color: red;"> *</span><br/>
<input type="text" id="data_6" name="data_6" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">აღწერეთ პრობლემა<br/>
<textarea id="data_7" false name="data_7" style="width : 450px;" rows="6" class="form-control"></textarea>
</div>
<div style="padding-bottom: 18px;"><input name="skip_Submit" value="პრობლემის შეტყობინება" type="submit"/></div>
<div>
<div style="float:right"><a href="#" id="lnk100" title="form to email"></a></div>
<script src="https://www.100forms.com/js/FORMKEY:D2ZZDUFZAWLE/SEND:tedo.tandilashvili@gmail.com" type="text/javascript"></script>

</div>
</form>

<script type="text/javascript">
function validateForm() {
if (isEmpty(document.getElementById('data_2').value.trim())) {
alert('პრობლემის შემტყობლინებლის ვინაობა არის საჭირო!');
return false;
}
if (isEmpty(document.getElementById('data_6').value.trim())) {
alert('გთხოვთ, დაასათაუროთ!');
return false;
}
return true;
}
function isEmpty(str) { return (str.length === 0 || !str.trim()); }
function validateEmail(email) {
var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
return isEmpty(email) || re.test(email);
}
</script>
<a href="https://www.100forms.com" id="lnk100" title="web forms">web forms</a>
