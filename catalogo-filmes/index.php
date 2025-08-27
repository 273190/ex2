<?php
$filme = '';
$genero = '';
$mensagem = '';
$cor = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filme = $_POST['filme'] ?? '';
    $genero = $_POST['genero'] ?? '';

    if (strtolower($genero) === 'terror') {
        $mensagem = "Filme de terror registrado!";
        $cor = "red";
    } elseif (strtolower($genero) === 'comédia') {
        $mensagem = "Filme de comédia registrado!";
        $cor = "green";
    } else {
        $mensagem = "Filme registrado!";
        $cor = "black";
    }
}

$imagem = "filme.png";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Filmes</title>
</head>
<body>
    <?php include "cabecalho.php"; ?>

    <img src="<?= $imagem ?>" alt="Imagem do filme" width="200">

    <form action="index.php" method="post">
        <label>Nome do filme: <input type="text" name="filme" value="<?= htmlspecialchars($filme) ?>"></label><br><br>
        <label>Gênero: <input type="text" name="genero" value="<?= htmlspecialchars($genero) ?>"></label><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <?php if($filme && $genero): ?>
        <p style="color: <?= $cor ?>;">
            <?= htmlspecialchars($mensagem) ?><br>
            Nome do filme: <?= htmlspecialchars($filme) ?><br>
            Gênero: <?= htmlspecialchars($genero) ?>
        </p>
    <?php endif; ?>

    <?php include "rodape.php"; ?>
</body>
</html>
