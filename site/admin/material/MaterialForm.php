<?php
include "../header.php";
include "../db.class.php";

$db = new db('material', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {
    try {
        $errors = [];

        if (empty($_POST['tipo'])) {
            $errors[] = 'O tipo é obrigatório';
        }

        if (empty($_POST['marca'])) {
            $errors[] = 'A marca é obrigatória';
        }

        if (empty($_POST['modelo'])) {
            $errors[] = 'A nome é obrigatória';
        }

        if (empty($_POST['quantidade'])) {
            $errors[] = 'A quantidade é obrigatória';
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

        <div class="col-6">
            <label class="form-label">Material</label>
            <input class="form-control" list="tipo" type="text" name="tipo"
                   value="<?= $data->tipo ?? '' ?>">
                   <datalist id="tipo">

                       <option value="tipo">
                           <option value="Microfone"></option>
                           <option value="TV">
                               <option value="Iluminação">
                                   <option value="Caixa de Som"></option>
                                </datalist>
            
        <div class="col-4">
            <label class="form-label">marca</label>
            <input class="form-control" list="marca" type="marca" name="marca"
                   value="<?= $data->marca ?? '' ?>">
            <datalist id="marca">

                <datalist id=" marca">
                <option value="Micro Solution MHD">
                <option value="Micro Solution MHD 3.0">
                <option value="Shure SM58">
                <option value="HyperX QuadCast">
                <option value="Audio-Technica AT2020">
            </datalist>
        </div>
                
            </datalist>
        </div>

        <div class="col-4">
            <label for="modelo" class="form-label">modelo</label>
            <input class="form-control" list="modelo" type="text" name="modelo"
                   value="<?= $data->modelo ?? '' ?>">
            <datalist id="modelo">
                <option value="Micro evolution">
                <option value="Micro evolution 3.0">
                <option value="Shure coconut">
                <option value="HQC">
                <option value="Audio Top">
            </datalist>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-4">
            <label for="quantidade" class="form-label">quantidade</label>
            <input class="form-control" list="quantidade" type="text" name="quantidade"
                   value="<?= $data->quantidade ?? '' ?>">
            <datalist id="quantidade">
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
</div>

<?php include "../footer.php"; ?>