<?php
session_start();
if(!empty($_SESSION['username'])){
    header('location: chat.php');
}
if(isset($_POST['sendForm'])){
    $nome = $_POST['name'];
    if(empty($nome)){
        echo '<div class="alert alert-danger">Digite seu nome de usuário</div>';
    } else {
        if($_SESSION['username'] = $nome){
            header('location: chat.php');
        }
    }
}
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
<div class="container-fluid mt-5">
    <div class="d-flex justify-content-center align-items-center">
        <form method="POST" class="col-md-6">
            <div class="mb-3">
                <label for="username" class="form-label">Nome de usuário</label>
                <input required type="text" class="form-control" id="username" name="name" placeholder="Digite seu usuário">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="sendForm" class="btn main-button">Entrar</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>