<?php
$sis    = new Sistema;
$categoria = new Categoria;

$acao       = $sis->getParametros()[1] ?? null;
$parametro  = $sis->getParametros()[2] ?? null;
$post       = $sis->getPost();

switch ($acao) {
    case 'value':
        # code...
        break;
    
    default:
        if ($post) {
            # code...
        }
        $lista = $categoria->list($autUser["id"], $acao??1);
        $paginador = $categoria->renderPaginator(5, $acao??1);
        require_once('view/categoria/list.php');
        break;
}