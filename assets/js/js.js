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
    // CATEGORIA
    //
        /**
         * Funcao responsavel por rquisitar a exclusao da categoria
         */
        $('body').on('click', '.A_categoryRequest', function () {
            var categoria = $(this).attr('data-category');
            $.post(BASE + '/categoria/request/api', { categoria: categoria }, function (info) {
                if (info) {
                    $('.A_modal').html(info);
                    $('#excluir'+categoria).modal('show');
                    console.log(info);
                }
            });
            return false;
        });

        /**
         * Funcao responsavel por rquisitar a exclusao da categoria
         */
        $('body').on('click', '.A_categoryDelete', function () {
            var categoria = $(this).attr('data-category');
            $.post(BASE + '/categoria/excluir/api', { categoria: categoria }, function (info) {
                if (info) {
                    $('.A_msg').html(info);
                    $('#category'+categoria).fadeOut();
                    console.log(info);
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