<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('receptionist.inc.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('receptionist.inc.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('receptionist.inc.topbar')
                <!-- End of Topbar -->

                <!-- Message -->
                @include('receptionist.inc.message')
                <!-- End of Message -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Queues</h1>
                    </div>

                    <!-- Statics -->
                    @include('receptionist.inc.stats')
                    <!-- End of Statics -->

                </div>
                <!-- /.container-fluid -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of werefa at {{ $branch->name }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Werefa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Werefa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <strong>{{$branch->peopleWaiting()}} people waiting</strong><br>
                                                    <a href="#" data-toggle="modal" data-target="#queueModal"
                                                        class="btn btn-primary btn-icon-split" data-val="{{$branch}}">
                                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                                        <span class="text">History</span>
                                                    </a>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            @include('receptionist.inc.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('receptionist.inc.scripts')


    <!-- Page level plugins -->
    <script src="{{ asset('sb-theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('sb-theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-theme/js/demo/datatables-demo.js')}}"></script>
    <style>
        .table td.fit, .table th.fit {
            white-space: nowrap;
            width: 1%;
        }

        #dataTable_wrapper > div:first-of-type label {
            display: inline-flex;
        }
    </style>

    @include('receptionist.queue-forms')


</body>

</html>
