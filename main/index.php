 <?php $start_time = microtime(true); ?>
 <!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="/path/to/alk-sanet.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>

</head>
<?php include("top.php"); ?>

</table>
<br></p>
	  <p><marquee behavior=scroll direction="left" scrollamount="8">ბოლო სიახლე: გაცნობებთ, რომ გაიხსნა “ვიქტორია სექიურითის” ახალი ფილიალი ქალაქ საგურამოში. </marquee></p>
</p>
<!--   <p><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FTbilisi" width="100%" height="90" frameborder="0" seamless></iframe>
</p> -->
  <center><h1><img src="logo.png"> </h1> </center>
  <h2>დაცვის კომპანია - ვიქტორია სექიურითი</h2>
  <h3>აირჩიეთ თქვენთვის სასურველი კატეგორია</h3>
  <p>სამუშაო გარემოს გაჯანსაღებისა და გამრავალფეროვნებისთვის, შეიქმნა პროგრამათა კრებული, რომლის მეშვეობითაც მაქსიმალურად ავტომატიზირებული იქნება ყველა ის სერვისი, რომელსაც აქამდე ხელით აკეთებდით.</p>
  <p>ასევე, თქვენს მიერ შეყვანილი ინფორმაციით, შეიქმნება რეესტრი, რომლის გამოყენებასაც შევძლებთ ბევრ კარგ საქმეში, უსაფრთხოების ზომების მაქსიმალური დაცვით.</p>
  <p>პ.ს თქვენი ინფორმაცია დაშიფრულია md5 hash შიფრაციით, რაც გვეხმარება ჰაკერული თავდასხმების შემთხვევაში თავიდან ავიცილოთ ინფორმაციის გაჟონვა (ეფექტიანობა: 90%)  </p>
  <p>გისურვებთ წარმატებებს</p>

<a href="http://nssy.ge" target="_blank"> <img src="t.jpg" style="width: 100%;"></a>


</div>
</body>

</html>
