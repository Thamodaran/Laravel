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
use App\Order;
use Illuminate\Http\Request;
Use PDF;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $planDetail = array('test');
        $tasks = array();
        return view('purchase');
    }

    public function store(Request $request) {
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

    public function destroy($id) {
        Planuser::findOrFail($id)->delete();
        return redirect('/');
    }

    public function productindex() {
        return view('product');
    }

    public function productlist() {
      $products = Product::orderBy('created_at', 'desc')->get();
        return view('productlist', compact('products'));
    }

    public function storeproduct(Request $request) {
        $product = new Product;
        $product->p_product_name = $request->p_product_name;
        $product->p_product_code = $request->p_product_code;
        $product->p_product_model = $request->p_product_model;
        $product->p_hsn_sac_code = $request->p_hsn_sac_code;
        $product->p_cgst_percentage = $request->p_cgst_percentage;
        $product->p_sgst_percentage = $request->p_sgst_percentage;
        // $product->p_image         = $request->p_image;
        $product->save();
        return redirect('/product');
    }

    public function destroyproduct($id) {
        Product::findOrFail($id)->delete();

        return redirect('/product');
    }

    public function userindex() {
        return view('user');
    }

    public function storeuser(Request $request) {
        $user = new User;
        $user->u_name = $request->u_name;
        $user->u_address = $request->u_address;
        $user->u_mob_number = $request->u_mob_number;
        $user->u_ph_number = $request->u_ph_number;
        $user->u_e_mail = $request->u_e_mail;
        $user->u_type = $request->u_type;
        $user->u_discount = $request->u_discount;
        $user->save();
        return redirect('/user');
    }

    public function salesindex() {
//        $salesEntryDetails = Salesentry::orderBy('created_at', 'desc')->get();
        // $salesEntryDetails = Salesentry::where("se_bill_no", "=", 0)->get();
        $salesEntryDetails = Salesentry::join('products', 'p_id', '=', 'se_product_id')
                                        ->join('users', 'u_id', '=', 'se_user_id')->where("se_bill_no", "=", 0)->get();
      //  print"<pre>";print_r($salesEntryDetails);exit;
        return view('salesentry', compact('salesEntryDetails'));
    }

    public function importindex() {
        return view('import');
    }

    public function salesdetails() {
        // $planDetail = Plandetail::orderBy('created_at', 'asc')->get();
        $monthlylist = Salesentry::orderBy('created_at', 'desc')->get();
        return view('monthlylistdetail', compact('monthlylist'));
    }

    public function showuser($id) {
        $userDetail = User::where('u_id', '=', $id)->first();
        return $userDetail;
    }

    public function purchaseindex() {
        return view('purchaseentry');
    }

    public function storepurchase(Request $request) {
        $user = new Purchaseentry;
        $user->pe_product_id = 1; //$request->se_product_id;
        $user->pe_user_id = 1; //$request->se_user_id;
        $user->pe_buy_price = $request->pe_buy_price;
        $user->pe_sell_price = $request->pe_sell_price;
        $user->pe_quantity = $request->pe_quantity;
        // $user->pe_tax  = $request->pe_tax;
        $user->pe_comments = $request->pe_comments;
        $user->save();
        return redirect('/purchase');
    }

    public function searchproduct($term) {
        $products = Product::where('p_product_name', 'LIKE', '%' . $name . '%')->get();
        print_r($products);
        exit;
        return $products;
    }

    public function pdfsales() {
        $lastOrder = Order::orderBy('created_at', 'desc')->first();
        if(count($lastOrder) > 0) {
        $salesentry = Salesentry::join('products', 'p_id', '=', 'se_product_id')
                                    ->join('users', 'u_id', '=', 'se_user_id')
                                    ->join('purchaseentries', 'pe_product_id', '=', 'p_id')
                                    ->where("se_bill_no", '=', $lastOrder->o_id)->get();
        } else {
            $salesentry = array();
        }
        $pdf = PDF::loadView('pdfview', compact('salesentry'));
        return $pdf->stream('pdfview.pdf');
    }

    public function storeOrder(Request $request) {
        $order = new Order;
        $order->o_user_id = $request->userId;
        $order->o_sgst_total_amt = 22;
        $order->o_cgst_total_amt = 25;
        $order->o_total_amt = $request->amountGiven;
        $order->o_order_date = Date('2017-12-25');
        $order->o_amt_given = 2500;
        $order->save();
        $lastOrder = Order::orderBy('created_at', 'desc')->first();
        Salesentry::where('se_bill_no','=', 0)->update(['se_bill_no' => $lastOrder->o_id]);
    }

    public function monthlylistindex() {
        $userInMonthList = array();
        $monthlylist = Monthlylist::join('planusers As plan', 'plan.id', '=', 'monthlylists.user_id')
                        ->select('plan.*', 'monthlylists.id as monthly_id', 'monthlylists.*')->get();
        $now = new \DateTime('now');
//      print_r($now->format('F'));exit;
//        $monthlylist->month = $now->format('F');
        foreach ($monthlylist as $monthlyRecord) {
            if ($monthlyRecord->month === 'October') {
//                print"1111";
                $userInMonthList[] = $monthlyRecord->user_id;
            } else {
//                print"0000";
            }
        }//exit;
        $planUserList = Planuser::join('plandetails AS plandetail', 'plandetail.id', '=', 'planusers.plan_id')
                        ->whereNotIn('planusers.id', $userInMonthList)//->where('planusers.plan_id', '=', '1')
                        ->select('planusers.*', 'plandetail.*', 'planusers.name AS planusername', 'plandetail.name AS planname', 'planusers.id as planusers_id')->get();
//        print"<pre>";print_r($planUserList);exit;
//        $plandetail = Plandetail::get();
        $plandetail = Plandetail::leftJoin('monthlyamounts AS monthlyamounts', 'monthlyamounts.plan_id', '=', 'plandetails.id')
                        ->select('monthlyamounts.id AS monthlyamount_id', 'monthlyamounts.plan_id AS monthlyamount_plan_id', 'monthlyamounts.total_tallu_amt AS monthlyamount_tot_tallu_amt', 'monthlyamounts.month AS monthlyamount_month', 'plandetails.*')->get();
//        print"<pre>";print_r($plandetail);exit;
        return view('monthlylist', compact('planUserList', 'monthlylist', 'plandetail'));
    }

    public function monthlylistdetails() {
        $monthlylist = Monthlylist::join('planusers As plan', 'plan.id', '=', 'monthlylists.user_id')
                        ->select('plan.*', 'monthlylists.id as monthly_id', 'monthlylists.*')->get();
        return view('monthlylistdetail', compact('monthlylist'));
    }

    public function storemonthlylist(Request $request) {
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
        if ($request->seet_taken_by === 'on') {
            $monthlylist->seet_taken_by = 1;
        } else {
            $monthlylist->seet_taken_by = 0;
        }

        $monthlylist->save();

        return redirect('/monthlylist');
    }

    public function destroymonthlylist($id) {
        Monthlylist::findOrFail($id)->delete();

        return redirect('/monthlylistdetails');
    }

    public function getproduct($id) {
//        print"<pre>";print_r(intval($id));exit;
        $product = Product::where("p_id", "=", intval($id))->first();
//        print"<pre>";print_r($product);exit;
        return $product;
    }

    public function updatemonthlylist(Request $request) {
        $monthlylist = Monthlylist::where('id', '=', 9)->get();
        print"<pre>";
        print_r($request->amount_recived);
        exit;
        return view('monthlydetailsedit', compact('monthlylist'));
//        return view('monthlydetailsedit', [
//              'monthlylist' => $res
//          ]);
//      Monthlylist::findOrFail($id)->delete();
//
//      return redirect('/monthlylistdetails');
    }

    public function import(Request $request) {
        if ($_FILES['user_file']['error'] !== 4) {
            $file = fopen($_FILES['user_file']['tmp_name'], "r");
            $line_of_text = array();
            while (!feof($file)) {
                $line_of_text[] = fgetcsv($file);
            }
            unset($line_of_text[0]);    // Remove header from the CSV file
            array_pop($line_of_text);    // Remove last row from the CSV file
            foreach ($line_of_text as $key => $line) {
                $user = new User;
                $user->u_name = $line[0];
                $user->u_address = $line[1];
                $user->u_mob_number = $line[2];
                $user->u_ph_number = $line[3];
                $user->u_e_mail = $line[4];
                $user->u_type = $line[5];
                $user->u_discount = $line[6];
                $user->save();
            }
        }
        return redirect('/');
    }

    public function highchart()

{
  return view('highchart');
    // $viewer = View::select(DB::raw("SUM(numberofview) as count"))
    //
    //     ->orderBy("created_at")
    //
    //     ->groupBy(DB::raw("year(created_at)"))
    //
    //     ->get()->toArray();
    //
    // $viewer = array_column($viewer, 'count');
    //
    //
    //
    // $click = Click::select(DB::raw("SUM(numberofclick) as count"))
    //
    //     ->orderBy("created_at")
    //
    //     ->groupBy(DB::raw("year(created_at)"))
    //
    //     ->get()->toArray();
    //
    // $click = array_column($click, 'count');
    //
    // return view('highchart')
    //
    //         ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
    //
    //         ->with('click',json_encode($click,JSON_NUMERIC_CHECK));

}

}
