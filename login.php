<?php
ob_start();
session_start();

require_once('config/iniSis.php');
require_once('config/autoload.php');

$sis = new Sistema;

$sis->debug(FALSE);

$aut = new AutUser;

$cookie = $aut->verificaCookie();
if ($cookie) {
    switch ($cookie) {
        case 1:
            $msg =
                '<div class="alert alert-success" role="alert">
                    Autenticado com sucesso, Redirecionando...
                    <meta http-equiv="refresh" content="5;url=' . BASE . '">
                </div>';
            break;
        case 2:
            $msg =
                '<div class="alert alert-warning" role="alert">
                    Cookie invalido, realize o login novamente.
                </div>';
            break;
        default:
            $msg =
                '<div class="alert alert-danger" role="alert">
                    <span class="alert-link">ERRO</span>! Tente novamente ou entre em contato com  o suporte.
                </div>';
            break;
    }
}

$post = $sis->getPost();
if ($post) {
    $login = $aut->login($post);
    switch ($login) {
        case 1:
            $msg =
                '<div class="alert alert-success" role="alert">
                    Autenticado com sucesso, Redirecionando...
                    <meta http-equiv="refresh" content="5;url=' . BASE . '">
                </div>';
            break;
        case 2:
            $msg =
                '<div class="alert alert-warning" role="alert">
                    E-mail ou senha incorretos, verifique e tente novamente.
                </div>';
            break;
        default:
            $msg =
                '<div class="alert alert-danger" role="alert">
                    <span class="alert-link">ERRO</span>! Tente novamente ou entre em contato com  o suporte.
                </div>';
            break;
    }
}
?>
<!doctype html>
<html lang="pt-br" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= TITULO ?> | Login</title>
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
    <link href="assets/css/pace.min.css" rel="stylesheet">
    <script src="assets/js/pace.min.js"></script>
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="sass/main.css" rel="stylesheet">
    <link href="sass/dark-theme.css" rel="stylesheet">
    <link href="sass/blue-theme.css" rel="stylesheet">
    <link href="sass/responsive.css" rel="stylesheet">
</head>

<body>
    <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
        <div class="container-fluid my-5 my-lg-0">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                    <div class="card rounded-4 mb-0">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Entre para começar
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show border-top border-4 border-primary border-gradient-1" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="card-body p-5">
                                        <!-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> -->
                                        <p class="mb-0">Insira suas credenciais para fazer login em sua conta</p>
                                        <?= $msg ?? null ?>
                                        <div class="form-body my-5">
                                            <form class="row g-3" method="post">
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="inputEmailAddress" placeholder="contato@gerencia.net" name="email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Senha</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="senha">
                                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="persistente">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Lembrar-se</label>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6 text-end"> <a href="auth-basic-forgot-password.html">Forgot Password ?</a> -->
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-grd-primary">Login</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Novo por aqui?<span class="text-success" style="margin-left: 6px;">Crie sua conta!</span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse border-top border-4 border-primary border-gradient-1" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="card-body p-5">
                                        <!-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> -->
                                        <p class="mb-0">Insira suas dados para cadastrar sua conta</p>
                                        <?= $msg ?? null ?>
                                        <div class="form-body my-5">
                                            <form class="row g-3" method="post">
                                                <div class="col-12">
                                                    <label for="InputNome" class="form-label">Nome</label>
                                                    <input type="text" class="form-control" id="InputNome" placeholder="Jose da silva" name="name">
                                                </div>
                                                <div class="col-12">
                                                    <label for="InputEmail" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="InputEmail" placeholder="contato@gerencia.net" name="email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="InputTelefone" class="form-label">Telefone</label>
                                                    <input type="text" class="form-control" id="InputTelefone" placeholder="11993269781" name="phone">
                                                </div>
                                                <div class="col-12">
                                                    <label for="InputSenha" class="form-label">Senha</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0" id="InputSenha" placeholder="Enter Password" name="pass">
                                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-grd-primary">Cadastrar-se</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>
</body>

</html>
<?php
ob_end_flush();
?>