<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Atualizar</title>
</head>
<body>
    <div class="principal">
    <header>
        <img class="imge" src= "logoagenda.png" width="220" height="80">
    </header>
    <aside>
<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM agenda WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$appointment) {
    header('Location: listar.php');
    exit;
}
$nome = $appointment['nome'];
$telefone = $appointment['telefone'];
$consulta_com = $appointment['consulta_com'];
$data = $appointment['data'];
$horario = $appointment['horario'];
$valor = $appointment['valor'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar compromisso</title>
</head>
<body><br>
    <h2>ATUALIZAR COMPROMISSO</h2>
    <form method="post">
    <label for="nome">NOME</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

    <label for="telefone">TELEFONE</label>
    <input type="text" name="telefone" value="<?php echo $telefone; ?>" required><br>

    <label for="consulta_com">CONSULTA COM</label>
    <input type="text" name="consulta_com" value="<?php echo $consulta_com; ?>" required><br>

    <label for="data">DATA</label>
    <input type="text" name="data" value="<?php echo $data; ?>" required><br>

    <label for="horario">HORÁRIO</label>
    <input type="text" name="horario" value="<?php echo $horario; ?>" required><br>

    <label for="valor">VALOR</label>
    <input type="text" name="valor" value="<?php echo $valor; ?>" required><br>

    <button type="submit">ATUALIZAR</button>
</form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $consulta_com = $_POST['consulta_com'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $valor = $_POST['valor'];

    //validação dos dados dop formulário aqui
    $stmt = $pdo->prepare('UPDATE agenda SET nome = ?, telefone = ?, consulta_com = ?, data = ?, horario = ?, valor = ? WHERE id = ?');
    $stmt->execute([$nome, $telefone, $consulta_com, $data, $horario, $valor, $id]);
    header('Location: listar.php');
    exit;
}
?>
</aside>
<section>
        <img src= "calendario-junho-2023.png" width="334" height="250"><br><br>

        <h3>AGENDAMENTOS</h3>
        <a href="index.php"><h4>Voltar para a página</h4></a>

        <h3>CLÍNICO GERAL</h3>
        <p>Dr. Francisco Mendonça</p>
        <a href="francisco.html"><h4>Ver Informações</h4></a>

        <h3>CARDIOLOGISTA</h3>
        <p>Dra. Giulia Fontana</p>
        <a href="giulia.html"><h4>Ver Informações</h4></a><br><br>
    </section>

</body>
</html>