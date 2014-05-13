function validateForm(){

    var valid = true;

    var name = document.getElementsByName('name')[0];
    var phone = document.getElementsByName('phone')[0];
    var email = document.getElementsByName('email')[0];
    var message = document.getElementsByName('message')[0];
    var submit = document.getElementsByName('submit')[0];

    if(name.value.length<=0){
        name.style.borderColor="red";
        valid=false;
    }

    if(phone.value.length!=9){
        phone.style.borderColor="red";
        valid=false;
    }

    var emailRegex = new RegExp('^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$');
    if(!emailRegex.test(email.value)){
        email.style.borderColor="red";
        valid=false;
    }

    if(message.value.length<=25){
        message.style.borderColor="red";
        valid=false;
    }

    if(valid){
        document.forms['contact-form'].submit();
    }





}
