<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Breves</title>
    <script src="<?php echo BASE_URL ?>assets/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style.css">
    <script src="<?php echo BASE_URL ?>assets/js/popper.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/css/all.min.css">
    <script src="<?php echo BASE_URL ?>assets/js/all.min.js"></script>
</head>
<body>
    <div class="conta">
        <div class="todo">
            <div class="logo">
            </div>
            <div class="loginBox">
                <div class="int">
                    <div>
                        <h4>LOGIN</h4>
                    </div>
                    <form method="POST" class="form-group" action="<?php echo BASE_URL ?>login/validar">
                        <p>Usuario:</p>
                        <input type="text" name="email" placeholder="Login" class="form-control">
                        <p>Senha:</p>
                        <input type="password" name="senha" placeholder="Senha" class="form-control">
                        <p>
                            <p>
                                <input type="submit" value="Entrar " class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            .todo {
                width: 100%;
                height: 100%;
                background: url('<?php echo BASE_URL ?>assets/imagens/bvs3.png');
                background-size: cover;
                background-position: center;
                position: fixed;
                background-repeat: no-repeat;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .int h4 {
                text-align: center;
                font-weight: bold;
                color: #ddd;
            }

            form {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            form p {
                font-size: 20px;
                font-weight: bold;
                color: #ddd;
            }

            .logo img {
                width: 100%;

            }

            .loginBox {
                width: 100%;
                /* margin-top: -600px; */
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: -1;
            }

            input[type=text],
            input[type=password],
            input[type=submit] {
                height: 50px;
                width: 400px;
            }

            @media(max-width:420px){
                input[type=text],
                input[type=password],
                input[type=submit] {
                    height: 50px;
                    width: 300px;
                }

            }