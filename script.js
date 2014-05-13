function validateForm() {

    //assumed valid, until proven invalid
    var valid = [
        {'name': true},
        {'phone': true},
        {'email': true},
        {'message': true}
    ];

    var name = document.getElementsByName('name')[0];
    var phone = document.getElementsByName('phone')[0];
    var email = document.getElementsByName('email')[0];
    var message = document.getElementsByName('message')[0];
    var submit = document.getElementsByName('submit')[0];

    if (name.value.length <= 0) {
        name.style.borderColor = "red";
        valid.name = false;
    } else {
        valid.name = true;
        name.style.borderColor = "green";
    }

    if (phone.value.length != 10) {
        phone.style.borderColor = "red";
        valid.phone = false;
    } else {
        valid.phone = true;
        phone.style.borderColor = "green";
    }

    var emailRegex = new RegExp('^[a-zA-Z0-9-.]+@[a-zA-Z0-9-.]+\.[a-z]{2,4}$');
    if (!emailRegex.test(email.value)) {
        email.style.borderColor = "red";
        valid.email = false;
    } else {
        valid.email = true;
        email.style.borderColor = "green";
    }

    if (message.value.length <= 25) {
        message.style.borderColor = "red";
        valid.message = false;
    } else {
        valid.message = true;
        message.style.borderColor = "green";
    }


    if(valid.name && valid.phone && valid.email && valid.message){

        document.getElementById('contact-form').submit();
    }

}
