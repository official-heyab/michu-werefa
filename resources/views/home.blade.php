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
                          <a class="dropdown-item" href="#">Profile</a>
                          <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Panel</a>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}" >Register</a></li>
                    @endauth
                    </ul>
                </div>
            </div>
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
        {{-- <section class="page-section bg-primary" id="services">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Ad Section</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Enjoy Walia Beer. For more info click below...</p>
                        <a class="btn btn-light btn-xl" href="#">Walia Beer Website</a>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Companies-->
        <section class="page-section" id="companies">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Companies</h2>
                <hr class="divider" />
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>List of companies</th>
                            <th>Werefa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>List of companies</th>
                            <th>Werefa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td style="text-align: left;">
                                    <img width=100 src="{{$company->logo}}">
                                    {{$company->name}}<br><br>
                                    <strong>Werefa price: </strong>{{$company->ticket_price}}
                                </td>
                                <td  style="text-align: left;">
                                    <strong>{{$company->peopleWaiting()}} people waiting</strong><br>
                                    <a href="#" data-toggle="modal" data-target="#historyModal"
                                        class="btn btn-primary btn-icon-split" data-val="{{$company}}">
                                        <span class="icon text-white-50"><i class="fas fa-info-circle"></i></span>
                                        <span class="text">View Werefa</span>
                                    </a>
                                    @auth
                                    <a href="#" data-toggle="modal" data-target="#getInLineModal"
                                        class="btn btn-success btn-icon-split" data-val="{{$company}}" data-queue-val="{{$company->peopleWaiting()}}" >
                                        <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                        <span class="text">Get in line</span>
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
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
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

        @include('home-forms')

    </body>
</html>

