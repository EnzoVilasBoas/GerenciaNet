<?php
$sis    = new Sistema;
$perfil = new Profile;

$acao       = $sis->getParametros()[1] ?? null;
$parametro  = $sis->getParametros()[2] ?? null;
$post       = $sis->getPost();

switch ($acao) {
    default:
        if ($post) {
            var_dump($post);
            if($post["password"]) {
                echo "Senha vazia";
            } else {
                echo "Senha preenchida";
            }
        }
        $u = $perfil -> user($autUser["id"]);
        require_once("view/perfil.php");
        break;
}