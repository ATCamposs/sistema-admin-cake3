<main role="main">
  <div class="jumbotron blog">
    <div class="container">
      <div class="row">
          <div class="col-md-8 blog-main">

            <div class="blog-post">
              <h2 class="blog-post-title"><?= $artigo->titulo ?></h2>
              <p class="blog-post-meta">                
                January 1, 2014 by <a href="#">Mark</a></p>
              <?= $artigo->conteudo ?>
            </div><!-- /.blog-post -->                

            <nav class="blog-pagination">
              <a class="btn btn-outline-primary" href="#">Anterior</a>
              <a class="btn btn-outline-secondary disabled" href="#">Próximo</a>
            </nav>

          </div><!-- /.blog-main -->

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
      

      <hr class="featurette-divider">
    </div>
  </div>
</main>
<?php var_dump($artigo) ?>