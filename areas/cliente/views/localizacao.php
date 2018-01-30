<?php
    $titulo = "Nova propriedade localização - Agroseven";

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
                    <a href="meus-dados.php">
                        <div class="icone">
                            <img src="<?php echo BASEURL ?>assets/img/icone-dados.svg" alt="">
                        </div>
                        <span>meus dados</span>
                    </a>
                </li>
                <li>
                    <a href="propriedades.php">
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
                    <a href="atualizacao.php">
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
            <a href="index.php">sair <img src="<?php echo BASEURL ?>assets/img/seta-baixo-amarela.svg" alt=""></a>
        </div>
    </div>
    <div class="area-notificacoes">
        <div class="todas-notificacoes">
            <div class="item">
                <a href="#">
                    <div class="icone">
                        <span>!</span>
                    </div>
                    <div class="texto">
                        <h2>financeiro</h2>
                        <p>Simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem…</p>
                    </div>
                    <img src="<?php echo BASEURL ?>assets/img/seta-dir-cinza.svg" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <div class="icone">
                        <span>!</span>
                    </div>
                    <div class="texto">
                        <h2>financeiro</h2>
                        <p>Simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem…</p>
                    </div>
                    <img src="<?php echo BASEURL ?>assets/img/seta-dir-cinza.svg" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <div class="icone">
                        <span>!</span>
                    </div>
                    <div class="texto">
                        <h2>financeiro</h2>
                        <p>Simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem…</p>
                    </div>
                    <img src="<?php echo BASEURL ?>assets/img/seta-dir-cinza.svg" alt="">
                </a>
            </div>
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
            <div class="todas-prop">
                <div class="propriedades">
                    <div class="info-prop">
                        <img src="<?php echo BASEURL ?>assets/img/icone-propriedade-branco.svg" alt="">
                        <div class="texto">
                            <span>fazenda</span>
                            <h2>santa cruz</h2>
                        </div>
                    </div>
                    <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" class="seta-baixo" alt="">
                </div>
                <div class="dropdown-fazendas">
                    <div class="item">
                        <a href="#">
                            <div class="info-prop">
                                <img src="<?php echo BASEURL ?>assets/img/icone-propriedade-branco.svg" alt="">
                                <div class="texto">
                                    <span>fazenda</span>
                                    <h2>santa cruz</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="info-prop">
                                <img src="<?php echo BASEURL ?>assets/img/icone-propriedade-branco.svg" alt="">
                                <div class="texto">
                                    <span>fazenda</span>
                                    <h2>betel</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
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
    <section class="s-page">
        <div class="topo-page">
            <div class="area-seta">
                <img src="<?php echo BASEURL ?>assets/img/seta-esq-branca.svg" alt="">
            </div>
            <div class="titulo">
                <div class="traco"></div>
                <h1>nova propriedade</h1>
            </div>
            <div class="etapas">
                <ul>
                    <li class="active etapa-concluida"></li>
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="conteudo">
            <div class="lado-esq">
                <form action="javascript:void(0);"  method="post" id="formLocalizacaoNovaPropriedade">
                    <div class="form-esq">
                        <h1>Endereço</h1>
                        <div class="traco"></div>
                        <div class="form-group">
                            <label for="">endereço</label>
                            <input type="text" name="endereco">
                        </div>
                        <div class="form-group">
                            <label for="">numero</label>
                            <input type="text" name="numero">
                        </div>
                        <div class="form-group">
                            <label for="">bairro</label>
                            <input type="text" name="bairro">
                        </div>
                        <div class="form-group">
                            <label for="">cidade</label>
                            <input type="text" name="cidade">
                        </div>
                        <div class="form-group">
                            <div class="group-esq">
                                <label for="">estado</label>
                                <input type="text" name="estado">
                            </div>
                            <div class="group-dir">
                                <label for="">cep</label>
                                <input type="text" name="cep">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">localização geográfica</label>
                            <input type="text" name="locgeografica">
                        </div>
                    </div>
                    <div class="form-dir">
                        <div class="escolher-foto">
                            <img src="<?php echo BASEURL ?>assets/img/mapa.svg" class="img-responsive" alt="">
                            <span>marque sua propriedade no mapa acima</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="lado-dir">
                <div class="info-passo">
                    <span>2 passo</span>
                    <div class="icone">
                        <img src="<?php echo BASEURL ?>assets/img/icone-localizacao.svg" class="centralizar-img" alt="">
                    </div>
                    <h1>localização</h1>
                    <p>preencha os campos ao lado e clique no botão avançar</p>
                    <div class="btns">
                        <a href="#" class="btn-avancar" onclick="cadastroLocalizacaoPropriedade();">avançar</a>
                        <a href="nova-propriedade.php" class="btn-cancelar">cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
    <script src="../main.js"></script>
</body>

</html>