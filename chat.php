<?php
session_start();
if(empty($_SESSION['username'])){
    header('location: index.php');
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
    <title>Chat</title>
</head>
<body>
    <a class="btn exit" href="sair.php">Sair</a>
    <section id="content"></section>
    <aside>
        <form id="form1">
            <input class="d-none" value="<?php echo $username?>" type="text" name="name" id="name">
            <input required minlength="1" type="text" placeholder="Digite aqui sua mensagem..." name="message" id="message">
        </form>
        <button class="btn main-button" id="btn1">Enviar</button>
    </aside>

<script src="assets/js/script.js"></script>
</body>
</html>