<?php
  session_start();
  include "config.php";
  $pnomeri = $_SESSION["pnomeri"];
  $select = mysqli_query($conn,"SELECT * FROM cocxali WHERE piradinomeri = '$pnomeri' ORDER BY ID DESC LIMIT 1");
  // $sel = "SELECT * FROM cocxali WHERE piradinomeri = '$pnomeri' ORDER BY ID DESC LIMIT 1";
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
<h4 style="text-align: center">შრომითი ხელშეკრულება</h4>    
<span style="text-align: left">ქ. თბილისი&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&quot;___&quot;___________&quot; 2020 წელი</span>
<br><br>
<span style="text-align: left">ერთის მხრივ, შეზღუდული პასუხისმგებლობის საზოგადოება &quot;ვიქტორია სექიურითი&quot;<br>
 შემდგომში &bdquo;დამსაქმებელი&rdquo; მისი გენერალური დირექტორის მოადგილის კახა ნავაძის სახით<br>
და მეორეს მხრივ <b><ins><?php echo $saxeli; ?></ins></b> შემდგომში &bdquo;დასაქმებული&rdquo; ვდებთ ხელშეკრულებას შემდეგზე:<br>

</span> 
<h4 style="text-align: center">1. ხელშეკრულების საგანი და არსი</h4>
<span style="text-align: left">1.1. დაცვითი ფუნქციის შესრულება (საზოგადოებრივი წესრიგისა და მატერიალური ქონების დაცვა)<br> 
- საქართველოს &bdquo;შრომითი კოდექსით&rdquo;, საქართველოს კანონით &ldquo;კერძო დაცვითი საქმიანობის შესახებ&rdquo;, წინამდებარე ხელშეკრულებით, კონკრეტული ობიექტის დაცვის ხელშეკრულებისა და სამსახურში მოქმედი შინაგანაწესით.</span>
<h4 style="text-align: center">2. მუშაობის განრიგი და გრაფიკი</h4>
<span style="text-align: left">2.1 &bdquo;დამსაქმებელი&rdquo; სამუშაოდ იღებს დასაქმებულს დაცვის სამსახურში მცველად.<br>
2.2 &bdquo;დასაქმებულის&rdquo; სამუშაო განრიგი და გრაფიკი განისაზღვრება - <b><ins><?php echo $graph; ?></ins></b>
</span>
<h4 style="text-align: center">3 შრომის ანაზღაურება და მისი პირობები</h4>
<span style="text-align: left">3.1 დასაქმებულის შრომის ანაზღაურება შეადგენს ---------------------------------------------------------------------------------------------------------------------------------------------------------- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- ------------------------------------------------------------<br>
3.2 &bdquo;დამსაქმებლის&rdquo; მიერ &bdquo;დასაქმებულისათვის&rdquo; შრომის ანაზღაურების გადახდა განხორციელდება ნაღდი ან უნაღდო ანგარიშსწორებით, არაუგვიანეს მომდევნო თვის 05 &ndash;დან 20 რიცხვამდე.</span>
<h4 style="text-align: center">4. მხარეთა უფლება-მოვალეობანი და პასუხისმგებლობა</h4>
<span style="text-align: left">4.1 მხარეთა უფლება-მოვალეობები, საქმიანობის საგანი და სფერო განისაზღვრება საქართველოს &bdquo;შრომითი კოდექსით&rdquo;, საქართველოს კანონით &ldquo;კერძო დაცვითი საქმიანობის შესახებ&rdquo;, წინამდებარე ხელშეკრულებითა და კონკრეტული ობიექტის დაცვის ხელშეკრულების საფუძველზე.<br>
4.2 &bdquo;დამსაქმებელი&rdquo; ვალდებულია:<br>
- უზრუნველყოს &ldquo;დასაქმებული&rdquo; სამუშაო პირობებით, რაც აუცილებელია წინამდებარე ხელშეკრულებით გათვალისწინებული მოვალეობების შესასრულებლად;<br>
- უზრუნველყოს &ldquo;დასაქმებული&rdquo; დაცვის განხორციელებისათვის საჭირო საშუალებებით.<br>
- დააზღვიოს &bdquo;დასაქმებულის&ldquo; სიცოცხლე და ჯანმრთელობა ხელშეკრულების მოქმედების ვადის განმავლობაში.<br>
4.3 &bdquo;დამსაქმებელს&rdquo; უფლება აქვს:<br>
- მოსთხოვოს &bdquo;დასაქმებულს&rdquo; ხელშეკრულებით ნაკისრი მოვალეობების ზუსტი და განუხრელი შესრულება;<br>
- თავისი შეხედულებისამებრ &bdquo;დასაქმებულს&ldquo; შეუცვალოს დასაცავი ობიექტი, (სამუშაო ადგილი) შესაბამისი ანაზღაურების გათვალისწინებით.<br>
- &bdquo;დამსაქმებელსა&ldquo; და დასაცავ ობიექტს შორის დაცვითი ხელშეკრულების შეწყვეტის დღიდან, შეუწყვიტოს &bdquo;დასაქმებულს&ldquo; შრომითი და კონკრეტული ობიექტის დაცვის ხელშეკრულება.<br>
- &ldquo;დასაქმებულის&rdquo; მიერ ხელშეკრულების 4.4. მუხლით გათვალისწინებული ვალდებულების შეუსრულებლობის შემთხვევაში, ვადის გასვლამდე ცალმხრივად შეწყვიტოს ხელშეკრულება;<br>
- ობიექტის ხელმძღვანელის (დამქირავებლის) შეხედულებისამებრ, კონკრეტული მიზეზის განმარტების გარეშე, შეუცვალოს სამუშაო ადგილი ან ცალმხრივად, ვადამდე შეუწყვიტოს ხელშეკრულება &ldquo;დასაქმებულს&rdquo;<br>
- &bdquo;დასაქმებულის&ldquo; მიერ ერთი თვით ადრე წერილობითი შეტყობინების გარეშე სამსახურიდან წასვლის შემთხვევაში, არ გადაუხადოს ხელშეკრულების 3.1. მუხლით გათვალისწინებული შრომის ანაზღაურება.<br>
4.4 &ldquo;დასაქმებული&rdquo; ვალდებულია:<br>
- უზრუნველყოს ობიექტზე ფულადი სახსრების და ქონების დაცვა მართლსაწინააღმდეგო ქმედებისაგან.<br>
- უზრუნველყოს ობიექტზე საზოგადოებრივი წესრიგის დაცვა.<br>
- &bdquo;კერძო დაცვითი საქმიანობის შესახებ&ldquo; კანონის თანახმად, გადაიხადოს მცველის მოწმობის საფასური 15 ლარი.<br>
- სამსახურეობრივი მოვალეობის შესრულების დროს თან იქონიოს მცველის დამადასტურებელი მოწმობა, წინააღმდეგ შემთხვევაში, თანახმად, საქართველოს კანონის &bdquo;კერძო დაცვითი საქმიანობის შესახებ&ldquo; დაჯარიმდება 1000 (ათასი) ლარის ოდენობით<br>
- დაცვის განხორციელების (სამუშაოს შესრულების) დროს არ შევიდეს კონტაქტში უცხო პირებთან და არ მიიღოს ალკოჰოლური სასმელი;<br>
</span>
</div>
<!-- მეორე გვერდი -->
<div id="second-page">
<span style="text-align: left">- ზუსტად და განუხრელად შეასრულოს კანონის, ხელშეკრულების, დაცვის სამსახურის შინაგანაწესის <br>მოთხოვნები, ასევე ზეპირი მითითებები. <br>- იყოს ყოველთვის დაკვირვებული და ყურადღებიანი, თვალი ადევნოს ობიექტზე არსებულ ვითარებას;<br>
- არ დატოვოს დასაცავი ობიექტი და საგუშაგო სამუშაო პერიოდში;<br>
- სამუშაო დღის დასრულებამდე,შეამოწმოს დასაცავი ობიექტის სახანძრო-დაცვითი სიგნალიზაციის მუშაობის მდგომარეობა და მისი გაუმართაობის შემთხვევაში, აცნობოს დაცვის სამსახურს, ხარვეზის აღმოსაფხვრელად, მის აღდგენამდე უზრუნველყოს ობიექტის დაცვა.<br>
- გამოცხადდეს სამუშაოზე &bdquo;დამსაქმებლის&lsquo;&rsquo; მიერ დამტკიცებული გრაფიკის მიხედვით და ფორმის ტანსაცმლით, წინააღმდეგ შემთხვევაში დაჯარიმდება 500 (ხუთასი) ლარით.<br>
- საგანგებო ვითარებაში შესაბამისი ინფორმაცია მიაწოდოს დაცვის სამსახურს და იმოქმედოს დადგენილი წესების და სიტყვიერი ინსტრუქციების შესაბამისად;<br>
- გაუფრთხილდეს დაცვის სამსახურის მიერ მისთვის დროებით სარგებლობაში გადაცემული დაცვის განხორციელებისათვის განკუთვნილ ქონებას. ზემოაღნიშნული ქონების დაზიანების ან დაკარგვის შემთხვევაში დაჯარიმდება ქონების ღირებულების შესაბამისად.<br>
- აუცილებლობის შემთხვევაში, აღნიშნული ხელშეკრულებით განსაზღვრული ანაზღაურებით, (დამატებითი ანაზღაურების გარეშე) დამატებით იმუშაოს არაუმეტეს ორი ცვლისა, &bdquo;დამქირავებლის&rsquo;&rsquo; მიერ განსაზღვრული გრაფიკის შესაბამისად.<br>
- ხელშეკრულების ვადაზე ადრე შეწყვეტის შემთხვევაში, აანაზღაუროს &bdquo;დამსაქმებლის&rdquo; მიერ მასზე გაწეული დაზღვევის ხარჯი.<br>
- აანაზღაუროს მისი ბრალით მიყენებული მატერიალური ზარალი;<br>
- არ გაახმაუროს დაცვის სამსახურის კონფიდენციალური ინფორმაცია;<br>
- სამსახურიდან საკუთარი სურვილით წასვლის შემთხვევაში ერთი თვით ადრე, წერილობით, აცნობოს &bdquo;დამსაქმებელს&rdquo;;<br>
  "დასაქმებული" დაჯარიმდება მის მიერ "დამსაქმებელთან" მუშაობის განმავლობაში მიღებული ხელფასის ათმაგი ოდენობით, თუ კი მცველი "დამსაქმებლის" წინასწარი თანხმობის გარეშე, ანალოგიურ დაცვით ან უსაფრტხოების კუთხით უფლებამოსილებას განახორციელებს ან გააგრძელებს კომპანიისა ("ვიქტორია სექიურითი") და ობიექტზე დაცვითი ხელშეკრულების მოქმედების ან/და მოშლის შემდეგ, 2 წლის განმავლობაში. <br>
- თავისი მოვალეობების სრულყოფილად შესრულების მიზნით, სრულად გაეცნოს კანონს &bdquo;კერძო დაცვითი საქმიანობის შესახებ&rdquo; და სამსახურში მოქმედ შინაგანაწესს.<br>
4.5 &bdquo;დასაქმებულს&rdquo; უფლება აქვს:<br>
- დაცვის განხორციელებისათვის მიიღოს ხელშეკრულებით გათვალისწინებული ანაზღაურება;
<h4 style="text-align: center">5. ხელშეკრულების ვადა</h4>
5.1 ხელშეკრულება ძალაში შედის 2020 წლის -----------------------------.<br>
5.2. ხელშეკრულება მოქმედებს 6 თვის ვადით, აღნიშნული ვადა ითვლება გამოსაცდელ ვადად.<br>
<h4 style="text-align: center">6. დავების გადაწყვეტის წესი</h4>
6.1. ამ ხელშეკრულებიდან გამომდინარე მხარეთა შორის წამოჭრილი ყოველი უთანხმოება გადაწყდება ურთიერთშეთანხმებით. შეუთანხმებლობის შემთხვევაში დავა გადაეცემა სასამართლოს, საქართველოში მოქმედი კანონმდებლობის შესაბამისად.<br>
6.2. მხარეები აცხადებენ თანხმობას, რომ დავას განსჯადობით განიხილავს თბილისის საქალაქო სასამართლოს სამოქალაქო საქმეთა კოლეგია და პირველი ინსტაციის სასამართლოს გადაწყვეტილება დაუყონებლივ მიექცევა აღსასრულებლად.
<h4 style="text-align: center">7. სხვა პირობები</h4>
7.1. წინამდებარე ხელშეკრულება შედგენილია ქართულ ენაზე 2 (ორ) ეგზემპლარად, ხელმოწერილია და ორივეს თანაბარი იურიდიული ძალა აქვს.<br>
7.2 ხელშეკრულებაში ცვლილებების შეტანა დასაშვებია მხოლოდ მხარეთა წერილობითი შეთანხმებით.
<h4 style="text-align: center">8. მხარეთა რეკვიზიტები</h4>
8.1. &bdquo;დამსაქმებელი&rdquo;- შ.პ.ს. &ldquo;ვიქტორია სექიურითი&rdquo; ქ. თბილისი, ჩიქოვანის ქ. № 2; ტელ: 2 50 50 90<br>
8.2. &bdquo;დასაქმებული&rdquo; (დაცვის თანამშრომელი): პირადი ნომერი <b><ins><?php echo $pnomeri; ?></ins></b><br>
რეგ. მის: <b><ins><?php echo $address; ?><ins></b> ტელ:<b><ins><?php echo $phone; ?></ins></b><br><br>
გენერალური &nbsp; დირექტორის<br>
მოადგილე: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/კ. ნავაძე/<br><br><br>
&bdquo;დასაქმებული&rdquo; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
/<b><?php echo $saxeli; ?></b>/
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
