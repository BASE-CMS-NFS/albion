<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Validator;
use Hash;
#HELPER
use Cron;
use Date;
use Fibonanci;
use Helper;
use Nfs;
use Payments;
use Wa;
#MODEL
use App\Models\User;
use App\Models\Cms\Role;
use App\Models\Management\Ganking;
use App\Models\Management\GankingDetail;
use App\Models\Management\GankingPict;


class DashboardController extends Controller
{
    public static function init(){
        $data['link']='dashboard';
        $data['title'] = 'dashboard';
        return $data;
    }
    
    public function index(){
        $data = Self::init();
        $data['row'] = Ganking::listDataActive();
        return view('admin.dashboard.dashboard',$data);
    }
}
