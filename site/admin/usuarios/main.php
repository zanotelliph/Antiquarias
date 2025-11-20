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
                    <h5 class="card-title text-warning fw-bold">Artigos</h5>
                    <p class="card-text">Cadastre artigos novos .</p>
                    
                    <div class="d-grid gap-2">

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Dúvidas</h5>
                    <p class="card-text">Gerencie as dúvidas</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./duvida/DuvidaList.php" class="btn btn-success">Gerenciar Dúvidas</a>
                        <a href="./duvida/DuvidaForm.php" class="btn btn-outline-success">Responder</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body border-start border-success border-4">
                    <h5 class="card-title text-success fw-bold">Categorias</h5>
                    <p class="card-text">Gerencie as categorias</p>
                    
                    <div class="d-grid gap-2">
                        <a href="./categoria/CategoriaList.php" class="btn btn-success">Gerenciar Categorias</a>
                        <a href="./categoria/CategoriaForm.php" class="btn btn-outline-success">Nova Categoria</a>
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