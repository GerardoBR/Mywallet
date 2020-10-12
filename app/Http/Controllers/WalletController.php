<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
class WalletController extends Controller
{
    //
    // use RefreshDatabase;
    public function index(){
        // dd("hola");
        $wallet = Wallet::firstOrFail();
        return response()->json($wallet->load('transfers'),200);
    }
   
}
