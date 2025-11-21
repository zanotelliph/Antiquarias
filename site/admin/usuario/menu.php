<?php
include './header.php';
include './database/db.class.php';

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
                    <h5 class="card-title text-warning fw-bold">playlists</h5>
                    <p class="card-text">Cadastre playlists novos .</p>
                    
                    <div class="d-grid gap-2">
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
                        <a href="./sala/salaList.php" class="btn btn-success">Gerenciar salas</a>
                        <a href="./sala/salaForm.php" class="btn btn-outline-success">Responder</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Tempo</h5>
                    <p class="card-text">Gerencie os horários de sessão de karaokê</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./Tempo/TempoList.php" class="btn btn-success">Gerenciar tempo</a>
                        <a href="./Tempo/salaForm.php" class="btn btn-outline-success">Gerencie os horários</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Materiais</h5>
                    <p class="card-text">Gerencie as materiais</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./material/materialList.php" class="btn btn-success">Gerenciar Materiais</a>
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