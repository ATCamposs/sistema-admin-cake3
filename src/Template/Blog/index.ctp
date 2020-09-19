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
                    <a href="artigo.html"><?= $artigo->titulo ?></a>
                  </h2>
                  <p class="lead">
                    <?= $artigo->descricao ?>
                    <a href="artigo.html" class="cont-lendo-post text-danger">Continuar lendo</a>
                  </p>
                </div>
                <div class="col-md-5 order-md-1">
                  <a href="artigo.html">
                    <?= $this->Html->image('../files/artigo/'.$artigo->id.'/'.$artigo->imagem, ['class' => 'featurette-image img-fluid mx-auto', 'alt' => $artigo->titulo]) ?>
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
            <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic">Sobre</h4>
              <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>

            <div class="p-3">
              <h4 class="font-italic">Recentes</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">Artigo 37</a></li>
                <li><a href="#">Artigo 36</a></li>
                <li><a href="#">Artigo 35</a></li>
                <li><a href="#">Artigo 34</a></li>
                <li><a href="#">Artigo 33</a></li>
                <li><a href="#">Artigo 32</a></li>
              </ol>
            </div>

            <div class="p-3">
              <h4 class="font-italic">Destaques</h4>
              <ol class="list-unstyled">
                <li><a href="#">Artigo 14</a></li>
                <li><a href="#">Artigo 32</a></li>
                <li><a href="#">Artigo 21</a></li>
                <li><a href="#">Artigo 10</a></li>
                <li><a href="#">Artigo 5</a></li>
                <li><a href="#">Artigo 27</a></li>
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
      
    </div>
  </div>
</main>
<?php var_dump($artigos) ?>