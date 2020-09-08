$(document).ready(function(){
    // Função para verificar menus e submenus abertos
    menuFunction();
});

function menuFunction(){

    $('.nav-item').click(function(){
        var submenu         = $(this).attr('data-target');

        // Antes de abrir um menu vai fechar os outros todos
        $('.nav-item[aria-expanded="true"]').each(function(){
            var thisSub     = $(this).attr('data-target');

            if($(submenu).html() != $(thisSub).html()){
                $(this).attr('aria-expanded', 'false');
                $(this).toggleClass('active');
                $(thisSub).toggleClass('show');

            }
        });

        // Faz um toggle ao submenu e ativa a class ative para ficar azul
        $(this).toggleClass('active');

    });
}