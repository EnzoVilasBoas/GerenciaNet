<?php
$sis    = new Sistema;
$perfil = new Profile;

$acao       = $sis->getParametros()[1] ?? null;
$parametro  = $sis->getParametros()[2] ?? null;
$post       = $sis->getPost();

switch ($acao) {
    case 'value':
        # code...
        break;
    
    default:
        $u = $perfil -> user($autUser["id"]);
        require_once("view/perfil.php");
        break;
}