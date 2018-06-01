function contactEmail() {
    var email = $('#email').val();
    var pattern = new RegExp("^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
    var result = pattern.test(email);
    if(result == true) {
        $('#loading').toggleClass('show');
        $.post(
            '/contact/sendmail',
            { contactsend: true, email: contactform.email.value, name: contactform.name.value, telephone: contactform.phone.value, message: contactform.message.value },
            function(output) {
                $('#output').append(output);
                $('.inputfield').val('');
                $('#loading').toggleClass('show');
            }
        );
    }
}

