document.addEventListener('DOMContentLoaded', function(){
    const psaNumber = document.getElementById("PSA-number");
    const lrn = document.getElementById("LRN");
    const lname = document.getElementById("lname");
    const fname = document.getElementById("fname");
    const mname = document.getElementById("mname");
    const suffix = document.getElementById("extension");
    const birthDate = document.getElementById("bday");
    const age = document.getElementById("age");
    const language = document.getElementById("language");
    const religion = document.getElementById("religion");
    const form = document.getElementById("enrollment-form");
    
    document.querySelectorAll('input[name="LRN"]').forEach(radio => {
        radio.addEventListener('change', function() {
            console.log(radio.value);
            if (radio.value === "0" || radio.value === "2") {
                lrn.disabled = true;
                lrn.style.opacity = "0.2";
                lrn.value ="";
            } else {
                lrn.disabled = false;
                lrn.style.opacity = "1";
            }
        })
    });
    const allInfo = [
        {element: lname, error: "em-lname"},
        {element: fname, error: "em-fname"},
        {element: mname, error: "em-mname"},
        {element: suffix, error: "em-extension"},
        {element: language, error: "em-language"},
        {element: religion, error: "em-religion"}
    ];
    const radioGroups = [
        {textBoxElement: "community", nameValue: "group"},
        {textBoxElement: "boolsn", nameValue: "sn"},
        {textBoxElement: "atdevice", nameValue: "at"}
    ];
    const today = new Date();
    //regex
    const lrnRegex = /^([0-9]){12}$/;
    const bCertRegex = /^([0-9]){13}$/;
    //emptyError
    const emptyError = "This field is required";
    const notNumber = "This field must be a number";
    //functions
    function checkIndigenous(textBoxElement, nameValue ) {
        const radioInput = document.querySelector(`input[name="${nameValue}"]:checked`);
        const textbox = document.getElementById(textBoxElement);
        if (radioInput.value === "0") {
            textbox.disabled = true;
            textbox.style.opacity = "0.2";
            textbox.value ="";
        } else {
            textbox.disabled = false;
            textbox.style.opacity = "1";
        }
    }
    function setBirthYear() {
        let ageValue = parseInt(age.value, 10);
        let currentYear = today.getFullYear();
        let setYear = currentYear - ageValue;
        let formattedDate = `${setYear}-01-01`;
        birthDate.value = formattedDate;
    }
    function getAge() {
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth()+1;
        let currentDay = today.getDate(); 

        let bday = birthDate.value;
        let getDate = new Date(bday);

        let birthYear = getDate.getFullYear();
        let birthMonth = getDate.getMonth()+1;
        let birthDay = getDate.getDate();

        let ageValue = currentYear - birthYear;
        if (currentMonth < birthMonth || (currentMonth === birthMonth && currentDay < birthDay)) {
            ageValue--;
        }
        age.value = ageValue;
        console.log(ageValue);
         
    }
    function validateEmpty(element, errorElement) {
        if(isEmpty(element)) {
            errorMessages(errorElement, emptyError, element);
            checkEmptyFocus(element, errorElement);
        }
        else {
            clearError(errorElement, element);
        }
    } 
    function validatePSA() {
        const currentIndex = psaNumber.selectionStart;
        if(isEmpty(psaNumber) && currentIndex !== 0) {
            errorMessages("em-PSA-number", emptyError, psaNumber);
            checkEmptyFocus(psaNumber, "em-PSA-number");
        }
        else if(!bCertRegex.test(psaNumber.value)) {
            errorMessages("em-PSA-number", "Enter a valid birth certificate number", psaNumber);
        }
        else {
            clearError("em-PSA-number", psaNumber);
        }
    }
    function validateLRN() {
        const currentIndex = lrn.selectionStart;
        if(isEmpty(lrn) && currentIndex !== 0) {
            errorMessages("em-LRN", emptyError, lrn);
            checkEmptyFocus(lrn, "em-LRN");
        }
        else if(!lrnRegex.test(lrn.value)) {
            errorMessages("em-LRN", "Enter a valid LRN", lrn);
        }
        else {
            clearError("em-LRN", lrn);
        }
    }
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
    function checkEmptyFocus(element, errorElement) {
        element.addEventListener('blur', ()=> clearError(errorElement, element));
    } 
    //event trigger
    age.addEventListener('change', setBirthYear);
    birthDate.addEventListener('change', getAge);

    radioGroups.forEach(({textBoxElement, nameValue})=>{
        document.querySelectorAll(`input[name="${nameValue}"]`).forEach(radio=>{
            radio.addEventListener('change',()=>checkIndigenous(textBoxElement, nameValue));
        });
    });
    allInfo.forEach(({element, error}) => {
        element.addEventListener('keyup', ()=>validateEmpty(element, error));
    });
    form.addEventListener('submit', function(e) 
    {
    });
    psaNumber.addEventListener('keydown', function(e) {
        if(isNaN(e.key) && e.key !== "Backspace"){
            errorMessages("em-PSA-number", notNumber, psaNumber);
            checkEmptyFocus(psaNumber, "em-PSA-number");
            e.preventDefault();
        }
        else if(psaNumber.value.length >= 13 && e.key !== "Backspace"){ 
            errorMessages("em-PSA-number", "Only 13 digits are allowed", psaNumber);
            checkEmptyFocus(psaNumber, "em-PSA-number");
            e.preventDefault();
        }
        else {
            validatePSA();
        }
    });
    lrn.addEventListener('keydown', function(e) {
        if(isNaN(e.key) && e.key !== "Backspace"){
            errorMessages("em-LRN", notNumber, lrn);
            checkEmptyFocus(lrn, "em-LRN");
            e.preventDefault();
        }
        else if(lrn.value.length >= 12 && e.key !== "Backspace"){ 
            errorMessages("em-LRN", "Only 12 digits are allowed", lrn);
            checkEmptyFocus(lrn, "em-LRN");
            e.preventDefault();
        }
        else {
            validateLRN();
        }
    });
});