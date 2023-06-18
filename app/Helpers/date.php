<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
use App\Models\Management\Ganking;
use App\Models\Management\GankingDetail;
use App\Models\Management\GankingPict;
use App\Models\User;
 
use Illuminate\Support\Facades\DB;
 
class Date {
   
    public static function addDate($val){
        date_default_timezone_set('Asia/Jakarta');
        $date       = date('Y-m-d');
        $format     = str_replace('-', '/', $date);
        $result     = date('Y-m-d',strtotime($format . "+".$val." days"));

        return $result;
    }

    public static function minDate($val){
        $date = date('Y-m-d');
        $result = date('Y-m-d',(strtotime ( '-'.$val.' day' , strtotime ( $date) ) ));

        return $result;
    }

    public static function now(){

        return date('Y-m-d');
    }

    public static function split_loot($id,$ganking_id){
        $gank   = Ganking::where('id',$ganking_id)->first();
        $detail = GankingDetail::where('id',$id)->first();

        if ($gank->loot != 0 and $detail->presentase){

            $loot = ($detail->presentase * $gank->loot) / 100;

            if($detail->regear != 0){
                $data = $loot + $detail->regear;
            }else{
                $data = $loot;
            }

        }else{
            $data = 0;
        }


        return number_format($data,2);
    }

    public static function split_item($id,$ganking_id){
        $gank   = Ganking::where('id',$ganking_id)->first();
        $detail = GankingDetail::where('id',$id)->first();

        if ($gank->qty != 0 and $detail->presentase){

            $data = ($detail->presentase * $gank->qty) / 100;

        }else{
            $data = 0;
        }

        return number_format($data,2);
    }


    public static function presentase($play_time,$ganking_id, $id){

        $total_time = GankingDetail::where('ganking_id',$ganking_id)->sum('play_time');

        if($total_time != 0){

            $pres = (100 * $play_time) / $total_time;

            $data['presentase'] = $pres;

            $update = GankingDetail::where('id',$id)->update($data);
        }else{
            $pres = 0;
        }

        return number_format($pres,2);
    }

    public static function diff($time_start, $time_end, $id)
    {

        if($time_start != null and $time_end != null ){
            $to     = Carbon::parse( $time_end);
            $from   = Carbon::parse( $time_start);
        
            $diffInMinutes = $to->diffInMinutes($from);

            $data['play_time'] = $diffInMinutes;

            $update = GankingDetail::where('id',$id)->update($data);

        }else{
            $diffInMinutes = 0;

            $data['play_time'] = $diffInMinutes;

            $update = GankingDetail::where('id',$id)->update($data);
        }

            return $diffInMinutes;
    }

}