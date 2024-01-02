<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SaranController extends Controller
{
    public function index()
    {
        $sensor = ['bodoh', 'bego', 'tolol', 'kontol', 'memek', 'bloon', 'anjing', 'babi', 'goblok', 'admin bego'];
        foreach ($sensor as $s) {
            $replace = str_repeat("*", strlen($s));
        }

        $saran = Saran::all();
        return view('dashboard.saran.index', [
            'saran' => $saran,
            'replace' => $replace,
            'sensor' => $sensor
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender' => 'required|max:100',
            'saran' => 'required|min:10'
        ]);

        Saran::create($validated);
        return redirect('/dashboard/saran')->with('success', 'Terimakasih telah memberikan saran');
    }

    public function create()
    {
        return view('dashboard/saran/index');
    }



    public function destroy($id)
    {
        Saran::destroy($id);
        return redirect('/dashboard/saran')->with('success', 'Saran berhasil dihapus');
    }
}
