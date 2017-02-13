<?php

namespace App\Http\Controllers;
Use App\Bank;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use DB;
class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['banklist'] = [
            'AFFIN BANK' => 'AFFIN BANK BERHAD',
            'AL RAJHI BANKING' => 'AL RAJHI BANKING AND INVESTMENT CORPORATION (MALAYSIA) BHD',
            'ALLIANCE BANK MALAYSIA BERHAD' => 'ALLIANCE BANK MALAYSIA BERHAD',
            'AMBANK (M) BERHAD' => 'AMBANK (M) BERHAD',
            'BANK ISLAM MALAYSIA BERHAD' => 'BANK ISLAM MALAYSIA BERHAD',
            'BANK RAKYAT' => 'BANK KERJASAMA RAKYAT MALAYSIA BERHAD (BANK RAKYAT)',
            'BANK MUAMALAT MALAYSIA BERHAD ' => 'BANK MUAMALAT MALAYSIA BERHAD ',
            'BANK SIMPANAN NASIONAL' => 'BANK SIMPANAN NASIONAL',
            'BANK PERTANIAN MALAYSIA BERHAD-AGROBANK' => 'BANK PERTANIAN MALAYSIA BERHAD-AGROBANK',
            'CIMB BANK BERHAD' => 'CIMB BANK BERHAD',
            'HONG LEONG BANK BERHAD' => 'HONG LEONG BANK BERHAD',
            'HSBC BANK MALAYSIA BERHAD' => 'HSBC BANK MALAYSIA BERHAD',
            'OCBC BANK (MALAYSIA) BERHAD' => 'OCBC BANK (MALAYSIA) BERHAD',
            'MAYBANK' => 'MALAYAN BANKING BERHAD (MAYBANK)',
            'PUBLIC BANK BERHAD' => 'PUBLIC BANK BERHAD',
            'RHB BANK BERHAD' => 'RHB BANK BERHAD'
        ];
        $userID = Auth::id();
        $data['adaUserID'] = DB::table('banks')->where('user_id', '=', $userID )->exists();
        return view('pages.bank.index', $data);
    }
    public function simpanBank(Request $request)
    {
        $this->validate($request, [
            'beneficiary_name' => 'required|min:5',
            'bank_name' => 'required',
            'bank_account_number' => 'required|min:6|max:25'
        ]);

        $request->user()->bank()->create([
            'bankowner' => $request->beneficiary_name,
            'bankname' => $request->bank_name,
            'bankaccnum' => $request->bank_account_number,
            'swiftcode' => $request->swift_code,
            'user_id' => Auth::id()
        ]);

        session()->flash('message', 'Nice, You have been add new bank detail');

        return back();
    }
    public  function buangBank($id){
        $buang = Bank::findOrFail($id);
        $buang->delete();

        session()->flash('message', 'You just delete your bank info. Please add latest bank info');

        return back();

    }
}
