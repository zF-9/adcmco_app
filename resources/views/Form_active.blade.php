<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Covid-19 Case Form</title>

    <!-- Icons font CSS-->
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/main_form.css" rel="stylesheet" media="all">

    <!-- Nucleo Icons -->
    <!--<link href="/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/css/nucleo-svg.css" rel="stylesheet" />-->
    <!-- Font Awesome Icons -->
    <!--<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/css/nucleo-svg.css" rel="stylesheet" />-->
    <!-- CSS Files -->
    <!--<link id="pagestyle" href="/css/soft-ui-dashboard.css?v=1.0.2" rel="stylesheet" />-->
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">

            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Covid-19 Cases Form</h2>
                    @if($ErrorMsg != 'none')
                        <div class="error" style="color:red"> {{ $ErrorMsg }}</div>
                    @endif
                    
                    <form class="contact-form" role="form" action="/active_cases" method="POST" enctype="multipart/form-data"> 
                    {{ csrf_field() }} 

                    <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <!--<label class="label">Nama</label>-->
                                    <input class="input--style-4" type="hidden" name="unique_name" value="{{ $name_unique }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <!--<label class="label">last name</label>-->
                                    <input class="input--style-4" type="hidden" name="unique_id" value="{{ $id_unique }}">
                                </div>
                            </div>
                    </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Status</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="status">
                                    <option disabled="disabled" selected="selected" >Choose option</option>
                                    <option>Kuarantin Hospital</option>
                                    <option>Kuarantin Pusat</option>
                                    <option>Kuarantin Rumah</option>
                                    <option>Sembuh</option>
                                    <option>Mati</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div clas="row">
                                <h2>Kes Aktif</h2>
                            </div>
                        </div>
                        <!-- remove datepicker or not ?; add table list to show added record on Today() -->

                        <div class="row row-space">
                            <div class="col-6">
                                @empty($raw_echo)
                                    <p>empty</p>
                                @endempty
                                @isset($raw_echo)                            
                                    <h3>{{ $Today }}</h3>
                                    <hr>
                                    @foreach($raw_echo as $active_list)
                                        <h6 class="mb-0 text-sm" style="font-weight:bold">{{ $active_list->Name }}</h6>
                                        <span class="badge badge-sm bg-gradient-primary">{{ $active_list->Status }}</span>
                                @endforeach   
                                @endisset
                            </div>

                            <div class="col-6">
                                @empty($raw_clone)
                                    <p>empty</p>
                                @endempty
                                @isset($raw_clone)
                                    <h3>{{ $Yesterday }}</h3>
                                    <hr>
                                    @foreach($raw_clone as $active_prev)
                                        <span class="badge badge-sm bg-gradient-primary" >{{ $active_prev->Name }}</span>
                                        <h6 class="mb-0 text-sm" style="font-weight:bold">{{ $active_prev->Status }}</h6>    
                                    @endforeach   
                                @endisset
                            </div>

                        </div>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--green" type="submit">Tambah Rekod</button>
                            <!-- reroute to form_active (save and return(redirect)) -->
                        </div>
                    </form>
                    
                    <form action="/surveilance/{{ $id_unique }}/{{ $name_unique }}" method="GET">
                        <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit">Next</button>
                                <!-- reroute to form_surveilance -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/vendor/select2/select2.min.js"></script>
    <script src="/vendor/datepicker/moment.min.js"></script>
    <script src="/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global_form.js"></script>
</body>

</html>
<!-- end document-->