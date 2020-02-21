<?php
  $servername = "213.131.53.246";
  $username = "root";
  $password = "zipo*8";
  $dbname = "kadrebi";

  $db = new mysqli($servername, $username, $password, $dbname);
  session_start();
  $pnomeri = $_SESSION["pnomeri"];
  $select = mysqli_query($db,"SELECT * FROM cocxali WHERE piradinomeri = '$pnomeri' ORDER BY ID DESC LIMIT 1");
  $arr = mysqli_fetch_assoc($select);
  $pnomeri = $arr["piradinomeri"];
  $saxeli = $arr["name"];
  $address = $arr["address"];
  $phone = $arr["phone"];
  $object = $arr["object"];
  $graph = $arr["graph"];
  $misamarti = $arr["misamarti"];
?>
<meta charset="utf-8">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
    body { background-color: none; } /* საერთო ფონი */      
    div 
	{
	   width: 210mm;   /* სიგანე */
	   height: 297mm; /* სიმაღლე */
	   padding: 10mm 10mm 15mm 20mm; /* შიგა საზღვრები - ზევით, მარჯვნივ, ქვემოთ, მარცხნივ */
	   margin: 32px auto;  /* გასწორება ცენტრში */
	   background-color: white;  /* ბლოკში ფონის ფერი */
	   font-family: "Times New Roman"; /* საჭირო შრიფტი */
	   font-size: 12pt;
	   line-height: 1.14;
    }
 </style>
<a style="background: #2ecc71; color:#fff; padding: 5px; cursor: pointer;" id="exportForm">&nbsp;PDF ამობეჭდვა&nbsp;</a>
<!-- პირველი გვერდი -->
<div id="first-page">
<h4 style="text-align: center">კონკრეტული ობიექტის დაცვის ხელშეკრულება</h4>    
<span style="text-align: left">ქ. თბილისი&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&quot;___&quot;___________&quot; 2020 წელი</span>
<br><br>
<span style="text-align: left">ერთის მხრივ, შეზღუდული პასუხისმგებლობის საზოგადოება “ვიქტორია სექიურითი”, შემდგომში<br>
დამსაქმებელი” მისი გენერალური დირექტორის მოადგილის კახა ნავაძის სახით და მეორეს<br>
მხრივ <b><?php echo $arr["name"]; ?></b> შემდგომში &ldquo;დასაქმებული&rdquo; ვდებთ<br>
ხელშეკრულებას შემდეგზე:
</span> 
<h4 style="text-align: center">1. დაცვითი საქმიანობის არსი და პირობები</h4>
1.1. &ldquo;დასაქმებული&rdquo; განახორციელებს <b><?php echo $arr["object"]; ?></b> ობიექტის საზოგადოებრივი წესრიგისა და მატერიალური ქონების დაცვას, მდებარე:<br>
<b><?php echo $arr["misamarti"]; ?></b><br>
1.2. ობიექტის დაცვას მცველი განახორციელებს შემდეგი გრაფიკითა და განრიგით:<br>
<b><?php echo $arr["graph"]; ?></b><br>
<h4 style="text-align: center">2. მხარეთა უფლება-მოვალეობები</h4>
2.1. მხარეთა უფლება-მოვალეობები, საქმიანობის საგანი და სფერო განისაზღვრება საქართველოს ,,შრომითი
კოდექსით&rdquo;, საქართველოს კანონით &ldquo;კერძო დაცვითი საქმიანობის შესახებ&rdquo;, შრომითი ხელშეკრულებითა და აღნიშნული ხელშეკრულების საფუძველზე.<br>
2.2 &ldquo;დამსაქმებელი&rdquo; ვალდებულია:<br>
- უზრუნველყოს &ldquo;დასაქმებული&rdquo; სამუშაო პირობებით, რაც აუცილებელია წინამდებარე ხელშეკრულებით გათვალისწინებულიმოვალეობების შესასრულებლად;<br>
2.3 &ldquo;დამსაქმებელს&rdquo; უფლება აქვს:<br>
- მოსთხოვოს &ldquo;დასაქმებულს&rdquo; ხელშეკრულებით ნაკისრი მოვალეობების ზუსტი და განუხრელი შესრულება;<br>
- თავისი შეხედულებისამებრ &bdquo;დასაქმებულს&ldquo; შეუცვალოს დასაცავი ობიექტი, (სამუშაო ადგილი) შესაბამისი ანაზღაურების გათვალისწინებით.<br>
- &bdquo;დამსაქმებელსა&ldquo; და დასაცავ ობიექტს შორის დაცვითი ხელშეკრულების შეწყვეტის დღიდან, შეუწყვიტოს< &bdquo;დასაქმებულს&ldquo; შრომითი და კონკრეტული ობიექტის დაცვის ხელშეკრულება.<br>
- &ldquo;დასაქმებულის&rdquo; მიერ ვალდებულების შეუსრულებლობის შემთხვევაში, ცალმხრივად შეწყვიტოს ხელშეკრულება;<br>
- ობიექტის ხელმძღვანელის (დამქირავებლის) შეხედულებისამებრ, კონკრეტული მიზეზის განმარტების გარეშე, შეუცვალოს სამუშაო ადგილი ან ცალმხრივად, ვადამდე შეუწყვიტოს ხელშეკრულება &ldquo;დასაქმებულს&rdquo;<br>
- &bdquo;დასაქმებულის&ldquo; მიერ ერთი თვით ადრე წერილობითი შეტყობინების გარეშე სამსახურიდან წასვლის შემთხვევაში, არ გადაუხადოს შრომითი ხელშეკრულების 3.1. მუხლით გათვალისწინებული ანაზღაურება.<br>
2.4 &ldquo;დასაქმებული&rdquo; ვალდებულია:<br>
- უზრუნველყოს ობიექტზე ფულადი სახსრების და ქონების დაცვა მართლსაწინააღმდეგო ქმედებისაგან.<br>
- უზრუნველყოს ობიექტზე საზოგადოებრივი წესრიგის დაცვა.<br>
- სამსახურეობრივი მოვალეობის შესრულების დროს თან იქონიოს მცველის დამადასტურებელი მოწმობა<br>
- დაცვის განხორციელების (სამუშაოს შესრულების) დროს არ შევიდეს კონტაქტში უცხო პირებთან და არ მიიღოს ალკოჰოლური სასმელი;<br>
- ზუსტად და განუხრელად შეასრულოს კანონის, ხელშეკრულების, დაცვის სამსახურის შინაგანაწესის მოთხოვნები, ასევე ზეპირი მითითებები.<br>
- იყოს ყოველთვის დაკვირვებული და ყურადღებიანი, თვალი ადევნოს ობიექტზე არსებულ ვითარებას;<br>
- არ დატოვოს დასაცავი ობიექტი და საგუშაგო სამუშაო პერიოდში;<br>
- სამუშაო დღის დასრულებამდე, შეამოწმოს დასაცავი ობიექტის სახანძრო-დაცვითი სიგნალიზაციის მუშაობის მდგომარეობა და მისი გაუმართაობის შემთხვევაში, აცნობოს დაცვის სამსახურს, ხარვეზის აღმოსაფხვრელად, მის აღდგენამდე უზრუნველყოს ობიექტის დაცვა.<br>
- გამოცხადდეს სამუშაოზე ,,დამსაქმებლის&lsquo;&rsquo; მიერ დამტკიცებული გრაფიკის მიხედვით და ფორმის ტანსაცმლით.<br>
- საგანგებო ვითარებაში შესაბამისი ინფორმაცია მიაწოდოს დაცვის სამსახურს და იმოქმედოს დადგენილი წესების და სიტყვიერი ინსტრუქციების შესაბამისად;<br>
- აუცილებლობის შემთხვევაში, აღნიშნული ხელშეკრულებით განსაზღვრული ანაზღაურებით, (დამატებითი ანაზღაურების გარეშე)<br />დამატებით იმუშაოს არაუმეტეს ორი ცვლისა, ,,დამქირავებლის&rsquo;&rsquo; მიერ განსაზღვრული გრაფიკის შესაბამისად.<br>
- არ გაახმაუროს დაცვის სამსახურის "კონფიდენციალური" ინფორმაცია;<br>
- სამსახურიდან საკუთარი სურვილით წასვლის შემთხვევაში ერთი თვით ადრე, წერილობით, აცნობოს ,,დამსაქმებელს&rdquo;<br>

</span></div>
<!-- მეორე გვერდი -->
<div id="second-page">
<span style="text-align: left">
  -  « დასაქმებული » დაჯარიმდება მის მიერ « დამსაქმებელთან » მუშაობის განმავლობაში მიღებული 
	ხელფასის ათმაგი ოდენობით, თუ კი მცველი « დამსაქმებლის » წინასწარი თანხმობის გარეშე, ანალოგიურ დაცვის ან უსაფრთხოების კუთხით უფლებამოსილებას განახორციელებს ან გააგრძელებს კომპანიასა (« ვიქტორია სექიურითი ») და კონკრეტულ ობიექტზე დაცვითი ხელშეკრულების მოქმედების ან/და მოშლის შემდეგ, 2 წლის განმავლობაში.<br>
- თავისი მოვალეობების სრულყოფილად შესრულების მიზნით, სრულად გაეცნოს კანონს ,,კერძო დაცვითი საქმიანობის შესახებ&rdquo; და სამსახურში მოქმედ შინაგანაწესს.<br>
2.5 ,,დასაქმებულს&rdquo; უფლება აქვს:<br>
- დაცვის განხორციელებისათვის მიიღოს ხელშეკრულებით გათვალისწინებული ანაზღაურება;
<h4 style="text-align: center">3. ხარჯების ანაზღაურების წესი</h4>
3.1. ,,დამსაქმებელი&rsquo;&rsquo; აზღვევს ,,დასაქმებულის&rsquo;&rsquo; სიცოცხლეს და ჯანმრთელობას ხელშეკრულების მოქმედების ვადის განმავლობაში საკუთარი ხარჯით.<br>
3.2 ,,დამსაქმებელი&rsquo;&rsquo; საჭიროების მიხედვით ,,დასაქმებულს&rsquo;&rsquo; საკუთარი ხარჯით გადასცემს დაცვითი საქმიანობის განხორციელებისათვის აუცილებელ ფორმის ტანსაცმელს და ტექნიკურ აღჭურვილობას.<br>
3.3 ,,დასაქმებული&rsquo;&rsquo; საკუთარი ხარჯით შეიძინს დაცვით საქმიანობაზე კონტროლის განმახორციელებელი ორგანოს მიერ დამტკიცებულ იმ ფორმის ტანსაცმელს, რომელსაც საჭიროების შემთხვევაში განუსაზღვრავს ,,დამსაქმებელი&rsquo;&rsquo;.<br>
3.4 ,,დასაქმებული&rsquo;&rsquo; გადაიხადის მცველის მოწმობის საფასურს 15 (თხუთმეტი) ლარს დაცვით საქმიანობაზე კონტროლის განმახორციელებელი ორგანოს ანგარიშზე ჩარიცხვის გზით.<br>
3.5 ,,დასაქმებული&rsquo;&rsquo; უნდა გაუფრთხილდეს დაცვის სამსახურის მიერ მისთვის დროებით სარგებლობაში გადაცემულ დაცვის განხორციელებისათვის განკუთვნილ ქონებას. ზემოაღნიშნული ქონების დაზიანების ან დაკარგვის შემთხვევაში აანაზღაურებს მის საბაზრო ღირებულებას<br>
3.6 ,,დასაქმებული&rsquo;&rsquo; ,,დამსაქმებლისათვის&ldquo; ერთი თვით ადრე წერილობითი შეტყობინების გარეშე, სამსახურიდან საკუთარი სურვილით წასვლის შემთხვევაში ,,დამსაქმებლს&rdquo; აუნაზღაურებს მასზე გაწეულ დაზღვევის ხარჯს.<br>
3.7 ,,დასაქმებული&rsquo;&rsquo; აანაზღაურებს მისი ბრალით მიყენებულ მატერიალურ ზარალს;<br>
<h4 style="text-align: center">4. ხელშეკრულების ვადა</h4>
4.1 ხელშეკრულება ძალაში შედის 2020 წლის -----------------------------.<br>
4.2. ხელშეკრულება მოქმედებს 6 თვის ვადით, აღნიშნული ვადა ითვლება გამოსაცდელ ვადად. <br>
<h4 style="text-align: center">5. დავების გადაწყვეტის წესი</h4>
5.1. ამ ხელშეკრულებიდან გამომდინარე მხარეთა შორის წამოჭრილი ყოველი უთანხმოება გადაწყდება ურთიერთშეთანხმებით. შეუთანხმებლობის შემთხვევაში დავა გადაეცემა სასამართლოს, საქართველოში მოქმედი კანონმდებლობის შესაბამისად.<br>
5.2. მხარეები აცხადებენ თანხმობას, რომ დავას განსჯადობით განიხილავს თბილისის საქალაქო სასამართლოს სამოქალაქო საქმეთა კოლეგია და პირველი ინსტაციის სასამართლოს გადაწყვეტილება დაუყოვნებლივ მიექცევა აღსასრულებლად.
<h4 style="text-align: center">6. სხვა პირობები</h4>
6.1. წინამდებარე ხელშეკრულება შედგენილია ქართულ ენაზე 2 (ორ) ეგზემპლარად, ხელმოწერილია და ორივეს თანაბარი იურიდიული ძალა აქვს.<br>
6.2 ხელშეკრულებაში ცვლილებების შეტანა დასაშვებია მხოლოდ მხარეთა წერილობითი შეთანხმებით.
<h4 style="text-align: center">7. მხარეთა რეკვიზიტები</h4>
7.1. &bdquo;დამსაქმებელი&rdquo;- შ.პ.ს. &ldquo;ვიქტორია სექიურითი&rdquo; ქ. თბილისი, ჩიქოვანის ქ. № 2; ტელ: 2 50 50 90<br>
7.2. &bdquo;დასაქმებული&rdquo; (დაცვის თანამშრომელი): პირადი ნომერი <b><ins><?php echo $pnomeri; ?></ins></b><br>
რეგ. მის: <b><ins><?php echo $address; ?></ins></b> ტელ:<b><ins><?php echo $phone; ?></ins></b><br><br>
გენერალური &nbsp; დირექტორის<br>
მოადგილე: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/კ. ნავაძე/<br>
<br><br>
&bdquo;დასაქმებული&rdquo; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<b><?php echo $saxeli; ?></b>/
</span></div>
<script type="text/javascript">
  $('#exportForm').click(function(){
  var pdf = new jsPDF('a', 'mm', 'a4');
  var firstPage;
  var secondPage;
  
  html2canvas($('#first-page'), {
    onrendered: function(canvas) {
      firstPage = canvas.toDataURL('image/jpeg', 1.0);
    }
  });
  
    html2canvas($('#second-page'), {
    onrendered: function(canvas) {
      secondPage = canvas.toDataURL('image/jpeg', 1.0);
    }
  });
  
  setTimeout(function(){
    pdf.addImage(firstPage, 'JPEG', 5, 5, 200, 0);
    pdf.addPage();
    pdf.addImage(secondPage, 'JPEG', 5, 5, 200, 0);
    pdf.save("export.pdf");
  }, 150);
});
</script>
