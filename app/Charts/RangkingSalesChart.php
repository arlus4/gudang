<?php

namespace App\Charts;

use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class RangkingSalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Pendapatan Sales')
            ->setDataset([
                \App\Models\Pembayaran::where('id', '<=', 1)->count(),
                \App\Models\Agen::where('id', '>=', 2)->count()
            ])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setLabels(['Published', 'No Published'])
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
        // ->setFontFamily('DM Sans')
        // ->setFontColor('#ff6384');
    }
}
