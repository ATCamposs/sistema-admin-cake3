Olá <?=$name?> <br>
Para recuperar sua senha clique no link abaixo:
<p>
Nome de usuário: <?= $username ?>
</p>
<p>
    <a href='<?= $host_name ?>/users/update-password/<?= $recovery_password ?>'>Clique aqui</a>
</p>
<p>
    Se você não solicitou a troca de  senha apenas ignore este e-mail.
</p>