<?php
    $titulo = "Novo Usuário - Agroseven";

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
    <section class="cadastro-funcionario">
        <form action="javascript:void(0);"  method="post" id="formCadastroUsuário">
            <div class="box-geral">
                <div class="topo">
                    <div class="seta">
                        <img src="<?php echo BASEURL ?>assets/img/seta-esq-branca.svg" alt="">
                    </div>
                    <div class="titulo">
                        <div class="traco"></div>
                        <h1>novo usuário</h1>
                    </div>
                    <div class="pagina-atual">
                        <img src="<?php echo BASEURL ?>assets/img/icone-usuario-branco.svg" class="centralizar-img" alt="">
                    </div>
                </div>
                <div class="conteudo-geral">
                    <div class="lado-esq">
                        <div class="item-form">
                            <h1>Dados Pessoais</h1>
                            <div class="form-group">
                                <label for="">nome</label>
                                <input name="nome" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">cpf</label>
                                <input name="cpf" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">rg</label>
                                <input name="rg" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">telefone</label>
                                <input name="telefone" type="text">
                            </div>
                        </div>
                        <div class="item-form">
                            <h1>Endereço</h1>
                            <div class="form-group">
                                <label for="">Endereço</label>
                                <input name="endereco" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">número</label>
                                <input name="numero" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">bairro</label>
                                <input name="bairro" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">cidade</label>
                                <input name="cidade" type="text">
                            </div>
                            <div class="form-group">
                                <div class="form-left">
                                    <label for="">estado</label>
                                    <input name="estado" type="text">
                                </div>
                                <div class="form-right">
                                    <label for="">cep</label>
                                    <input name="cep" type="text">
                                </div>
                            </div>
                        </div>
                        <div id="Observacao" class="item-form">
                            <h1>Observação</h1>
                            <div class="form-group">
                                <label for="">Informações Importantes</label>
                                <textarea name="" rows="20"></textarea>
                            </div>
                        </div>
                        <div id="DadosAcesso" class="item-form">
                            <h1>Dados de Acesso</h1>
                            <div class="form-group">
                                <label for="">ID</label>
                                <input name="login" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">senha</label>
                                <input name="senha" type="password">
                            </div>
                            <div class="form-group">
                                <label for="">confirmar senha</label>
                                <input name="confirmar" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="lado-dir">
                        <div class="add-foto">
                            <div class="icone">
                                <img src="<?php echo BASEURL ?>assets/img/icone-camera.svg" class="centralizar-img" alt="">
                            </div>
                            <a href="#">adicionar foto</a>
                            <h1>função novo usuário</h1>
                            <p>qual será a função que ele desempenhara</p>
                            <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" class="seta-baixo" alt="">
                            <div class="form-group">
                                <input name="funcao" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Nível de Administração</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles[]" value="1">administrador total
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles[]" value="3">Apenas Lê as Informações
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles[]" value="2">Lê, Altera e Cadastrar as Informações
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="adicionar responsável" onclick="AdicionarUsuario()">
                                <a href="#">cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
    <script src="../main.js"></script>
</body>

</html>
