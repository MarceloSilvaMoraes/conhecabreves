<div class="container">
        <h1>Click Faashion</h1>

        <?php foreach ($l as $dados) : ?>

            <div class="lboxClick" id="img<?php echo $dados['id']  ?>">
                <div class="box_imgClick">
                    <a href="#<?php echo $dados['id']  ?>" class="btnClick" id="prev">&#171</a>
                    <a href="" class="btnClick" id="closeClick">X</a>
                    <img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $dados['img'] ?>" class="min">
                    <a href="#<?php echo $dados['id']  ?>" class="btnClick" id="next">&#187</a>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="ulClick">
            <?php foreach ($l as $dados) : ?>
                <div>
                    <a href="#img<?php echo $dados['id']  ?>">
                        <img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $dados['img'] ?>" class="min">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <style>
        * {
            margin: 0;
            padding: 0;
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
            background: #607D8B;
        }

        /* .box_imgClick img {
            width: 100%;
            max-width: 700px;
            max-height: 400px;
            height: auto;
            background-position: center;
            background-size: cover;
        } */

        .min {
            width: 200px;
            padding: 20px;
            margin: 20px;
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
            /* right: 2%; */
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
    </style>