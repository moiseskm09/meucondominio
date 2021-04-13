var cont = 1;
        $('#btnmorador').click(function () {
cont++;
        $('#morador').append('<div class="form-row" id="moradores' + cont + '"><div class="form-group col-md-5"><label for="nomemorador">Nome Completo</label><input type="text" class="form-control tamanhoInput" id="nomemorador" name="nomemorador[]"></div><div class="form-group col-md-3"><label for="parentesco">Parentesco</label><select id="parentesco" name="parentesco[]" class="form-control tamanhoInput"><option selected>Escolha uma opção ...</option><option value="Pai">Pai</option><option value="Mãe">Mãe</option><option value="Avô">Avô</option><option value="Avó">Avó</option><option value="Filho">Filho(a)</option><option value="Tio">Tio(a)</option><option value="Primo">Primo(a)</option><option value="Amigo">Amigo(a)</option><option value="Outros">Outros</option></select></div><div class="form-group col-md-3"><label for="dataNascimento">Data de Nascimento</label><input type="date" class="form-control tamanhoInput" id="dataNascimento" name="dataNascimento[]"></div><div class="form-group col-md-1 mt-2"><br><button type="button" id="' + cont + '" class="btn btn-danger btn-apagar"><i class="fa fa-minus"></i></button></div></div>');
});
        $('form').on('click', '.btn-apagar', function () {
var button_id = $(this).attr("id");
        $('#moradores' + button_id + '').remove();
});
  var cont = 1;
            //https://api.jquery.com/click/
            $('#btnempregado').click(function () {
                cont++;
                //https://api.jquery.com/append/
                $('#empregados').append('<div class="form-row" id="campoempregado' + cont + '"><div class="form-group col-md-7"><label for="empregado' + cont + '">Nome Completo</label><input type="text" class="form-control tamanhoInput"id="empregado' + cont + '" name="empregado[]"></div><div class="form-group col-md-4"><label for="rgempregado' + cont + '">RG</label><input type="text" class="form-control rg tamanhoInput" id="rgempregado' + cont + '" name="rgempregado[]" Placeholder="00.000.000-0"></div><div class="form-group col-md-1 mt-2"><br><button type="button" id="' + cont + '" class="btn btn-danger btn-apagarempregado"><i class="fa fa-minus"></i></button></div></div>');
            });

            $('form').on('click', '.btn-apagarempregado', function () {
                var button_id = $(this).attr("id");
                $('#campoempregado' + button_id + '').remove();
            });