<main role="main">
  <div class="jumbotron sobre-empresa">
    <div class="container">
      <h2 class="display-4 text-center sob-emp-titulo">Sobre a Empresa</h2>
      <?php
        $contEmpSob = 1;
        foreach($empSobs as $empSob){
          if($contEmpSob == 1){
            $textEmpSob = "order-md-2";
            $imgEmpSob = "order-md-1";
            $contEmpSob = 2;
          }else{
            $textEmpSob = "";
            $imgEmpSob = "";
            $contEmpSob = 1;
          }
          ?>
            <div class="row featurette">
              <div class="col-md-7 <?= $textEmpSob ?>">
                <h2 class="featurette-heading"><?= $empSob->titulo ?></h2>
                <p class="lead"><?= $empSob->descricao ?></p>
              </div>
              <div class="col-md-5 <?= $imgEmpSob ?>">
                <?= $this->Html->image('../files/sob_emp/' . $empSob->id . '/' . $empSob->imagem, ['class' => 'featurette-image img-fluid mx-auto', 'alt' => $empSob->titulo]) ?>
              </div>
            </div>
            <hr class="featurette-divider">
          <?php
        }
      ?>
    </div>
  </div>  
</main>