// esconder mensagem de erro no input depois de 5 segundos

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var errorMessage = document.getElementById('mesagem');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 8000);
});