<?php
    $titulo = "Usuários - Agroseven";

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
                    <a href="dash-propriedade.php">
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
    <section class="s-funcionarios">
        <div class="box-geral">
            <div class="lado-esq">
                <div class="area-propriedades">
                    <div class="prop-principal">
                        <div class="info-prop">
                            <img src="<?php echo BASEURL ?>assets/img/icone-propriedades.svg" alt="">
                            <div class="texto">
                                <span>fazenda</span>
                                <h2>SANTA CRUZ</h2>
                            </div>
                        </div>
                        <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="" class="seta-baixo">
                    </div>
                </div>
                <div class="dados-gerais-fazenda">
                    <div class="area-fazenda">
                        <div class="logo-fazenda">
                            <img src="<?php echo BASEURL ?>assets/img/logo-fazenda.svg" class="centralizar-img" alt="">
                        </div>
                    </div>
                    <a href="#" class="btn-deletar">deletar</a>
                    <div class="info">
                        <h1>fazenda santa cruz</h1>
                        <h2>ID : 221323</h2>
                    </div>
                    <div class="dados-data">
                        <p>DATA DE CADASTRO : 16/08/2019</p>
                        <p>23 FUNCIONÁRIOS</p>
                        <ul class="cultivos">
                            <li class="item">
                                <div class="icone">
                                    <img src="<?php echo BASEURL ?>assets/img/icone-cafe.svg" class="centralizar-img icone-cafe" alt="">
                                </div>
                                <span>café</span>
                            </li>
                            <li class="item">
                                <div class="icone">
                                    <img src="<?php echo BASEURL ?>assets/img/icone-gado.svg" class="centralizar-img icone-gado" alt="">
                                </div>
                                <span>gado</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="lado-dir">
                <div class="topo">
                    <div class="titulo">
                        <div class="traco"></div>
                        <h1>usuários</h1>
                    </div>
                    <div class="navegacao">
                        <ul>
                            <li>
                                <a href="#">
                                <img src="<?php echo BASEURL ?>assets/img/icone-nav-dados.svg" alt="">
                            </a>
                            </li>
                            <li>
                                <a href="funcionarios.php">
                                <img src="<?php echo BASEURL ?>assets/img/icone-nav-funcionarios.svg" alt="">
                            </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                <img src="<?php echo BASEURL ?>assets/img/icone-nav-usuario.svg" alt="">
                            </a>
                            </li>
                            <li>
                                <a href="arquivos-propriedade.php">
                                <img src="<?php echo BASEURL ?>assets/img/icone-nav-anexo.svg" alt="">
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="funcionarios-geral">
                    <div class="topo-sessao">
                        <div class="setores">
                            <h2>todos setores</h2>
                            <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="">
                        </div>
                        <div class="pesquisar-add">
                            <button type="button" class="btn-pesquisar">
                                <img src="<?php echo BASEURL ?>assets/img/icone-pesquisar.svg" alt="">
                            </button>
                            <a href="" class="btn-add-funcionario" data-toggle="modal" data-target="#modalAddUsuario">
                                <span>+</span> adicionar
                            </a>
                        </div>
                    </div>
                    <div class="todos-funcionarios">
                        <div class="box-funcionario">
                            <a href="informacoes-usuario.php">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="informacoes-usuario.php">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="informacoes-usuario.php">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="informacoes-usuario.php">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                        <div class="box-funcionario">
                            <a href="#">
                            <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                            <div class="texto">
                                <h1>paulo cesar</h1>
                                <h2>responsável da sede</h2>
                            </div>
                            <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalAddUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="<?php echo BASEURL ?>assets/img/icone-fechar.svg" alt="">
                </button>
                <div class="modal-body">
                    <h1>ADICIONAR NOVO USUÁRIO</h1>
                    <p>ESCOLHA ENTRE AS 2 OPÇÕES ABAIXO PARA CONTINUAR</p>
                    <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="" class="seta-baixo">
                    <div class="btns">
                        <a href="#" class="btn-add-existente">
                            <div class="icone">
                                <img src="<?php echo BASEURL ?>assets/img/icone-funcionario-verde.svg" class="centralizar-img" alt="">
                            </div>
                            <span>USAR UM DOS MEUS </span>
                            <h2>FUNCIONÁRIOS</h2>
                        </a>
                        <a href="novo-usuario.php" class="btn-add-novo">
                            <div class="icone">
                                <img src="<?php echo BASEURL ?>assets/img/icone-mais-verde.svg" class="centralizar-img" alt="">
                            </div>
                            <span>adicionar </span>
                            <h2>criar novo</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAddExistente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="<?php echo BASEURL ?>assets/img/icone-fechar.svg" alt="">
                </button>
                <div class="modal-body">
                    <div class="topo">
                        <div class="area-seta">
                            <img src="<?php echo BASEURL ?>assets/img/seta-esq-branca.svg" class="centralizar-img" alt="">
                        </div>
                        <div class="titulo">
                            <div class="traco"></div>
                            <h1>novo usuário</h1>
                        </div>
                    </div>
                    <div class="conteudo-geral">
                        <div class="lado-esq">
                            <h1 class="titulo-modal">TODOS FUNCIONÁRIOS</h1>
                            <p>QUAL FUNCIONÁRIO DESEJA DELEGAR COMO NOVO RESPOSÁVEL</p>
                            <div class="todos-funcionarios usuario-adds">
                                <div class="box-funcionario">
                                    <a href="informacoes-usuarios.php">
                                    <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                                        <div class="texto">
                                            <h1>paulo cesar</h1>
                                            <h2>responsável da sede</h2>
                                        </div>
                                        <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                                    </a>
                                </div>
                                <div class="box-funcionario">
                                    <a href="informacoes-usuarios.php">
                                    <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                                        <div class="texto">
                                            <h1>paulo cesar</h1>
                                            <h2>responsável da sede</h2>
                                        </div>
                                        <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                                    </a>
                                </div>
                                <div class="box-funcionario">
                                    <a href="informacoes-usuarios.php">
                                    <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                                        <div class="texto">
                                            <h1>paulo cesar</h1>
                                            <h2>responsável da sede</h2>
                                        </div>
                                        <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                                    </a>
                                </div>
                                <div class="box-funcionario">
                                    <a href="informacoes-usuarios.php">
                                    <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                                        <div class="texto">
                                            <h1>paulo cesar</h1>
                                            <h2>responsável da sede</h2>
                                        </div>
                                        <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                                    </a>
                                </div>
                                <div class="box-funcionario">
                                    <a href="informacoes-usuarios.php">
                                    <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                                        <div class="texto">
                                            <h1>paulo cesar</h1>
                                            <h2>responsável da sede</h2>
                                        </div>
                                        <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                                    </a>
                                </div>
                                <div class="box-funcionario">
                                    <a href="informacoes-usuarios.php">
                                    <img src="<?php echo BASEURL ?>assets/img/foto-funcionario.svg" alt="">
                                        <div class="texto">
                                            <h1>paulo cesar</h1>
                                            <h2>responsável da sede</h2>
                                        </div>
                                        <img src="<?php echo BASEURL ?>assets/img/seta-dir-func.svg" class="seta-baixo" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="lado-dir">
                            <h1>FUNÇÃO NOVO USUÁRIO</h1>
                            <p>QUAL SERÁ A FUNÇÃO QUE ELE DESEMPENHARA</p>
                            <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="" class="seta-baixo">
                            <div class="form-group">
                                <input type="text">
                            </div>
                            <div class="form-group">
                                <label for="">nivel de administração</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optradio"> ADMINISTRADOR TOTAL
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optradio"> APENAS LÊ AS INFORMAÇÕES
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optradio"> LÊ , ALTERA E CADASTRA INFORMAÇÕES
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn-add-func">adicionar responsável</button>
                                <a href="#" class="btn-cancelar-processo">cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="<?php echo BASEURL ?>assets/img/icone-fechar.svg" alt="">
                </button>
                <div class="modal-body">
                    <h1>CADASTRO DE USUÁRIO</h1>
                    <p>REALIZADO COM SUCESSO</p>
                    <div class="box-usuario-cadastrado">
                        <div class="foto-usuario">
                            <img src="<?php echo BASEURL ?>assets/img/foto-usuario.svg" alt="">
                        </div>
                        <h2>PAULO CESAR</h2>
                        <span>RESPOSÁVEL DA SEDE</span>
                    </div>
                    <button type="button" class="btn-finalizar-cadastro">
                        finalizar cadastro
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
</body>

</html>