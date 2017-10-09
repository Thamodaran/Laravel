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
//      print_r($request->plantype);exit;
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
        $plandetail = Plandetail::get();
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
      // print"<pre>";var_dump($request->userId);exit;
      $monthlylist->user_id = $request->userId;
      $monthlylist->amount = $request->amount;
      $monthlylist->talu_amount = $request->talu_amount;
      $monthlylist->to_be_paid = $request->to_be_paid;
      $monthlylist->amount_recived = $request->amount_recived;
      $monthlylist->balance = $request->balance;
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
}
