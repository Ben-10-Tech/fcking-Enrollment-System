document.addEventListener('DOMContentLoaded',function(){
    const form = document.getElementById("enrollment-form"); //form
    const startYear = document.getElementById("start-year"); //taong panuruan start textbox
    const endYear = document.getElementById("end-year"); //taong panuruan end textbox
    const lastYear = document.getElementById("last-year"); //huling natapos na taon textbox
    const lschool = document.getElementById("lschool"); //last school textbox
    const lschoolAddr = document.getElementById("lschoolAddress");//last shcool address
    const lschoolId = document.getElementById("lschoolID"); //last school ID
    const fschool = document.getElementById("fschool"); //nais paaralan
    const fschoolAddr = document.getElementById("fschoolAddress"); //nais paaralan address
    const fschoolId = document.getElementById("fschoolID"); //nais paaralan ID

    const enrollingGradeLevel = document.getElementById("grades-tbe");
    const  lastGradeLevel = document.getElementById("last-grade");

    enrollingGradeLevel.selectedIndex = lastGradeLevel.selectedIndex + 1;

    lastGradeLevel.options[lastGradeLevel.options.length - 1].disabled = true; 
    lastGradeLevel.addEventListener('change' ,function() {
       const nextIndex = this.selectedIndex + 1;
       if (nextIndex < enrollingGradeLevel.options.length) {
            enrollingGradeLevel.selectedIndex = nextIndex;
       }
    });
    enrollingGradeLevel.addEventListener('change' ,function() {
        const prevIndex = this.selectedIndex - 1;
        if (prevIndex >= 0) {
            lastGradeLevel.selectedIndex = prevIndex;
        }
    });
   //set default academic year
    const year = new Date().getFullYear();
    startYear.value = year;
    endYear.value = year + 1;
    //regex
    const idRegex = /^([0-9]){6}$/;
    const yearRegex = /^(1[0-9]{3}|2[0-9]{3}|3[0-9]{3})$/;//checker if number input is a valid year
    const charRegex = /^[A-Za-z0-9\s.,'-]{3,100}$/;
    //error messages
    const emptyError = "This field is required";
    const invalidYear = "Enter a valid year";
    const invalidSchoolId = "Not a valid school Id";
    const invalidChar = "Enter 3 or more characters";
   //ensure that the start year is always higher or equal to the current year
   function validateStartYear() {
        let startYearVal = parseInt(startYear.value);
        let endYearVal = parseInt(endYear.value);
        if(isEmpty(startYear)) {
            errorMessages("em-start-year", emptyError, startYear);
            checkEmptyFocus(startYear, "em-start-year");
        }
        else if (!yearRegex.test(startYear.value)) {
            errorMessages("em-start-year", invalidYear, startYear);
        }
        else if ( startYearVal == endYearVal) {
            errorMessages("em-start-year", "Academic year cannot be equal", startYear);
        }
        else if(startYearVal < year) {
            errorMessages("em-start-year", "Year is lower than the current year", startYear);
        }
        else if(startYearVal > endYearVal) {
            console.log(startYear);
            errorMessages("em-start-year", "Starting year cannot be greater than the end year", startYear);
        }
        else {
            clearError("em-start-year", startYear);
        }
   }
    function validateAcademicYear(){
        const endYearVal = parseInt(endYear.value);
        const startYearVal = parseInt(startYear.value);
        if (isEmpty(endYear)) {
            errorMessages("em-start-year", emptyError, endYear);
            checkEmptyFocus(endYear, "em-start-year");
        }
        else if (!yearRegex.test(endYear.value) ) {
            errorMessages("em-start-year", invalidYear, endYear);
        }
        //ensure that the end year is not equal to the start year
        else if (endYearVal == startYearVal) {
            errorMessages("em-start-year", "Academic year cannot be equal", endYear);
        }     
       //ensure that the end year is always greater than the start year 
        else if(endYearVal < startYearVal) {
            errorMessages("em-start-year", "End year cannot be lower than the starting year", endYear);
        }
        else if(endYearVal != startYearVal + 1) {
            errorMessages("em-start-year", "Academic year should be 1 year apart", endYear);
        }
        else {
            clearError("em-start-year", endYear);
        }
    }
    //check if huling natapos na taon is not greater than the current year
    function validateYearFinished(){
        const lastYearVal = parseInt(lastYear.value);
        console.log(lastYearVal);
        if (isEmpty(lastYear)) {
            errorMessages("em-last-year-finished", emptyError, lastYear);
            checkEmptyFocus(lastYear, "em-last-year-finished");
        }
        else if (!yearRegex.test(lastYear.value)){
            errorMessages("em-last-year-finished", invalidYear, lastYear);
        }
        else if (lastYearVal > year) {
            errorMessages("em-last-year-finished", "Value cannot be greater than the current year", lastYear);
        }
        else {
            clearError("em-last-year-finished", lastYear);
        }   
    }
    //validate school Id
    const fields2 = [
        {element: lschoolId, error: "em-lschoolID"},
        {element: fschoolId, error: "em-fschoolID"}
    ];
    //validate empty character fields and school name validity
    const fields = [
        {element: lschool, error: "em-lschool"},
        {element: lschoolAddr, error: "em-lschoolAddress"},
        {element: fschool, error: "em-fschool"},
        {element: fschoolAddr, error: "em-fschoolAddress"},
    ];
    function validateSchoolId(element, errorElement) {
        if (isEmpty(element)) {
            errorMessages(errorElement, emptyError, element);
            checkEmptyFocus(element, errorElement);
        }
        else if(!idRegex.test(element.value)) {
            errorMessages(errorElement, invalidSchoolId, element);
        }
        else {
            clearError(errorElement, element);
        }
    }
    function validateSchool(element, errorElement){
        if (isEmpty(element)) { 
            errorMessages(errorElement, emptyError, element);
            checkEmptyFocus(element, errorElement);
        }
        else if (!charRegex.test(element.value)) {
            errorMessages(errorElement, invalidChar, element);
        }
        else {
            clearError(errorElement, element);
        }
    }
    function checkEmptyFocus(element, errorElement) {
        element.addEventListener('blur', ()=> clearError(errorElement, element));
    } 
    //function to check empty fields
    function isEmpty(element) {
        return !element.value.trim();
    }
    //Function for displaying error messages
    function errorMessages(errorElement, message, childElement) {
        document.querySelector("."+errorElement).classList.add("show");
        childElement.style.border = "1px solid red";
        document.querySelector("."+errorElement).innerHTML = message;
    }
    //clear error messages
    function clearError(errorElement, childElement) {
        const errorField = document.querySelector("." + errorElement);
        errorField.classList.remove("show");
        errorField.innerHTML = "";
        childElement.style.border = "1px solid #616161";
    }
    //Event triggers
    fields.forEach(({element, error}) => {
        element.addEventListener('keyup', ()=> validateSchool(element, error));
    });
    fields2.forEach(({element, error})=>{
        element.addEventListener('keyup', ()=> validateSchoolId(element, error));
    });
    startYear.addEventListener('keyup',validateStartYear);
    endYear.addEventListener('keyup',validateAcademicYear);
    lastYear.addEventListener('keyup',validateYearFinished);

    form.addEventListener('submit', function() {
        //validate again upon submission
       fields.forEach(({element, error}) =>{
        validateSchool(element, error);
       });
        validateStartYear();
        validateYearFinished();
        validateAcademicYear();
    });
});    
 