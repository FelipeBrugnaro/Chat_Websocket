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
    <section class="content">
        <h3>Chat Websocket</h3>
        <p>Digite para começar a conversar.</p>
    </section>
    <form id="formchat" class="d-flex justify-content-between" method="post">
        <input data-username class="d-none" value="<?php echo $username?>" type="text" name="username">
        <input required data-message minlength="1" type="text" placeholder="Digite aqui sua mensagem..." name="message">
        <button type="submit" class="btn main-button">Enviar</button>
    </form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>