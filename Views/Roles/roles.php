<?php
headerAdmin($data);
getModal('modalRoles', $data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-bookmarks-fill"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" onclick="openModal();"><i class="bi bi-plus-circle-fill"></i>Nuevo</button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/roles"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">Roles de Usuario</div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>