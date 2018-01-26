<?php

use Data\Entidades\Propriedade;
    $titulo = "Talhões - Agroseven";

    include_once('../../../Config.php');

    include(ROOT . "/views/header.php");   

    session_start();

    $id = $_GET['id'];
?>

<body onload="CarregarTalhoes(<?php echo $id ?>)">
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
                            <h1>Talhões</h1>
                        </div>
                        <div class="navegacao">
                            <ul>
                                <li>
                                    <a href="#">
                                    <img src="<?php echo BASEURL ?>assets/img/icone-nav-dados.svg" alt="">
                                </a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                    <img src="<?php echo BASEURL ?>assets/img/icone-nav-funcionarios.svg" alt="">
                                </a>
                                </li>
                                <li>
                                    <a href="usuarios.html">
                                    <img src="<?php echo BASEURL ?>assets/img/icone-nav-usuario.svg" alt="">
                                </a>
                                </li>
                                <li>
                                    <a href="arquivos-propriedade.html">
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
                                <a href="#" onclick="AdicionarGleba()" class="btn-add-funcionario">
                                <span>+</span> adicionar
                            </a>
                            </div>
                        </div> 
                        <div class="funcionarios-geral">
                            <div class="todos-funcionarios">
                                <div id="index"></div>
                                <div id="create" style="display:none;">
                                    <form action="javascript:void(0);" method="post" id="formNovaGleba">
                                        <h2>Nova Gleba</h2>
                                        <div class="form-group">
                                            <div class="form-left">
                                                <label for="">Propriedade</label>
                                                <div id="dropdownPropriedades"></div>
                                            </div>                                
                                        </div>
                                        <div class="form-group">
                                            <div class="form-left">
                                                <label for="">Nome da Gleba</label>
                                                <input name="nome" type="text">
                                            </div>                                
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Salvar" onclick="SalvarGleba()" />
                                            <a href="#" class="btn btn-default" onclick="CarregarGlebas()">Voltar</a>
                                        </div>
                                    </form>
                                </div>
                                <div id="update" style="display:none;">
                                    <form action="javascript:void(0);" method="post" id="formEditarGleba">
                                        <h2>Editar Gleba</h2>
                                        <input id="inputHiddenId" type="hidden" name="id" />
                                        <div class="form-group">
                                            <div class="form-left">
                                                <label for="">Propriedade</label>
                                                <div id="dropdownPropriedadesEdit"></div>
                                            </div>                                
                                        </div>
                                        <div class="form-group">
                                            <div class="form-left">
                                                <label for="">Nome da Gleba</label>
                                                <input id="inputTxtNome" name="nome" type="text">
                                            </div>                                
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Salvar" onclick="SalvarEditGleba()" />
                                            <a href="<?php echo BASEURL ?>areas/administrativo/views/talhoes.php" class="btn btn-default">Ver Talhões</a>
                                            <a href="#" class="btn btn-default" onclick="CarregarGlebas()">Voltar</a>
                                        </div>
                                    </form>
                                </div>
                                <div id="delete" style="display:none;"></div>
                            </div>                                                    
                        </div>                                              
                    </div>
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
    <script type="text/javascript" src="../main.js"></script>
</body>

</html>