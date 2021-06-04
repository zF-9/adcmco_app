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

class updateController extends Controller
{
    public function select_agency(Request $request) {
        $agency_id = request('agencies'); 
        //dd($agency_id); //index on DB start with 0 = find workaround; 

        $dateToday = date('d/m/Y'); 
        //$dateYesterday = $dateToday - 1;
        $dateYesterday = date('d/m/Y',strtotime("-2 days"));
        //$dateToday->modify('-1 day');
        //dd($dateYesterday);

        if($agency_id - 1 == 0){
            $agency_id = 1 ;
        }
        else {
            $agency_id = $agency_id - 1;
        }

        $ag_idn = Agencies::where('id_n', '=', $agency_id)->pluck('id_n');
        $ag_name = Agencies::where('id_n', '=', $agency_id)->pluck('Nama_agency');

        $agc_name = $ag_name[0];
        $agc_id = $ag_idn[0];

        //dd($agc_id);

        $data_echo = active::where('ref_key', '=', $agc_id)->where('dateTime', '=', $dateYesterday)->join('agencies', 'agencies.id_n', 'actives.ref_key')->get();
        //dd($data_echo);

        return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id, 'raw_echo'=>$data_echo]);
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
        $dateTime = request('datentime');

        $active_case = new active;

        $active_case->Name = request('first_name');
        $active_case->Status = request('status');
        $active_case->ref_key = $agency_id;
        $active_case->dateTime = $dateToday;

        $active_case->save();

        $data_echo = Active::where('ref_key', '=', $agency_id)->where('dateTime', '=', $dateYesterday)->get();
        //->join('agencies', 'agencies.id_n', 'actives.ref_key')
        //->get();
        dd($dateYesterday);

        return view('Form_active', ['name_unique'=>$agency_session, 'id_unique'=>$agency_id, 'raw_echo'=>$data_echo]);
    } 

    public function update_surveilance() {
        $agency_session = request('unique_name');
        $agency_id =  request('unique_id');
        $dateToday = date('d/m/Y');

        $surveilance_case = new Surveilance;

        $surveilance_case->Q_Center = request('centerq');
        $surveilance_case->House_Q = request('houseq');
        $surveilance_case->ref_key = $agency_id;
        $surveilance_case->dateTime = $dateToday;

        $surveilance_case->save();
        return view('home_alternate');
    } 

    public function surveilances($id, $name) {
        return view('Form_surveilance',['name_unique'=>$name, 'id_unique'=>$id]);
    }

    public function debug_page($id_a) {
        $data_record = Active::where('ref_key', '=', $id_a)->pluck('dateTime'); 
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

        $data_echo = Active::where('ref_key', '=', $id_a)->where('dateTime', '=', $dateYesterday)
                    ->join('agencies', 'agencies.id_n', 'actives.ref_key')
                    ->get();
        //dd($data_echo);

        return view('tables', ['raw_echo'=>$data_echo]);
    }

}
