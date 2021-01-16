<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function history(){
        $headers = Header::where('user_id', '=', Auth::user()->id)->get();

        return view('users.history-transaction',compact('headers'));
    }

    public function detailTransaction($id){
        $headers = Header::find($id);
        $details = Detail::where('header_id', '=', $headers->id)->get();

        $totalqty = 0;
        $grandtotal = 0;

        foreach ($details as $detail) {
            $subtotal = 0;

            $totalqty += $detail->qty;
            $subtotal = $detail->product->price * $detail->qty;
            $grandtotal += $subtotal;
        }

        return view('users.transaction-detail', compact('details','subtotal','totalqty','grandtotal'));
    }

    public function viewTransaction(){
        $transactions = Header::all();

        return view('admins.transaction-list',compact('transactions'));
    }

    public function detailTransactionAdmin($id){
        $headers = Header::find($id);
        $details = Detail::where('header_id', '=', $headers->id)->get();

        $totalqty = 0;
        $grandtotal = 0;

        foreach ($details as $detail) {
            $totalqty += $detail->qty;
            $subtotal = $detail->product->price * $detail->qty;
            $grandtotal += $subtotal;
        }

        return view('admins.transaction-detail-admin', compact('details','subtotal','totalqty','grandtotal'));
    }
}
