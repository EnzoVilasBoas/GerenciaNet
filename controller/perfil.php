<?php
$sis    = new Sistema;
$perfil = new Profile;

$acao       = $sis->getParametros()[1] ?? null;
$parametro  = $sis->getParametros()[2] ?? null;
$post       = $sis->getPost();

switch ($acao) {
    default:
        if ($post) {
            $cad = [
                "name"  => $post["name"],
                "phone" => $post["phone"],
                "email" => $post["email"],
            ];
            if (!$post["pass"] == "") {
                $cad["password_hash"] = password_hash($post["pass"], PASSWORD_ARGON2ID);
            }
            if ($_FILES["avatar"]["name"] != "") {
                $img = $_FILES["avatar"];
                $exp	= explode('.', $img["name"]);
                $ext	= end($exp);
                $nome    = md5($autUser["id"]).".".$ext;
                $sis -> uploadImage($img["tmp_name"],$nome,170,170, "uploads/avatars/");
                $cad["avatar_url"] = $nome;
            }
            $up = $perfil->userUpdate($cad, $autUser["id"]);
            if ($up) {
                $msg = '<div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show w-100" role="alert" id="A_alerta">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Cadastro atualizado com sucesso!</h6>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
        $u = $perfil->user($autUser["id"]);
        require_once("view/perfil.php");
        break;
}
