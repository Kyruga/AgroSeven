<?php
    $titulo = "Novo Fúncionario - Agroseven";

    include("../../../views/header.php"); ?>

<!-- **************************      corpo do html agora      **************************** -->    
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
            <div class="todas-prop">
                <div class="propriedades">
                    <div class="info-prop">
                        <img src="../../../assets/img/icone-propriedade-branco.svg" alt="">
                        <div class="texto">
                            <span>fazenda</span>
                            <h2>santa cruz</h2>
                        </div>
                    </div>
                    <img src="../../../assets/img/seta-baixo-cinza.svg" class="seta-baixo" alt="">
                </div>
                <div class="dropdown-fazendas">
                    <div class="item">
                        <a href="#">
                            <div class="info-prop">
                                <img src="../../../assets/img/icone-propriedade-branco.svg" alt="">
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
                                <img src="../../../assets/img/icone-propriedade-branco.svg" alt="">
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
    <section class="cadastro-funcionario" id="cadastroFuncionario">
        <form action="javascript:void(0);"  method="post">
            <div class="box-geral">
                <div class="topo">
                    <div class="seta">
                        <img src="../../../assets/img/seta-esq-branca.svg" alt="">
                    </div>
                    <div class="titulo">
                        <div class="traco"></div>
                        <h1>novo funcionário</h1>
                    </div>
                    <div class="pagina-atual">
                        <img src="../../../assets/img/icone-funcionario-branco.svg" class="centralizar-img" alt="">
                    </div>
                </div>
                <div class="conteudo-geral">
                    <div class="lado-esq">
                        <div class="item-form">
                            <h1>Dados Pessoais</h1>
                            <div class="form-group">
                                <label for="">nome</label>
                                <input type="text" name="nome">
                            </div>
                            <div class="form-group">
                                <label for="">cpf</label>
                                <input type="text" name="cpf">
                            </div>
                            <div class="form-group">
                                <label for="">rg</label>
                                <input type="text" name="rg">
                            </div>
                            <div class="form-group">
                                <label for="">telefone</label>
                                <input type="text" name="telefone">
                            </div>
                        </div>
                        <div class="item-form">
                            <h1>Endereço</h1>
                            <div class="form-group">
                                <label for="">Endereço</label>
                                <input type="text" name="logradouro">
                            </div>
                            <div class="form-group">
                                <label for="">número</label>
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
                                <div class="form-left">
                                    <label for="">estado</label>
                                    <input type="text" name="uf">
                                </div>
                                <div class="form-right">
                                    <label for="">cep</label>
                                    <input type="text" name="cep">
                                </div>
                            </div>
                        </div>
                        <div class="item-form">
                            <h1>Observação</h1>
                            <div class="form-group">
                                <label for="">Informações Importantes</label>
                                <textarea name="" rows="20" name="observacoes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="lado-dir">
                        <div class="add-foto">
                            <div class="icone">
                                <img src="../../../assets/img/icone-camera.svg" class="centralizar-img" alt="">
                            </div>
                            <a href="#">adicionar foto</a>
                            <h1>função novo funcionário</h1>
                            <p>qual será a função que ele desempenhara</p>
                            <img src="../../../assets/img/seta-baixo-cinza.svg" class="seta-baixo" alt="">
                            <div class="form-group">
                                <input type="text">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="adicionar funcionário" onclick="cadastroFuncionario();">
                                <a href="#" >cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="../../../assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="../../../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../../../assets/js/main.js"></script>
    <script src="../../../assets/js/padrao.js"></script>
    <script src="../main.js"></script>
</body>

</html>
