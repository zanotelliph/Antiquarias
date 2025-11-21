<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('playlist');
$data = null;

if (!empty($_POST)) {
    try {
        $errors = [];


        if (empty($_POST['titulo'])) {
            $errors[] = 'O titúlo é obrigatório';
        }

        if (empty($_POST['artista'])) {
            $errors[] = 'O artista é obrigatório';
        }

        if (empty($_POST['modo'])) {
            $errors[] = 'A data de publicacao é obrigatória';
        }

        if (empty($_POST['id'])) {
            if ($_POST['senha'] === $_POST['c_senha']) {
                $_POST['senha'] = password_hash(
                    $_POST['senha'],
                    PASSWORD_BCRYPT
                );

                unset($_POST['c_senha'], $_POST['id']); 
                $db->store($_POST);
                echo 'Registro Salvo com sucesso!';
            }
        } else {
            if ($_POST['senha'] === $_POST['c_senha']) {
                $_POST['senha'] = password_hash(
                    $_POST['senha'],
                    PASSWORD_BCRYPT
                );
                unset($_POST['c_senha']); 
                $db->update($_POST);

                echo 'Registro Atualizado com sucesso!';
            }
        }

        echo "<script>
            setTimeout(
                ()=> window.location.href = 'playlistList.php', 2000
            );
        </script>";
    } catch (Exception $e) {
        var_dump($errors, $e->getMessage());
        exit();
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
   
}
?>

<h3>Sua Playlist:</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">

        <!-- TÍTULO -->
        <div class="col-6">
            <label class="form-label">Título</label>
            <input class="form-control" list="titulos" type="text" name="titulo" 
                   value="<?= $data->titulo ?? '' ?>">
            <datalist id="titulos">
                <option value="Oceano">
                <option value="Beija-flor">
                <option value="Espelho">
                <option value="Dia Lindo">
                <option value="Chove Chuva">
            </datalist>
        </div>

        <!-- ARTISTA -->
        <div class="col-6">
            <label class="form-label">Artista</label>
            <input class="form-control" list="artistas" type="text" name="artista" 
                   value="<?= $data->artista ?? '' ?>">
            <datalist id="artistas">
                <option value="Djavan">
                <option value="João Gomes">
                <option value="Mariana Froes">
                <option value="Dazaranha">
                <option value="Jorge Ben Jor">
            </datalist>
        </div>

        <!-- MODO -->
        <div class="col-6">
            <label class="form-label">Modo</label>
            <select class="form-control" name="modo">
                <option value="">Selecione um modo</option>
                <option value="Normal"   <?= ($data->modo ?? '') == 'Normal'   ? 'selected' : '' ?>>Normal</option>
                <option value="Slowed"   <?= ($data->modo ?? '') == 'Slowed'   ? 'selected' : '' ?>>Slowed</option>
                <option value="Sped-Up"  <?= ($data->modo ?? '') == 'Sped-Up'  ? 'selected' : '' ?>>Sped-Up</option>
                <option value="Sped-Up Reverb" <?= ($data->modo ?? '') == 'Sped-Up Reverb' ? 'selected' : '' ?>>Sped-Up Reverb</option>
            </select>
        </div>

        <!-- SENHA -->
        <div class="col-6">
            <label class="form-label">Senha</label>
            <input class="form-control" type="password" name="senha">
        </div>

        <!-- CONFIRMAR SENHA -->
        <div class="col-6">
            <label class="form-label">Confirmar Senha</label>
            <input class="form-control" type="password" name="c_senha">
        </div>

    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./playlistList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include '../footer.php'; ?>
