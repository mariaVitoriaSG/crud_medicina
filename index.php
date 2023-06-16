<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Agendamentos</title>
</head>
<body>
    <div class="principal">
    <header>
        <img class="imge" src= "logoagenda.png" width="220" height="80">
    </header>
    <aside><br>
        <h2>AGENDAMENTOS</h2><br>

        <?php require_once 'db.php';

        if (isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $consulta_com = $_POST['consulta_com'];
            $data = $_POST['data'];
            $horario = $_POST['horario'];
            $valor = $_POST['valor'];
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM agenda WHERE data = ? AND horario = ?');
            $stmt->execute([$data, $horario]);
            $count = $stmt->fetchColumn();
            
            if ($count > 0){
                $error = 'Já existe um agendamento para essa data e horário.';}
            else{
                $stmt = $pdo->prepare('INSERT INTO agenda (nome, telefone, consulta_com, data, horario, valor)
                VALUES (:nome, :telefone, :consulta_com, :data, :horario, :valor)');
                $stmt->execute(['nome' => $nome, 'telefone' => $telefone, 'consulta_com' => $consulta_com, 'data' => $data,
                'horario' => $horario, 'valor' =>$valor]);

            if ($stmt->rowCount()){
                echo '<span>Comprimisso agendado com sucesso!</span>';
            }else{
                echo '<span>Eroo ao agendar compromisso. Tente novamente mais tarde!</span>';
            }

            if (isset($error)) {
                echo '<span>' . $error . '</span>';
            }
        }
    }
?>

<div class= "container">

<form method="post">

<label for="nome">NOME</label>
<input type="text" name="nome" required><br>

<label for="telefone">TELEFONE</label>
<input type="text" name="telefone" required><br>

<label for="consulta_com">CONSULTA  COM</label>
<select name="consulta_com">
<option value="escolha">Escolha o(a) doutor(a)</opition>
<option value="dr.">Dr. Francisco Mendonça</opition>
<option value="dra.">Dra. Giulia Fontana</opition>
</select><br><br>

<label for="data">DATA</label>
<input type="text" name="data" maxlenght="11" required><br>

<label for="horario">HORÁRIO</label>
<input type="text" name="horario" required><br>

<label for="valor">VALORS</label>
<input type="text" name="valor" required><br>
    </div>
    <div id="bts">
        <br><br>

    <button type="submit" name="submit" value="Agendar">Adicionar +</button>
    <button><a href="listar.php">Listar</a></button>
    </div>

    </form>

    </aside>
    <section>
        <img class="calendario" src= "calendario-junho-2023.png" width="334" height="250"><br><br>

        <h3>CLÍNICO GERAL</h3>
        <p>Dr. Francisco Mendonça</p>
        <a href="francisco.html"><h4>Ver Informações</h4></a>

        <h3>CARDIOLOGISTA</h3>
        <p>Dra. Giulia Fontana</p>
        <a href="giulia.html"><h4>Ver Informações</h4></a><br><br>
    </section>
  
</body>
</html>