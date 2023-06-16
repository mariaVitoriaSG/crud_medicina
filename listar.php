
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="estilo.css">
    <title>Lista de Agendamentos</title>
</head>
<body class="listar">
<div class="principal">
    <header>
        <img class="imge" src= "logoagenda.png" width="220" height="80">
    </header>
    <aside><br>
        <h2>AGENDAMENTOS</h2><br>

    <?php
    $stmt = $pdo->query('SELECT * FROM agenda ORDER BY data, horario');
    $agenda = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($agenda)==0) {
        echo '<p>Nenhum compromisso agendado.</p>';
}else{
    echo '<table border="1">';
    echo '<thead><tr><th>NOME</th><th>TELEFONE</th><th>CONSULTA COM</th><th>DATA</th><th>HORÁRIO</th><th>VALOR</th><th colspan="2">OPÇÕES</th></tr></thead>';
    echo '<tbody>';

    foreach ($agenda as $agendas) {
        echo '<tr>';
        echo '<td>' . $agendas['nome'] . '</td>';
        echo '<td>' . $agendas['telefone'] . '</td>';
        echo '<td>' . $agendas['consulta_com'] . '</td>';
        echo '<td>' . $agendas['data'] . '</td>';
        echo '<td>' . $agendas['horario'] . '</td>';
        echo '<td>' . $agendas['valor'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' .$agendas['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' .
        $agendas['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
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
    <footer> 
</footer>