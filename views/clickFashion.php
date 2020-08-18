<div class="triangulo">
    <div id="contDados">

        <div class="styleH1">
            <h1>Itens</h1>
        </div>
        <?php foreach ($l as $dados) : ?>
            <div class="lboxClick" id="img<?php echo $dados['id']  ?>">
                <div class="box_imgClick">
                    <a href="#<?php echo $dados['id']  ?>" class="btnClick" id="prev">&#171</a>
                    <a href="" class="btnClick" id="closeClick">X</a>
                    <img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $dados['url_img_parceiro'] ?>" class="min">
                    <a href="#<?php echo $dados['id']  ?>" class="btnClick" id="next">&#187</a>
                </div>

              
            </div>
        <?php endforeach; ?>
        <div class="ulClick">
            <?php foreach ($l as $dados) : ?>

                <a href="#img<?php echo $dados['id']  ?>" id="card">
                    <div class="card " style="width: 18rem;">
                        <img class="card-img-top min" src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $dados['url_img_parceiro'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><?php echo $dados['descricao'] ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>


    </div>
</div>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #2d0614;
        /* overflow: hidden; */
    }

    .corpoBanner2 {

        background: linear-gradient(to right, #ffffff, #f96a9b59) !important;
    }
    .corpoBanner1 {
        -moz-box-shadow: 1px 11px 8px #000000;
        -webkit-box-shadow: 1px 11px 8px #000000;
        box-shadow: 1px 11px 8px #000000;
        background: transparent !important;
        height: 450px !important;

    }

    .corpoBanner1 a img {
        height: 450px !important;
	}
    .styleH1 {

        height: 200px;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .styleH1 h1 {
        color: #0f2636;
        text-align: center;
    }

    .styleH1:before {
        content: '';
        height: 50px;
        width: 30%;
        border-left: 3px solid #0f2636;
        border-bottom: 3px solid #0f2636;
        margin: 5px;
    }

    .styleH1:after {
        content: '';
        border-right: 3px solid #0f2636;
        height: 50px;
        width: 30%;
        border-top: 3px solid #0f2636;
        margin: 5px;

    }

    .ulClick {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        width: 100%;
        min-height: 500px;
        height: 100%;
        margin-top: 50px;
        /* background: #607D8B; */
    }

    .ulClick img {
        height: 200px;
        width: 200px;
        margin-left: 15%;
    }

    .ulClick a {

        text-decoration: none;
        color: #5c4810;
    }

    .ulClick a:hover {
        -moz-box-shadow: 6px 10px 5px #000000;
        -webkit-box-shadow: 6px 10px 5px #000000;
        box-shadow: 6px 1px 50px #000000;
        transition: .5s;
        text-decoration: none;
        color: #5c4810;
    }

    #card {
        margin: 20px;
    }

    .box_imgClick img {
        width: 100%;
        max-width: 400px;
        max-height: 400px;
        height: auto;
    }

    .min {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 200px;
        padding: 20px;
        margin: 0px;
        z-index: 10;

    }

    .lboxClick {
        visibility: hidden;
        opacity: 0;
        height: 0;
    }

    .lboxClick:target {
        visibility: visible;
        opacity: 1;
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(10, 10, 10, .7);
        top: 0;
        left: 0;
        z-index: 1000;

    }

    .box_imgClick {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0;
        height: 0;
    }

    .btnClick {
        color: #fff;
        font-family: "Arial";
        text-decoration: none;
        position: absolute;
        width: 50px;
        height: 50px;
        font-size: 40px;
        text-align: center;
    }

    #prev {
        left: 5%;
        top: 45%;
    }

    #next {
        right: 5%;
        top: 45%;
    }

    #closeClick {
        top: 0%;
    }

    .box_imgClick img {
        opacity: 0;
        margin-top: 30%;
        position: fixed;
    }

    .lboxClick:target .box_imgClick img {
        opacity: 1;
        transition: opacity .4s linear;
    }

    .redesSociais {
        color: white !important;
        width: 100% !important;
        z-index: 1;
    }

    .redesSociais:before {
        content: '';
        height: 100px;
        width: 70px;
        margin-left: 250px;
        border-right: 5px solid #0f2636;
        border-top: 5px solid #0f2636;
    }

    .redesSociais:after {
        content: '';
        border-left: 5px solid #0f2636;
        height: 100px;
        width: 70px;
        margin-right: 250px;
        border-bottom: 5px solid #0f2636;

    }

    #contDados {
        width: 100%;
        height: 100%;

    }

    .triangulo {
        background: url('<?php echo BASE_URL ?>assets/imagens/quadrado.png');
        background-size: cover;
        background-position: center;
        width: 100%;
        min-width: 500px;
        /* filter: invert(1); */
      
    }
</style>