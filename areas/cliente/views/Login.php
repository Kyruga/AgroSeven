<?php
    $titulo = "Login - Agroseven";

    include_once('../../../Config.php');

    include(ROOT . "/views/header.php");
?>

<body>
    <section class="login">
        <h1>PLANEJE 
        ORGANIZE
        CRESÇA E
        LUCRE!</h1>
        <div class="area-login">
            <div class="box-login">
                <img src="<?php echo BASEURL ?>assets/img/logo-agroseven.svg" class="img-responsive logo" alt="">
                <h2>ÁREA DO CLIENTE</h2>
                <p>FAÇA SEU LOGIN ABAIXO</p>
                <form action="javascript:void(0);"  method="post" id="formLoginDeUsuario">
                    <div class="form-group">
                        <input type="text" name="login" placeholder="login">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" placeholder="senha">
                    </div>
                    <div class="form-group">
                        <a href="#">esqueci minha senha</a>
                    </div>
                    <div class="form-group">                        
                        <input type="submit" value="entrar" onclick="loginUsuario()">
                    </div>
                    <a href="#" class="btn-conheca">conheça a plataforma</a>
                </form>
            </div>
            <img src="<?php echo BASEURL ?>assets/img/logo-branco.svg" class="logo-branco" alt="">
        </div>
    </section>
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
    <script src="../main.js"></script>
</body>

</html>