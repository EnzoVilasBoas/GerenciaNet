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
                            <h5 class="mb-0 fw-bold">Editar</h5>
                        </div>
                    </div>
                    <form class="row g-4" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <label for="input1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="input1" name="name" value="<?= $cat["name"] ?>">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <?php 
                                    if (isset($msg)) {
                                        echo $msg;
                                    }else {
                                        echo '<button type="submit" class="btn btn-grd-primary px-4">Atualizar</button>';
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>