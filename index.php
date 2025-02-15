<?php
ob_start();
session_start();

require_once('config/iniSis.php');
require_once('config/autoload.php');

$sis = new Sistema;

$sis->debug(false);

/**
 * Funcao AutUser so deve ser usada em paginas onde o login e obrigatorio
 * Caso contrario alterar a funcao para nao redirecionar
 */
if ($_SESSION['AutUser']['id']) {
	$autUser = $sis->AutUser($_SESSION['AutUser']['id']);
}

$sis->api();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITULO ?></title>
</head>
<body>
    <header></header>
    <!-- Faz a verificacao da url para identificar a controller a ser acessada -->
    <?= $sis->getHome($autUser); ?>
    <footer></footer>
</body>
</html>
<?php
ob_end_flush();