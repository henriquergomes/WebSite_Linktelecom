function enviarPresentes() {
    var presentesTd = document.querySelectorAll('.form-check-input');
    var listaDePresentes = Array.from(presentesTd);
    var presentesSelecionados = [];
    var Presente = new Object();

    listaDePresentes.forEach(function(input){
        if (input.checked) {
            presentesSelecionados.push(input.value);
            console.log('presente adicionado na lista');
        }
    })

    Presente.nomeDoador = document.querySelector('#nomeConvidado').value;
    Presente.listaPresentes = presentesSelecionados;

    if (ehPresenteValido(Presente)) {
        var dadosPresente = JSON.stringify(Presente);

        $.ajax({
            url: 'envioPresente.php',
            type: 'POST',
            data: {data: dadosPresente},
            success: function(result){
            },
            error: function(jqXHR, textStatus, errorThrown) {
            }
          });
    }
}

function ehPresenteValido(Presente) {
    if (!Presente.nomeDoador) {
        alert('Informe o seu nome por favor');

        return false;
    }
    if(!Presente.listaPresentes) {
        alert('Por favor, selecione pelo menos um item da lista de presentes');
        return false;
    }
    return true;
}