<?php
    $titulo = "Faturas - Agroseven";

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
                    <h1>faturas do sistema</h1>
                </div>
                <div class="navegacao-funcionario">
                    <ul>
                        <li class="">
                            <a href="meus-dados.php">
                                <img src="<?php echo BASEURL ?>assets/img/icone-nav-dados.svg" class="centralizar-img" alt="">
                            </a>
                        </li>

                        <li class="active">
                            <a href="#">
                                <img src="<?php echo BASEURL ?>assets/img/icone-dinheiro.svg" class="icone-dinheiro centralizar-img" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="lado-esq">
                <div class="info-geral-fun pagina-fatura">
                    <div class="info-atraso">
                        <span>!</span>
                        <h3>uma fatura em atraso.</h3>
                    </div>
                    <div class="foto-func">
                        <img src="<?php echo BASEURL ?>assets/img/foto-perfil.png" class="img-responsive" alt="">
                    </div>
                    <div class="info-func">
                        <h3>ADMINISTRADOR GERAL</h3>
                        <h1>JOSÉ DA SILVA ANDRADE</h1>
                        <h2>ID : 221323</h2>
                        <h1 class="status">status: ativo</h1>
                    </div>
                    <div class="info-prop">
                        <h1>2 PROPRIEDADES ATIVAS</h1>
                        <img src="<?php echo BASEURL ?>assets/img/seta-baixo-cinza.svg" alt="">
                        <div class="props">
                            <div class="prop-esq">
                                <h2>santa cruz</h2>
                                <h2>betel</h2>
                            </div>
                            <div class="prop-dir">
                                <h2>R$ 370,00</h2>
                                <h2>R$ 260,00</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lado-dir conteudo-fatura">
                <div class="topo-fatura">
                    <div class="total-fatura">
                        <h1>VALOR TOTAL DAS FATURAS  -  <span>R$ 630,00</span></h1>
                    </div>
                    <div class="data-boleto">
                        <div class="texto">
                            <h1>BOLETO BANCÁRIO</h1>
                            <span>DATA DE VENCIMENTO - DIA 12</span>
                        </div>
                        <img src="<?php echo BASEURL ?>assets/img/icone-boleto.svg" alt="">
                    </div>
                </div>
                <div class="conteudo-tabela">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="circulo verde"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span>09/05/2018</span>
                                </td>
                                <td>
                                    <span class="status pago">PAGO</span>
                                </td>
                                <td>
                                    <img src="<?php echo BASEURL ?>assets/img/icone-ok.svg" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circulo verde"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span>09/05/2018</span>
                                </td>
                                <td>
                                    <span class="status pago">PAGO</span>
                                </td>
                                <td>
                                    <img src="<?php echo BASEURL ?>assets/img/icone-ok.svg" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circulo verde"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span>09/05/2018</span>
                                </td>
                                <td>
                                    <span class="status pago">PAGO</span>
                                </td>
                                <td>
                                    <img src="<?php echo BASEURL ?>assets/img/icone-ok.svg" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circulo vermelho"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span class="sem-data">-</span>
                                </td>
                                <td>
                                    <span class="status atrasado">ATRASADA</span>
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="<?php echo BASEURL ?>assets/img/icone-imprimir.svg" alt="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circulo azul"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span class="sem-data">-</span>
                                </td>
                                <td>
                                    <span class="status aberto">ABERTO</span>
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="<?php echo BASEURL ?>assets/img/icone-imprimir.svg" alt="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circulo azul"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span class="sem-data">-</span>
                                </td>
                                <td>
                                    <span class="status aberto">ABERTO</span>
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="<?php echo BASEURL ?>assets/img/icone-imprimir.svg" alt="">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circulo azul"></div>
                                    DATA DE VENCIMENTO   <span>12/05/2018</span>
                                </td>
                                <td>
                                    <span>R$ 630,00</span>
                                </td>
                                <td>
                                    DATA DE PAGAMENTO <span class="sem-data">-</span>
                                </td>
                                <td>
                                    <span class="status aberto">ABERTO</span>
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="<?php echo BASEURL ?>assets/img/icone-imprimir.svg" alt="">
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo BASEURL ?>assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL ?>assets/js/main.js"></script>
</body>

</html>