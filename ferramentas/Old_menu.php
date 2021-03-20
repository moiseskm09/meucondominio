    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#">MEU CONDOMÍNIO</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                         alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <strong><?php echo $NOME; ?></strong>
                    </span>
                    <span class="user-role">Administrator</span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="../sistema/home.php">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Painel Principal</span>
                        </a> 
                    </li>
                    <li class="header-menu">
                        <span>Geral</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-check-circle"></i>
                            <span>Aprovações</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Reservas</a>
                                </li>
                                <li>
                                    <a href="#">Usuários</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-building"></i>
                            <span>Administração</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Atas das Reuniões

                                    </a>
                                </li>
                                <li>
                                    <a href="../sistema/avisos.php">Avisos

                                    </a>
                                </li>
                                <li>
                                    <a href="#">Anúncios e Classificados

                                    </a>
                                </li>
                                <li>
                                    <a href="#">Eventos

                                    </a>
                                </li>
                                <li>
                                    <a href="#">Livro de Ocorrências</a>
                                </li>
                                <li>
                                    <a href="#">Normas e Regulamentos</a>
                                </li>
                                <li>
                                    <a href="#">Reservas</a>
                                </li>
                                <li>
                                    <a href="#">Ramais</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-id-badge"></i>
                            <span>Portaria</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Registro de Visitantes

                                    </a>

                            </ul>
                        </div>
                    </li>

                    <li class="header-menu">
                        <span>Configurações</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-database"></i>
                            <span>Cadastro</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="../sistema/area-comum.php">Áreas Comuns</a>
                                </li>
                                <li>
                                    <a href="#">Bancos</a>
                                </li>
                                <li>
                                    <a href="#">Blocos</a>
                                </li>
                                <li>
                                    <a href="#">Contas Bancárias</a>
                                </li>
                                <li>
                                    <a href="#">Categoria de Contas</a>
                                </li>
                                <li>
                                    <a href="#">Condomínios</a>
                                </li>
                                <li>
                                    <a href="#">Fornecedores</a>
                                </li>
                                <li>
                                    <a href="#">Usuários</a>
                                </li>
                                <li>
                                    <a href="#">Veículos</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>

            <a href="../ferramentas/logout.php">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
