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

    <style>
        .goog-logo-link{
            display: none;
        }
    </style>


    <body id="page-top"  class="font-sans antialiased">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">
                    <img src="{{ asset('images/logo.png') }}" width=150>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0" style="align-items: center;">
                        <li class="nav-item"><a class="nav-link" href="#page-top">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#companies">Companies</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>

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

            <div id="google_translate_element"></div>
        </nav>



        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Welcome to <br>Michu Werefa!</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">
                            This is a virtual waiting room.
                            Create an account or Login first.
                        </p>
                        <a class="btn btn-primary btn-xl" href="#companies">select a company and reserve your spot</a>
                    </div>
                </div>
            </div>
        </header>




        <!-- Advertisement-->
        <section class="page-section bg-primary" id="services">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">{{ $ad->title }}</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">{{ $ad->desc }}</p>
                        <a class="btn btn-light btn-xl" target="_blank" href="{{ $ad->link }}">Click to read more</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Companies-->
        <section class="page-section" id="companies">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Companies</h2>
                <hr class="divider" />
                <div class="form-group">
                    <label for="filter">Select Category: </label>
                    <select id="filter">
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>List of companies</th>
                            <th>Branches</th>
                            <th>Werefa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>List of companies</th>
                            <th>Branches</th>
                            <th>Werefa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td style="text-align: left;">
                                    <?php
                                        if(strpos($company->logo, "http") === false)
                                            $imageURL =  asset('images/'.$company->logo);
                                        else
                                            $imageURL = $company->logo;
                                    ?>


                                    <img width=100 src="{{$imageURL}}">
                                    {{$company->name}}<br><br>
                                    <strong>Category: </strong>{{ $company->companyCategory->name }}<br>
                                    <strong>Werefa price: </strong>{{$company->ticket_price}}
                                </td>
                                <td  style="text-align: left;">
                                    @foreach($company->companyBranches as $branch)
                                        <strong>{{$branch->name}}: {{$branch->peopleWaiting()}} people waiting</strong><br>
                                    @endforeach
                                </td>
                                <td>
                                    @auth
                                    @foreach($company->companyBranches as $branch)
                                        <div>
                                            <a href="#" data-toggle="modal" data-target="#historyModal"
                                                class="btn btn-primary btn-icon-split" data-val="{{$branch}}"
                                                data-company-val="{{$company}}">
                                                <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#getInLineModal"
                                                class="btn btn-success btn-icon-split" data-val="{{$branch}}"
                                                data-company-val="{{$company}}" data-queue-val="{{$branch->peopleWaiting()}}"
                                                data-image-val="{{ $imageURL }}">
                                                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                                <span class="text">Get in line</span>
                                            </a>
                                        </div>
                                    @endforeach
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-success btn-icon-split" >
                                        <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                        <span class="text"> Login to view werefa</span>
                                    </a>
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>



        <!-- Services-->
        <section class="page-section bg-primary" id="services">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">We've got what you need!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">If you are interested to work with us, please contact us.</p>
                        <a class="btn btn-light btn-xl" href="#contact">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>



        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Send us a messages and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form id="contactForm" onsubmit="event.preventDefault(); return onSubmit();">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." required />
                                <label for="name">Full name</label>
                                <div id="nameErrorMsg"></div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" required />
                                <label for="email">Email address</label>
                                <div id="emailErrorMsg"></div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" required />
                                <label for="phone">Phone number</label>
                                <div id="phoneErrorMsg"></div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" required placeholder="Enter your message here..." style="height: 10rem"></textarea>
                                <label for="message">Message</label>
                                <div id="messageErrorMsg"></div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div style="display:none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Message Successfully Sent!!</div>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div style="display:none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+251 (913) 419-042</div>
                    </div>
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
            var table = $('#dataTable').DataTable();

            $("#filter").on('change', function() {
                table.column(0).search($(this).val()).draw();
            });


            async function onSubmit() {
                const name = $('form#contactForm input#name').val();
                const email = $('form#contactForm input#email').val();
                const phone = $('form#contactForm input#phone').val();
                const msg = $('form#contactForm textarea#message').val();

                $.ajax({
                    url: "{{ URL::to('/') }}/submitcontact",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        phone: phone,
                        message: msg,
                    },
                    success:function(response){
                        $('#submitSuccessMessage').show();
                        // console.log(response);
                    },
                    error: function(response) {
                        // console.log(response.responseJSON.message);
                        $('#submitErrorMessage').show();
                        $('#nameErrorMsg').text(response.responseJSON.errors.name);
                        $('#emailErrorMsg').text(response.responseJSON.errors.email);
                        $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
                        $('#messageErrorMsg').text(response.responseJSON.errors.message);
                    },
                });
            }

        </script>

        @include('home-forms')

       </body>
</html>

