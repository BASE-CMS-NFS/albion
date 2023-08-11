<?php

namespace App\Http\Controllers\Management;

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
use App\Models\Management\Kupon;
use App\Models\Management\Tutorial;

class TutorialController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function init(){

        $data['title'] = 'tutorial';
        $data['link']  = 'tutorial';

        return $data;
    }

    public function pemula()
    {
        $data        = Self::init();
        $data['row'] = Tutorial::listDataPemula();

        return view('admin.management.tutorial.pemula',$data);
    }



    public function index()
    {
        $data        = Self::init();
        $data['row'] = Tutorial::listData();

        return view('admin.management.tutorial.index',$data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data               = Self::init();
        return view('admin.management.tutorial.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url'               => 'required|string',
            'judul'             => 'required',
            'description'       => 'required',
        ]);

        $save = Tutorial::insertData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','warning');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data        = Self::init();
        $data['row'] = Tutorial::detailData($id);
        return view('admin.management.tutorial.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data        = Self::init();
        $data['row'] = Tutorial::detailData($id);
        return view('admin.management.tutorial.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'url'               => 'required|string',
            'judul'             => 'required',
            'description'       => 'required',
            'id'                => 'required',
        ]);

        $save = Tutorial::updateData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','warning');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete = Tutorial::deleteData($id);

        if($delete){
            return redirect()->back()->with('message','success delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','warning');
        }
    }
}
