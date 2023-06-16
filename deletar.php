<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Deletar</title>
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
$stmt = $pdo->prepare('SELECT *FROM agenda WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM agenda WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: listar.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Deletar Compromisso</title>
</head>
<body><br>
    <h2>DELETAR COMPROMISSO</h2>
    <p>Tem certeza que deseja deletar o compromisso de
    <?php echo $appointment['nome']; ?>
    em <?php echo ($appointment['data']); ?>
    às <?php echo ($appointment['horario']); ?>?</p>
    <form method="post">
        <button class="btao" type="submit">SIM</button>
        <a href="listar.php">NÃO</a>
</form>   
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