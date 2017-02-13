<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Services\AgreementService;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
Use Auth;


class AgreementController extends Controller
{
    protected $agreementServices;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function pdfAgreement($id)
    {
       $getSource = Balance::findOrFail($id);
        $pdf = \PDF::loadView('agreement.pdf', $getSource);
        $link = str_random(7);
        //dd($pdf);
      //  return $pdf->inline();
        return $pdf->inline($getSource->created_at->toDateString().'-'.$link . '.pdf');

    }
    public  function newtest(){
        return view('agreement.pdf');
    }
}
