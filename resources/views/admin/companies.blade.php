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
                        <h1 class="h3 mb-0 text-gray-800">Company</h1>
                        <a href="#" data-toggle="modal" data-target="#createModal" data-categories-val="{{$categories}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Create Company
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
                            <h6 class="m-0 font-weight-bold text-primary">List of all companies</h6>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Branches</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Branches</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($companies as $company)
                                            <tr>
                                                <td>
                                                    <?php
                                                        if(strpos($company->logo, "http") === false)
                                                            $imageURL =  asset('images/'.$company->logo);
                                                        else
                                                            $imageURL = $company->logo;
                                                    ?>


                                                    <img width=100 src="{{$imageURL}}">
                                                    {{$company->name}}<br>
                                                    <strong>Category: </strong>{{$company->companyCategory->name}}<br>
                                                    <strong>Werefa price: </strong>{{$company->ticket_price}}<br>

                                                    <a href="#" data-toggle="modal" data-target="#editModal"
                                                        class="btn btn-primary btn-icon-split" data-val="{{$company}}"
                                                        data-categories-val="{{$categories}}" data-image-val="{{ $imageURL }}">
                                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                                        <span class="text">Edit</span>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                        class="btn btn-danger btn-icon-split" data-val="{{$company}}"
                                                        data-image-val="{{ $imageURL }}">
                                                        <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                                        <span class="text">Delete</span>
                                                    </a>

                                                </td>
                                                <td>
                                                    @foreach($company->companyBranches as $branch)
                                                        {{ $branch->name }}<br>
                                                    @endforeach
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
        .table td.fit, .table th.fit {
            white-space: nowrap;
            width: 1%;
        }

        #dataTable_wrapper > div:first-of-type label {
            display: inline-flex;
        }
    </style>

    @include('admin.companies-forms')


</body>

</html>
