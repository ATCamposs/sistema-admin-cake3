<footer class="container-fluid py-3 rodape">
    <div class="container">
    <div class="row">
        <div class="col-6 col-md">
        <h5>Celke</h5>
        <ul class="list-unstyled text-small">
            <li><?= $this->Html->link(__('Home'), ['controller' => 'home', 'action' => 'index'], ['class' => 'link-rodape']) ?></li>
            <li><?= $this->Html->link(__('Sobre a empresa'), ['controller' => 'aboutUs', 'action' => 'index'], ['class' => 'link-rodape']) ?></li>
            <li><?= $this->Html->link(__('Contato'), ['controller' => 'contact', 'action' => 'index'], ['class' => 'link-rodape']) ?></li>
        </ul>
        </div>
        <div class="col-6 col-md">
        <h5>Contato</h5>
        <ul class="list-unstyled text-small">
            <li><a class="link-rodape" href="tel:XXXXXXXXXX">(XX) XXXX-XXXX</a></li>
            <li><a class="link-rodape" href="#">Av. Republica Argentina</a></li>
            <li>CNPJ: XX.XXX.XXX/XXXX-61</li>
        </ul>
        </div>
        <div class="col-6 col-md">
        <h5>Redes Sociais</h5>
        <ul class="list-unstyled text-small">
            <li><a class="link-rodape" href="https://www.instagram.com/celkecursos" target="_blank">Instagram</a></li>
            <li><a class="link-rodape" href="https://www.facebook.com/celkecursos/" target="_blank">Facebook</a></li>
            <li><a class="link-rodape" href="https://www.youtube.com/channel/UC5ClMRHFl8o_MAaO4w7ZYug" target="_blank">YouTube</a></li>
            <li><a class="link-rodape" href="https://twitter.com/celkecursos" target="_blank">Twiter</a></li>
        </ul>
        </div>
    </div>
    </div>
</footer>