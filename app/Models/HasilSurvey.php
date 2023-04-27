<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HasilSurvey extends Model
{
    use HasFactory;

    public static function getHasilSurveyTahun($year)
    {
        // $query = DB::table('v_hasil_survey')
        //     ->select([
        //         'id_layanan', 'namalayanan',
        //         DB::raw('QUARTER(created_at) AS triwulan'),
        //         DB::raw('YEAR(created_at) AS tahun'),
        //         DB::raw('AVG(CASE WHEN unsur = "U1" THEN penilaian END) AS U1'),
        //         DB::raw('AVG(CASE WHEN unsur = "U2" THEN penilaian END) AS U2'),
        //         DB::raw('AVG(CASE WHEN unsur = "U3" THEN penilaian END) AS U3'),
        //         DB::raw('AVG(CASE WHEN unsur = "U4" THEN penilaian END) AS U4'),
        //         DB::raw('AVG(CASE WHEN unsur = "U5" THEN penilaian END) AS U5'),
        //         DB::raw('AVG(CASE WHEN unsur = "U6" THEN penilaian END) AS U6'),
        //         DB::raw('AVG(CASE WHEN unsur = "U7" THEN penilaian END) AS U7'),
        //         DB::raw('AVG(CASE WHEN unsur = "U8" THEN penilaian END) AS U8'),
        //         DB::raw('AVG(CASE WHEN unsur = "U9" THEN penilaian END) AS U9'),
        //         DB::raw('(U1+U2+U3+U4+U5+U6+U7+U8+U9) AS nilai_skm'),
        //     ])
        //     ->whereYear('created_at', '=', $year)
        //     ->groupBy('id_layanan', 'tahun', 'triwulan')
        //     ->orderBy('tahun', 'asc')
        //     ->orderBy('triwulan', 'asc')
        //     ->orderBy('id_layanan', 'asc');
        // return $query->get();

        $subquery = DB::table('v_hasil_survey')
            ->select([
                'id_layanan',
                'namalayanan',
                DB::raw('QUARTER(created_at) AS triwulan'),
                DB::raw('YEAR(created_at) AS tahun'),
                DB::raw('AVG(CASE WHEN unsur = "U1" THEN penilaian ELSE NULL END) AS U1'),
                DB::raw('AVG(CASE WHEN unsur = "U2" THEN penilaian ELSE NULL END) AS U2'),
                DB::raw('AVG(CASE WHEN unsur = "U3" THEN penilaian ELSE NULL END) AS U3'),
                DB::raw('AVG(CASE WHEN unsur = "U4" THEN penilaian ELSE NULL END) AS U4'),
                DB::raw('AVG(CASE WHEN unsur = "U5" THEN penilaian ELSE NULL END) AS U5'),
                DB::raw('AVG(CASE WHEN unsur = "U6" THEN penilaian ELSE NULL END) AS U6'),
                DB::raw('AVG(CASE WHEN unsur = "U7" THEN penilaian ELSE NULL END) AS U7'),
                DB::raw('AVG(CASE WHEN unsur = "U8" THEN penilaian ELSE NULL END) AS U8'),
                DB::raw('AVG(CASE WHEN unsur = "U9" THEN penilaian ELSE NULL END) AS U9')
            ])
            ->whereYear('created_at', '=', $year)
            ->groupBy('id_layanan', 'namalayanan', 'triwulan', 'tahun');

        $hasilSurvey = DB::query()
            ->select(
                'id_layanan',
                'namalayanan',
                'triwulan',
                'tahun',
                'U1',
                'U2',
                'U3',
                'U4',
                'U5',
                'U6',
                'U7',
                'U8',
                'U9',
                DB::raw('(U1+U2+U3+U4+U5+U6+U7+U8+U9)*1/9 AS nilai_skm')
            )
            ->fromSub($subquery, 'subquery')
            ->orderBy('tahun')
            ->orderBy('triwulan')
            ->orderBy('id_layanan')
            ->get();

        return $hasilSurvey;
    }
}
