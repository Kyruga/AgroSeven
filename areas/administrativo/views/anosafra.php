<?php
    $titulo = "Ano Safra - Agroseven";

    include_once('../../../Config.php');

    include(ROOT . "/views/header.php");
?>

<body>
    <div class="menu-lateral">
        <div class="topo">
            <button type="button" class="btn-fechar-menu"><img src="<?php echo BASEURL ?>assets/img/icone-fechar.svg" alt=""></button>
            <div class="foto-usuario">
                <img src="<?php echo BASEURL ?>assets/img/foto-usuario.svg" alt="">
            </div>
        </div>
        <img src="<?php echo BASEURL ?>assets/img/seta-baixo-preta.svg" class="seta-preta" alt="">
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-msg.svg" alt="">
                            <div class="alerta">
                                3
                            </div>
                        </div>
                        <span>mensagem</span>
                    </a>
                </li>
                <li>
                    <a href="meus-dados.html">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-dados.svg" alt="">
                        </div>
                        <span>meus dados</span>
                    </a>
                </li>
                <li>
                    <a href="propriedades.html">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-propriedades.svg" alt="">
                        </div>
                        <span>minhas propriedades</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-status.svg" alt="">
                            <div class="alerta">
                                !
                            </div>
                        </div>
                        <span>status do sistema</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-chamados.svg" alt="">
                        </div>
                        <span>chamados</span>
                    </a>
                </li>
                <li>
                    <a href="atualizacao.html">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-atualizacoes.svg" alt="">
                            <div class="alerta">
                                !
                            </div>
                        </div>
                        <span>atualizações</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="area-sair">
            <a href="index.html">sair <img src="<?php echo BASEURL ?>assets/img/seta-baixo-amarela.svg" alt=""></a>
        </div>
    </div>
    <div class="menu-lateral">
        <div class="topo">
            <button type="button" class="btn-fechar-menu"><img src="<?php echo BASEURL ?>assets/img/icone-fechar.svg" alt=""></button>
            <div class="foto-usuario">
                <img src="<?php echo BASEURL ?>assets/img/foto-usuario.svg" alt="">
            </div>
        </div>
        <img src="<?php echo BASEURL ?>assets/img/seta-baixo-preta.svg" class="seta-preta" alt="">
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-msg.svg" alt="">
                            <div class="alerta">
                                3
                            </div>
                        </div>
                        <span>mensagem</span>
                    </a>
                </li>
                <li>
                    <a href="meus-dados.html">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-dados.svg" alt="">
                        </div>
                        <span>meus dados</span>
                    </a>
                </li>
                <li>
                    <a href="propriedades.html">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-propriedades.svg" alt="">
                        </div>
                        <span>minhas propriedades</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-status.svg" alt="">
                            <div class="alerta">
                                !
                            </div>
                        </div>
                        <span>status do sistema</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-chamados.svg" alt="">
                        </div>
                        <span>chamados</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-atualizacoes.svg" alt="">
                            <div class="alerta">
                                !
                            </div>
                        </div>
                        <span>atualizações</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="area-sair">
            <a href="#">sair <img src="<?php echo BASEURL ?>assets/img/seta-baixo-amarela.svg" alt=""></a>
        </div>
    </div>
    <header>
        <div class="logo-sistema">
            <img src="<?php echo BASEURL ?>assets/img/logo-agroseven-branco.svg" class="img-responsive" alt="">
        </div>
        <div class="logo-fazenda">
            <img src="<?php echo BASEURL ?>assets/img/logo-fazenda.svg" class="img-responsive" alt="">
        </div>
        <div class="central-menu">
            <div class="notificacoes">
                <a href="#">
                    <img src="<?php echo BASEURL ?>assets/img/icone-sino.svg" alt="">
                    <div class="alerta">
                        <span>!</span>
                    </div>
                </a>
            </div>
            <div class="menu">
                <button class="btn-menu">
                    <img src="<?php echo BASEURL ?>assets/img/icone-menu.svg" alt="">
                </button>
                <div class="foto-usuario">
                    <img src="<?php echo BASEURL ?>assets/img/foto-usuario.svg" alt="">
                </div>
            </div>
        </div>
    </header>
    <section class="s-atualizacao">
        <div class="box-atualizacao">
            <div class="topo">
                <div class="titulo">
                    <div class="traco"></div>
                    <h1>dashboard</h1>
                </div>
                <div class="data-atualizacao">
                    <img src="<?php echo BASEURL ?>assets/img/icone-atualizacao.svg" class="icone-atualizacao" alt="">
                    <div class="texto">
                        <span>ATUALIZAÇÃO</span>
                        <h2><?php echo date('F Y') ?></h2>
                    </div>
                    <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="" class="seta-baixo">
                </div>
            </div>
            <div class="conteudo-at">
                <div class="lado-esq">
                    <div id="NovoAnoSafra" style="display:none;">
                        <h2>Novo Ano Safra</h2>
                        <div class="form-group">
                            <label for="">Status do Ano Safra</label>
                            <input name="status" type="radio" value="1">Aberto</input>
                            <input name="status" type="radio" value="0">Fechado</input>
                        </div>
                        <div class="form-group">
                            <label for="">Ano de Abertura do Ano Safra</label>
                            <input name="nome" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Ano de Fechamento do Ano Safra</label>
                            <input name="nome" type="text">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Salvar" />
                        </div>
                    </div>                    
                    <div id="FecharAnoSafra" style="display:none;" >
                        <h2>Fechar Ano Safra</h2>
                        <div class="form-group">
                            <label for="">Status do Ano Safra</label>
                            <input name="status" type="radio" value="1">Aberto</input>
                            <input name="status" type="radio" value="0">Fechado</input>
                        </div>
                        <div class="form-group">
                            <label for="">Ano de Abertura do Ano Safra</label>
                            <input name="nome" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Ano de Fechamento do Ano Safra</label>
                            <input name="nome" type="text">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Salvar" />
                        </div>
                    </div>
                </div>
                <div class="lado-dir">
                    <h4>Lançamentos</h4>
                        <ul id="menu-coluna">
                            <li id="NovoAno">
                                <p>Iniciar Ano Safra</p>
                            </li>
                            <li id="FecharAno">
                                <p>Fechar Ano Safra</p>
                            </li>
                        </ul>
                    <h4>Navegação</h4>

                    <a href="<?php echo BASEURL ?>areas/administrativo/views/dashboard.php" class="btn btn-success">Voltar</a>                    
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalEnviarSugestao" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="<?php echo BASEURL ?>assets/img/icone-fechar.svg" alt="">
                </button>
                <div class="modal-body">
                    <h1>MINHA SUGESTÃO / IDEIA</h1>
                    <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="" class="seta-baixo">
                    <form action="">
                        <div class="form-group">
                            <textarea name="" id="" rows="12"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/site_adm.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
</body>

</html>