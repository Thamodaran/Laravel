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
      $planUser->name = $request->name;
      $planUser->mobile_number = $request->mobile;
      $planUser->ph_number = $request->phone;
      $planUser->address = $request->address;
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
              // 'tasks' => Task::orderBy('created_at', 'asc')->get()
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
        $monthlylist = Monthlylist::join('planusers','planusers.id','=','monthlylists.user_id')->get();
        foreach ($monthlylist as $key => $monthlyRecord) {
          $userInMonthList[] = $monthlyRecord->user_id;
        }
        $planUserList = Planuser::whereNotIn('id', $userInMonthList)->get();//orderBy('created_at', 'asc')->get();
        return view('monthlylist', compact('planUserList','monthlylist'));
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

      return redirect('/monthlylist');
    }
}
