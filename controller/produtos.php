<?php
$sis    = new Sistema;
$produto = new Product;

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
        $lista = $produto->list($autUser['id']);
        require_once("view/produto/list.php");
        break;
}
