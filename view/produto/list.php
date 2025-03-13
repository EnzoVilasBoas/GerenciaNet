<div class="main-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Produtos</div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Cadastro</h5>
                        </div>
                    </div>
                    <form class="row g-4" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <label for="input1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="input1" name="name">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <?php 
                                    if (isset($msg)) {
                                        echo $msg;
                                    }else {
                                        echo '<button type="submit" class="btn btn-grd-primary px-4">Cadastrar</button>';
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12 d-flex align-items-stretch">

            <?php if ($lista): ?>
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0 fw-bold">Lista</h5>
                            </div>
                            <?= $paginador ?>
                        </div>
                        <div class="A_msg"></div>
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Criada em</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($lista as $l) {
                                        echo '
                                        <tr id="category'.$l["id"].'">
                                            <th scope="row">'.$l["id"].'</th>
                                            <td>'.$l["name"].'</td>
                                            <td>'. date('d/m/Y H:i:s', strtotime($l["created_at"])) .'</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="'.BASE.'/categoria/editar/'.$l["id"].'" class="btn btn-primary d-flex"><i class="material-icons-outlined">edit</i></a>
                                                    <a class="btn btn-primary d-flex A_categoryRequest" data-category="'.$l["id"].'"><i class="material-icons-outlined">delete</i></a>
                                                </div>
                                            </td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning border-0 bg-grd-warning alert-dismissible fade show w-100" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><span class="material-icons-outlined fs-2">warning</span>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Nenhuma categoria cadastrada</h6>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>