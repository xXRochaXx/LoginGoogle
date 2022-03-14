<?php
$info = \App\Session\User::getInfo();

?>

<h1>Admin - Rocha</h1>
<p>
   Olá, <b><?=$info['name']?></b>. Seja muito bem vindo ao painel Rocha!
</p>

<a href="logout.php">
    <button class="btn btn-danger">Sair</button>
</a>
