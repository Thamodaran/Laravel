<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Product;
use App\User;
use App\Salesentry;
use App\Purchaseentry;
use App\Monthlyamount;
use Illuminate\Http\Request;
Use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
      // $planDetail = Plandetail::orderBy('created_at', 'asc')->get();
      // $tasks = Planuser::orderBy('created_at', 'asc')->get();
      $planDetail = array('test');
      $tasks = array();
      // return view('tasks', compact('tasks','planDetail'));
      return view('purchase');
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

    public function productindex()
    {
        return view('product');
    }

    public function storeproduct(Request $request)
    {
      $product = new Product;
      $product->p_product_name  = $request->p_product_name;
      $product->p_product_code  = $request->p_product_code;
      $product->p_product_model = $request->p_product_model;
      $product->p_tax           = $request->p_tax;
      // $product->p_image         = $request->p_image;
      $product->save();
      return redirect('/product');
    }

    public function destroyproduct($id)
    {
      Product::findOrFail($id)->delete();

      return redirect('/product');
    }

    public function userindex()
    {
      return view('user');
    }

    public function storeuser(Request $request)
    {
      $user = new User;
      $user->u_name  = $request->u_name;
      $user->u_address  = $request->u_address;
      $user->u_mob_number = $request->u_mob_number;
      $user->u_ph_number  = $request->u_ph_number;
      $user->u_e_mail  = $request->u_e_mail;
      $user->u_type  = $request->u_type;
      $user->u_discount  = $request->u_discount;
      $user->save();
      return redirect('/user');
    }

    public function salesindex()
    {
        $salesEntryDetails = Salesentry::orderBy('created_at', 'desc')->get();
        return view('salesentry', compact('salesEntryDetails'));
    }

    public function importindex()
    {
        return view('import');
    }

    public function storesales(Request $request)
    {
      $user = new Salesentry;
      $user->se_product_id  = $request->se_product_code;
      $user->se_user_id  = $request->se_customer_user;
      $user->se_quantity = $request->se_quantity;
      $user->se_total_amt  = $request->se_total_amt;
      $user->se_amt_given  = $request->se_amt_given;
      $user->se_balance  = $request->se_balance;
      $user->se_tax  = $request->se_tax;
      $user->save();
      return redirect('/sales');
    }

    public function salesdetails()
    {
      // $planDetail = Plandetail::orderBy('created_at', 'asc')->get();
        $monthlylist = Salesentry::orderBy('created_at', 'desc')->get();
        return view('monthlylistdetail', compact('monthlylist'));
    }

    public function purchaseindex()
    {
      return view('purchaseentry');
    }

    public function storepurchase(Request $request)
    {
      $user = new Purchaseentry;
      $user->pe_product_id  = 1;//$request->se_product_id;
      $user->pe_user_id  = 1;//$request->se_user_id;
      $user->pe_buy_price = $request->pe_buy_price;
      $user->pe_sell_price  = $request->pe_sell_price;
      $user->pe_quantity  = $request->pe_quantity;
      // $user->pe_tax  = $request->pe_tax;
      $user->pe_comments  = $request->pe_comments;
      $user->save();
      return redirect('/purchase');
    }

    public function searchproduct($term){
      // print_($_GET['q']);exit;
      print_($term);exit;
      $products = Product::where('p_product_name', 'LIKE', '%'.$name.'%')->get();
      print_r($products);exit;
      return $products;
      // return view('product', compact('products');
      // print_r($products);
      // exit;
    }

    public function pdfsales() {
      $salesentry = Salesentry::orderBy('created_at', 'desc')->get();
      $pdf = PDF::loadView('pdfview', compact('salesentry'));
      // print_r($pdf);exit;
      // return $pdf->stream('pdfview.pdf');
      // echo $html;
      // return $pdf->download($html);
      // return view('pdfview', compact('salesentry'));
      return $pdf->stream('pdfview.pdf');
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

    public function import(Request $request)
    {
        if ($_FILES['user_file']['error'] !== 4) {
          $file = fopen($_FILES['user_file']['tmp_name'],"r");
          $line_of_text = array();
          while (!feof($file) ) {
              $line_of_text[] = fgetcsv($file);
          }
          unset($line_of_text[0]);    // Remove header from the CSV file
          array_pop($line_of_text);    // Remove last row from the CSV file
          foreach ($line_of_text as $key => $line) {
            $user = new User;
            $user->u_name  = $line[0];
            $user->u_address  = $line[1];
            $user->u_mob_number = $line[2];
            $user->u_ph_number  = $line[3];
            $user->u_e_mail  = $line[4];
            $user->u_type  = $line[5];
            $user->u_discount  = $line[6];
            $user->save();
          }
        }
        return redirect('/');
    }
}
