<?php
$sis    = new Sistema;
$perfil = new Profile;

$acao       = $sis->getParametros()[1] ?? null;
$parametro  = $sis->getParametros()[2] ?? null;
$post       = $sis->getPost();

switch ($variable) {
    case 'value':
        # code...
        break;
    
    default:
        require_once("view/perfil.php");
        break;
}