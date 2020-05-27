jQuery(document).ready(function($) {
  $('a[href^="#"]').on('click', function(e) {
  e.preventDefault();
  var id = $(this).attr('href'),
      targetOffset = $(id).offset().top;

    $('html, body').animate({
      scrollTop: targetOffset - 150
    }, 800);
  });

  document.addEventListener("touchstart", function(){}, true);

  $(".menu-mobile").on('click', function () {
    $(this).toggleClass('menu-mobile-active');
    $('.menu-open').toggleClass('menu-open-active');
    $('.overlay').toggleClass('overlay-active');
    $('body').toggleClass('no-scroll');
  });

  //mascaras
  var options = {
      onKeyPress: function (cpf, ev, el, op) {
          var masks = ['000.000.000-000', '00.000.000/0000-00'];
          $('input[name="cpf"]').mask((cpf.length > 14) ? masks[1] : masks[0], op);
      }
  }

  $('input[name="cpf"]').length > 11 ? $('input[name="cpf"]').mask('00.000.000/0000-00', options) : $('input[name="cpf"]').mask('000.000.000-00#', options);
  $('input[name="nascimento"').mask('00/00/0000');
  $('input[name="celular"').mask('(00) 00000-0000');
  $('input[name="rg"').mask('0000000');
  $('input[name="cep"').mask('00000-000');


  function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("input[name='endereco'").val("");
                $("input[name='bairro'").val("");
                $("input[name='cidade'").val("");
            }

            //Quando o campo cep perde o foco.
            $("input[name='cep'").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("input[name='endereco'").val("...");
                        $("input[name='bairro'").val("...");
                        $("input[name='cidade'").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("input[name='endereco'").val(dados.logradouro);
                                $("input[name='bairro'").val(dados.bairro);
                                $("input[name='cidade'").val(dados.localidade);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
});
