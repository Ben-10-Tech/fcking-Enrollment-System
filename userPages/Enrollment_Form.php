<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Enrollment Form</title>
    <link rel="stylesheet" href="../css/enrollment_form.css" media="all">
    <link rel="stylesheet" href="../css/enrollment_form_errors.css" media="all">
    <link rel="stylesheet" href="../css/enrollment_form_mq.css" media="all">
</head>
</body>
<?php
    include './user_base_designs.php';
?>
        <div class="content">
            <div class="content-title">
                <p>Learner's Enrollment Form</p>
            </div>

            <div class="content-wrapper">
                <form id="enrollment-form" class="form-main" method="POST" action="../server_side/post_enrollment_form_data.php" enctype="multipart/form-data">
                    <!--ANTAS AT IMPORMASYON NG PAARALAN-->
                    <div class="previous-school border-75">
                        <div class="previous-school-title">
                          <span class="title">ANTAS NG IMPORMASYON NG PAARALAN</span>
                        </div>
                        <div class="previous-school-row-1">
                        <div class="school-year">
                                <p class="dfont-acad-year">Taong Panuruan</p>
                                <!--ERROR MESSAGES DIVS FOR WRONG INPUTS -DAVID -->
                                <div class="academic-year-input">
                                    <div class="error-msg">
                                        <span class="em-start-year"> Error Message here.</span>
                                    </div>
                                    <div class="acad-year-tbox">
                                        <input type="number" name="start-year" id="start-year" class="textbox">
                                        <p> - </p>
                                        <input type="number" name="end-year" id="end-year" class="textbox">
                                    </div>
                                </div>
                            </div>
                            <div class="learner-radio">
                                <p class="dfont">I-check lamang naaangkop</p>
                                <div class="lrn-radio-buttons-selections">
                                    <input type="radio" id="No-LRN" name="LRN" value="0" class="radio">
                                    <label for="no-lrn">Walang LRN</label>
                                    <input type="radio" id="With-LRN" name="LRN" value="1" class="radio">
                                    <label for="with-lrn">Mayroong LRN</label>
                                    <input type="radio" id="Returning" name="LRN" value="2" class="radio">
                                    <label for="returning">Returning (Balik Aral)</label>
                                </div>
                            </div>
                        </div>
                        <div class="previous-school-wrapper">
                            
                            <div class="grade">

                                <p class="dfont">Baitang na nais ipatala</p>
                                <select name="grades-tbe" id="grades-tbe" class="select">
                                    <?php
                                        require_once '../server_side/getGradeLevels.php';
                                        $view = new getGradeLevels();
                                    ?>
                                </select>

                                <p class="dfont">Huling baitang na natapos</p>
                                <select name="last-grade" id="last-grade" class="select">
                                    <?php 
                                        $view = new getGradeLevels();
                                    ?>
                                </select>

                                <div class="last-year-finished">
                                    <p class="dfont">Huling natapos na taon</p>
                                    <div class="error-msg">
                                        <span class="em-last-year-finished"> Error Message Here. </span>
                                    </div>
                                    <input type="number" name="last-year" id="last-year" class="textbox">
                                </div>
                            </div>
                            <div class="heducation">
                                <div class="lschool-wrapper">
                                    <div class="last-school">
                                        <p class="dfont">Huling paaralang pinasukan</p>
                                        <div class="error-msg">
                                            <span class="em-lschool"> Error Message Here. </span>
                                        </div>
                                        <input type="text" name="lschool" id="lschool" class="textbox" placeholder="South II Elementary School">
                                    </div>
                                        <div class="lschoolID">
                                        <p class="dfont">ID ng paaralan</p>
                                        <div class="error-msg">
                                            <span class="em-lschoolID"> Error Message Here. </span>
                                        </div>
                                        <input type="number" name="lschoolID" id="lschoolID" class="textbox">
                                    </div>
                                </div>
                                <p class="dfont">Address ng paaralan</p>
                                <div class="error-msg">
                                    <span class="em-lschoolAddress"> Error Message Here.</span>
                                </div>
                                <input type="text" name="lschoolAddress" id="lschoolAddress" class="textbox">  
                                <p class="dfont">Huling natapos na taon sa paaralan</p>
                                <div> 
                                    <input type="radio" name="educational-choice" id="" class="radio" value="private">
                                    <label for="private">Pribado</label>
                                    <input type="radio" name="educational-choice" id="" class="radio" value="public">
                                    <label for="public">Pampubliko</label>
                                </div>
                            </div>

                            <div class="nais-paaralan">
                                <div class="fschool-wrapper">
                                    <div class="fschool">
                                        <p class="dfont">Nais na paaralan</p>
                                        <div class="error-msg">
                                            <span class="em-fschool"> Error Message Here. </span>
                                        </div>
                                        <input type="text" name="fschool" id="fschool" class="textbox" placeholder="South II Elementary School">
                                    </div>
                                    <div class="fschoolID">
                                        <p class="dfont">ID ng paaralan</p>
                                        <div class="error-msg">
                                            <span class="em-fschoolID"> Error Message Here. </span>
                                        </div>
                                        <input type="number" name="fschoolID" id="fschoolID" class="textbox">
                                    </div>
                                </div>
                                <p class="dfont">Address ng paaralan</p>
                                <div class="error-msg">
                                    <span class="em-fschoolAddress"> Error Message Here. </span>
                                </div>
                                <input type="text" name="fschoolAddress" id="fschoolAddress" class="textbox">
                            </div>
                        </div>
                    </div>

                    <!--IMPORMASYON NG STUDYANTE-->
                    <div class="student-information border-75">
                        <div class="student-information-title">
                            <span class="title">IMPORMASYON NG ESTUDYANTE</span>
                        </div>
                        <!--ROW 1-->
                        <div class="student-info-row-1">
                            <div class="PSA-number">
                                    <p class="dfont">Numero na nakalagay sa Sertipiko ng Kapanganakan <br class="responsive-text-break">(Birth Certificate) mula sa PSA (kung may dala na kopya)</p>
                                    <div class="error-msg">
                                        <span class="em-PSA-number"></span>
                                    </div>
                                    <input type="number" name="PSA-number" id="PSA-number" class="textbox">
                                </div>
                                <div class="LRN">
                                    <p class="dfont">Learner's Reference Number (LRN) kung mayroon</p>
                                    <div class="error-msg">
                                        <span class="em-LRN"></span>
                                    </div>
                                    <input type="number" name="boolLRN" id="LRN" class="textbox">
                                </div>
                           </div>
                        <div class="student-information-wrapper">
                        
                            <!--ROW 2-->
                            <div class="student-info-row-2">
                                <div class="lname">
                                    <p class="dfont">Apelyido</p>
                                    <div class="error-msg">
                                        <span class="em-lname"></span>
                                    </div>
                                    <input type="text" name="lname" id="lname" class="textbox" placeholder="Dela Cruz">
                                </div>
                                <div class="fname">
                                    <p class="dfont">Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-fname"></span>
                                    </div>
                                    <input type="text" name="fname" id="fname" class="textbox" placeholder="John Mark">
                                </div>
                                <div class="mname">
                                    <p class="dfont">Gitnang Pangalan(Iwang blanko kung hindi naaangkop)</p>
                                    <div class="error-msg">
                                        <span class="em-mname"></span>
                                    </div>
                                    <input type="text" name="mname" id="mname" class="textbox" placeholder="Jimenez">
                                </div>
                                <div class="extension">
                                    <p class="dfont">Extensyon(Jr., Sr.) (Iwang blanko kung hindi naaangkop)</p>
                                    <div class="error-msg">
                                        <span class="em-extension"></span>
                                    </div>
                                    <input type="text" name="extension" id="extension" class="textbox" placeholder="III">
                                </div>
                            </div>
                            <!--ROW 3-->
                            <div class="student-info-row-3">
                                <div class="bday">
                                    <p class="dfont">Petsa ng Kapanganakan</p>
                                    <div class="error-msg">
                                        <span class="em-bday"></span>
                                    </div>
                                    <input type="date" name="bday" id="bday" class="textbox">
                                </div>
                                <div class="age">
                                    <p class="dfont">Edad</p><br class="responsive-text-break">
                                    <div class="error-msg">
                                        <span class="em-age"></span>
                                    </div>
                                    <input type="text" name="age" id="age" class="textbox" placeholder="10">
                                </div>
                                <div class="gender-group-wrapper">
                                    <div class="gender">
                                        <p class="dfont">Kasarian</p>
                                        <div> 
                                            <input type="radio" name="gender" id="male" class="radio" value="male">
                                            <label for="male">Lalake</label>                                
                                            <input type="radio" name="gender" id="female" class="radio" value="female">
                                            <label for="female">Babae</label>
                                        </div>
                                    </div>
                                    <div class="community">
                                        <p class="dfont">Nabibilang sa katutubong grupo/ <br class="responsive-text-break">
                                                    Komunidad ng Katutubong Kultural</p>
                                        <div>
                                            <input type="radio" name="group" id="yes" class="radio" value="1">
                                            <label for="yes">Oo</label>
                                            <input type="radio" name="group" id="no" class="radio" value="0">
                                            <label for="no">Hindi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="true-community">
                                    <p class="dfont">Kung oo, saang grupo nabilang</p>
                                    <div class="error-msg">
                                        <span class="em-community"></span>
                                    </div>
                                    <input type="text" name="community" id="community" class="textbox" placeholder="sama-badjau">
                                </div>
                            </div>
                            <!--ROW 4-->
                            <div class="student-info-row-4">
                                <div class="native-language">
                                    <div class="language">
                                        <p class="dfont">Kinagisnang wika</p>
                                        <div class="error-msg">
                                            <span class="em-language"></span>
                                        </div>
                                        <input type="text" name="language" id="language" class="textbox" placeholder="Tagalog">
                                    </div>
                                </div>
                                <div class="religion">
                                    <p class="dfont">Relihiyon</p>
                                    <div class="error-msg">
                                        <span class="em-religion"></span>
                                    </div>
                                    <input type="text" name="religion" id="religion" class="textbox" placeholder="Catholic">
                                </div>
                                <div class="email">
                                    <p class="dfont">Email Address (Iwanang Blanko kung wala)</p>
                                    <div class="error-msg">
                                        <span class="em-email"></span>
                                    </div>
                                    <input type="email" name="email" id="email" class="textbox" placeholder="sampleemail@gmail.com">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--PARA SA MGA MAG-AARAL NA MAY KAPANSANAN-->
                    <div class="student-disability border-75">
                        <div class="student-disability-title">
                            <span class="title">PARA SA MGA MAG-AARAL NA MAY KAPANSANAN</span>
                        </div>
                        <div class="student-disability-wrapper">
                            <div class="special-needs">
                                <p class="dfont">Ang mag-aaral ba ay nangangailangan ng espesyal na tulong sa pag-aaral? (e.g ADHD)</p>
                                <input type="radio" name="sn" id="yes" class="radio" value="1">
                                <label for="yes">Mayroon</label>
                                <input type="radio" name="sn" id="no" class="radio" value="0">
                                <label for="no">Wala</label>
                            </div>

                            <div class="truespecialneeds">
                                <p class="dfont">Kung MAYROON, isulat kung ano ang natatanging kalagayan ng bata:</p>
                                <div class="error-msg">
                                    <span id="em-boolsn"></span>
                                </div>
                                <input type="text" name="boolsn" id="boolsn" class="textbox" placeholder="Blind, Deaf, ADHD, etc.">
                            </div>
                            <div class="assisttech">
                                <p class="dfont">May nagagamit bang “assistive technology devices” (e.g Braille)</p>
                                <input type="radio" name="at" id="yes" class="radio" value="1">
                                <label for="yes">Oo</label>
                                <input type="radio" name="at" id="no" class="radio" value="0">
                                <label for="no">Hindi</label>
                            </div>
                            <div class="trueassisttech">
                                <p class="dfont">Kung MAYROON, isulat kung ano ito</p>
                                <div class="error-msg">
                                    <span id="em-atdevice"></span>
                                </div>
                                <input type="text" name="atdevice" id="atdevice" class="textbox" placeholder="Wheelchairs">
                            </div>
                        </div>
                    </div>

                    <!--TIRAHAN-->
                    <div class="address border-75">
                        <div class="address-title">
                            <span class="title">TIRAHAN</span>
                        </div>
                        <div class="address-wrapper">
                            <div class="house-number">
                                <p class="dfont">Numero ng Bahay at kalye</p>
                                <div class="error-msg">
                                    <span class="em-house-number"></span>
                                </div>
                                <input type="text" name="house-number" id="house-number" class="textbox" placeholder="32">
                            </div>
                            <div class="subdivision">
                                <p class="dfont">Subdivision/ baryo/ purok/ sitio</p>
                                <div class="error-msg">
                                    <span class="em-subdivision"></span>
                                </div>
                                <input type="text" name="subdivision" id="subdivision" class="textbox" placeholder="Talipan">
                            </div>
                            <div class="barangay">
                                <p class="dfont">Barangay</p>
                                <div class="error-msg">
                                    <span class="em-barangay"></span>
                                </div>
                                <select name="barangay" id="barangay" class="textbox">
                                   
                                </select>
                            </div>
                            <div class="city">
                                <p class="dfont">Lungosd/Munisipalidad</p>
                                <div class="error-msg">
                                    <span class="em-city"></span>
                                </div>
                                <select name="city-municipality" id="city-municipality" class="textbox">
                                    
                                </select>
                            </div>
                            <div class="province">
                                <p class="dfont">Probinsya/lalawigan</p>
                                <div class="error-msg">
                                    <span class="em-province"></span>
                                </div>
                                <select name="province" id="province" class="textbox">
                                   
                                </select>
                            </div>
                            <div class="region">
                                <p class="dfont">Rehiyon</p>
                                <div class="error-msg">
                                    <span class="em-region"></span>
                                </div>
                                <select name="region" id="region" class="textbox" >
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--IMPORMASYON NG MAGULANG/TAGAPAGALAGA-->
                    <div class="parents-guardian-information border-75">
                        <div class="parents-guardian-information-title">
                            <span class="title">IMPORMASYON NG MAGULANG/TAGAPAGALAGA</span>
                        </div>
                        <!-- Nagdagdag ako ng seperate names dito dabid (Kinit)-->
                        <div class="parents-guardian-information-wrapper">
                            <div class="father">
                                <div class="Father-Last-Name">
                                    <h3>AMA</h3>
                                    <p class="dfont">Apilyedo</p>
                                    <div class="error-msg">
                                        <span class="em-father-last-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Father-Last-Name" id="Father-Last-Name" placeholder="Dela Cruz">
                                </div><br>
                                <div class="Father-Middle-Name">
                                    <p class="dfont">Gitnang Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-father-middle-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Father-Middle-Name" id="Father-Middle-Name" placeholder="De Vera">
                                </div><br>
                                <div class="Father-First-Name">
                                    <p class="dfont">Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-father-first-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Father-First-Name" id="Father-First-Name" placeholder="Rey">
                                </div><br>
                                <div class="F-highest-education">
                                    <label for="F-highest-education">Pinakamataas na antas na natapos sa pag-aaral: </label><br>
                                    <select name="F-highest-education" id="F-highest-education" class="select">
                                        <option value="Hindi Nakapag-aral">Hindi Nakapag-aral</option>
                                        <option value="Hindi Nakapag-aral pero marunong magbasa at magsulat">Hindi Nakapag-aral pero marunong magbasa at magsulat</option>
                                        <option value="Nakatuntong ng Elementarya">Nakatuntong ng Elementarya</option>
                                        <option value="Nakapagtapos ng Elementarya">Nakapagtapos ng Elementarya</option>
                                        <option value="Nakatuntong ng Sekundarya">Nakatuntong ng Sekundarya</option>
                                        <option value="Nakapagtapos ng Sekundarya">Nakapagtapos ng Sekundarya</option>
                                        <option value="Nakapag-aral Pagkatapos ng Sekundarya o ng Teknikal /Bokasyonal">Nakapag-aral Pagkatapos ng Sekundarya o ng Teknikal /Bokasyonal</option>
                                    </select>
                                </div>
                                <div class="F-number">
                                    <p class="dfont">Numero sa telepono (cellphone/ telephone / )</p>
                                    <div class="error-msg">
                                        <span class="em-f-number"></span>
                                    </div>
                                    <input type="text" name="F-Number" id="F-number" class="textbox" placeholder="09123456789">
                                </div>
                            </div>

                            <!-- Nagdagdag ako ng seperate names dito dabid (Kinit)-->
                            <div class="mother">
                                <div class="M-fullname">
                                    <h3>INA</h3>
                                    <p class="dfont">Apilyedo</p>
                                    <div class="error-msg">
                                        <span class="em-mother-last-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Mother-Last-Name" id="Mother-Last-Name" placeholder="Dela Cruz">
                                </div><br>
                                <div class="Mother-Middle-Name">
                                    <p class="dfont">Gitnang Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-mother-middle-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Mother-Middle-Name" id="Mother-Middle-Name" placeholder="Jimenez">
                                </div><br>
                                <div class="Mother-First-Name">
                                    <p class="dfont">Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-mother-first-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Mother-First-Name" id="Mother-First-Name" placeholder="Maria">
                                </div><br>
                                <div class="M-highest-education">
                                    <label for="M-highest-education">Pinakamataas na antas na natapos sa pag-aaral: </label><br>
                                    <select name="M-highest-education" id="M-highest-education" class="select">
                                        <option value="Hindi Nakapag-aral">Hindi Nakapag-aral</option>
                                        <option value="Hindi Nakapag-aral pero marunong magbasa at magsulat">Hindi Nakapag-aral pero marunong magbasa at magsulat</option>
                                        <option value="Nakatuntong ng Elementarya">Nakatuntong ng Elementarya</option>
                                        <option value="Nakapagtapos ng Elementarya">Nakapagtapos ng Elementarya</option>
                                        <option value="Nakatuntong ng Sekundarya">Nakatuntong ng Sekundarya</option>
                                        <option value="Nakapagtapos ng Sekundarya">Nakapagtapos ng Sekundarya</option>
                                        <option value="Nakapag-aral Pagkatapos ng Sekundarya o ng Teknikal /Bokasyonal">Nakapag-aral Pagkatapos ng Sekundarya o ng Teknikal /Bokasyonal</option>
                                    </select>
                                </div>
                                <div class="M-number">
                                    <p class="dfont">Numero sa telepono (cellphone/ telephone / )</p>
                                    <div class="error-msg">
                                        <span class="em-m-number"></span>
                                    </div>
                                    <input type="text" name="M-Number" id="M-number" class="textbox" placeholder="09123456789">
                                </div>
                            </div>

                            <!-- Nagdagdag ako ng seperate names dito dabid (Kinit)-->
                            <div class="guardian">
                                <div class="G-fullname">
                                    <h3>TAGAPAGALAGA</h3>
                                    <p class="dfont">Apilyedo</p>
                                    <div class="error-msg">
                                        <span class="em-guardian-last-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Guardian-Last-Name" id="Guardian-Last-Name" placeholder="Dela Cruz">
                                </div><br>
                                <div class="Guardian-Middle-Name">
                                    <p class="dfont">Gitnang Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-guardian-middle-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Guardian-Middle-Name" id="Guardian-Middle-Name" placeholder="Jimenez">
                                </div><br>
                                <div class="Guardian-First-Name">
                                    <p class="dfont">Pangalan</p>
                                    <div class="error-msg">
                                        <span class="em-guardian-first-name"></span>
                                    </div>
                                    <input type="text" class="textbox" name="Guardian-First-Name" id="Guardian-First-Name" placeholder="Maria">
                                </div><br>
                                <div class="G-highest-education">
                                    <label for="G-highest-education">Pinakamataas na antas na natapos sa pag-aaral: </label><br>
                                    <select name="G-highest-education" id="G-highest-education" class="select">
                                        <option value="Hindi Nakapag-aral">Hindi Nakapag-aral</option>
                                        <option value="Hindi Nakapag-aral pero marunong magbasa at magsulat">Hindi Nakapag-aral pero marunong magbasa at magsulat</option>
                                        <option value="Nakatuntong ng Elementarya">Nakatuntong ng Elementarya</option>
                                        <option value="Nakapagtapos ng Elementarya">Nakapagtapos ng Elementarya</option>
                                        <option value="Nakatuntong ng Sekundarya">Nakatuntong ng Sekundarya</option>
                                        <option value="Nakapagtapos ng Sekundarya">Nakapagtapos ng Sekundarya</option>
                                        <option value="Nakapag-aral Pagkatapos ng Sekundarya o ng Teknikal /Bokasyonal">Nakapag-aral Pagkatapos ng Sekundarya o ng Teknikal /Bokasyonal</option>
                                    </select>
                                </div>
                                <div class="G-number">
                                    <p class="dfont">Numero sa telepono (cellphone/ telephone / )</p>
                                    <div class="error-msg">
                                        <span class="em-g-number"></span>
                                    </div>
                                    <input type="text" name="G-Number" id="G-number" class="textbox" placeholder="09123456789">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--4PS, IMAGES AND SUBMIT BUTTON-->            
                    <div class="confirmation border-75">
                        <div class="fourPS">
                            <p class="dfont">Kabilang ba ang inyong pamilya sa 4Ps ng DSWD?</p>
                            <input type="radio" name="fourPS" id="yes" class="radio" value="yes">
                            <label for="fourPS">Oo</label>
                            <input type="radio" name="fourPS" id="no" class="radio" value="no">
                            <label for="fourPS">Hinde</label>
                        </div>
                        <div class="image-confirm">
                            <p class="dfont">Ipasa ang malinaw na larawan ng mga Dokumento gaya ng <b>PSA BIRTH CERTIFICATE at REPORT CARD.<b></p>
                            <input type="file" name="psa-image" value="Insert Image (Di pa nagana)"> 
                        </div>
                        <button type="submit" class="submit-button" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/parent-info-validation.js" defer></script>
    <script src="../js/address-validation.js" defer></script>
    <script src="../js/previous-school-validation.js" defer></script>
    <script src="../js/student-info-validation.js" defer></script>
</body>
</html>
