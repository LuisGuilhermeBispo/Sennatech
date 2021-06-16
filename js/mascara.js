(function( $ ) {
  $(function() {
$('#nascimento').mask('00/00/0000');


$('#telefone').mask('(00) 0000-00009');
$('#telefone').blur(function(event) {
    if ($(this).val().length == 15) { // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
        $('#telefone').mask('(00) 00000-0009');
    } else {
        $('#telefone').mask('(00) 0000-00009');
    }
});

});
})(jQuery);