<div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Liryos Admin" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Liryos Admin</span>
      </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Procurar..." aria-label="Procurar...">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'menu-open' : ''}}">
                    <a href="{{ route('dashboard') }}" class='nav-link {{ request()->routeIs('dashboard') ? 'active' : ''}}'>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (request()-> is('functions/*')) ? 'menu-open' : '' }}">
                    <a href="#" class='nav-link {{ (request()-> is('functions/*')) ? 'active' : '' }}'>
                        <i class="nav-icon fas fa-rocket"></i>
                        <p>
                          Funções
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cortes') }}" class="nav-link {{ request()->routeIs('cortes') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Adicionar Corte</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('losses_product') }}" class="nav-link {{ request()->routeIs('losses_product') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerenciamento de Perda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cesta') }}" class="nav-link {{ request()->routeIs('cesta') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cesta Básica</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()-> is('tickets/*')) ? 'menu-open' : '' }}">
                    <a href="#" class='nav-link {{ (request()-> is('tickets/*')) ? 'active' : '' }}'>
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                          Ticket's
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('chamado')}}" class="nav-link {{ request()->routeIs('chamado') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ticket's Informações</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produtsChamados')}}" class="nav-link {{ request()->routeIs('produtsChamados') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Geren. de Ticket's</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class='nav-link'>
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                          Produtos
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Adicionar Produto</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()-> is('registros/*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()-> is('registros/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Registros
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cortesview')}} " class="nav-link {{ request()->routeIs('cortesview') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cortes (P&F)(A&E)</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('nfe') ? 'active' : ''}}">
                            <a href="{{ route('nfe') }}" class="nav-link {{ request()->routeIs('nfe') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Notas Fiscais (NFe)</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()-> is('task/*')) ? 'menu-open' : '' }}">
                    <a href="#" class='nav-link {{ (request()-> is('task/*')) ? 'active' : '' }}'>
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Processos de Atividade
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tasks')}}" class="nav-link {{ request()->routeIs('tasks') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Distribuição de Atividades</p>
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerenciamento de Atividades</p>
                            </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Avaliação de Funcionários</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-item {{ (request()-> is('calculator/*')) ? 'menu-open' : '' }}">
                    <a href="#" class='nav-link'>
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            EAN
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->routeIs('payments') ? 'active' : ''}}">
                            <a href="{{ route('calculatorEAN')}}" class="nav-link {{ request()->routeIs('calculatorEAN') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Calculadora de Dígito Verificador</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()-> is('pagamentos/*')) ? 'menu-open' : '' }}">
                    <a href="#" class='nav-link'>
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            GUIAS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->routeIs('payments') ? 'active' : ''}}">
                            <a href="{{ route('payments')}}" class="nav-link {{ request()->routeIs('payments') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Guias para Pagamentos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()-> is('licitacao/*')) ? 'menu-open' : '' }}">
                    <a href="#" class='nav-link'>
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            LICITAÇÕES
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->routeIs('licitacao') ? 'active' : ''}}">
                            <a href="{{ route('licitacao')}}" class="nav-link {{ request()->routeIs('licitacao') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Processos</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('OEF') ? 'active' : ''}}">
                            <a href="{{ route('OEF')}}" class="nav-link {{ request()->routeIs('OEF') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>OEF</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">DOCUMENTAÇÃO</li>
                <li class="nav-item">
                    <a href="https://atendimento.linearsistemas.com.br/kb/pt-br/Search?q=Entrada+de+Nota&page=0&pageLimit=40" class="nav-link">
                        <i class="bi bi-life-preserver"></i>
                        <P>NFe de Entrada</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('document/tabela_cfop.pdf')}}" class="nav-link">
                        <i class="bi bi-life-preserver"></i>
                        <P>Tabela de CFOP</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('document/cst.pdf')}}" class="nav-link">
                        <i class="bi bi-life-preserver"></i>
                        <P>Tabela de CST</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('dashboard')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Procurar..." aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">   
                    <h6 class="dropdown-header">{{ __('Gerenciar Equipe') }}</h6>
                    <div class="dropdown-divider"></div>

                    <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="dropdown-item">
                        {{ __('Configurações da equipe') }}
                    </a>
                    <div class="dropdown-divider"></div>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <a class="dropdown-item" href="{{ route('teams.create') }}">{{ __('Criar nova equipe') }}</a>
                    @endcan
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">{{ __('Equipes') }}</h6>
                    @foreach (Auth::user()->allTeams() as $team)
                    <x-jet-switchable-team :team="$team" />
                    @endforeach
                </div>
            @endif
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="btn btn-block bg-gradient-primary">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                </a>
            </form>
        </li>
    </ul>
</nav>
</div>