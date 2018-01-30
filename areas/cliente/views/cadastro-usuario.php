<?php
    $titulo = "Cadastro - Agroseven";

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
                <h2>Cadastrar meu usuário</h2>
                <form action="javascript:void(0);"  method="post" id="formCadastroDeUsuario">
                    <div class="form-group">
                        <input type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="text" name="cpf" placeholder="Cpf">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="password" name="conf-senha" placeholder="Confirmação de Senha">
                    </div>
                    <div class="form-group">                        
                        <input type="submit" value="cadastrar" onclick="cadastroInicialUsuario();">
                    </div>
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