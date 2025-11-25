<?php
include "../header.php";
include "../db.class.php";

$db = new db('material', 'idmaterial');
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

        if (empty($_POST['microfone'])) {
            $errors[] = 'O Microfone é obrigatório';
        }

        if (empty($_POST['tv'])) {
            $errors[] = 'A Televisão é obrigatória';
        }

        if (empty($_POST['caixa_som'])) {
            $errors[] = 'A Caixa de som é obrigatória';
        }

        if (empty($_POST['iluminacao'])) {
            $errors[] = 'A Iluminação é obrigatória';
        }

        if (empty($_POST['idmaterial'])) {
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

        <input type="hidden" name="idmaterial" value="<?= $data->idmaterial ?? '' ?>">

        <div class="row">

            <div class="col-md-6">
                <label class="form-label">Microfone</label>
                <input class="form-control" list="microfone" type="text" name="microfone"
                    value="<?= $data->microfone ?? '' ?>">
                <datalist id="microfone">
                    <option value="Micro Solution MHD">
                    <option value="Micro Solution MHD 3.0">
                    <option value="Shure SM58">
                    <option value="HyperX QuadCast">
                    <option value="Audio-Technica AT2020">
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">Televisão</label>
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
                <label for="caixa_som" class="form-label">Caixa de Som</label>
                <input class="form-control" list="caixa_som" type="text" name="caixa_som"
                    value="<?= $data->caixa_som ?? '' ?>">
                <datalist id="caixa_som">
                    <option value="Micro Lux">
                    <option value="MKD 3.0">
                    <option value="Shure coconut">
                    <option value="HMMs">
                    <option value="Audio Top">
                </datalist>
            </div>

            <div class="col-md-6 mt-3">
                <label for="iluminacao" class="form-label">Iluminação</label>
                <input class="form-control" list="iluminacao" type="text" name="iluminacao"
                    value="<?= $data->iluminacao ?? '' ?>">
                <datalist id="iluminacao">
                    <option value="Vermelho">
                    <option value="Azul">
                    <option value="Verde">
                    <option value="Roxo">
                    <option value="Colorido">
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
                            <th scope="col">Microfone</th>
                            <th scope="col">Televisão</th>
                            <th scope="col">Caixa de Som</th>
                            <th scope="col">Iluminação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dados)): ?>
                            <?php foreach ($dados as $item): ?>
                                <tr>
                                    <th scope="row"><?= $item->idmaterial ?></th>
                                    <td><?= $item->microfone ?></td>
                                    <td><?= $item->tv ?></td>
                                    <td><?= $item->caixa_som ?></td>
                                    <td><?= $item->iluminacao ?></td>
                                    <td>
                                        <a href="./MaterialForm.php?id=<?= $item->idmaterial ?>" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <a href="./MaterialList.php?action=delete&id=<?= $item->idmaterial ?>"
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