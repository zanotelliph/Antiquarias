<?php
include "../header.php";
include "../db.class.php";

$db = new db('produto', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {
    try {
        $errors = [];

        if (empty($_POST['nome'])) {
            $errors[] = 'O nome do produto é obrigatório';
        }

        if (empty($errors)) {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                echo "<div class='alert alert-success'>Produto cadastrado com sucesso!</div>";
            } else {
                $db->update($_POST);
                echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
            }

            echo "<script>
                    setTimeout(() => window.location.href = 'ProdutoList.php', 1000);
                  </script>";
        } else {
            echo "<div class='alert alert-danger'>" . implode('<br>', $errors) . "</div>";
        }

    } catch (Exception $e) {
        var_dump($e->getMessage());
        exit();
    }
}
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Novo' ?> Produto:</h3>

    <form action="ProdutoForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="nome"
                       value="<?= $data->nome ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tipo</label>
                <input class="form-control" list="tipo_list" type="text" name="tipo"
                       value="<?= $data->tipo ?? '' ?>">
                <datalist id="tipo_list">
                    <option value="Microfone">
                    <option value="TV">
                    <option value="Caixa de Som">
                    <option value="Iluminação">
                    <option value="Acessório">
                </datalist>
            </div>

            <div class="col-md-4">
                <label class="form-label">Quantidade</label>
                <input class="form-control" type="number" name="quantidade" min="0"
                       value="<?= $data->quantidade ?? '' ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Marca</label>
                <input class="form-control" list="marca_list" type="text" name="marca"
                       value="<?= $data->marca ?? '' ?>">
                <datalist id="marca_list">
                    <option value="Shure">
                    <option value="JBL">
                    <option value="Sony">
                    <option value="Samsung">
                    <option value="LG">
                </datalist>
            </div>

            <div class="col-md-4">
                <label class="form-label">Modelo</label>
                <input class="form-control" type="text" name="modelo"
                       value="<?= $data->modelo ?? '' ?>">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./ProdutoList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
</div>

<?php include "../footer.php"; ?>

