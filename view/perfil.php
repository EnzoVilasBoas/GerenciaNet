<div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Perfil</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <a class="breadcrumb mb-0 p-0" href="<?= BASE ?>">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </a>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Edit Profile</h5>
                        </div>
                    </div>
                    <form class="row g-4">
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="position-relative mb-5">
                                    <img src="assets/images/gallery/profile-cover.png" class="img-fluid rounded-4 shadow" alt="">
                                    <div class="profile-avatar">
                                        <img src="assets/images/avatars/01.png" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 row g-4">
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="input1" value="<?= $u["name"] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="input3" class="form-label">Telefone</label>
                                    <input type="text" class="form-control tel-mask" id="input3" value="<?= $u["phone"] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="input4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="input4" value="<?= $u["email"] ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="input5" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="input5" autocomplete="new-password">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="button" class="btn btn-grd-primary px-4">Atualizar perfil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Accounts</h5>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="account-list d-flex flex-column gap-4">
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="assets/images/apps/05.png" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Google</h6>
                                <p class="mb-0">Events and Reserch</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="assets/images/apps/02.png" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Skype</h6>
                                <p class="mb-0">Events and Reserch</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="assets/images/apps/03.png" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Slack</h6>
                                <p class="mb-0">Communication</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="assets/images/apps/06.png" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Instagram</h6>
                                <p class="mb-0">Social Network</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="assets/images/apps/17.png" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Facebook</h6>
                                <p class="mb-0">Social Network</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="assets/images/apps/11.png" width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Paypal</h6>
                                <p class="mb-0">Social Network</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div><!--end row-->



</div>