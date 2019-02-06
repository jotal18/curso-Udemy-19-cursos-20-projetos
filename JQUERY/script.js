//sintaxe 1
$(document).ready(function() { // o script somente será executado após o carregamentos de todos os elementos da página independente do local do script
    function teste() {
        console.log($('#exemplo'))
    }

    teste()
})

// sintaxe 2
function teste() {
    console.log($('#exemplo'))
}
$(teste) //chamando a referência da função acima

// sintaxe 3
$(function teste() {
    console.log($('#exemplo'))
})