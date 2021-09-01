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
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Covid-19 Cases Form</h2>
                    <div class="error" style="color:orange">* Bilangan staff yang dibawah pemerhatian</div>
                    <form class="contact-form" role="form" action="/surveilance_cases" method="POST" enctype="multipart/form-data"> 
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
                                    <label class="label">PUI/PUS Kuarantin di Pusat</label>
                                    <input class="input--style-4" type="number" name="centerq">
                                </div>
                            </div>                        
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">PUI/PUS Kuarantin di Rumah</label>
                                    <input class="input--style-4" type="number" name="houseq">
                                </div>
                            </div>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <!--<div class="input-group">
                                    <label class="label">Tarikh</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="date">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>-->


                            <!--<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>-->
                            </div>
                        </div>

                        <!--<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tarikh</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                        </div>-->

                        <!--<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="input-group">
                            <label class="label">Status</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Kuarantin Hospital</option>
                                    <option>Kuarantin Pusat</option>
                                    <option>Kuarantin Rumah</option>
                                    <option>Sembuh</option>
                                    <option>Mati</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>-->

                        <!--<div class="p-t-15">
                            <button class="btn btn--radius-2 btn--green" type="submit">Tambah Rekod</button>
                        </div>-->

                        <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" type="submit">Update</button>
                            <!-- reroute to form_active -->
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
    <script src="/js/global_form.js"></script>


    <!-- Logout Modal -->
    <div id="logoutModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
            <div class="icon-box">
            <i class="fa fa-sign-out"></i>
            </div>						
            <h4 class="modal-title w-100">Log Keluar?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <p>Andakah Anda Ingin Log Keluar? Klik Butang Hijau Untuk Sahkan</p>
            </div>
            <div class="modal-footer justify-content-center">
            
            <button type="button" class="btn btn-success" ><a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="color:white">Log Keluar</a></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" >Batal</button>
                
            <form id="logout-form" action="" method="POST" style="display: none;">
                @csrf
            </form>
            
            </div>
        </div>
        </div>
    </div>
    <!-- Logout Modal -->    

</body>

</html>
<!-- end document-->