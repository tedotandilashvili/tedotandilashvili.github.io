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
<form action="" method="POST" name="forma">
            <div class="input-group">
                <div class="input-group">
                                <label>ორგანიზაციის სამართლებრივი ფორმა<font color="red">*</font></label>
                                <select name="type" value="<?php echo $arr['type']?>" class="form-control">   
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
                                </select>
                            </div>
                <label>ორგანიზაციის სახელი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['name']?>" name="name" class="form-control" autocomplete="off">
            </div>

            <!-- axlebia -->

             <div class="input-group">
                <label>ობიექტის ტიპი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['obtype']?>" name="obtype" class="form-control" autocomplete="off">
            </div>

            <div class="input-group">
                <div class="input-group">
                                <label>ობიექტის საკუთრების ფორმა<font color="red">*</font></label>
                                <select name="sak" value="<?php echo $arr['sak']?>" class="form-control">   
                                    <option value="იჯარა">იჯარა</option>
                                    <option value="საკუთრება">საკუთრება</option>

                                </select>
                            </div>
            </div>
            <div class="input-group">
                <div class="input-group">
                                <label>მსხვრევის დეტექტორი<font color="red">*</font></label>
                                <select name="msxvreva" value="<?php echo $arr['msxvreva']?>" class="form-control">   
                                    <option value="კი">კი</option>
                                    <option value="არა">არა</option>

                                </select>
                            </div>
            </div>
            <div class="input-group">
                <div class="input-group">
                                <label>სახანძრო დეტექტორი<font color="red">*</font></label>
                                <select name="sax" value="<?php echo $arr['sax']?>" class="form-control">   
                                    <option value="კი">კი</option>
                                    <option value="არა">არა</option>

                                </select>
                            </div>
            </div>

            <div class="input-group">
                <div class="input-group">
                                <label>ხელშეკრულების ფორმა - აქცია<font color="red">*</font></label>
                                <select name="aqcia" value="<?php echo $arr['aqcia']?>" class="form-control">   
                                    <option value="კი">კი</option>
                                    <option value="არა">არა</option>

                                </select>
                            </div>
            </div>

            <div class="input-group">
                <div class="input-group">
                                <label>დღგ-ს გადამხდელი<font color="red">*</font></label>
                                <select name="dgg" value="<?php echo $arr['dgg']?>" class="form-control">   
                                    <option value="კი">კი</option>
                                    <option value="არა">არა</option>

                                </select>
                            </div>
            </div>
            <div class="input-group">
                <label>ყოველთვიური სააბონენტო დღგ-ს ჩათვლით<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['saabonento']?>" name="saabonento" class="form-control" autocomplete="off">
            </div>
            <div class="input-group">
                <div class="input-group">
                                <label>ცოცხალი ძალა<font color="red">*</font></label>
                                <select name="cocxali" value="<?php echo $arr['cocxali']?>" class="form-control">   
                                    <option value="კი">კი</option>
                                    <option value="არა">არა</option>

                                </select>
                            </div>

            <div class="input-group">
                <label>ხელშეკრულების გაფორმების თარიღი<font color="red">*</font></label>
                <input type="date" value="<?php echo $arr['xelshekruleba']?>" name="xelshekruleba" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" />
            </div>

            <div class="input-group">
                <label>ხელშეკრულების მოქმედების ვადა<font color="red">*</font></label>
                <input type="date" value="<?php echo $arr['vada']?>" name="vada" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" />
            </div>
            <!-- eseni axlebia -->

            <div class="input-group">
                <label>ელექტრონული ფოსტა<font color="red">*</font></label>
                <input type="mail" value="<?php echo $arr['mail']?>" id="maili" name="mail" class="form-control" autocomplete="off" onkeypress="">
            </div>

            <div class="input-group">
                <label>საკონტაქტო პირი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['addl']?>" name="addl" class="form-control" autocomplete="off">
            </div>
            <div class="input-group">
                <div class="input-group">
                                <label>ქალაქი<font color="red">*</font></label>
                                <select name="city" value="<?php echo $arr['city']?>" class="form-control">   
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
                                </select>
                            </div>
            </div>
            <div class="input-group">
                <label>ფაქტიური მისამართი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['addp']?>" name="addp" class="form-control">
            </div>
            <div class="input-group">
                <label>ორგანიზაციის ტელეფონი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['phone']?>" name="phone" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" />
            </div>
              <div class="input-group">
                <label>პასუხისმგებელი პირი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['contact']?>" name="contact" class="form-control" autocomplete="off" minlength="2" maxlength="80" />
            </div>
            <div class="input-group">
                <label>პასუხისმგებელი პირის ტელეფონი<font color="red">*</font></label>
                <input type="text" value="<?php echo $arr['cmobile']?>" name="cmobile" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" />
            </div>
            <div class="input-group">
                <label>მონტაჟის სასურველი თარიღი<font color="red">*</font></label>
                <input type="date" value="<?php echo $arr['tarigi']?>" name="tarigi" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" minlength="9" maxlength="9" />
            </div>
            <div class="input-group">
                <label>შენიშვნა</label><br>
                <textarea name="shenishvna" value="<?php echo $arr['shenishvna']?>" class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="input-group">
                <br />
                <input type="submit" name="register" class="form-control btn-danger" value="დამატება">
            </div>
        </form>