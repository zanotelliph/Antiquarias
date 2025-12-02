<?php
include './header.php';
include './db.class.php';

$db = new db('usuario', 'id');
$db->checkLogin();
?>

<div class="container mt-5">

    <h3 class="mb-4">Bem vindo, <?= $_SESSION['nome'] ?? 'Administrador' ?></h3>
    
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-primary border-4">
                    <h5 class="card-title text-primary fw-bold">Usuários</h5>
                    <p class="card-text">Gerencie o acesso a dados dos clientes.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="<?= ADMIN_BASE_PATH ?>/usuario/UsuarioList.php" class="btn btn-primary">Gerenciar Usuários</a>
                        <a href="<?= ADMIN_BASE_PATH ?>/usuario/UsuarioForm.php" class="btn btn-outline-primary">Novo Usuário</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-warning border-4">
                    <h5 class="card-title text-warning fw-bold">Playlists</h5>
                    <p class="card-text">Cadastre e gerencie playlists.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="<?= ADMIN_BASE_PATH ?>/playlist/PlaylistList.php" class="btn btn-warning">Gerenciar Playlists</a>
                        <a href="<?= ADMIN_BASE_PATH ?>/playlist/PlaylistForm.php" class="btn btn-outline-warning">Nova Playlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Salas</h5>
                    <p class="card-text">Gerencie as salas de karaokê.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="<?= ADMIN_BASE_PATH ?>/sala/SalaList.php" class="btn btn-success">Gerenciar Salas</a>
                        <a href="<?= ADMIN_BASE_PATH ?>/sala/SalaForm.php" class="btn btn-outline-success">Nova Sala</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-secondary border-4">
                    <h5 class="card-title text-secondary fw-bold">Produtos</h5>
                    <p class="card-text">Gerencie os produtos e equipamentos.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="<?= ADMIN_BASE_PATH ?>/produto/ProdutoList.php" class="btn btn-secondary">Gerenciar Produtos</a>
                        <a href="<?= ADMIN_BASE_PATH ?>/produto/ProdutoForm.php" class="btn btn-outline-secondary">Novo Produto</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-info border-4">
                    <h5 class="card-title text-info fw-bold">Reservas</h5>
                    <p class="card-text">Gerencie as reservas de salas.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="<?= ADMIN_BASE_PATH ?>/reserva/ReservaList.php" class="btn btn-info">Gerenciar Reservas</a>
                        <a href="<?= ADMIN_BASE_PATH ?>/reserva/ReservaForm.php" class="btn btn-outline-info">Nova Reserva</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="row mt-5">
        <div class="col text-center">
            <a href="<?= ADMIN_BASE_PATH ?>/login.php?logout=true" class="btn btn-danger btn-sm">Sair do Sistema</a>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
