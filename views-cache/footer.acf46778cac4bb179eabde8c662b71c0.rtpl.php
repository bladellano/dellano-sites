<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!-- BOTÃO DO TOPO -->
<div class="topo">
    <i class="fas fa-chevron-up"></i>
</div>

<!-- BOTÃO DO WHATSAPP -->
<a href="https://api.whatsapp.com/send?l=pt&phone=5591982650277" target="_blank">
    <img src="assets/img/whatsapp.png" alt="" class="btn-whatsapp">
</a>

<footer>

    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <!-- <img src="assets/img/logo-nav-solo.png" alt="LOGO" > -->
            </div>
            <div class="col-md-12 text-right">
                <a style="color:#FFF" href="https://www.facebook.com/caio.nunes.7374" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a style="color:#FFF" href="https://www.instagram.com/dell4no/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a style="color:#FFF" href="https://api.whatsapp.com/send?phone=5591982650277" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 footer-list">
                <h3>Contato</h3>
                <span class="phone">+55 (91) 9 8265-0277</span><br>
                <span class="email">bladellano@gmail.com</span>
                <address>
                    Rua Dois de Junho, Trav. J, Casa 01	<br/>
                    Águas Brancas, 67033-160<br/>
                    Ananindeua - Pará - Brasil.
                </address>
            </div>
            <div class="col-md-4 footer-list">
                <h3>Mais Serviços</h3>
                <ul>
                    <li class="efeito-hr"><a href="/reformular-site-antigo#inicio">Reformular o seu sites antigo</a><hr></li>
                    <li class="efeito-hr"><a href="/criacao-artes-site-redes-sociais">Criação de artes para site e redes sociais</a><hr></li>
                    <li class="efeito-hr"><a href="/registro-dominio#inicio">Registro de domínio</a><hr></li>
                    <li class="efeito-hr"><a href="/formas-pagamento#inicio">Formas de pagamento</a><hr></li>
                    <li class="efeito-hr"><a href="/hospedagem#inicio">Hospedagem</a><hr></li>
                    <li class="efeito-hr"><a href="/hotsites#inicio">Hotsites</a><hr></li>
                    <li class="efeito-hr"><a href="/landing-pages#inicio">Landing pages</a><hr></li>
                    <li class="efeito-hr"><a href="/criacao-logomarca-cartoes-visita#inicio">Logomarcas e cartões de visita</a><hr></li>
                    <li class="efeito-hr"><a href="/portfolio-sites-ecommerces#inicio">Portfólio Sites e E-commerces</a><hr></li>
                    <li class="efeito-hr"><a href="/portfolio-artes-digitais#inicio">Portfólio Artes Digitais</a><hr></li>
                    <li class="efeito-hr"><a href="/consultoria-seo#inicio">Consultoria SEO</a><hr></li>
                    <li class="efeito-hr"><a href="/campanhas-para-instagram#inicio">Campanhas para o Instagram</a><hr></li>
                </ul>
            </div>
            <div class="col-md-4 footer-list">
                <h3>Exclusivo</h3>
                <ul>
                    <li class="efeito-hr"><a href="/site-para-advogados">Site para advogados</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-escritorios">Site para escritórios</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-contabilidade">Site para contabilidade</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-youtubers">Site para youtubers</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-representantes">Site para representantes</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-clinicas">Site para clínicas</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-microempreendedores">Site para microempreendores</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-petshop">Site para petshop</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-saloes">Site para salões</a><hr/></li>
                    <li class="efeito-hr"><a href="/site-para-transportadoras">Site para transportadoras</a><hr/></li>
                </ul>
            </div>
        </div>

    </div><!-- /.container -->
    <div class="container-fluid assign">
        <div class="container">				
            © 2020 Dellano Sites - Desenvolvendo Sites e E-commerce. Todos os Direitos Reservados.
        </div>
    </div>

</footer>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js" ></script>
<script src="bower_components/lightbox2/dist/js/lightbox.min.js" ></script>
<script src="bower_components/slick-carousel/slick/slick.js" ></script>
<script src="bower_components/alertifyjs/dist/js/alertify.js" ></script>
<script src="assets/js/utils.js" ></script>
<script src="assets/js/script.js" ></script>

<!-- Scripts adicionados por páginas -->
<?php $counter1=-1;  if( isset($scripts) && ( is_array($scripts) || $scripts instanceof Traversable ) && sizeof($scripts) ) foreach( $scripts as $key1 => $value1 ){ $counter1++; ?>
<script src="assets/js/<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" ></script>
<?php } ?>

</body>
</html>