
$(document).ready(function() {
$("#register").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var pass = $("#pass").val();
var phone = $("#phone").val();
var gender = $("#gender").val();
var filter = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

if (name == '' || email == '' || pass == '' || phone == '' || gender == '' ) {
alert("Please fill all fields...!!!!!!");
}else if(!filter.test(email))
{
alert("Please enter valid email...!!!!!");
} else if ((phone.length)!=10) {
alert("Your phone number should have 10 digits...!!!!!");
} else if ((pass.length) < 8) {
alert("Password should atleast be 8 characters in length...!!!!!!");
} 
else {
$.post("register.php", {
name: name,
email: email,
pass: pass
}, function(data) {
if (data == 'You have Successfully Registered.....') {
$("form")[0].reset();
}
alert(data);
});
}
});
});
