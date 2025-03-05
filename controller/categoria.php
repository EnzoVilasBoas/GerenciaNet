<?php
$sis    = new Sistema;
$categoria = new Category;

$acao       = $sis->getParametros()[1] ?? null;
$parametro  = $sis->getParametros()[2] ?? null;
$post       = $sis->getPost();

switch ($acao) {
    case 'editar':
        if ($parametro) {
            if ($post) {
                $up["name"] = $post["name"];
                $update = $categoria->categoryUpdate($up,$parametro,$autUser["id"]);
                if ($update) {
                    $msg = '<div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show w-100" role="alert">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-white">Atualização realizada com sucesso!</h6>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }else {
                    $msg = '<div class="alert alert-warning border-0 bg-grd-warning alert-dismissible fade show w-100" role="alert">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-white"><span class="material-icons-outlined fs-2">warning</span>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-white"><span class="alert-link">ERRO!</span> Falha na atualização, tente novamente ou entre em contato com o suporte.</h6>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            }
            $cat = $categoria->categoryRead($parametro,$autUser["id"]);
            if ($cat) {
                require_once('view/categoria/edit.php');
            }else {
                header('Location: '.BASE.'/categoria');
            }
        }
        break;
    
    default:
        if ($post) {
            $cad = [
                "name" => $post["name"],
                "user_id" => $autUser["id"]
            ];
            $create = $categoria -> categoryCreate($cad);
            if ($create) {
                $msg = '<div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show w-100" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Cadastro realizado com sucesso!</h6>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }else {
                $msg = '<div class="alert alert-warning border-0 bg-grd-warning alert-dismissible fade show w-100" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><span class="material-icons-outlined fs-2">warning</span>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white"><span class="alert-link">ERRO!</span> Falha no cadastro, tente novamente ou entre em contato com o suporte.</h6>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
        $lista = $categoria->list($autUser["id"], $acao??0);
        $paginador = $categoria->renderPaginator(5, $acao??0);
        require_once('view/categoria/list.php');
        break;
}