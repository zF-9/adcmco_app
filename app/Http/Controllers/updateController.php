<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic;
use App\Active;
use App\Agencies;
use App\Surveilance;
use Carbon\Carbon;

class updateController extends Controller
{
    public function datatable() {
        $active_list = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->get();
        //dd($active_list);
        $k_p = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Pusat')->get();
        $k_h = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Hospital')->get();
        $k_r = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Rumah')->get();
        $s = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Sembuh')->get();
        $m = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Mati')->get();   
        
        $passive_list = DB::table('surveilances')->join('agencies', 'agencies.id_n', 'surveilances.ref_key')->get();
        //dd($passive_list);
        $hq = $passive_list->sum('House_Q');
        $qc = $passive_list->sum('Q_Center');

        return view('tables', ['active'=>$active_list, 'passive'=> $passive_list, 'kp'=>$k_p, 'kh'=> $k_h, 'kr'=> $k_r, 's'=> $s, 'm' => $m, 'hq' => $hq, 'qc' => $qc ]);
    }

    public function log_data() {
        $DateToday = date('d/m/y'); 
        $DateYesterday = date('d/m/Y',strtotime("-1 days"));
        //get query from datepicker from front end and then refresh using the same page
        
        $a_list = DB::table('agencies')->join('actives', 'actives.ref_key', 'agencies.id_n')->join('surveilances', 'surveilances.ref_key', 'agencies.id_n')->orderBy('Nama_agency')->get();//->toArray();
        $agency_count = $a_list->groupBy('Nama_agency');//->where('dateTime', '=', $DateYesterday);//->toArray();

        //dd($agency_count);
        $b_list = DB::table('agencies')->join('surveilances', 'surveilances.ref_key', 'agencies.id_n')->orderBy('Nama_agency')->get();
        $survl_count = $b_list->groupBy('Nama_agency');//->where('dateTime', '=', $DateYesterday);

        // check for day before record before front end
        return view('tables-log_data', ['list_agencies'=>$agency_count, 'list_surveil'=>$survl_count]);     
    }

    public function filter_log_data(Request $request) {
        $datetime = request('date_time');    
        //dd($datetime);  

        $a_list = DB::table('agencies')->join('actives', 'actives.ref_key', 'agencies.id_n')
                ->join('surveilances', 'surveilances.ref_key', 'agencies.id_n')
                ->orderBy('Nama_agency')->where('dateTimeII', '=', $datetime)->get();//->toArray();
        $agency_count = $a_list->groupBy('Nama_agency');//->toArray();

        $b_list = DB::table('agencies')->join('surveilances', 'surveilances.ref_key', 'agencies.id_n')->orderBy('Nama_agency')->where('dateTimeII', '=', $datetime)->get();
        $survl_count = $b_list->groupBy('Nama_agency');

        //dd($agency_count);
        //dd([$datetime, $agency_count]);
        // check for day before record before front end
        return view('tables-log_data', ['list_agencies'=>$agency_count, 'list_surveil'=>$survl_count]);          
    }

    public function chartboard(){
        $DateToday = date('d/m/y'); 
        $DateYesterday = date('d/m/Y',strtotime("-1 days"));
        
        $active_list = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->get();
        //dd($active_list);
        $k_p = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Pusat')->get();
        $k_h = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Hospital')->get();
        $k_r = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Rumah')->get();
        $s = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Sembuh')->get();
        $m = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Mati')->get();



        $k_p_yd =  DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Pusat')->where('dateTimeI', '=', $DateYesterday)->get();
        $K_h_yd = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Hospital')->where('dateTimeI', '=', $DateYesterday)->get();
        $k_r_yd = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Kuarantin Rumah')->where('dateTimeI', '=', $DateYesterday)->get();
        $s_yd = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Sembuh')->where('dateTimeI', '=', $DateYesterday)->get();
        $m_yd = Active::join('agencies', 'agencies.id_n', 'actives.ref_key')->where('Status', '=', 'Mati')->where('dateTimeI', '=', $DateYesterday)->get();
        //dd($m_yd);

        $passive_list = DB::table('surveilances')->join('agencies', 'agencies.id_n', 'surveilances.ref_key')->get();
        //dd($passive_list);
        $hq = $passive_list->sum('House_Q');
        $qc = $passive_list->sum('Q_Center');

        $pui_qc = $passive_list->where('dateTime', '=', $DateToday)->count();
        //$pui_hq = $passive_list->where('')->where('dateTime', '=', $DateToday)->count();

        //dd([$hq, $qc]);

        //$case_yesterday = $active_list::where('updated_at', date('m'))->get();
        //dd($case_yesterday);

        //$hq_month = $passive_list->where('updated_at', '=', $MonthToday)->get();
        //dd($pui_qc);

        $raw = Surveilance::query()
        ->whereYear('updated_at', now())//->year -1)
        ->get()
        ->pluck('updated_at');

        //dd($raw);
        
        $data = [];
        foreach ($raw as $i=>$date) {
            $data[$i] = Carbon::parse($date)->format('m');
            if(  Carbon::parse($date)->format('m')[0] != 0 ){
                $data[$i] = Carbon::parse($date)->format('m');
            }else{
                $data[$i] = str_replace('0','',Carbon::parse($date)->format('m'));
            }
            //dd($i);
        }

        //dd($data);
        
        $dataValues = array_count_values($data);

        //$timestemp = DB::table('actives')->join('agencies', 'agencies.id_n', 'actives.ref_key')->where('dateTime', '=', $DateToday)->get();
        //$month = Carbon::createFromFormat('d/m/y', $timestemp)->month;
        //dd($month);
        
        //dd($dataValues);
        //dd($MonthToday);

        /*if (array_key_exists($MonthToday, $dataValues))
        {
            dd("yup this one exist");
        }  
        else {
            dd("nope can't find any");
        }*/

        return view('dashboard', ['active'=>$active_list, 'passive'=> $passive_list, 'kp'=>$k_p, 'kh'=> $k_h, 'kr'=> $k_r, 's'=> $s, 'm' => $m, 'hq' => $hq, 'qc' => $qc, 'under_s' => $dataValues ]);
    }

    public function select_agency(Request $request) {
        $agency_id = request('agencies'); 
        //dd($agency_id); //index on DB start with 0 = find workaround; 

        $dateToday = date('d/m/Y'); 
        //$dateYesterday = $dateToday - 1;
        $dateYesterday = date('d/m/Y',strtotime("-1 days"));
        //$dateToday->modify('-1 day');
        //dd($dateYesterday);

        //if($agency_id - 1 <= 0){
        //    $agency_id = 1 ;
        //}
        //else {
            //$agency_id = $agency_id - 1 ;
        //}

        dd($agency_id);

        $ag_idn = Agencies::where('id_n', '=', $agency_id)->pluck('id_n');
        $ag_name = Agencies::where('id_n', '=', $agency_id)->pluck('Nama_agency');

        //dd([$ag_idn, $ag_name]);

        $agc_name = $ag_name[0];
        $agc_id = $ag_idn[0];

        $data_clone = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateYesterday)
                    ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                    ->get();

        $data_echo = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateToday)
                    ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                    ->get();
      
        //dd($data_clone, $data_echo);
        $Error = 'none';
        return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id, 
                    'raw_echo'=>$data_echo, 'raw_clone'=>$data_clone, 'Today'=>$dateToday, 
                    'Yesterday'=>$dateYesterday, 'ErrorMsg'=>$Error]);
    }

    public function add_record($name_unique, $id_unique){
        return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id]);
    }

    public function update_active(Request $request) {
        $dateToday = date('d/m/Y'); 
        //$dateYesterday = $dateToday - 1;
        $dateYesterday = date('d/m/Y',strtotime("-1 days"));
        //$dateToday->modify('-1 day');
        //dd($dateYesterday);

        $agency_session = request('unique_name');
        $agency_id =  request('unique_id');
        $dateTimeI = request('datentime');
        $Status = request('status');
        $CaseName = request('first_name');

        if($Status == ""){
            $ag_idn = Agencies::where('id_n', '=', $agency_id)->pluck('id_n');
            $ag_name = Agencies::where('id_n', '=', $agency_id)->pluck('Nama_agency');
    
            //dd([$ag_idn, $ag_name]);
    
            $agc_name = $ag_name[0];
            $agc_id = $ag_idn[0];
    
            $data_clone = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateYesterday)
                        ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                        ->get();
    
            $data_echo = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateToday)
                        ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                        ->get();
          
            //dd($data_clone, $data_echo);
            $Error = 'Sila pastikan ruangan *Status* dilengkapkan';
            //dd($Error);
    
            return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id, 
                        'raw_echo'=>$data_echo, 'raw_clone'=>$data_clone, 'Today'=>$dateToday, 
                        'Yesterday'=>$dateYesterday, 'ErrorMsg'=>$Error]);
        }

        elseif($CaseName == ""){
            $ag_idn = Agencies::where('id_n', '=', $agency_id)->pluck('id_n');
            $ag_name = Agencies::where('id_n', '=', $agency_id)->pluck('Nama_agency');
    
            //dd([$ag_idn, $ag_name]);
    
            $agc_name = $ag_name[0];
            $agc_id = $ag_idn[0];
    
            $data_clone = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateYesterday)
                        ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                        ->get();
    
            $data_echo = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateToday)
                        ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                        ->get();
          
            //dd($data_clone, $data_echo);
            $Error = 'Sila pastikan ruangan *Nama* dilengkapkan';
            //dd($Error);
    
            return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id, 
                        'raw_echo'=>$data_echo, 'raw_clone'=>$data_clone, 'Today'=>$dateToday, 
                        'Yesterday'=>$dateYesterday, 'ErrorMsg'=>$Error]);
        }

        else{
            $active_case = new active;

            $active_case->Name = request('first_name');
            $active_case->Status = request('status');
            $active_case->ref_key = $agency_id;
            $active_case->dateTimeI = $dateToday;
    
            $active_case->save();
    
            $data_clone = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateYesterday)
                        ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                        ->get();
    
            $data_echo = Active::where('ref_key', '=', $agency_id)->where('dateTimeI', '=', $dateToday)
                        ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                        ->get();
          
            //dd($data_clone, $data_echo);
            $Error = 'none';
            return view('Form_active', ['name_unique'=>$agency_session, 'id_unique'=>$agency_id, 
                        'raw_echo'=>$data_echo, 'raw_clone'=>$data_clone, 'Today'=>$dateToday, 
                        'Yesterday'=>$dateYesterday, 'ErrorMsg'=>$Error]);
        }
    } 

    public function update_surveilance() {
        $agency_session = request('unique_name');
        $agency_id =  request('unique_id');
        $dateToday = date('d/m/Y');

        $surveilance_case = new Surveilance;

        $surveilance_case->Q_Center = request('centerq');
        $surveilance_case->House_Q = request('houseq');
        $surveilance_case->ref_key = $agency_id;
        $surveilance_case->dateTimeII = $dateToday;

        $surveilance_case->save();
        return view('thankyou', ['agensi_n'=>$agency_session, 'agensi_id'=>$agency_id ]);
    } 

    public function surveilances($id, $name) {
        return view('Form_surveilance',['name_unique'=>$name, 'id_unique'=>$id]);
    }

    public function debug_page($id_a) {
        $data_record = Active::where('ref_key', '=', $id_a)->pluck('dateTimeI'); 
        $dateToday = date('d/m/Y'); 
        
        dd($data_record, $dateToday);

        if($data_record == $dateToday) {
            dd("yes");
        }
        else {
            dd("no");
        }
    }

    public function tableview($id_a) {
        $dateToday = date('d/m/Y'); 
        //$dateYesterday = $dateToday - 1;
        $dateYesterday = date('d/m/Y',strtotime("-1 days"));
        //$dateToday->modify('-1 day');
        //dd($dateYesterday);

        $data_echo = Active::where('ref_key', '=', $id_a)->where('dateTimeI', '=', $dateYesterday)
                    ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                    ->get();
        //dd($data_echo);

        return view('tables', ['raw_echo'=>$data_echo]);
    }

}
