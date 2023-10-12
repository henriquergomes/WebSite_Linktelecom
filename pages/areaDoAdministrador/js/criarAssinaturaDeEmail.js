$('#gerarAssinatura').click(function gerarAssinatura(){

    var nomeColaborador = $('#nome_colaborador').val();
    var emailColaborador = $('#email_colaborador').val();
    var funcaoColaborador = $('#funcao_colaborador').val();

    var canvas = document.querySelector("#c");
    var ctx = canvas.getContext("2d");

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    geraImagem(nomeColaborador, emailColaborador, funcaoColaborador)

})

function geraImagem(nomeColaborador, emailColaborador, funcaoColaborador) {

    var canvas = document.querySelector("#c");
    var ctx = canvas.getContext("2d");

    var image = new Image();
    image.src = $('#assinatura_de_email').attr('src');

    image.onload = carregaCanvas();
    function carregaCanvas() {
        
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

        ctx.font = "35px Arial";
        ctx.fillStyle = "#333333";
        ctx.fillText(nomeColaborador, 400, 80);

        ctx.font = "18px Arial";
        ctx.fillStyle = "#333333";
        ctx.fillText(funcaoColaborador, 380, 120);

        ctx.font = "18px Arial";
        ctx.fillStyle = "#333333";
        ctx.fillText(emailColaborador, 380, 150);

        localStorage.setItem("savedImage", canvas.toDataURL());

        $('#salvarAssinatura').attr('style', 'display: block; width: 200px;');

    }
}

$('#salvarAssinatura').click(function salvaAssinatura() {
    window.open(localStorage.getItem("savedImage"), '_blank');
});