<?php
include "../header.php";
include "../db.class.php";

$db = new db('material', 'id');
$data = null;
$dados = [];

if (!empty($_GET['id'])) {
    if (!empty($_GET['action']) && $_GET['action'] === 'delete') {
        $db->destroy($_GET['id']);
        header('Location: MaterialList.php');
        exit;
    }

    $data = $db->find($_GET['id']);
}

$dados = $db->all();

if (!empty($_POST)) {
    try {
        $errors = [];

        if (empty($_POST['Tipo'])) {
            $errors[] = 'O Tipo é obrigatório';
        }

        if (empty($_POST['Marca'])) {
            $errors[] = 'A Marca é obrigatória';
        }

        if (empty($_POST['modelo'])) {
            $errors[] = 'A Caixa de som é obrigatória';
        }

        if (empty($_POST['Quantidade'])) {
            $errors[] = 'A Iluminação é obrigatória';
        }

        if (empty($_POST['id'])) {
            $db->store($_POST);
            echo "<div class='alert alert-success'>Registro Salvo com sucesso!</div>";
        } else {
            $db->update($_POST);
            echo "<div class='alert alert-success'>Registro Atualizado com sucesso!</div>";
        }

        echo "<script>
                setTimeout(() => window.location.href = 'MaterialList.php', 1000);
              </script>";

    } catch (Exception $e) {
        var_dump($errors, $e->getMessage());
        exit();
    }
}
?>

<div class="container mt-4">
    <h3>Materiais:</h3>

    <form action="MaterialForm.php" method="post">

        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row">

            <div class="col-md-6">
                <label class="form-label">tipo</label>
                <input class="form-control" list="tipo" type="text" name="tipo"
                    value="<?= $data->tipo ?? '' ?>">
                <datalist id="tipo">
                    <option value="Microfone">
                    <option value="Televisão">
                    <option value="Iluminação">
                    <option value="Caixa de som ">
                   
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">Marca</label>
                <input class="form-control" list="tv" type="text" name="tv"
                    value="<?= $data->tv ?? '' ?>">
                <datalist id="tv">
                    <option value="LG">
                    <option value="Sony">
                    <option value="Sansung">
                    <option value="Philco">
                    <option value="AOC">
                </datalist>
            </div>

            <div class="col-md-6 mt-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input class="form-control" list="modelo" type="text" name="modelo"
                    value="<?= $data->modelo ?? '' ?>">
                <datalist id="modelo">
                    <option value="Micro Lux">
                    <option value="MKD 3.0">
                    <option value="Shure coconut">
                    <option value="HMMs">
                    <option value="Audio Top">
                </datalist>
            </div>

            <div class="col-md-6 mt-3">
                <label for="Quantidade" class="form-label">Quantidade</label>
                <input class="form-control" list="Quantidade" type="text" name="Quantidade"
                    value="<?= $data->Quantidade ?? '' ?>">
                <datalist id="Quantidade">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                    <option value="4">
                    <option value="5">
                </datalist>
            </div>
        </div>

        <div class="row">
            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./MaterialList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

    </form>

    <div class="row mt-5">
        <div class="col">
            <h4 class="mb-3">Materiais cadastrados</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover text-white">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">tipo</th>
                            <th scope="col">marca</th>
                            <th scope="col">modelo</th>
                            <th scope="col">quantidade</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dados)): ?>
                            <?php foreach ($dados as $item): ?>
                                <tr>
                                    <th scope="row"><?= $item->idl ?></th>
                                    <td><?= $item->tipo ?></td>
                                    <td><?= $item->marca ?></td>
                                    <td><?= $item->modelo ?></td>
                                    <td><?= $item->Quantidade ?></td>
                                    <td>
                                        <a href="./MaterialForm.php?id=<?= $item->idl ?>" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <a href="./MaterialList.php?action=delete&id=<?= $item->idl ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Deseja realmente excluir este material?');">
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Nenhum material cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>