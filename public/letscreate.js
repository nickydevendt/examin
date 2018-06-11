function createFreshResume() {
    $('#loading').toggleClass('show');
    $.post(
        '/letscreate/building',
    {   createfreshpdf: true,
        foto: newresume.foto.value,
        fullname: newresume.foto.value,
        street: newresume.street.value,
        zipcode: newresume.zipcode.value,
        city: newresume.city.value,
        dateofbirth: newresume.dateofbirth.value,
        phone: newresume.phone.value,
        email: newresume.email.value,
        skills: newresume.skills.value,
        skill1: newresume.skill1.value,
        skill1value: newresume.skill1value.value,
        skill2: newresume.skill2.value,
        skill2value: newresume.skill2value.value
        skill3: newresume.skill3.value,
        skill3value: newresume.skill3value.value,
        skill4: newresume.skill4.value,
        skill4value: newresume.skill3value.value,
        secondaryskills: newresume.secondaryskills.value,
        skill21: newresume.skill21.value,
    },
        function(output) {
            $('#succes').html(output).show();
            $('#loading').toggleClass('show');
    });
}

