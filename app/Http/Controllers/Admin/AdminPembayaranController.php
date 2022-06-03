<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cash;
use App\Models\Tempo;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        $tempo = Tempo::where('approve', 0)->whereNotNull('tanggal_bayar')->whereNotNull('tanggal_bayar')->get();
        $cash = Cash::where('approve', 0)->get();
        $data = $cash->concat($tempo);
        // dd($data);
        $app_tempo = Tempo::where('approve', 1)->get();
        $app_cash = Cash::where('approve', 1)->get();
        $data_app = $app_cash->concat($app_tempo);
        // dd($data_app);
        return view('admin/transaksi/pembayaran/index', [
            'title' => 'Daftar Pembayaran',
            'datas' => $data,
            'data_apps' => $data_app
        ]);
    }

    public function bayar(Pembayaran $pembayaran)
    {
        // dd($pembayaran);
        if ($pembayaran->kategori_pembayaran == 'cash') {
            Cash::where('pembayaran_id', $pembayaran->id)->update([
                'approve' => 1
            ]);
        } else {
            Tempo::where('pembayaran_id', $pembayaran->id)->update([
                'approve' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Pembayaran Berhasil Dikonfirmasi');
    }
}
