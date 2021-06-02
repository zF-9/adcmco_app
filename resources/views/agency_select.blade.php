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
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main_form.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Covid-19 Cases Form</h2>
                    <form class="contact-form" role="form" action="/selected" method="POST" enctype="multipart/form-data"> 
                    {{ csrf_field() }} 
                        <div class="row row-space">
                            <!--<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>-->
                            <!--<div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>-->
                        </div>

                        <div class="input-group">
                            <label class="label">Kementerian/Jabatan/Agensi</label>
                            <div class="rs-select2 js-select-simple">
                                <select name="agencies">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="1">Kementerian Kerja Raya</option>
                                    <option value="2">Kementerian Pembangunan Luar Bandar</option>
                                    <option value="3">Kementerian Kewangan</option>
                                    <option value="4">Kementerian Pertanian dan Industri Makanan</option>
                                    <option value="5">Kementerian Pembangunan Infrastruktur</option>
                                    <option value="6">Kementerian Kerajaan Tempatan dan Perumahan</option>
                                    <option value="7">Kementerian Pembangunan Masyarakat dan Kesejahteraan Rakyat</option>
                                    <option value="8">Kementerian Pelancongan, Kebudayaan dan Alam Sekitar</option>
                                    <option value="9">Kementerian Perdagangan dan Perindustrian</option>
                                    <option value="10">Kementerian Belia dan Sukan Sabah</option>
                                    <option value="11">Kementerian Pelajaran dan Inovasi</option>
                                    <option value="12">Kementerian Undang-undang dan Hal Ehwal Anak Negeri</option>
                                    <option value="13">Pejabat Yang Dipertua Negeri Sabah / Istana Negeri</option>
                                    <option value="14">Pejabat Dewan Undangan Negeri</option>
                                    <option value="15">Suruhanjaya Perkhidmatan Awam Negeri</option>
                                    <option value="16">Pejabat Setiausaha Kerajaan Negeri</option>
                                    <option value="17">Pejabat Ketua Menteri</option>
                                    <option value="18">Pejabat Timbalan Setiausaha Kerajaan Negeri (Pentadbiran)</option>
                                    <option value="19">Pejabat Timbalan Setiausaha Kerajaan Negeri (Pembangunan)</option>
                                    <option value="20">Jabatan Arkib Negeri Sabah</option>
                                    <option value="21">Jabatan Peguam Besar Negeri</option>
                                    <option value="22">Jabatan Cetak Kerajaan</option>
                                    <option value="23">Jabatan Perkhidmatan Awam Negeri (termasuk Unit Penyampaian Perkhidmatan)</option>
                                    <option value="24">Jabatan Tanah & Ukur</option>
                                    <option value="25">Jabatan Perhutanan Sabah</option>
                                    <option value="26">Unit Perancang Ekonomi Negeri</option>
                                    <option value="27">Unit Pemimpin Pembangunan Masyarakat</option>
                                    <option value="28">Pejabat Perhubungan Negeri Sabah</option>
                                    <option value="29">Bahagian Istiadat dan Protokol</option>
                                    <option value="30">Bahagian Pengurusan dan Kewangan</option>
                                    <option value="31">Bahagian Kabinet dan Dasar</option>
                                    <option value="32">Pejabat Akhbar dan Penerbitan</option>
                                    <option value="33">Pejabat Mufti Negeri</option>
                                    <option value="34">Pejabat Hasil Bumi</option>
                                    <option value="35">Pejabat Hal Ehwal Dalam Negeri dan Penyelidikan</option>
                                    <option value="36">Jawatan Gunasama Lain, Jabatan Ketua Menteri</option>
                                    <option value="37">Jabatan Bendahari Negeri</option>
                                    <option value="38">Jabatan Perkhidmatan Komputer Negeri</option>
                                    <option value="39">Jabatan Perikanan</option>
                                    <option value="40">Jabatan Perkhidmatan Veterinar Sabah</option>
                                    <option value="41">Jabatan Pengairan dan Saliran</option>
                                    <option value="42">Jabatan Pertanian</option>
                                    <option value="43">Jabatan Air Negeri Sabah</option>
                                    <option value="44">Jabatan Kerja Raya</option>
                                    <option value="45">Jabatan Keretapi Negeri Sabah</option>
                                    <option value="46">Jabatan Pelabuhan dan Dermaga Sabah</option>
                                    <option value="47">Jabatan Perancang Bandar dan Wilayah</option>
                                    <option value="48">Jabatan Perkhidmatan Kebajikan Am</option>
                                    <option value="49">Jabatan Hal Ehwal Wanita Negeri</option>
                                    <option value="50">Jabatan Perkhidmatan Pembetungan Negeri Sabah</option>
                                    <option value="51">Jabatan Hidupan Liar</option>
                                    <option value="52">Jabatan Perlindungan Alam Sekitar</option>
                                    <option value="53">Jabatan Muzium Sabah</option>
                                    <option value="54">Jabatan Pembangunan Perindustrian dan Penyelidikan</option>
                                    <option value="55">Perpustakaan Negeri Sabah</option>
                                    <option value="56">Jabatan Pembangunan Sumber Manusia</option>
                                    <option value="57">Jabatan Pembangunan Sumber Manusia</option>
                                    <option value="58">Jabatan Hal Ehwal Agama Islam Negeri Sabah</option>
                                    <option value="59">Jabatan Hal Ehwal Anak Negeri Sabah</option>
                                    <option value="60">Pejabat Daerah Putatan</option>
                                    <option value="61">Pejabat Daerah Telupid</option>
                                    <option value="62">Pejabat Daerah Penampang</option>
                                    <option value="63">Pejabat Daerah Papar</option>
                                    <option value="64">Pejabat Daerah Tuaran</option>
                                    <option value="65">Pejabat Daerah Kota Belud</option>
                                    <option value="66">Pejabat Daerah Ranau</option>
                                    <option value="67">Pejabat Daerah Kudat</option>
                                    <option value="68">Pejabat Daerah Kota Marudu</option>
                                    <option value="69">Pejabat Daerah Pitas</option>
                                    <option value="70">Pejabat Daerah Keningau</option>
                                    <option value="71">Pejabat Daerah Tambunan</option>
                                    <option value="72">Pejabat Daerah Nabawan</option>
                                    <option value="73">Pejabat Daerah Sipitang</option>
                                    <option value="74">Pejabat Daerah Tenom</option>
                                    <option value="75">Pejabat Daerah Beaufort</option>
                                    <option value="76">Pejabat Daerah Kuala Penyu</option>
                                    <option value="77">Pejabat Daerah Kinabatangan</option>
                                    <option value="78">Pejabat Daerah Beluran</option>
                                    <option value="79">Pejabat Daerah Semporna</option>
                                    <option value="80">Pejabat Daerah Lahad Datu</option>
                                    <option value="81">Pejabat Daerah Kunak</option>
                                    <option value="82">Pejabat Daerah Tongod</option>
                                    <option value="83">Pejabat Daerah Kalabakan</option>
                                    <option value="84">Pejabat Daerah Kecil Paitan</option>
                                    <option value="85">Pejabat Daerah Kecil Pagalungan</option>
                                    <option value="86">Pejabat Daerah Kecil Tungku</option>
                                    <option value="87">Pejabat Daerah Kecil Banggi</option>
                                    <option value="88">Pejabat Daerah Kecil Tamparuli</option>
                                    <option value="89">Pejabat Daerah Kecil Menumbok</option>
                                    <option value="90">Pejabat Daerah Kecil Membakut</option>
                                    <option value="91">Pejabat Daerah Kecil Matunggong</option>
                                    <option value="92">Pejabat Daerah Kecil Sook</option>
                                    <option value="93">Pejabat Daerah Kecil Kemabong</option>
                                    <option value="94">Majlis Daerah Putatan</option>
                                    <option value="95">Majlis Daerah Telupid</option>
                                    <option value="96">Majlis Daerah Penampang</option>
                                    <option value="97">Majlis Daerah Papar</option>
                                    <option value="98">Majlis Daerah Tuaran</option>
                                    <option value="99">Majlis Daerah Kota Belud</option>
                                    <option value="100">Majlis Daerah Ranau</option>
                                    <option value="101">Majlis Daerah Kudat</option>
                                    <option value="102">Majlis Daerah Kota Marudu</option>
                                    <option value="103">Majlis Daerah Pitas</option>
                                    <option value="104">Majlis Daerah Keningau</option>
                                    <option value="105">Majlis Daerah Tambunan</option>
                                    <option value="106">Majlis Daerah Nabawan</option>
                                    <option value="107">Majlis Daerah Sipitang</option>
                                    <option value="108">Majlis Daerah Tenom</option>
                                    <option value="109">Majlis Daerah Beaufort</option>
                                    <option value="110">Majlis Daerah Kuala Penyu</option>
                                    <option value="111">Majlis Daerah Kinabatangan</option>
                                    <option value="112">Majlis Daerah Beluran</option>
                                    <option value="113">Majlis Daerah Semporna</option>
                                    <option value="114">Majlis Daerah Lahad Datu</option>
                                    <option value="115">Majlis Daerah Kunak</option>
                                    <option value="116">Majlis Daerah Tongod</option>
                                    <option value="117">Majlis Daerah Kalabakan</option>
                                    <option value="118">Majlis Daerah Kecil Paitan</option>
                                    <option value="119">Majlis Daerah Kecil Pagalungan</option>
                                    <option value="120">Majlis Daerah Kecil Tungku</option>
                                    <option value="121">Majlis Daerah Kecil Banggi</option>
                                    <option value="122">Majlis Daerah Kecil Tamparuli</option>
                                    <option value="123">Majlis Daerah Kecil Menumbok</option>
                                    <option value="124">Majlis Daerah Kecil Membakut</option>
                                    <option value="125">Majlis Daerah Kecil Matunggong</option>
                                    <option value="126">Majlis Daerah Kecil Sook</option>
                                    <option value="127">Majlis Daerah Kecil Kemabong</option>
                                    <option value="128">Majlis Perbandaran Tawau</option>
                                    <option value="130">Majlis Perbandaran Sandakan</option>
                                    <option value="131">Dewan Bandaraya Kota Kinabalu</option>
                                    <option value="132">Lembaga Industri Getah</option>
                                    <option value="133">Koperasi Pembangunan Desa</option>
                                    <option value="134">Korporasi Kemajuan Perikanan dan Nelayan Sabah (Ko-Nelayan)</option>
                                    <option value="135">Sabah Fish Marketing Sdn Bhd (SAFMA)</option>
                                    <option value="136">Lembaga Pelabuhan-pelabuhan Sabah</option>
                                    <option value="137">Lembaga Kemajuan Perhutanan Negeri Sabah (SAFODA)</option>
                                    <option value="138">Lembaga Pembangunan Perumahan dan Bandar</option>
                                    <option value="139">Lembaga Pemegang Amanah Taman-taman Sabah </option>
                                    <option value="140">Lembaga Pelancongan Sabah </option>
                                    <option value="141">Lembaga Kebudayaan Negeri Sabah </option>
                                    <option value="142">Perbadanan Pembangunan Ekonomi Negeri Sabah (SEDCO)</option>
                                    <option value="143">Lembaga Sukan Negeri Sabah </option>
                                    <option value="144">Majlis Ugama Islam Sabah (MUIS)</option>
                                    <option value="145">Lemabaga Kemajuan Tanah Negeri Sabah</option>
                                    <option value="146">Balai Seni Lukis</option>
                                    <option value="147">Kumpulan Yayasan Sabah</option>
                                    <option value="148">Insitut Kajian Pembangunan Sabah (IDS)</option>
                                    <option value="149">Pihak Berkuasa Pembangunan Ekonomi & Pelaburan (SEDIA)</option>
                                    <option value="150">Sabah Energy Corporation Sdn Bhd</option>
                                    <option value="151">Puspanita Cawangan Negeri Sabah</option>
                                    <!--@foreach($list as $senarai)
                                        <option value="{{$senarai->id}}">{{$senarai->Nama_agency}}</option>
                                    @endforeach-->
                                </select>
                                <div class="select-dropdown"></div>
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

                        <!--<div class="p-t-15">
                            <button class="btn btn--radius-2 btn--green" >Add Record</button>
                        </div>-->

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global_form.js"></script>

</body>

</html>
<!-- end document-->