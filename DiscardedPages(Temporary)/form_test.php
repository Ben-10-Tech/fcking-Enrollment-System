<form action="../server_side/post_enrollment_form_data.php" method="post" enctype="multipart/form-data">
<h3>Educational Information</h3>
        <label>School Year Start: <input type="text" name="start-year" required></label><br>
        <label>School Year End: <input type="text" name="end-year" required></label><br>
        <label>LRN Returning: <input type="text" name="LRN"></label><br>
        <label>Enrolling Grade Level: <input type="text" name="grades-tbe" required></label><br>
        <label>Last Grade Level: <input type="text" name="last-grade"></label><br>
        <label>Last Year Attended: <input type="text" name="last-year"></label><br>

        <h3>Educational Background</h3>
        <label>Last School Attended: <input type="text" name="lschool"></label><br>
        <label>School ID: <input type="text" name="lschoolID"></label><br>
        <label>School Address: <input type="text" name="lschoolAddress"></label><br>
        <label>School Type: <input type="text" name="educational-choice"></label><br>
        <label>Initial School Choice: <input type="text" name="fschool"></label><br>
        <label>Initial School ID: <input type="text" name="fschoolID"></label><br>
        <label>Initial School Address: <input type="text" name="fschoolAddress"></label><br>

        <h3>Disability Information</h3>
        <label>Special Condition? <input type="text" name="sn"></label><br>
        <label>Condition Details: <input type="text" name="boolsn"></label><br>
        <label>Assistive Technology? <input type="text" name="at"></label><br>
        <label>Device Details: <input type="text" name="atdevice"></label><br>


        <h3>Enrollee Address</h3>
        <label>House Number: <input type="text" name="house-number"></label><br>
        <label>Subdivision: <input type="text" name="division"></label><br>
        <label>Barangay: <input type="text" name="barangay"></label><br>
        <label>City/Municipality: <input type="text" name="city-municipality"></label><br>
        <label>Province: <input type="text" name="province"></label><br>
        <label>Region: <input type="text" name="region"></label><br>

        <h3>Parent/Guardian Information</h3>
        <label>Father's Name: <input type="text" name="Father-First-Name"> <input type="text" name="Father-Middle-Name"> <input type="text" name="Father-Last-Name"></label><br>
        <label>Father's Contact: <input type="text" name="F-Number"></label><br>
        <label for="">Father's Education</label> <input type="text" name="F-highest-education" id="F-highest-education"><br>
        
        <label>Mother's Name: <input type="text" name="Mother_First_Name"> <input type="text" name="Mother_Middle_Name"> <input type="text" name="Mother_Last_Name"></label><br>
        <label>Mother's Contact: <input type="text" name="M-Number"></label><br>
        <label for="">Mother's Education</label> <input type="text" name="M-highest-education" id="M-highest-education"><br>

        <label>Guardian's Name: <input type="text" name="Guardian_First_Name"> <input type="text" name="Guardian_Middle_Name"> <input type="text" name="Guardian_Last_Name"></label><br>
        <label>Guardian's Contact: <input type="text" name="G-Number"></label><br>
        <label for="">Guardian's Education</label> <input type="text" name="G-highest-education" id="G-highest-education"><br>
        <label for="">4ps?</label> <input type="text" name="fourPS" id="">

        <h3>Enrollee Information</h3>
        <label>First Name: <input type="text" name="fname" required></label><br>
        <label>Middle Name: <input type="text" name="mname"></label><br>
        <label>Last Name: <input type="text" name="lname" required></label><br>
        <label>Extension: <input type="text" name="extension"></label><br>
        <label>LRN: <input type="text" name="boolLRN"></label><br>
        <label>PSA Number: <input type="text" name="PSA-number"></label><br>
        <label>Birth Date: <input type="da te" name="bday" required></label><br>
        <label>Age: <input type="number" name="age" required></label><br>
        <label>Gender: <input type="text" name="gender"></label><br>
        <label>Religion: <input type="text" name="religion"></label><br>
        <label>Native Language: <input type="text" name="language"></label><br>
        
        <h3>Additional Information</h3>
        <label>Part of Cultural Group? <input type="text" name="group"></label><br>
        <label>Cultural Group Name: <input type="text" name="community"></label><br>
        <label>Email: <input type="email" name="email" required></label><br>

        <input type="file" name="psa-image" value="Insert Image (Di pa nagana)"> 
        
        <button type="submit">Submit</button>
    </form>