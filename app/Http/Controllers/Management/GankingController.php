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

class GankingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function init(){

        $data['title'] = 'ganking';
        $data['link']  = 'ganking';

        return $data;
    }

    public static function init_me(){

        $data['title'] = 'ganking';
        $data['link']  = 'me';

        return $data;
    }

    public function ganking()
    {
        $data        = Self::init_me();
        $data['row'] = Ganking::listDataByMe();

        return view('admin.management.ganking.ganking',$data);
    }

    public function index()
    {
        $data        = Self::init();
        $data['row'] = Ganking::listData();

        return view('admin.management.ganking.index',$data);
    }


    public function analisis()
    {
        $data['title'] = 'analisis';
        $data['link']  = 'analisis';
        $data['tabel'] = FALSE;

        return view('admin.management.ganking.analisis',$data);
    }



        public function analisisStore(Request $request)
        {
            $request->validate([
                'start'            => 'required',
                'end'              => 'required',
            ]);

            $data['title'] = 'analisis';
            $data['link']  = 'analisis';
            $data['tabel'] = TRUE;

            $data['row'] = User::addSelect(['loot' => GankingDetail::selectRaw('sum(loot) as total')
                ->whereBetween('created_at', [$request->start, $request->end])
                ->whereColumn('users_id', 'users.id')
                ->groupBy('users_id')
            ])
            ->where('cms_role_id',3)
            ->orderBy('loot', 'DESC')
            ->get();
    
            return view('admin.management.ganking.analisis',$data);
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data               = Self::init();
        return view('admin.management.ganking.create',$data);
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
            'name'              => 'required|string',
            'date'              => 'required',
            'status'            => 'required',
            'description'       => 'required',
        ]);

        $save = Ganking::insertData($request);

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
        $data['row'] = Ganking::detailData($id);
        $data['gank']= GankingDetail::listData($id);
        return view('admin.management.ganking.show',$data);
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
        $data['row'] = Ganking::detailData($id);
        return view('admin.management.ganking.edit',$data);
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
            'name'              => 'required|string',
            'date'              => 'required',
            'status'            => 'required',
            'description'       => 'required',
            'id'                => 'required',
        ]);

        $save = Ganking::updateData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','warning');
        }
    }

    public function qty(Request $request)
    {
        $request->validate([
            'loot'             => 'required',
            'status'           => 'required',
            'id'               => 'required',
        ]);

        $save = Ganking::where('id',$request->id)->update([
            "loot"   => $request->loot,
            "status"=> $request->status
        ]);

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
        
        $delete = Ganking::deleteData($id);

        if($delete){
            return redirect()->back()->with('message','success delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','warning');
        }
    }
}
