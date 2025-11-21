<?php
include './header.php';
include './db.class.php';

$db = new db('usuario');
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
                        <a href="./usuario/UsuarioList.php" class="btn btn-primary">Gerenciar Usuários</a>
                        <a href="./usuario/UsuarioForm.php" class="btn btn-outline-primary">Novo Usuário</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-warning border-4">
                    <h5 class="card-title text-warning fw-bold">Playlists</h5>
                    <p class="card-text">Cadastre Playlists novas .</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./playlist/PlaylistList.php" class="btn btn-warning">Gerenciar playlists</a>
                        <a href="./playlist/PlaylistForm.php" class="btn btn-outline-warning">Nova playlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Salas</h5>
                    <p class="card-text">Gerencie as salas</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./sala/SalaList.php" class="btn btn-success">Gerenciar salas</a>
                        <a href="./sala/SalaForm.php" class="btn btn-outline-success">Responder</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Materiais</h5>
                    <p class="card-text">Gerencie as Materiais</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./Material/MaterialList.php" class="btn btn-success">Gerenciar materiais</a>
                        <a href="./Material/MaterialForm.php" class="btn btn-outline-success">Nova material</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="row mt-5">
        <div class="col text-center">
            <a href="login.php?logout=true" class="btn btn-danger btn-sm">Sair do Sistema</a>
        </div>
    </div>
</div>

<?php
include './footer.php';
?>