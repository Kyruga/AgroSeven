<?php
    $titulo = "Nova propriedade dados básicos - Agroseven";

    include("../../../views/header.php");
?>
<!-- <div id=""> -->

<body>
    <div class="menu-lateral">
        <div class="topo">
            <button type="button" class="btn-fechar-menu"><img src="../../../assets/img/icone-fechar.svg" alt=""></button>
            <div class="foto-usuario">
                <img src="../../../assets/img/foto-usuario.svg" alt="">
            </div>
        </div>
        <img src="../../../assets/img/seta-baixo-preta.svg" class="seta-preta" alt="">
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="../../../assets/img/icone-msg.svg" alt="">
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
                            <img src="../../../assets/img/icone-dados.svg" alt="">
                        </div>
                        <span>meus dados</span>
                    </a>
                </li>
                <li>
                    <a href="propriedades.html">
                        <div class="icone">
                            <img src="../../../assets/img/icone-propriedades.svg" alt="">
                        </div>
                        <span>minhas propriedades</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icone">
                            <img src="../../../assets/img/icone-status.svg" alt="">
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
                            <img src="../../../assets/img/icone-chamados.svg" alt="">
                        </div>
                        <span>chamados</span>
                    </a>
                </li>
                <li>
                    <a href="atualizacao.html">
                        <div class="icone">
                            <img src="../../../assets/img/icone-atualizacoes.svg" alt="">
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
            <a href="index.html">sair <img src="../../../assets/img/seta-baixo-amarela.svg" alt=""></a>
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
                    <img src="../../../assets/img/seta-dir-cinza.svg" alt="">
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
                    <img src="../../../assets/img/seta-dir-cinza.svg" alt="">
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
                    <img src="../../../assets/img/seta-dir-cinza.svg" alt="">
                </a>
            </div>
        </div>
    </div>
    <header>
        <div class="logo-sistema">
            <img src="../../../assets/img/logo-agroseven-branco.svg" class="img-responsive" alt="">
        </div>
        <div class="logo-fazenda">
            <img src="../../../assets/img/logo-fazenda.svg" class="img-responsive" alt="">
        </div>
        <div class="central-menu">
            <div class="notificacoes">
                <a href="#">
                    <img src="../../../assets/img/icone-sino.svg" alt="">
                    <div class="alerta">
                        <span>!</span>
                    </div>
                </a>
            </div>
            <div class="menu">
                <button class="btn-menu">
                    <img src="../../../assets/img/icone-menu.svg" alt="">
                </button>
                <div class="foto-usuario">
                    <img src="../../../assets/img/foto-usuario.svg" alt="">
                </div>
            </div>
        </div>
    </header>
    <section class="s-page">
        <div class="topo-page">
            <div class="area-seta">
                <img src="../../../assets/img/seta-esq-branca.svg" alt="">
            </div>
            <div class="titulo">
                <div class="traco"></div>
                <h1>nova propriedade</h1>
            </div>
            <div class="etapas">
                <ul>
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="conteudo">
            <div class="lado-esq">
                <form id="formCadastroPropriedade" action="javascript:void(0);"  method="post">
                    <div class="form-esq">
                        <h1>Dados da propriedade</h1>
                        <div class="traco"></div>
                        <div class="form-group">
                            <label for="">nome da propriedade</label>
                            <input name="nome" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Cultivo</label>
                            <div class="checkbox">
                                <label>
                                    <input name="cultivo[]" type="checkbox" value="">Laranja</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="cultivo[]" type="checkbox" value="">Café</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="cultivo[]" type="checkbox" value="">Milho</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="cultivo[]" type="checkbox" value="">Soja</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="cultivo[]" type="checkbox" value="">Gado</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-dir">
                        <div class="escolher-foto">
                            <img src="../../../assets/img/foto-fazenda.svg" class="img-responsive" alt="">
                            <span>adicione uma foto da sua propriedade</span>
                        </div>
                    </div>
                </form>
            </div>            
            <div class="lado-dir">
                <div class="info-passo">
                    <span>1 passo</span>
                    <div class="icone">
                        <img src="../../../assets/img/icone-propriedades.svg" class="centralizar-img" alt="">
                    </div>
                    <h1>dados básicos</h1>
                    <p>preencha os campos ao lado e clique no botão avançar</p>
                    <div class="btns">
                    
                        <a href="localizacao.html" class="btn-avancar" onclick="">avançar</a>
                        <a href="propriedades.html" class="btn-cancelar">cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../../assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="../../../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../../../assets/js/main.js"></script>
    <script src="../../../assets/js/padrao.js"></script>
    <script src="../main.js"></script>
</body>

</html>