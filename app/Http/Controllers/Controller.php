<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Task;
use App\Planuser;
use App\Plandetail;
use App\Monthlylist;
use App\Monthlyamount;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
      $planDetail = Plandetail::orderBy('created_at', 'asc')->get();
      $tasks = Planuser::orderBy('created_at', 'asc')->get();
      return view('tasks', compact('tasks','planDetail'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required|max:255',
        ]);
      $planUser = new Planuser;
      $planUser->name = $request->name;
      $planUser->mobile_number = $request->mobile;
      $planUser->ph_number = $request->phone;
      $planUser->address = $request->address;
      $planUser->plan_id = $request->plantype;
      $planUser->save();

      return redirect('/');
    }

    public function destroy($id)
    {
      Planuser::findOrFail($id)->delete();

      return redirect('/');
    }

    public function plandetailindex()
    {
          return view('plandetails', [
              'plandetail' => Plandetail::orderBy('created_at', 'asc')->get()
          ]);
    }

    public function storeplandetail(Request $request)
    {
      $this->validate($request, [
            'name' => 'required|max:255',
        ]);
      $planUser = new Plandetail;
      $planUser->name = $request->name;
      $planUser->amount = $request->amount;
      $planUser->no_of_months = $request->numberofmonths;
      $planUser->no_of_users = $request->numberofusers;
      $planUser->save();

      return redirect('/plandetail');
    }

    public function destroyplandetail($id)
    {
      Plandetail::findOrFail($id)->delete();

      return redirect('/plandetail');
    }

    public function monthlylistindex()
    {
      $userInMonthList = array();
        $monthlylist = Monthlylist::join('planusers As plan','plan.id','=','monthlylists.user_id')
                ->select('plan.*', 'monthlylists.id as monthly_id', 'monthlylists.*')->get();
        $now = new \DateTime('now');
//      print_r($now->format('F'));exit;
//        $monthlylist->month = $now->format('F');
        foreach ($monthlylist as $monthlyRecord) {
            if($monthlyRecord->month ==='October') {
//                print"1111";
                $userInMonthList[] = $monthlyRecord->user_id;
            } else{
//                print"0000";
            }

        }//exit;
        $planUserList = Planuser::join('plandetails AS plandetail','plandetail.id','=','planusers.plan_id')
                ->whereNotIn('planusers.id', $userInMonthList)//->where('planusers.plan_id', '=', '1')
                ->select( 'planusers.*','plandetail.*','planusers.name AS planusername','plandetail.name AS planname', 'planusers.id as planusers_id')->get();
//        print"<pre>";print_r($planUserList);exit;
//        $plandetail = Plandetail::get();
        $plandetail = Plandetail::leftJoin('monthlyamounts AS monthlyamounts','monthlyamounts.plan_id','=','plandetails.id')
                ->select( 'monthlyamounts.id AS monthlyamount_id','monthlyamounts.plan_id AS monthlyamount_plan_id',
                        'monthlyamounts.total_tallu_amt AS monthlyamount_tot_tallu_amt',
                        'monthlyamounts.month AS monthlyamount_month',
                        'plandetails.*')->get();
//        print"<pre>";print_r($plandetail);exit;
        return view('monthlylist', compact('planUserList','monthlylist','plandetail'));
    }

    public function monthlylistdetails()
    {
        $monthlylist = Monthlylist::join('planusers As plan','plan.id','=','monthlylists.user_id')
                ->select('plan.*', 'monthlylists.id as monthly_id', 'monthlylists.*')->get();
        return view('monthlylistdetail', compact('monthlylist'));
    }

    public function storemonthlylist(Request $request)
    {
      $this->validate($request, [
            // 'name' => 'required|max:255',
        ]);
      $monthlylist = new Monthlylist;
      $monthlylist->user_id = $request->userId;
      $monthlylist->amount = intval($request->amount);
      $monthlylist->talu_amount = intval($request->talu_amount);
      $monthlylist->to_be_paid = intval($request->to_be_paid);
      $monthlylist->amount_recived = intval($request->amount_recived);
      $monthlylist->balance = intval($request->balance);
      $monthlylist->plan_id = intval($request->planId);
      $now = new \DateTime('now');
//      print_r($now->format('F'));exit;
      $monthlylist->month = $now->format('F');
      // var_dump($request->seet_taken_by);exit;
      if($request->seet_taken_by === 'on') {
          $monthlylist->seet_taken_by = 1;
      } else {
        $monthlylist->seet_taken_by = 0;
      }

      $monthlylist->save();

      return redirect('/monthlylist');
    }

    public function destroymonthlylist($id)
    {
      Monthlylist::findOrFail($id)->delete();

      return redirect('/monthlylistdetails');
    }

    public function updatemonthlylist(Request $request)
    {
        $monthlylist = Monthlylist::where('id', '=', 9)->get();
        print"<pre>";print_r($request->amount_recived);exit;
        return view('monthlydetailsedit', compact('monthlylist'));
//        return view('monthlydetailsedit', [
//              'monthlylist' => $res
//          ]);
//      Monthlylist::findOrFail($id)->delete();
//
//      return redirect('/monthlylistdetails');
    }

    public function storemonthlyamount(Request $request)
    {
//        print_r($request->monthlyamount_id);exit;
//        var_dump($request->monthlyamount_id);exit;
        if($request->monthlyamount_id === ''){
            $monthlyamount = new Monthlyamount;
            $monthlyamount->total_tallu_amt = intval($request->total_tallu_amt);
            $monthlyamount->plan_id = intval($request->plan_id);
            $now = new \DateTime('now');
            $monthlyamount->month = $now->format('F');
            $monthlyamount->save();
        } else {
            $monthlyamountedit = Monthlyamount::where('id', '=', $request->monthlyamount_id)->first();
            if($request->total_tallu_amt !=='') {
                $monthlyamountedit->total_tallu_amt = intval($request->total_tallu_amt);
                $monthlyamountedit->save();
            }
        }
        return redirect('/monthlylist');
    }

    public function importplanusers()
    {
        return view('importuser');
    }

    public function storeplanusers(Request $request)
    {
        $file = fopen($_FILES['file']['tmp_name'],"r");
        $line_of_text = array();
        while (!feof($file) ) {
            $line_of_text[] = fgetcsv($file);
        }
        unset($line_of_text[0]);    // Remove header from the CSV file
        array_pop($line_of_text);    // Remove last row from the CSV file
        foreach ($line_of_text as $key => $line) {
          $planUser = new Planuser;
          $planUser->name = $line[0];
          $planUser->mobile_number = $line[1];
          $planUser->ph_number = $line[2];
          $planUser->address = $line[3];
          $planUser->plan_id = $line[4];
          $planUser->save();           
        }
        return redirect('/');
    }
}
