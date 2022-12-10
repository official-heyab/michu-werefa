<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('creative-theme/css/styles.css')}}" rel="stylesheet" />
    </head>


    <body id="page-top"  class="font-sans antialiased">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" width=150>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0" style="align-items: center;">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    @auth
                    <li class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                          @if($isReceptionist)
                          <a class="dropdown-item" href="{{ route('receptionist.home') }}">Receptionist Panel</a>
                          @elseif ($isAdmin)
                          <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Panel</a>
                          @endif
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="
                                    event.preventDefault();
                                    this.closest('form').submit();">
                            Log Out</a>
                        </form>
                        </div>
                    </li>


                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" >Login</a></li>
                    @endauth
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Details-->
        <section class="page-section" id="companies">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Details</h2>
                <hr class="divider" />
                <div>
                    <h3>Name: {{$user->name}}</h3>
                    <h3>Email: {{$user->email}}</h3>
                    <h3>Phone: {{$user->phone}}</h3>
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
                </div>
            </div>
        </section>

        <input type="hidden" id="userData" value="{{ $user }}"/>
        <input type="hidden" id="userBalanceSheets" value="{{ $user->transactions }}"/>

        <!-- Werefa-->
        <section class="page-section" id="companies">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Werefa</h2>
                <hr class="divider" />
                <div id="queueTable">
                    <ul>
                        <li>Currently Waiting at: </li>
                        @foreach($user->waitingAt() as $queue)
                        <li>{{$queue->companyBranch->name}}</li>
                        @endforeach
                    </ul>

                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Status</th>
                                <th class='fit'>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Company</th>
                                <th>Status</th>
                                <th class='fit'>Date</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>

                    <a href="#" data-toggle="modal" data-target="#getInLineModal"
                    class="btn btn-success btn-icon-split" data-val="{{$user}}" data-branches-val="{{$companyBranches}}">
                    <span class="icon text-white-50"><i class="fas fa-angle-double-right"></i></span>
                    <span class="text">Get in line</span>
                    </a>



                </div>
            </div>
        </section>


        <!-- Account Balance-->
        <section class="page-section">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Account Balance</h2>
                <hr class="divider" />
                <div id="balanceTable">
                    <h2>Remaining: <span id="remaining">{{ $user->remainingAmount() }} Birr</span></h2>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Transaction</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Transaction</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </section>

        <!-- Footer-->
        @include('inc.footer')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('creative-theme/js/scripts.js')}}"></script>


        @include('admin.inc.scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('sb-theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('sb-theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('sb-theme/js/demo/datatables-demo.js')}}"></script>

        <style>
            .mainTable {
                margin: 0 20% !important;
            }


            #dataTable_wrapper > div:first-of-type label {
                display: inline-flex;
            }
        </style>


        <script>
            var tableBody="";
            var user  = JSON.parse($("#userData").val());

            for (var index in user.queues) {
                var queueDate = new Date(user.queues[index].created_at);

                tableBody +="<tr>";
                tableBody +="<td>"+user.queues[index].company_branch.name+"</td>";
                tableBody +="<td>"+user.queues[index].status+"</td>";
                tableBody +="<td class='fit'>"+queueDate.getHours()+":"+queueDate.getMinutes();
                tableBody +=" "+$.datepicker.formatDate('DD, MM d yy', queueDate)+"</td>";
                tableBody +="</tr>";
            }


            $('div#queueTable table tbody').html(tableBody);


            var tableBody="";
            var balanceSheets  = JSON.parse($("#userBalanceSheets").val());


            for (var index in balanceSheets) {
                var transDate = new Date(balanceSheets[index].created_at);
                tableBody +="<tr><td>";
                if(balanceSheets[index].isWithdrawal==1)
                    tableBody +="Withdrawed ";
                if(balanceSheets[index].isWithdrawal==0)
                    tableBody +="Deposited ";
                tableBody +=balanceSheets[index].amount+"</td>";
                tableBody +="<td>"+transDate.getHours()+":"+transDate.getMinutes();
                tableBody +=" "+$.datepicker.formatDate('DD, MM d yy', transDate);
                tableBody += "</td></tr>";
            }

            $('div#balanceTable table tbody').html(tableBody);

        </script>

        @include('profile-forms')
    </body>
</html>

