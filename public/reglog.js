$(document).ready(function(){
    $('.closebtn').click(function() {
        $('.alert').css({
        'display': 'none'
        });
    });
    $('#register').click(function() {
        $('.login').slideUp('slow');
        $('.register').slideDown('slow');
        $('#register').hide();
        $('#login').show();
    });                                                                                                                                         $('#login').click(function() {
        $('.register').slideUp('slow');
        $('.login').slideDown('slow');
        $('#login').hide();
        $('#register').show();
    });
});

