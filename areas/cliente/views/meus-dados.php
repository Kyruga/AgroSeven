<?php
    $titulo = "Meus Dados - Agroseven";

    include_once('../../../Config.php');

    include(ROOT . "/views/header.php");
?>
<body onload="carregarDadosUsuario();">
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
    <section class="s-info-funcionarios">
        <div class="box-geral">
            <div class="topo">
                <div class="pagina-atual pagina-dados">
                    <div class="icone">
                        <img src="<?php echo BASEURL ?>assets/img/icone-usuario-branco.svg" class="centralizar-img" alt="">
                    </div>
                </div>
                <div class="titulo">
                    <div class="traco"></div>
                    <h1>MEUS DADOS</h1>
                </div>
                <div class="navegacao-funcionario">
                    <ul>
                        <li class="active">
                            <a href="#">
                                <img src="<?php echo BASEURL ?>assets/img/icone-nav-dados.svg" class="centralizar-img" alt="">
                            </a>
                        </li>

                        <li class="">
                            <a href="faturas.php">
                                <img src="<?php echo BASEURL ?>assets/img/icone-dinheiro.svg" class="icone-dinheiro centralizar-img" alt="">
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="lado-esq">
                <div class="info-geral-fun">
                    <div class="foto-func">
                        <img src="<?php echo BASEURL ?>assets/img/foto-perfil.png" alt="">
                    </div>
                    <div class="info-func">
                        <h1>JOSÉ DA SILVA ANDRADE</h1>
                        <h2>ID : 221323</h2>
                    </div>
                    <div class="data-funcao">
                        <p>DATA DE CADASTRO : 16/08/2019</p>
                        <p><strong>DIRETOR GERAL</strong></p>
                        <p class="prop-ativa">2 PROPRIEDADES ATIVA</p>
                    </div>
                </div>
            </div>
            <div class="lado-dir">
                <form action="javascript:void(0);" method="post" id="form-dados-pessoais">
                    <div class="item-form">
                        <div class="titulo">
                            <h1>Dados Pessoais</h1>
                            <div class="traco"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" name="nome" value="" class="nome" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" name="email" value="" class="email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">CPF</label>
                            <input type="text"  name="cpf" value="" class="cpf" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">RG</label>
                            <input type="text" name="rg"  value="" class="rg" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input type="text" name="telefone" value="" class="telefone" readonly>
                        </div>

                        <div class="form-group">
                            <input type="button" class="btn-alterar-meus-dados" value="Alterar meus dados">
                            <div class="btns-editar">
                                <input type="submit" value="Salvar Alterações" onclick="alterarDadosUsuario();">
                                <input type="button" class="btn-cancelar-alteracoes" value="Cancelar Alterações">
                            </div>
                        </div>
                    </div>
                </form>
                <form action="javascript:void(0);" method="post" id="form-endereco">
                    <div class="item-form">
                        <div class="titulo">
                            <h1>Endereço</h1>
                            <div class="traco"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Endereço</label>
                            <input type="text" name="endereco" value="" class="endereco" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Número</label>
                            <input type="text" name="numero"  value="" class="numero" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Bairro</label>
                            <input type="text"  name="bairro" value="" class="bairro" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Cidade</label>
                            <input type="text" name="cidade" value="" class="cidade" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-esq">
                                <label for="">estado</label>
                                <input type="text" name="estado"  value="" class="estado" readonly>
                            </div>
                            <div class="form-dir">
                                <label for="">cep</label>
                                <input type="text" name="cep" value="" class="cep" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="button" class="btn-alterar-meus-dados" value="Alterar Endereço">
                            <div class="btns-editar">
                                <input type="submit" value="Salvar Alterações" onclick="alterarDadosUsuario();">
                                <input type="button" class="btn-cancelar-alteracoes" value="Cancelar Alterações">
                            </div>
                        </div>
                    </div>
                </form>
                <form action="" id="form-dados-acesso">
                    <div class="item-form">
                        <div class="titulo">
                            <h1>Dados de Acesso</h1>
                            <div class="traco"></div>
                        </div>
                        <div class="form-group">
                            <label for="">ID</label>
                            <input type="text" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Senha</label>
                            <input type="password" readonly>
                        </div>
                        <div class="form-group" id="input-confirmar-senha">
                            <label for="">Confirmar Senha</label>
                            <input type="password" readonly>
                        </div>
                        <div class="form-group">
                            <input type="button" class="btn-alterar-meus-dados" value="Alterar Senha">
                            <div class="btns-editar">
                                <input type="submit" value="Salvar Senha">
                                <input type="button" class="btn-cancelar-alteracoes" value="Cancelar Alterações">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
    <script src="../main.js"></script>

</body>

</html>