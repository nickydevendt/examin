<script>
function updateUser() {
    $('#loading').toggleClass('show');
    $.post(
        '/userpanel/updateuser',
        { updateuser: true, firstname: user.firstname.value, prefix:user.prefix.value, lastname: user.lastname.value, currentemployer: user.currentemployer.value, id: user.id.value },
        function(output) {
            $('#succes').html(output).show();
            $('#loading').toggleClass('show');
        });
}

function addVis(inviteid) {
    var email = $('#email').val();
    var pattern = new RegExp("^[_A-Za-z0-9-]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
    var result = pattern.test(email);
    if(result == true) {
        $('#loading').toggleClass('show');
        $.post(
            '/userpanel/addvisitor',
            { addvisitor: true, inviterid: inviteid, firstname: updatevisitor.firstname.value, prefix: updatevisitor.prefix.value, lastname: updatevisitor.lastname.value, email: updatevisitor.email.value },
            function(output) {
                $('#visitors').append(output);
                $('.inputfield').val('');
                $('#loading').toggleClass('show');
            });
    }
}
function deleteVisit(id) {
    $('#loading').toggleClass('show');
    $.post(
        '/userpanel/deletevisitor',
        { deletevisitor: true, deleteid: id },
        function(output) {
            $('#succes').html(output).show();
            $('#loading').toggleClass('show');
        }
    );
    $("table").on('click', '.remove', function (e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });
}
</script>

