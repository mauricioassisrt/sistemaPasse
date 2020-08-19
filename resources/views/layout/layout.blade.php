<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Passe Livre| Startup</title>
    <link rel="shortcut icon" href="/img/o.png">
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <a class="nav-link" href="/../logout">
                    <i class="fas fa-sign-in-alt"></i>

                </a>
                <!-- Notifications Dropdown Menu -->
                <span class="fa fa-sign-out"></span>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-cog"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">Nome usuário </span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports

                        </a>

                </li>
                {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-red">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link navba-dark-white">
                <img src="/img/logo.png" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Passe Livre</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/logo.png" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @can('menu_cadastro')
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Cadastros
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    @can('View_user')
                                    <a href="{{url('/users')}}" class="nav-link active">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Usuários</p>
                                    </a>
                                    @endcan
                                    @can('View_role')
                                    <a href="{{url('/acl/roles')}}" class="nav-link active">
                                        <i class="fas fa-file nav-icon"></i>
                                        <p>Funções</p>

                                    </a>
                                    @endcan
                                    @can('View_permission')
                                    <a href="{{url('/acl/permissions')}}" class="nav-link active">
                                        <i class="fas fa-check-square nav-icon"></i>
                                        <p>Permissões</p>
                                    </a>

                                    </a>
                                    @endcan
                                    @can('View_departamento')
                                    <a href="{{url('/departamentos')}}" class="nav-link active">
                                        <i class="fas fa-person-booth nav-icon"></i>
                                        <p>Departamentos</p>
                                    </a>

                                    </a>
                                    @endcan
                                </li>

                            </ul>
                        </li>
                        @endcan

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <main class="py-12">
                                        @yield('content')
                                    </main>


                                </div>
                            </div>


                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

                Solutions for your company
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 - {{  date('Y') }} <a href="https://nautilus.solution.com.br">Nautilus
                    Solutions</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/js/app.js"></script>
</body>

</html>
