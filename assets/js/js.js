$(document).ready(function() {
	console.log('A paciência é um dos elementos chave para o sucesso.');
    var BASE = "https://enzovilasboas.com.br/gerencia"

    //
    // GERAL
    //
        $('#InputTelefone').mask('(00) 00000-0000');
        /**
         * Funcao responsavel por fechar modais
         */
        $('body').on('click', '.A_fechar', function () {
            var id = $(this).attr('data');
            var modal = document.getElementById(id)
            myModal.hide()
            /* $(modal).modal('togle'); */
            console.log("modal "+modal+" fechado!");
            return false;
        });
    
    //
    // EQUIPE
    //
        /**
         * Funcao responsavel por questionar a exclusao do usuario
         */
        $('body').on('click', '.A_confirmaequipe', function () {
            var usuario = $(this).attr('data-usr');
            $.post(BASE + '/equipe/excluir/verificaexcluir/api', { usuario: usuario }, function (info) {
                if (info) {
                    $('.A_modal').html(info);
                    $('#excluir'+usuario).modal('show');
                    console.log(info);
                }
            });
            return false;
        });
        /**
         * Funcao responsavel por confirmar a exclusao do usuario
         */
        $('body').on('click', '.A_excluirequipe', function () {
            var usuario = $(this).attr('data-usr');
            $.post(BASE + '/equipe/excluir/confirmaexcluir/api', { usuario: usuario }, function (info) {
                if (info) {
                    $('.A_msg').html(info);
                    $('#usuario'+usuario).fadeOut();
                }
            });
            return false;
        });
    
    //
    // CATEGORIA
    //
        /**
         * Funcao responsavel por questionar a exclusao da categoria
         */
        $('body').on('click', '.A_confirmacategoria', function () {
            var categoria = $(this).attr('data-cat');
            $.post(BASE + '/categorias/excluir/verificaexcluir/api', { categoria: categoria }, function (info) {
                if (info) {
                    $('.A_modal').html(info);
                    $('#excluir'+categoria).modal('show');
                    console.log(info);
                }
            });
            return false;
        });
        /**
         * Funcao responsavel por confirmar a exclusao da categoria
         */
        $('body').on('click', '.A_excluircategoria', function () {
            var categoria = $(this).attr('data-cat');
            $.post(BASE + '/categorias/excluir/confirmaexcluir/api', { categoria: categoria }, function (info) {
                if (info) {
                    $('.A_msg').html(info);
                    $('#categoria'+categoria).fadeOut();
                }
            });
            return false;
        });

    //
    // PRODUTOS
    //
        /**
         * Funcao responsavel por questionar a exclusao do produto
         */
        $('body').on('click', '.A_confirmaproduto', function () {
            var produto = $(this).attr('data-prod');
            $.post(BASE + '/produtos/excluir/verificaexcluir/api', { produto: produto }, function (info) {
                if (info) {
                    $('.A_modal').html(info);
                    $('#excluir'+produto).modal('show');
                    console.log(info);
                }
            });
            return false;
        });
        /**
         * Funcao responsavel por confirmar a exclusao do produto
         */
        $('body').on('click', '.A_excluirproduto', function () {
            var produto = $(this).attr('data-prod');
            $.post(BASE + '/produtos/excluir/confirmaexcluir/api', { produto: produto }, function (info) {
                if (info) {
                    $('.A_msg').html(info);
                    $('#produto'+produto).fadeOut();
                }
            });
            return false;
        });

        /**
         * Funcao responsavel por atualizar o status para ativo
         */
        $('body').on('click', '.A_stsAguardando', function () {
            var produto = $(this).attr('data-prod');
            $.post(BASE + '/produtos/status/aguardando/api', { produto: produto }, function (info) {
                if (info) {
                    $('#sts'+produto).html(info);
                }
            });
            return false;
        });
        /**
         * Funcao responsavel por atualizar o status para aguardando
         */
        $('body').on('click', '.A_stsAtivo', function () {
            var produto = $(this).attr('data-prod');
            $.post(BASE + '/produtos/status/ativo/api', { produto: produto }, function (info) {
                if (info) {
                    $('#sts'+produto).html(info);
                }
            });
            return false;
        });

    //
    // Vendas
    //
        /**
         * Funcao responsavel por buscar o cliente PJ
         */
        $('body').on('keyup', '.A_buscaPJ', function () {
            var email = $(this).val();
            $.post(BASE + '/transferir/buscar/api', { email: email }, function (info) {
                if (info) {
                    $('.A_busca').html(info);
                    console.log(info);
                }
            });
            return false;
        });
});