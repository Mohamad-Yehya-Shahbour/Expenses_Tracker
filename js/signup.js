var NameElement = $("#name");
var EmailElement = $("#email");
var PassElement = $("#pass");
var ConfirmPassElement = $("#confirmpass");
var Form = $("#signupfrom");
var Submit = $("#signupsubmit");


var NameValid;
var EmailValid;
var PassValid;
var ConfirmPassValid;


$(document).ready(function(){
$("#signupsubmit").click(function(){
    validateName();
    validateEmail();
    validatePassword()
    confirmPassword();
    if (NameValid && EmailValid && PassValid && ConfirmPassValid) {
        Form.submit();
        }else{
        alert("enter valid info");
    }
});
});


function validateName(){
    var Name = NameElement.val();
    NameValid = false;
    if(Name.length>3){
        NameValid = true;
    }
}

function validateEmail(){
    var Email = EmailElement.val();
    EmailValid = false;
    if (Email.length > 5 &&
        Email.lastIndexOf(".") > Email.lastIndexOf("@") &&
        Email.lastIndexOf("@") != -1) 
        {
        EmailValid = true;
      }
}

function validatePassword(){
    var Pass = PassElement.val();
    PassValid = false;
    if(Pass.length>4){
        PassValid = true;
    }
}

function confirmPassword(){
    var ConfirmPass = ConfirmPassElement.val();
    var Pass = PassElement.val();
    ConfirmPassValid = false;
    if (Pass == ConfirmPass) {
        ConfirmPassValid = true;
      }
}
