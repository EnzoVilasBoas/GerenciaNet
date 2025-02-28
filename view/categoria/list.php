<div class="main-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Categorias</div>
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
                            <label for="input3" class="form-label">Telefone</label>
                            <input type="text" class="form-control tel-mask" id="InputTelefone" name="phone">
                        </div>

                        <div class="col-md-12">
                            <label for="input4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="input4" name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="input5" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="input5" autocomplete="new-password" name="pass">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <?php 
                                    if (isset($msg)) {
                                        echo $msg;
                                    }else {
                                        echo '<button type="submit" class="btn btn-grd-primary px-4">Atualizar perfil</button>';
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
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning border-0 bg-grd-warning alert-dismissible fade show w-100" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
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