<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('admin.inc.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.inc.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.inc.topbar')
                <!-- End of Topbar -->

                <!-- Message -->
                @include('admin.inc.message')
                <!-- End of Message -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User</h1>
                        <a href="#" data-toggle="modal" data-target="#createModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Create New
                        </a>
                    </div>

                    <!-- Statics -->
                    @include('admin.inc.stats')
                    <!-- End of Statics -->

                </div>
                <!-- /.container-fluid -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of all users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Current Werefa</th>
                                            <th>Account Balance</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Current Werefa</th>
                                            <th>Account Balance</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    {{$user->name}}<br>
                                                    <a href="#" data-toggle="modal" data-target="#editModal"
                                                        class="btn btn-primary btn-icon-split" data-val="{{$user}}">
                                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                                        <span class="text">Edit</span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                            class="btn btn-danger btn-icon-split" data-val="{{$user}}">
                                                            <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                                        <span class="text">Delete</span>
                                                    </a>
                                                </td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>

                                                    <ul>
                                                        @foreach($user->waitingAt() as $queue)
                                                        <li>{{$queue->companyBranch->name}}</li>
                                                        @endforeach
                                                    </ul>

                                                    <br>

                                                    <a href="#" data-toggle="modal" data-target="#getInLineModal"
                                                        class="btn btn-success btn-icon-split" data-val="{{$user}}" data-branches-val="{{$companyBranches}}">
                                                        <span class="icon text-white-50"><i class="fas fa-angle-double-right"></i></span>
                                                        <span class="text">Get in line</span>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#queueModal"
                                                        class="btn btn-primary btn-icon-split" data-val="{{$user}}">
                                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                                        <span class="text">History</span>
                                                    </a>


                                                </td>
                                                <td>
                                                    <strong>{{ $user->remainingAmount() }} Birr</strong><br>
                                                    <a href="#" data-toggle="modal" data-target="#topUpModal"
                                                        class="btn btn-success btn-icon-split" data-val="{{$user}}">
                                                        <span class="icon text-white-50"><i class="fas fa-angle-double-right"></i></span>
                                                        <span class="text">Top Up</span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#balanceModal"
                                                        class="btn btn-primary btn-icon-split" data-val="{{$user}}"
                                                        data-balance-val="{{$user->userBalanceSheets}}" data-remaining-val="{{$user->remainingAmount()}}">
                                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                                        <span class="text">History</span>
                                                    </a>


                                                </td>
                                            </tr>
                                        @endforeach
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
            @include('admin.inc.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('admin.inc.scripts')


    <!-- Page level plugins -->
    <script src="{{ asset('sb-theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('sb-theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-theme/js/demo/datatables-demo.js')}}"></script>
    <style>
        #dataTable_wrapper > div:first-of-type label {
            display: inline-flex;
        }
    </style>

    @include('admin.user-forms')


</body>

</html>
