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

        $ag_idn = Agencies::where('id_n', '=', $agency_id)->pluck('id_n');
        $ag_name = Agencies::where('id_n', '=', $agency_id)->pluck('Nama_agency');

        $agc_name = $ag_name[0];
        $agc_id = $ag_idn[0];

        return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id]);
    }

    public function add_record($name_unique, $id_unique){
        return view('Form_active', ['name_unique'=>$agc_name, 'id_unique'=>$agc_id]);
    }

    public function update_active(Request $request) {
        $agency_session = request('unique_name');
        $agency_id =  request('unique_id');
        $dateTime = request('datentime');

        $active_case = new active;

        $active_case->Name = request('first_name');
        $active_case->Status = request('status');
        $active_case->ref_key = $agency_id;
        $active_case->dateTime = $dateTime;

        $active_case->save();
        //dd($active_case);
        return view('Form_active', ['name_unique'=>$agency_session, 'id_unique'=>$agency_id, 'Time'=>$dateTime]);
    } 

    public function update_surveilance() {
        $agency_session = request('unique_name');
        $agency_id =  request('unique_id');

        $surveilance_case = new Surveilance;

        $surveilance_case->Q_Center = request('centerq');
        $surveilance_case->House_Q = request('houseq');
        $surveilance_case->ref_key = $agency_id;

        //dd($surveilance_case);
        $surveilance_case->save();
        return view('home_alternate');
    } 

    public function surveilances($id, $name, $time) {
        //$agency_session = request('unique_name');
        //$agency_id =  request('unique_id');
        //dd($id, $name);

        return view('Form_surveilance',['name_unique'=>$name, 'id_unique'=>$id, 'dateTime'=>$time]);
    }

}
