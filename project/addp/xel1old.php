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
<style type="text/css">
  * { background-color: #fff; }
</style>
<a style="background: #2ecc71;color:#fff;padding: 5px;" id="exportForm">PDF ამობეჭდვა</a>
<div id="first-page">
<p style="text-align: center;"><span style="font-weight: 400;">შრომითი ხელშეკრულება</span></p>
<p style="text-align: center;"><span style="font-weight: 400;">ქ. თბილისი &ldquo;___&rdquo;___________&rdquo; 201---- წელი</span></p>
<p><span style="font-weight: 400;">ერთის მხრივ, შეზღუდული პასუხისმგებლობის საზოგადოება &ldquo;ვიქტორია სექიურითი&rdquo;,</span></p>
<p><span style="font-weight: 400;">შემდგომში ,,დამსაქმებელი&rdquo; მისი გენერალური დირექტორის მოადგილის კახა ნავაძის სახით</span></p>
<p><span style="font-weight: 400;">და მეორეს მხრივ <b><?php echo $saxeli; ?></b> შემდგომში ,,დასაქმებული&rdquo; ვდებთ</span></p>
<p><span style="font-weight: 400;">ხელშეკრულებას შემდეგზე:</span></p>
<p>&nbsp;</p>
<ol>
<li><span style="font-weight: 400;"> ხელშეკრულების საგანი და არსი</span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">1.1. დაცვითი ფუნქციის შესრულება (საზოგადოებრივი წესრიგისა და მატერიალური ქონების დაცვა) _ საქართველოს ,,შრომითი</span></p>
<p><span style="font-weight: 400;">კოდექსით&rdquo;, საქართველოს კანონით &ldquo;კერძო დაცვითი საქმიანობის შესახებ&rdquo;, წინამდებარე ხელშეკრულებით, კონკრეტული</span></p>
<p><span style="font-weight: 400;">ობიექტის დაცვის ხელშეკრულებისა და სამსახურში მოქმედი შინაგანაწესით.</span></p>
<ol start="2">
<li><span style="font-weight: 400;"> მუშაობის განრიგი და გრაფიკი</span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">2.1 ,,დამსაქმებელი&rdquo; სამუშაოდ იღებს <b> <?php echo $saxeli; ?> </b> დაცვის სამსახურში მცველად.</span></p>
<p><span style="font-weight: 400;">2.2 ,,დასაქმებულის&rdquo; სამუშაო განრიგი და გრაფიკი განისაზღვრება - <b><?php echo $misamarti; ?></b></span></p>
<p>&nbsp;</p>
<ol start="3">
<li><span style="font-weight: 400;"> შრომის ანაზღაურება და მისი პირობები</span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">3.1 &ldquo;დასაქმებულის&rdquo; შრომის ანაზღაურება თვეში შეადგენს --------------------------------------------------------</span></p>
<p><span style="font-weight: 400;">-------------------------------------------------------------------------------------- ----------------------------------------------------------------</span></p>
<p><span style="font-weight: 400;">3.2 &ldquo;დამსაქმებლის&rdquo; მიერ &ldquo;დასაქმებულისათვის&rdquo; შრომის ანაზღაურების გადახდა განხორციელდება ნაღდი ან უნაღდო</span></p>
<p><span style="font-weight: 400;">ანგარიშსწორებით, არაუგვიანეს მომდევნო თვის 05 &ndash;დან 20 რიცხვამდე.</span></p>
<p>&nbsp;</p>
<ol start="4">
<li><span style="font-weight: 400;"> მხარეთა უფლება-მოვალეობანი და პასუხისმგებლობა</span></li>
</ol>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">4.1 მხარეთა უფლება-მოვალეობები, საქმიანობის საგანი და სფერო განისაზღვრება საქართველოს ,,შრომითი კოდექსით&rdquo;,</span></p>
<p><span style="font-weight: 400;">საქართველოს კანონით &ldquo;კერძო დაცვითი საქმიანობის შესახებ&rdquo;, წინამდებარე ხელშეკრულებითა და კონკრეტული ობიექტის</span></p>
<p><span style="font-weight: 400;">დაცვის ხელშეკრულების საფუძველზე.</span></p>
<p><span style="font-weight: 400;">4.2 &ldquo;დამსაქმებელი&rdquo; ვალდებულია:</span></p>
<p><span style="font-weight: 400;">- უზრუნველყოს &ldquo;დასაქმებული&rdquo; სამუშაო პირობებით, რაც აუცილებელია წინამდებარე ხელშეკრულებით გათვალისწინებული</span></p>
<p><span style="font-weight: 400;">მოვალეობების შესასრულებლად;</span></p>
<p><span style="font-weight: 400;">- უზრუნველყოს &ldquo;დასაქმებული&rdquo; დაცვის განხორციელებისათვის საჭირო საშუალებებით.</span></p>
<p><span style="font-weight: 400;">- დააზღვიოს &bdquo;დასაქმებულის&ldquo; სიცოცხლე და ჯანმრთელობა ხელშეკრულების მოქმედების ვადის განმავლობაში.</span></p>
<p><span style="font-weight: 400;">4.3 &ldquo;დამსაქმებელს&rdquo; უფლება აქვს:</span></p>
<p><span style="font-weight: 400;">- მოსთხოვოს &ldquo;დასაქმებულს&rdquo; ხელშეკრულებით ნაკისრი მოვალეობების ზუსტი და განუხრელი შესრულება;</span></p>
<p><span style="font-weight: 400;">- თავისი შეხედულებისამებრ &bdquo;დასაქმებულს&ldquo; შეუცვალოს დასაცავი ობიექტი, (სამუშაო ადგილი) შესაბამისი ანაზღაურების</span></p>
<p><span style="font-weight: 400;">გათვალისწინებით.</span></p>
<p><span style="font-weight: 400;">- &bdquo;დამსაქმებელსა&ldquo; და დასაცავ ობიექტს შორის დაცვითი ხელშეკრულების შეწყვეტის დღიდან, შეუწყვიტოს &bdquo;დასაქმებულს&ldquo;</span></p>
<p><span style="font-weight: 400;">შრომითი და კონკრეტული ობიექტის დაცვის ხელშეკრულება.</span></p>
<p><span style="font-weight: 400;">- &ldquo;დასაქმებულის&rdquo; მიერ ხელშეკრულების 4.4. მუხლით გათვალისწინებული ვალდებულების შეუსრულებლობის შემთხვევაში, ვადის</span></p>
<p><span style="font-weight: 400;">გასვლამდე ცალმხრივად შეწყვიტოს ხელშეკრულება;</span></p>
<p><span style="font-weight: 400;">- ობიექტის ხელმძღვანელის (დამქირავებლის) შეხედულებისამებრ, კონკრეტული მიზეზის განმარტების გარეშე, შეუცვალოს</span></p>
<p><span style="font-weight: 400;">სამუშაო ადგილი ან ცალმხრივად, ვადამდე შეუწყვიტოს ხელშეკრულება &ldquo;დასაქმებულს&rdquo;</span></p>
<p><span style="font-weight: 400;">- &bdquo;დასაქმებულის&ldquo; მიერ ერთი თვით ადრე წერილობითი შეტყობინების გარეშე სამსახურიდან წასვლის შემთხვევაში, არ</span></p>
<p><span style="font-weight: 400;">გადაუხადოს ხელშეკრულების 3.1. მუხლით გათვალისწინებული შრომის ანაზღაურება.</span></p>
<p><span style="font-weight: 400;">4.4 &ldquo;დასაქმებული&rdquo; ვალდებულია:</span></p>
<p><span style="font-weight: 400;">- უზრუნველყოს ობიექტზე ფულადი სახსრების და ქონების დაცვა მართლსაწინააღმდეგო ქმედებისაგან.</span></p>
<p><span style="font-weight: 400;">- უზრუნველყოს ობიექტზე საზოგადოებრივი წესრიგის დაცვა.</span></p>
<p><span style="font-weight: 400;">- &bdquo;კერძო დაცვითი საქმიანობის შესახებ&ldquo; კანონის თანახმად, გადაიხადოს მცველის მოწმობის</span></p>
<p><span style="font-weight: 400;">საფასური 20 ლარი.</span></p>
<p><span style="font-weight: 400;">- სამსახურეობრივი მოვალეობის შესრულების დროს თან იქონიოს მცველის დამადასტურებელი მოწმობა, წინააღმდეგ</span></p>
<p><span style="font-weight: 400;">შემთხვევაში, თანახმად, საქართველოს კანონის &bdquo;კერძო დაცვითი საქმიანობის შესახებ&ldquo; დაჯარიმდება 2000 (ორიათასი)</span></p>
</div>
<div id="second-page">
<p><span style="font-weight: 400;">ლარის ოდენობით.</span></p>
<p><span style="font-weight: 400;">- დაცვის განხორციელების (სამუშაოს შესრულების) დროს არ შევიდეს კონტაქტში უცხო პირებთან და არ მიიღოს ალკოჰოლური</span></p>
<p><span style="font-weight: 400;">სასმელი;</span></p>
<p><span style="font-weight: 400;">- ზუსტად და განუხრელად შეასრულოს კანონის, ხელშეკრულების, დაცვის სამსახურის შინაგანაწესის მოთხოვნები, ასევე</span></p>
<p><span style="font-weight: 400;">ზეპირი მითითებები.</span></p>
<p><span style="font-weight: 400;">- იყოს ყოველთვის დაკვირვებული და ყურადღებიანი, თვალი ადევნოს ობიექტზე არსებულ ვითარებას;</span></p>
<p><span style="font-weight: 400;">- არ დატოვოს დასაცავი ობიექტი და საგუშაგო სამუშაო პერიოდში;</span></p>
<p><span style="font-weight: 400;">- სამუშაო დღის დასრულებამდე,შეამოწმოს დასაცავი ობიექტის სახანძრო-დაცვითი სიგნალიზაციის მუშაობის</span></p>
<p><span style="font-weight: 400;">მდგომარეობა და მისი გაუმართაობის შემთხვევაში, აცნობოს დაცვის სამსახურს, ხარვეზის აღმოსაფხვრელად, მის</span></p>
<p><span style="font-weight: 400;">აღდგენამდე უზრუნველყოს ობიექტის დაცვა.</span></p>
<p><span style="font-weight: 400;">- გამოცხადდეს სამუშაოზე ,,დამსაქმებლის&lsquo;&rsquo; მიერ დამტკიცებული გრაფიკის მიხედვით და ფორმის ტანსაცმლით,</span></p>
<p><span style="font-weight: 400;">წინააღმდეგ შემთხვევაში დაჯარიმდება 500 (ხუთასი) ლარით.</span></p>
<p><span style="font-weight: 400;">- საგანგებო ვითარებაში შესაბამისი ინფორმაცია მიაწოდოს დაცვის სამსახურს და იმოქმედოს დადგენილი წესების და</span></p>
<p><span style="font-weight: 400;">სიტყვიერი ინსტრუქციების შესაბამისად;</span></p>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">- გაუფრთხილდეს დაცვის სამსახურის მიერ მისთვის დროებით სარგებლობაში გადაცემული დაცვის განხორციელებისათვის</span></p>
<p><span style="font-weight: 400;">განკუთვნილ ქონებას. ზემოაღნიშნული ქონების დაზიანების ან დაკარგვის შემთხვევაში დაჯარიმდება ქონების</span></p>
<p><span style="font-weight: 400;">ღირებულების შესაბამისად.</span></p>
<p><span style="font-weight: 400;">- აუცილებლობის შემთხვევაში, აღნიშნული ხელშეკრულებით განსაზღვრული ანაზღაურებით, (დამატებითი ანაზღაურების</span></p>
<p><span style="font-weight: 400;">გარეშე) დამატებით იმუშაოს არაუმეტეს ორი ცვლისა, ,,დამქირავებლის&rsquo;&rsquo; მიერ განსაზღვრული გრაფიკის შესაბამისად.</span></p>
<p><span style="font-weight: 400;">- ხელშეკრულების ვადაზე ადრე შეწყვეტის შემთხვევაში, აანაზღაუროს ,,დამსაქმებლის&rdquo; მიერ მასზე გაწეული დაზღვევის</span></p>
<p><span style="font-weight: 400;">ხარჯი.</span></p>
<p><span style="font-weight: 400;">- აანაზღაუროს მისი ბრალით მიყენებული მატერიალური ზარალი;</span></p>
<p><span style="font-weight: 400;">- არ გაახმაუროს დაცვის სამსახურის კონფიდენციალური ინფორმაცია ;</span></p>
<p><span style="font-weight: 400;">- სამსახურიდან საკუთარი სურვილით წასვლის შემთხვევაში ერთი თვით ადრე, წერილობით, აცნობოს ,,დამსაქმებელს&rdquo;</span></p>
<p><span style="font-weight: 400;">- &laquo; დასაქმებულის &raquo; მიერ, დასაცავ ობიექტზე მომსახურების ხელშეკრულების შეწყვეტის შემდგომ, დაცვითი ფუნქციების</span></p>
<p><span style="font-weight: 400;">განხორციელებისას &laquo; დასაქმებული &raquo; დაჯარიმდება &laquo; დასაქმებულთან &raquo; მუშაობის მთელი პერიოდის მანძილზე მიღებული</span></p>
<p><span style="font-weight: 400;">ხელფასის 50%-ის ოდენობით და არ მიეცემა ბოლო თვის შრომითი ანაზღაურება.</span></p>
<p><span style="font-weight: 400;">- თავისი მოვალეობების სრულყოფილად შესრულების მიზნით, სრულად გაეცნოს კანონს ,,კერძო დაცვითი საქმიანობის შესახებ&rdquo;</span></p>
<p><span style="font-weight: 400;">და სამსახურში მოქმედ შინაგანაწესს.</span></p>
<p><span style="font-weight: 400;">4.5 ,,დასაქმებულს&rdquo; უფლება აქვს:</span></p>
<p><span style="font-weight: 400;">- დაცვის განხორციელებისათვის მიიღოს ხელშეკრულებით გათვალისწინებული ანაზღაურება;</span></p>
<ol start="5">
<li><span style="font-weight: 400;"> ხელშეკრულების ვადა</span></li>
</ol>
<p><span style="font-weight: 400;">5.1. ხელშეკრულება ძალაში შედის 201---- წლის -----------------------------.</span></p>
<p><span style="font-weight: 400;">5.2. ხელშეკრულება მოქმედებს უვადოდ.</span></p>
<p><span style="font-weight: 400;">5.3. ხელშეკრულების პირველი 6 (ექვსი) თვე ითვლება გამოსაცდელ ვადათ.</span></p>
<ol start="6">
<li><span style="font-weight: 400;"> დავების გადაწყვეტის წესი</span></li>
</ol>
<p><span style="font-weight: 400;">6.1. ამ ხელშეკრულებიდან გამომდინარე მხარეთა შორის წამოჭრილი ყოველი უთანხმოება გადაწყდება</span></p>
<p><span style="font-weight: 400;">ურთიერთშეთანხმებით. შეუთანხმებლობის შემთხვევაში დავა გადაეცემა სასამართლოს, საქართველოში მოქმედი</span></p>
<p><span style="font-weight: 400;">კანონმდებლობის შესაბამისად.</span></p>
<ol start="7">
<li><span style="font-weight: 400;"> სხვა პირობები</span></li>
</ol>
<p><span style="font-weight: 400;">7.1. წინამდებარე ხელშეკრულება შედგენილია ქართულ ენაზე 2 (ორ) ეგზემპლარად, ხელმოწერილია და ორივეს თანაბარი იურიდიული</span></p>
<p><span style="font-weight: 400;">ძალა აქვს.</span></p>
<p><span style="font-weight: 400;">7.2 ხელშეკრულებაში ცვლილებების შეტანა დასაშვებია მხოლოდ მხარეთა წერილობითი შეთანხმებით.</span></p>
<p><span style="font-weight: 400;">8 მხარეთა რეკვიზიტები</span></p>
<p><span style="font-weight: 400;">8.1. ,,დამსაქმებელი&rdquo;- შ.პ.ს. &ldquo;ვიქტორია სექიურითი&rdquo; ქ. თბილისი, ჩიქოვანის ქ#2; ტელ: 2 50 50 90</span></p>
<p><span style="font-weight: 400;">8.2. ,,დასაქმებული&rdquo; (დაცვის თანამშრომელი): პირადი ნომერი <b><?php echo $pnomeri; ?> </b></span></p>
<p><span style="font-weight: 400;">რეგ. მის: <b><?php echo $address; ?></b> ტელ:<b><?php echo $phone; ?></b></span></p>
<p><span style="font-weight: 400;">შ.პ.ს. &ldquo;ვიქტორია სექიურითი&rdquo;-ს</span></p>
<p><span style="font-weight: 400;">გენერალური დირექტორის</span></p>
<p><span style="font-weight: 400;">მოადგილე: /კ. ნავაძე/</span></p>
<p><span style="font-weight: 400;">,,დასაქმებული&rdquo; /-------------------------------/</span></p>
<p>&nbsp;</p>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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