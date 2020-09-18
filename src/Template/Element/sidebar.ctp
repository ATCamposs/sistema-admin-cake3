
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li>
                <?= $this->Html->link(
                    '<i class="fas fa-tachometer-alt"></i> Dashboard',
                    [
                        'controller' => 'Welcome',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>
            </li>
            <li>
            <?= $this->Html->link(
                    '<i class="fas fa-users"></i> Usuários',
                    [
                        'controller' => 'Users',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>
            </li>
            <li>
            <?= $this->Html->link(
                    '<i class="fas fa-sliders-h"></i> Carousels',
                    [
                        'controller' => 'Carousels',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>
            </li>
            <li>
            <?= $this->Html->link(
                    '<i class="fas fa-wrench"></i> Serviços',
                    [
                        'controller' => 'Servicos',
                        'action' => 'view',
                        '1'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>
            </li>
            <li>
            <?= $this->Html->link(
                    '<i class="fas fa-video"></i> Videos',
                    [
                        'controller' => 'Depoimentos',
                        'action' => 'view',
                        '1'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>
            </li>
            <li><?= $this->Html->link(
            '<i class="fas fa-newspaper"></i> Sobre Empresa',
            [
                'controller' => 'EmpresasSobs',
                'action' => 'index'
            ],
            [
                'escape'=> false
            ]
            ); ?>
            </li>
            <li><?= $this->Html->link(
            '<i class="far fa-envelope"></i> Mensagens',
            [
                'controller' => 'ContatosMsgs',
                'action' => 'index'
            ],
            [
                'escape'=> false
            ]
            ); ?>
            </li>
            <li>
            <?= $this->Html->link(
                    '<i class="fas fa-sign-out-alt"></i> Sair',
                    [
                        'controller' => 'Users',
                        'action' => 'logout'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>
            </li>
        </ul>
    </nav>

    