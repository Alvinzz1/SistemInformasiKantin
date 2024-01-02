<?php

namespace App\Http\Controllers;

use App\Models\History;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF;
use App\Models\Transaction;
// use Illuminate\Support\Facades\Pdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class RiwayatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId = Auth::id();
        // $user = User::with('carts')->find($userId);
        $details = Transaction::all();
        return view('dashboard.riwayats.index', [
            // 'carts' => $user->carts,
            'histories' => $details,
            'detail' => History::whereIn('transaction_id', $details->pluck('id'))->get(),
        ]);
    }

    public function cetakRiwayat(Request $request)
    {

        $riwayat = History::all();
        
        $pdf = PDF::loadview('dashboard.riwayats.cetak-History',['riwayat'=>$riwayat]);

        return $pdf->download();



        // / Mengambil data dari tabel "transaction" dan "histories"
        // $riwayat = DB::table('transactions')
        //                 ->join('histories', 'transactions.id', '=', 'histories.transaction_id')
        //                 ->select('transactions.*', 'histories.*')
        //                 ->get();
        
        // // Mengambil data dari kolom "status" di tabel "transaction"
        // $status = $riwayat->pluck('status');
        
        // // Mengirim data ke view untuk dicetak dalam file PDF
        // $pdf = PDF::loadview('dashboard.riwayats.cetak-History', ['riwayat' => $riwayat, 'status' => $status]);
        // return $pdf->download();
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = Transaction::find($id);
        $details->history()->delete();
        $details->delete();
        return redirect('/dashboard/admin/riwayats')->with('success', 'Riwayat berhasil dihapus');
    }




    public function setujui($id)
    {
        Transaction::where('id',$id)->update(['status'=>1]);

        return redirect('/dashboard/admin/riwayats');
    }



    // public function konfirmasi($id)
    // {
    //     Transaction::where('id',$id)->update(['status'=>null]);

    //     return redirect('/dashboard/admin/riwayats');
    // }
    




    
    public function cancel($id)
    {
        Transaction::where('id',$id)->update(['status'=>2]);

        return redirect('/dashboard/admin/riwayats');
    }

    public function cetakStruk($id)
    {

        $riwayat = Transaction::find($id)->with('history');
        
        $pdf = PDF::loadview('dashboard.riwayats.cetak-struk',['riwayat'=>$riwayat]);

        return $pdf->download();
    }
}
