
var EmailElement = $("#email");
var PassElement = $("#pass");
var Form = $("#loginfrom");
var Submit = $("#loginsubmit");

var EmailValid;
var PassValid;


$(document).ready(function(){
$("#signupsubmit").click(function(){
    validateEmail();
    validatePassword()
    if (EmailValid && PassValid) {
        Form.submit();
        }else{
        alert("enter valid info");
    }
});
});



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
    }else{
        alert("")
    }
}

