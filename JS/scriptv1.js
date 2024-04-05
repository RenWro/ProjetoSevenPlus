/*
* Rotinas do programa: Seven+
* Autor: Ren Wrobleski
* Funcionalidade: Front-End
* Licença:GNU
* Data: 2024/04/05
* Versão v1.0
* Descrição de atividades
*   1. Função para o menu principal com interatividade com usuário.

 */


//Criando a função

function menuShow(){
    //No documento HTML querySelector irá procurar e selecionar a classe '.mobile-menu e atribuir na variável
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')){
        menuMobile.classList.remove('open');
        document.querySelector('icon').src = "imagens/menu_36dp.svg");
    } else {
        menuMobile.classList.add('open');
        document.querySelector('icon').src = "imagens/close_36dp.svg");
    }

}