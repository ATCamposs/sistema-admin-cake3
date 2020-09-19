<main role="main">
  <div class="jumbotron blog">
    <div class="container">
      <h2 class="display-4 text-center blog-titulo">Blog</h2>
      <div class="row">
          <div class="col-md-8 blog-main">

            <?php foreach($artigos as $artigo){ ?>

              <div class="row featurette">
                <div class="col-md-7 order-md-2">
                  <h2 class="featurette-heading blog-post-title">
                      <?= $this->Html->link(__($artigo->titulo), ['controller' => 'Artigo', 'action' => 'view' , $artigo->slug]) ?>
                  </h2>
                  <p class="lead">
                    <?= $artigo->descricao ?>
                    <?= $this->Html->link(__('Continuar lendo'), ['controller' => 'Artigo', 'action' => 'view' , $artigo->slug], ['class' => 'cont-lendo-post text-danger']) ?>
                  </p>
                </div>
                <div class="col-md-5 order-md-1">
                  <a href="artigo.html">
                    <?php
                    $imagem = $this->Html->image('../files/artigo/'.$artigo->id.'/'.$artigo->imagem, ['class' => 'featurette-image img-fluid mx-auto', 'alt' => $artigo->titulo]);

                    echo $this->Html->link(__($imagem), ['controller' => 'Artigo', 'action' => 'view' , $artigo->slug], ['escape' => false]);
                    ?>  
                  </a>
                </div>
              </div>
              <hr class="featurette-divider">

            <?php } ?>

            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Primeiro</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Último</a></li>
              </ul>
            </nav>
          </div>

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
                <?php foreach($redeSocias as $redeSocia) { ?>
                  <li><i class="<?= $redeSocia->icone ?>"></i> <a href="<?= $redeSocia->link ?>" target="_blank"><?= $redeSocia->titulo ?></a></li>
                <?php } ?>
              </ol>
            </div>
          </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->
      
    </div>
  </div>
</main>
<?php //var_dump($artigos) ?>