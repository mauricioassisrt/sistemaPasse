<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Passe Livre| Startup</title>
    {{-- ICON --}}
    <link rel="shortcut icon" href="/img/o.png">
    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    {{-- CSS PRINCIPAL --}}
    <link rel="stylesheet" href="/css/app.css">
    {{-- SELECT --}}
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/select2-bootstrap4.min.css">
    {{-- SELECT --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">

</head>

<body class="sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <!-- Messages Dropdown Menu -->
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Logout
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                <!-- Notifications Dropdown Menu -->
                <span class="fa fa-sign-out"></span>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-green">
            <!-- Brand Logo -->
            <a href="/" class="brand-link navbar-success">
                <i class="fa fa-bus" aria-hidden="true">
                </i>
                <span class="brand-text font-weight-light">Passe Livre</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @if (Auth::check())
                            <li class="nav-item">

                                <a href="{{ route('home') }}" class="nav-link active">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <p>Home </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('andamentos') }}" class="nav-link active">
                                    <i class="fas fa-user-graduate"></i>
                                    <p>Cadastros Realizados </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('status') }}" class="nav-link active">
                                    <i class="fas fa-info nav-icon"></i>
                                    <p>Status</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ route('consultar.situacao') }}" class="nav-link active">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Consultar Passe
                                </p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('estudante.index') }}" class="nav-link active">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Solicitar Passe</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            @yield('content')
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
            <strong>Copyright &copy; 2020 - {{ date('Y') }} <a href="https://nautilus.solution.com.br">Nautilus
                    Solutions</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/js/app.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/adminlte.js"></script>

    <!-- Jquery Validation -->
    <script src="/js/jquery.validate.min.js"></script>

    <!-- SELECT -->
    <script src="/js/select2.full.min.js"></script>
    <!-- INPUT MASK  -->
    <script src="/js/jquery.inputmask.bundle.min.js"></script>
    <!-- DATA RANGE PICKER  -->
    <script src="/js/daterangepicker.js"></script>
    <!-- DataTables -->
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/dataTables.responsive.min.js"></script>
    <script src="/js/responsive.bootstrap4.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminlte.min.js"></script>
    <script src="/js/demo.js"></script>


    <script type="text/javascript">
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            //  });

            // //Bootstrap Duallistbox
            // $('.duallistbox').bootstrapDualListbox()

            // //Colorpicker
            // $('.my-colorpicker1').colorpicker()
            // //color picker with addon
            // $('.my-colorpicker2').colorpicker()

            // $('.my-colorpicker2').on('colorpickerChange', function(event) {
            //   $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            // });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
        // $(document).ready(function () {
        //   $.validator.setDefaults({
        //     submitHandler: function () {
        //       alert( "Form successful submitted!" );
        //     }
        //   });
        //   $('#quickForm').validate({
        //     rules: {
        //         consultaCPF: {
        //         required: true,

        //       },
        //       consultaProtocolo: {
        //         required: true,
        //       },

        //         },

        //       messages: {
        //         consultaCPF: {
        //            required: "Nenhum dado informado",

        //          },
        //          consultaProtocolo: {
        //            required: "Informe um valor",

        //          },
        //          nomeAluno:{
        //            required: "Informe um nome para o aluno",
        //          },
        //          responsavel:{
        //            required: "Informe um nome para o responsável ",
        //          },
        //          naturalidade:{
        //            required: "Informe uma cidade ",
        //          },
        //          telefone:{
        //            required: "Informe um telefone ",
        //          },

        //     },
        //     errorElement: 'span',
        //     errorPlacement: function (error, element) {
        //       error.addClass('invalid-feedback');
        //       element.closest('.form-group').append(error);
        //     },
        //     highlight: function (element, errorClass, validClass) {
        //       $(element).addClass('is-invalid');
        //     },
        //     unhighlight: function (element, errorClass, validClass) {
        //       $(element).removeClass('is-invalid');
        //     }
        //   });
        // });

        $('#tabela').dataTable( {
            paging: false,

        } );
    </script>

</body>

</html>
