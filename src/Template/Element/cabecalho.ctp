<?php 
    $primeiro_nome = str_word_count($profile_user->name) >= 2 ? current(str_word_count($profile_user->name, 2)) : $profile_user->name;

    if(!empty($profile_user->imagem)){
        $imagem_usuario = $this->Html->image('../files/user/' . $profile_user->id . '/' . $profile_user->imagem, ['class' => 'rounded-circle', 'width' => 20, 'height' => 20]);
    } else {
        $imagem_usuario = $this->Html->image('../files/user/logo-gato.png');
    }
?>

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </a>
    <a class="navbar-brand" href="#">Celke</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <?= $imagem_usuario ?>&nbsp;
                    <span class="d-none d-sm-inline"><?= $primeiro_nome ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <?= $this->Html->link('<i class="fas fa-user"></i> Perfil',
                    [
                        'controller' => 'Users',
                        'action' => 'profile'
                    ],
                    [
                        'class' => 'dropdown-item',
                        'escape' => false
                    ]) ?>
                    <?= $this->Html->link('<i class="fas fa-sign-out-alt"></i> Sair',
                    [
                        'controller' => 'Users',
                        'action' => 'logout'
                    ],
                    [
                        'class' => 'dropdown-item',
                        'escape' => false
                    ]) ?>
                </div>
            </li>
        </ul>                
    </div>
</nav>