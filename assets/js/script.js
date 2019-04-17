
// $(function() {
  // $('.zip_code').mask('00000-000');
  // $('.telephone').mask('(00) 00000-0000');
  // $('.cpf').mask('000.000.000-00');
  // $('.data').mask('00/00/0000');
  // $('.cellphone').mask('(00) 00000-0000');
  // $('.cellphone_compact').mask('(00)00000-0000');
  // $('.telephone').mask('(00) 0000-0000');
//   $('.price').mask('000.000.000.000.000,00', {reverse: true});
// });

$(document).ready(function(){
    $('#telefone').mask('(00) 0000-0000');
});

$(document).ready(function(){
    $('.money').mask('#.##0,00', {reverse: true});
});