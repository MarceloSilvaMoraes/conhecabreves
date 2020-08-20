<div class="img">
    <div class="img_fundo">.</div>
</div>
<div class="local_corpo">
    <div class="container" id="container_column">
        <div class='titulo'>
          
                  <h1>Resultado</h1>
            
        </div>
        <div class="locales">
            <?php
            if (isset($buscando)) :
                foreach ($buscando as $data) :
                 
                        // print_r($data);
            ?>
                        <div class="locale" id="locale<?php echo $data['id'] ?>">
                            <div class="localeInt">
                                <div class="localeData">
                                    <?php if (!empty($data['url'])) : ?>
                                        <img alt="imagem dos nossos parceiros" height="150" width="150" style="border-radius: 100%; position:absolute;" src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $data['url']; ?>">
                                    <?php else : ?>
                                        <!-- <img src="<?php echo BASE_URL ?>assets/imagens/band_bvs.png"> -->
                                        <div class="localeName">
                                            <?php echo $data['nome'] ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <?php if ($data['parceiro'] === 0 || empty($data['parceiro'])) : ?>
                                    <div style="display: none" class="parceiro"></div>
                                <?php else : ?>
                                    <div style="display: block; text-align:center;color: #389d9d; 
                                    font-size: 18px; font-weight: bold;" class="parceiro">Parceiro</div>
                                <?php endif; ?>
                            </div>
                            <div class="localeDados">
                                <!-- <div class="orgInfo"></div> -->
                                <div class="infoLocaleDados">
                                    <?php if ($data['instagram'] === 'null' || empty($data['instagram'])) : ?>
                                        <a href="" style="display: none;">Instagram</a>
                                    <?php else : ?>
                                        <a href="<?php echo $data['instagram'] ?>" style="display: block;" target="_blank" class="insta">Instagram</a>
                                    <?php endif; ?>
                                    <?php if ($data['wts'] === 'null' || empty($data['wts'])) : ?>
                                        <a href="" style="display: none;" class="wts">WhatsApp</a>
                                    <?php else : ?>
                                        <a target="_blank" style="display: block;" class="wts" href="https://wa.me/<?php echo $data['wts'] ?>?text=Olá, estou entrando em contato através do site https://www.conhecabreves.com.br. Preciso de informação sobre <?php echo $data['nome'] ?> !">
                                            WhatsApp
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($data['facebook'] === 'null' || empty($data['facebook'])) : ?>
                                        <a href="" style="display: none;" target="_blank" class="face">Facebook</a>
                                    <?php else : ?>
                                        <a href="<?php echo $data['facebook'] ?>" style="display: block;" target="_blank" class="face">Facebook</a>
                                    <?php endif; ?>
                                    <?php if ($data['url_maps'] === 'null' || empty($data['url_maps'])) : ?>
                                        <a href="" style="display: none" class="maps">Maps</a>
                                    <?php else : ?>
                                        <a href="<?php echo $data['url_maps'] ?>" style="display: block;" target="_blank" class="maps">Maps</a>
                                    <?php endif; ?>
                                    <?php if ($data['site'] === 'null' || empty($data['site'])) : ?>
                                        <a href="" style="display: none" class="site">Site</a>
                                    <?php else : ?>
                                        <a href="<?php echo $data['site'] ?>" target="_blank" style="display: block;" class="site">Site</a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                <?php

                endforeach;
            else : ?>
                <h1>Nenhum estabelecimento cadastrado</h1>
            <?php endif; ?>
        </div>
    </div>
</div>
<script data-ad-client="ca-pub-6479601410776276" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</body>