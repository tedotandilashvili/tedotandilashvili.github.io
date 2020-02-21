<?php
    $kodi = $_POST["kodi"];
    include('config.php');
    // var_dump($kodi);
    $sel = mysqli_query($conn, "SELECT * FROM momxmarebeli WHERE code = '$kodi'");
    $arr = mysqli_fetch_assoc($sel);
    // echo $arr['name'];
    // echo $arr['mail'];
    // echo $arr['addl'];
    // echo $arr['phone'];
    // echo $arr['addp'];
    // echo $arr['tarigi'];
    // echo $arr['shenishvna'];
    // echo $arr['city'];
    // echo $arr['contact'];
    // echo $arr['cmobile'];

?>
<table class="table">
    <thead>
      <tr>
        <th>
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
        <input type="text" value="<?php echo $arr['name']?>" name="name" class="form-control" autocomplete="off"></label></th>
        <th><label>ელექტრონული ფოსტა</label>
                <input type="mail" id="maili" name="mail" class="form-control" autocomplete="off" onkeypress=""></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <label>გადამცემის ნომერი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['gadamcemi']?>" name="gadamcemi" class="form-control" autocomplete="off">
        </td>
        <td> <label>საკონტაქტო პირი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['contact']?>" name="contact" class="form-control" autocomplete="off"></td>
        <td> <label>ქალაქი<font color="red">*</font></label>
                                <select value="<?php echo $arr['city']?>" name="city" class="form-control">   
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
                <input type="text" value="<?php echo $arr['addp']?>" name="addp" class="form-control"></td>
      
     
        <td><label>დამკვეთის საკონტაქტო ტელეფონი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['phone']?>" name="phone" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
        <td><label>პასუხისმგებელი პირი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['pasuxismgebeli']?>" name="pasuxismgebeli" class="form-control" autocomplete="off" minlength="2" maxlength="80" /></td>

      </tr>
      <tr>
        <td> <label>მონტაჟის სასურველი თარიღი<font color="red">*</font></label>
                <input type="date" value="<?php echo $arr['date']?>" name="tarigi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>
                <td> <label>საიდენტიფიკაციო კოდი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['code']?>" name="code" id="kodi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" /></td>
        <td>
             <label>პასუხისმგებელი პირის ტელეფონი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['cmobile']?>" name="cmobile" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" /></td>

               <tr>
                <td><label>ობიექტი საკუთრების ფორმა<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['own']?>" name="own" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>მომსახურება: GPRS, KP, VIS, B2 -ზე ცენტრალურ სამეთვალყურეო პულტზე (ცსპ) ან საგანგაშო ღილაკზე დაცვის საათები<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['gsm']?>" name="gsm"  class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>გას. ფასის ჯამი <font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['price']?>" name="price" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <tr>
                <td><label>ზონების გაშიფვრა კი/არა<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['zona']?>" name="zona" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>მსხვრევის დეტექტორი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['msxvreva']?>" name="msxvreva" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>სახანძრო დეტექტორი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['saxandzro']?>" name="saxandzro" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <tr>
                <td><label>ხელშეკრულების სახეობა აქცია/არა<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['aqcia']?>" name="aqcia" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>ყოველთვიური სააბონენტო დღგ–ს ჩათვლით<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['saabonento']?>" name="saabonento" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>დღგ–ს გადამხდელი დღგ/არა<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['tax']?>" name="tax" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <tr>
                <td><label>ხელშეკრულების გაფორმების და მოქმედების ვადა (თარიღი)<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['vada']?>" name="vada" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>დაცულია თუ არა ობიექტი ცოცხალი ძალით (აღჭურვილობა, რაცია ან სხვა)<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['cocxali']?>" name="cocxali" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
            <td><label>ობიექტის ჩახსნის თარიღი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['chaxsna']?>" name="chaxsna" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </td>
        </tr>
        <td>         <td><label>შენიშვნა</label><br>
                <textarea name="shenishvna"  value="<?php echo $arr['shenishvna']?>" class="form-control" rows="5" id="comment"></textarea></td></td>


      </tr>
    </tbody>
  </table>
            <div class="input-group">
                
                <br />
                <input type="submit" name="register" class="form-control btn-danger" value="დამატება">
            </div>
        </form>