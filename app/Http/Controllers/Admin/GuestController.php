<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

#PACKAGE
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
use Storage;
#HELPER
use Cron;
use Date;
use Fibonanci;
use Helper;
use Nfs;
use Payments;
use Wa;
#MICROSERVICES
use App\Models\Management\Ganking;
use App\Models\Management\GankingDetail;
use App\Models\Management\GankingPict;
use App\Models\User;
use App\Models\Management\Tutorial;


class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function forget()
    {
        return view('admin.auth.forget');
    }

    public function verifikasi()
    {
        return view('admin.auth.confirm');
    }

    public function welcome()
    {
        $data['link'] = 'home';
        $data['users'] = User::addSelect(['loot' => GankingDetail::selectRaw('sum(loot) as total')
        ->whereColumn('users_id', 'users.id')
        ->groupBy('users_id')
    ])
        ->where('cms_role_id',3)
        ->orderBy('loot', 'DESC')
        ->limit(4)->get();

        
        $data['tutorial'] = Tutorial::limit(2)->get();
        return view('welcome',$data);
    }

    public function member(){

        $data['users'] = User::addSelect(['loot' => GankingDetail::selectRaw('sum(loot) as total')
        ->whereColumn('users_id', 'users.id')
        ->groupBy('users_id')
    ])
        ->where('cms_role_id',3)
        ->orderBy('loot', 'DESC')
        ->get();

        $data['link'] = 'member';

        return view('member',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
