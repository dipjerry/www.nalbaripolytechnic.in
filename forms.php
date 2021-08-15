<style>
    .required {
        color: red;
    }

    textarea {
        resize: vertical;
    }

    input[type=text] {
        text-transform: uppercase;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center text-uppercase">
            <h1>Membership Form</h1>
        </div>
        <div class="col-lg-12">
            <form id="form-work" class="" name="form-work" action="" method="post" enctype="multipart/form-data">
                <div id="error-message">x</div>
                <div id="success-message"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="roll" style="font-weight: bold;color: black;">Roll no <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="a_roll" id="a_roll" class="form-control" placeholder="NAL/YY/BRANCH/CODE" type="text" autocomplete="OFF" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="name" style="font-weight: bold;color: black;">Name <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="a_name" id="a_name" class="form-control" placeholder="Enter name" type="text" autocomplete="OFF" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="email" style="font-weight: bold;color: black;">Email Id <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="a_email" id="a_email" class="form-control" placeholder="Enter email id" type="email" autocomplete="OFF" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="a_achiev" style="font-weight: bold;color: black;">Special Achievement during studenship or
                                any Union portfolio during the period of study </label>
                            <textarea name="a_achiev" id="a_achiev" class="form-control" placeholder="Enter Special Achievement" autocomplete="OFF" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="p_address" style="font-weight: bold;color: black;">Permanent Address <span style="color: red; font-weight: bold;">*</span></label>
                            <textarea name="p_addr" id="p_addr" class="form-control" placeholder="Enter permanent address" autocomplete="OFF" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="" style="font-weight: bold;color: black;">State <span style="color: red; font-weight: bold;">*</span></label>
                            <select name="a_stte" id="state-list" class="form-control" style="width: 100%;" onChange="getCity(this.value);" required>
                                <option value="1">Andaman and Nicobar Islands</option>
                                <option value="2">Andhra Pradesh</option>
                                <option value="3">Arunachal Pradesh</option>
                                <option value="4" selected='selected'>Assam</option>
                                <option value="5">Bihar</option>
                                <option value="6">Chandigarh</option>
                                <option value="7">Chhattisgarh</option>
                                <option value="8">Dadra and Nagar Haveli</option>
                                <option value="9">Daman and Diu</option>
                                <option value="10">Delhi</option>
                                <option value="11">Goa</option>
                                <option value="12">Gujarat</option>
                                <option value="13">Haryana</option>
                                <option value="14">Himachal Pradesh</option>
                                <option value="15">Jammu and Kashmir</option>
                                <option value="16">Jharkhand</option>
                                <option value="17">Karnataka</option>
                                <option value="18">Kenmore</option>
                                <option value="19">Kerala</option>
                                <option value="20">Lakshadweep</option>
                                <option value="21">Madhya Pradesh</option>
                                <option value="22">Maharashtra</option>
                                <option value="23">Manipur</option>
                                <option value="24">Meghalaya</option>
                                <option value="25">Mizoram</option>
                                <option value="26">Nagaland</option>
                                <option value="27">Narora</option>
                                <option value="28">Natwar</option>
                                <option value="29">Odisha</option>
                                <option value="30">Paschim Medinipur</option>
                                <option value="31">Pondicherry</option>
                                <option value="32">Punjab</option>
                                <option value="33">Rajasthan</option>
                                <option value="34">Sikkim</option>
                                <option value="35">Tamil Nadu</option>
                                <option value="36">Telangana</option>
                                <option value="37">Tripura</option>
                                <option value="38">Uttar Pradesh</option>
                                <option value="39">Uttarakhand</option>
                                <option value="41">West Bengal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="" style="font-weight: bold;color: black;">City<span style="color: red; font-weight: bold;">*</span></label>
                            <select name="a_cty" id="city-list" class="form-control" style="width: 100%;">
                                <option value="316">Abhayapuri</option>
                                <option value="317">Ambikapur</option>
                                <option value="318">Amguri</option>
                                <option value="319">Anand Nagar</option>
                                <option value="320">Badarpur</option>
                                <option value="321">Badarpur Railway Town</option>
                                <option value="322">Bahbari Gaon</option>
                                <option value="323">Bamun Sualkuchi</option>
                                <option value="324">Barbari</option>
                                <option value="325">Barpathar</option>
                                <option value="326">Barpeta</option>
                                <option value="327">Barpeta Road</option>
                                <option value="328">Basugaon</option>
                                <option value="329">Bihpuria</option>
                                <option value="330">Bijni</option>
                                <option value="331">Bilasipara</option>
                                <option value="332">Biswanath Chariali</option>
                                <option value="333">Bohori</option>
                                <option value="334">Bokajan</option>
                                <option value="335">Bokokhat</option>
                                <option value="336">Bongaigaon</option>
                                <option value="337">Bongaigaon Petro-chemical Town</option>
                                <option value="338">Borgolai</option>
                                <option value="339">Chabua</option>
                                <option value="340">Chandrapur Bagicha</option>
                                <option value="341">Chapar</option>
                                <option value="342">Chekonidhara</option>
                                <option value="343">Choto Haibor</option>
                                <option value="344">Dergaon</option>
                                <option value="345">Dharapur</option>
                                <option value="346">Dhekiajuli</option>
                                <option value="347">Dhemaji</option>
                                <option value="348">Dhing</option>
                                <option value="349">Dhubri</option>
                                <option value="350">Dhuburi</option>
                                <option value="351">Dibrugarh</option>
                                <option value="352">Digboi</option>
                                <option value="353">Digboi Oil Town</option>
                                <option value="354">Dimaruguri</option>
                                <option value="355">Diphu</option>
                                <option value="356">Dispur</option>
                                <option value="357">Doboka</option>
                                <option value="358">Dokmoka</option>
                                <option value="359">Donkamokan</option>
                                <option value="360">Duliagaon</option>
                                <option value="361">Duliajan</option>
                                <option value="362">Duliajan No.1</option>
                                <option value="363">Dum Duma</option>
                                <option value="364">Durga Nagar</option>
                                <option value="365">Gauripur</option>
                                <option value="366">Goalpara</option>
                                <option value="367">Gohpur</option>
                                <option value="368">Golaghat</option>
                                <option value="369">Golakganj</option>
                                <option value="370">Gossaigaon</option>
                                <option value="371" selected='selected'>Guwahati</option>
                                <option value="372">Haflong</option>
                                <option value="373">Hailakandi</option>
                                <option value="374">Hamren</option>
                                <option value="375">Hauli</option>
                                <option value="376">Hauraghat</option>
                                <option value="377">Hojai</option>
                                <option value="378">Jagiroad</option>
                                <option value="379">Jagiroad Paper Mill</option>
                                <option value="380">Jogighopa</option>
                                <option value="381">Jonai Bazar</option>
                                <option value="382">Jorhat</option>
                                <option value="383">Kampur Town</option>
                                <option value="384">Kamrup</option>
                                <option value="385">Kanakpur</option>
                                <option value="386">Karimganj</option>
                                <option value="387">Kharijapikon</option>
                                <option value="388">Kharupetia</option>
                                <option value="389">Kochpara</option>
                                <option value="390">Kokrajhar</option>
                                <option value="391">Kumar Kaibarta Gaon</option>
                                <option value="392">Lakhimpur</option>
                                <option value="393">Lakhipur</option>
                                <option value="394">Lala</option>
                                <option value="395">Lanka</option>
                                <option value="396">Lido Tikok</option>
                                <option value="397">Lido Town</option>
                                <option value="398">Lumding</option>
                                <option value="399">Lumding Railway Colony</option>
                                <option value="400">Mahur</option>
                                <option value="401">Maibong</option>
                                <option value="402">Majgaon</option>
                                <option value="403">Makum</option>
                                <option value="404">Mangaldai</option>
                                <option value="405">Mankachar</option>
                                <option value="406">Margherita</option>
                                <option value="407">Mariani</option>
                                <option value="408">Marigaon</option>
                                <option value="409">Moran</option>
                                <option value="410">Moranhat</option>
                                <option value="411">Nagaon</option>
                                <option value="412">Naharkatia</option>
                                <option value="413">Nalbari</option>
                                <option value="414">Namrup</option>
                                <option value="415">Naubaisa Gaon</option>
                                <option value="416">Nazira</option>
                                <option value="417">New Bongaigaon Railway Colony</option>
                                <option value="418">Niz-Hajo</option>
                                <option value="419">North Guwahati</option>
                                <option value="420">Numaligarh</option>
                                <option value="421">Palasbari</option>
                                <option value="422">Panchgram</option>
                                <option value="423">Pathsala</option>
                                <option value="424">Raha</option>
                                <option value="425">Rangapara</option>
                                <option value="426">Rangia</option>
                                <option value="427">Salakati</option>
                                <option value="428">Sapatgram</option>
                                <option value="429">Sarthebari</option>
                                <option value="430">Sarupathar</option>
                                <option value="431">Sarupathar Bengali</option>
                                <option value="432">Senchoagaon</option>
                                <option value="433">Sibsagar</option>
                                <option value="434">Silapathar</option>
                                <option value="435">Silchar</option>
                                <option value="436">Silchar Part-X</option>
                                <option value="437">Sonari</option>
                                <option value="438">Sorbhog</option>
                                <option value="439">Sualkuchi</option>
                                <option value="440">Tangla</option>
                                <option value="441">Tezpur</option>
                                <option value="442">Tihu</option>
                                <option value="443">Tinsukia</option>
                                <option value="444">Titabor</option>
                                <option value="445">Udalguri</option>
                                <option value="446">Umrangso</option>
                                <option value="447">Uttar Krishnapur Part-I</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="" style="font-weight: bold;color: black;">PIN No.<span style="color: red; font-weight: bold;">*</span></label>
                            <input name="a_pin" class="form-control" placeholder="Enter PIN No." type="text" maxlength="6" autocomplete="OFF">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="mobile" style="font-weight: bold;color: black;">Mobile Number <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="a_mobile" id="a_mobile" class="form-control" placeholder="Enter mobile number" maxlength="10" type="number" autocomplete="OFF" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="mobile" style="font-weight: bold;color: black;">Whatsapp Number <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="a_Wno" id="a_Wno" class="form-control" placeholder="Enter Whatsapp number" maxlength="10" type="number" autocomplete="OFF" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="" style="font-weight: bold;color: black;">Official Contact Number</label>
                            <input name="o_code" id="o_code" class="form-control" placeholder="STD" type="text" maxlength="4" style="width: 25%;" autocomplete="OFF">
                            <input name="a_phone" id="a_phone" class="form-control" placeholder="Number" type="number" maxlength="10" style="width: 68%;float: right;margin-top: -38px;margin-right: 5%;" autocomplete="OFF">
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="occp" style="font-weight: bold;color: black;">Present Occupation <span style="color: red; font-weight: bold;">*</span></label>
                            <select name="occp" id="occp" class="form-control" onchange="rlval(this.value)" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option value="Student">Student</option>
                                <option value="Employed">Employed</option>
                                <option value="Self Employed">Self Employed</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="org" style="font-weight: bold;color: black;">Organization/Institution <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="org" id="org" class="form-control" placeholder="Enter Organization/Institution name" type="text" autocomplete="OFF" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="desig" style="font-weight: bold;color: black;">Designation</label>
                            <input name="desig" id="desig" class="form-control" placeholder="Enter designation" type="text" autocomplete="OFF">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="branch" style="font-weight: bold;color: black;">Branch of Engineering <span style="color: red; font-weight: bold;">*</span></label>
                            <select name="branch" id="branch" class="form-control" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option value="CSE">Computer Science & Engg</option>
                                <option value="EEE">Electrical</option>
                                <option value="PT">Printing Technology</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="passing" style="font-weight: bold;color: black;">Year of passing <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="passing" id="passing" class="form-control" placeholder="Enter Year of passing" maxlength="4" type="number" autocomplete="OFF" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="" style="font-weight: bold;color: black;">Your Photo <span style="color: red; font-weight: bold;">*</span> <span style="font-weight: lighter; font-size:12px; color: red">(Type: JPEG , JPEG. Size < 200kb)</span> </label> <input name="a_pic" id="a_pic" class="form-control" type="file" required>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="preview_tPhoto col-6 col-sm-2 d-flex justify-content-center" id="preview_tPhoto">
                            <img src="" id="profileDisplay" style="width: 100%;">
                        </div>
                        <img src="./images/blank.png" class="col-6 col-sm-4 img-thumbnail" id="a_photo" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="passing" style="font-weight: bold;color: black;">Fee Amount:- </label>
                            <span><b>&#8377; 500</b></span>
                            <br>
                            <span style="color:red"><b>Note:-</b></span>
                            <ul>
                                <li>money will be deducted from ......</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row" id="cash_dtl" style="display: none;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" style="font-weight: bold;color: black;">Payment Date <span style="color: red; font-weight: bold;">*</span></label>
                            <input name="dd_date" id="dd_date" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="col-md-6">&nbsp;</div>
                </div>
                <br>
                <button type="submit" name="add_alm" class="btn btn-primary text-uppercase mt-20" style="margin-left: 40%;">Submit</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        // photo validation
        // Validate Uploaded Pphotos size and extension
        $("#a_pic").change(function() {
            // echo("groot");
            readURL(this);
        });

        function readURL(input) {
            var a = (input.files[0].size);
            var name = input.files[0].name;
            var ext = name.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'jpeg']) == -1) {
                alert('invalid extension!');
                input.value = "";
            } else {
                if (a > 2000000) {
                    alert("Image size too large");
                    input.value = "";
                } else {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // alert(e.target.result);
                            $('#a_photo').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }
        }
        // validate phone no
        $("#a_mobile").on("blur", function() {
            var mobNum = $(this).val();
            var filter = /^\d{10}$/;
            if (mobNum != "") {
                if (!mobNum.match(filter)) {
                    $("#a_mobile").focus();
                    alert("must required 10 digit ");
                }
            }
        });
        // validated Email
        // Email Validation
        $("#a_email").on("blur", function() {
            var emailId = $(this).val();
            var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+(?:\.[a-zA-Z0-9-]+)*$/;
            if (emailId != "") {
                if (!emailId.match(filter)) {
                    setTimeout(function() {
                        $("#a_email").focus();
                    }, 0);
                    alert("Does not match email format");
                }
            }
        });
        $('input[type=text').keyup(function() {
            $(this).val().toUpperCase();
        });
        //Populate form 
        $("#a_roll").on("blur", function() {
            // alert("test1");
            var filter_term = $(this).val();
            $.ajax({
                url: "class/functions.php",
                type: "POST",
                data: {
                    method: 'getData',
                    roll: filter_term
                },
                dataType: "html",
                success: function(response) {
                    // alert(response);
                    var result = JSON.parse(response);
                    if (result.response == true) {
                        var data = result.rows;
                        $('#a_name').val(data[0].Student_Name)
                        $('#branch').val(data[0].Branch)
                        $('#a_name').attr('readonly', true)
                        $('#branch').attr('readonly', true)
                    } else if (result.response == false) {
                        // alert("fails");
                        $("#error-message").html("No Records Found.").slideDown();
                        $("#success-message").slideUp();
                        $('#a_name').val('')
                        $('#a_roll').val('')
                        $('#a_name').attr('readonly', false)
                        $('#branch').attr('readonly', false)
                        $('#branch').val('')
                    }
                }
            });
        });
        // save data to database
        $("#Alumuni_membership").on("submit", function(e) {
            e.preventDefault();
            alert("guu");
        });



    });
</script>