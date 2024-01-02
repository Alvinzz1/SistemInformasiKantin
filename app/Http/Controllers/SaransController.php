<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SaransController extends Controller
{
    public function index()
    {
        $sensor = ['bodoh', 'bego', 'tolol', 'kontol', 'memek', 'bloon', 'anjing', 'babi'];
        foreach ($sensor as $s) {
            $replace = str_repeat("*", strlen($s));
        }


        $saran = Saran::paginate(5);
        return view('dashboard.sarans.index', [
            'saran' => $saran,
            'replace' => $replace,
            'sensor' => $sensor
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender' => 'required|min:5|max:100',
            'saran' => 'required|min:10'
        ]);
        // @dd($validated);
        Saran::create($validated);
        return redirect('/dashboard/admin/sarans')->with('success', 'Terimakasih telah memberikan saran');
    }

    public function create()
    {
        return view('dashboard/admin/sarans');
    }



    public function destroy($id)
    {
        Saran::destroy($id);
        return redirect('/dashboard/admin/sarans')->with('success', 'Saran berhasil dihapus');
    }
}
    