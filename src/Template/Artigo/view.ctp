<main role="main">
  <div class="jumbotron blog">
    <div class="container">
      <div class="row">
          <div class="col-md-8 blog-main">
            <?php if($artigo){ ?>
              <div class="blog-post">
                <h2 class="blog-post-title"><?= $artigo->titulo ?></h2><hr>
                <p class="blog-post-meta">                
                  <?php
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');

                    //$data = date_format($artigo->created, 'Y-m-d H:i:s');

                    echo strftime ( '%d de %B de %Y' , strtotime(date_format($artigo->created, 'Y-m-d H:i:s')));
                  ?>
                </p>
                <?= $artigo->conteudo ?>
              </div><!-- /.blog-post -->                

              <nav class="blog-pagination">
                <?php
                  if($artigoAnt){
                    echo $this->Html->link(__('Anterior'), ['controller' => 'Artigo', 'action' => 'view', $artigoAnt->slug], ['class' => 'btn btn-outline-primary']) . '&nbsp;';
                  }else{
                    echo $this->Html->link(__('Anterior'), ['controller' => 'Artigo', 'action' => 'view'], ['class' => 'btn btn-outline-secondary disabled']) . '&nbsp;';
                  }

                  if($artigoProx){
                    echo $this->Html->link(__('Próximo'), ['controller' => 'Artigo', 'action' => 'view', $artigoProx->slug], ['class' => 'btn btn-outline-primary']);
                  }else{
                    echo $this->Html->link(__('Próximo'), ['controller' => 'Artigo', 'action' => 'view'], ['class' => 'btn btn-outline-secondary disabled']);
                  }
                ?>
              </nav>
            <?php }else { ?>
              <div class="alert alert-danger" role="alert">
                Artigo não encontrado!
              </div>
            <?php } ?>
          </div><!-- /.blog-main -->

          <aside class="col-md-4 blog-sidebar">
          <?php if($autorSob && $autorSob->situation_id == 1){ ?>
            <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic"><?= $autorSob->titulo ?></h4>
              <p class="mb-0"><?= $autorSob->descricao ?></p>
            </div>
              <?php } ?>
            <div class="p-3">
              <h4 class="font-italic">Recentes</h4>
              <ol class="list-unstyled mb-0">
                <?php foreach($artigoUltimos as $artigoUltimo){ ?>
                  <li>
                    <?= $this->Html->link(__($artigoUltimo->titulo),['controller' => 'Artigo', 'action' => 'view', $artigoUltimo->slug]) ?>
                  </li>
                <?php } ?>
              </ol>
            </div>

            <div class="p-3">
              <h4 class="font-italic">Destaques</h4>
              <ol class="list-unstyled">
                <?php foreach($artigoDestaques as $artigoDestaque){ ?>
                  <li>
                    <?= $this->Html->link(__($artigoDestaque->titulo),['controller' => 'Artigo', 'action' => 'view', $artigoDestaque->slug]) ?>
                  </li>
                <?php } ?>
              </ol>
            </div>

            <div class="p-3">
              <h4 class="font-italic">Redes Sociais</h4>
              <ol class="list-unstyled">
                <li><a href="https://www.instagram.com/celkecursos" target="_blank">Instagram</a></li>
                <li><a href="https://www.facebook.com/celkecursos/" target="_blank">Facebook</a></li>
                <li><a href="https://www.youtube.com/channel/UC5ClMRHFl8o_MAaO4w7ZYug" target="_blank">YouTube</a></li>
                <li><a href="https://twitter.com/celkecursos" target="_blank">Twiter</a></li>
              </ol>
            </div>
          </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->
      

      <hr class="featurette-divider">
    </div>
  </div>
</main>
<?php //var_dump($artigoUltimo) ?>