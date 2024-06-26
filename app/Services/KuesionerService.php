<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Kuesioner;
use App\Models\Responden;
use App\Models\Ulasan;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;
use App\Models\HasilSurvey;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

final class KuesionerService implements KuesionerContract
{
    // public function addResponden(
    //     $nama_responden,
    //     $jenis_kelamin,
    //     $usia,
    //     $pendidikan,
    //     $pekerjaan,
    //     $id_layanan
    // ) {
    //     // $response = Http::get('https://api.ipify.org?format=json');
    //     $ip = $_SERVER['REMOTE_ADDR'];

    //     // if ($response->ok()) {
    //     // $data = $response->json();
    //     // $ip = $data['ip'];

    //     $locationResponse = Http::get("http://ip-api.com/json/{$ip}");
    //     if ($locationResponse->ok()) {
    //         $locationData = $locationResponse->json();
    //         $country = $locationData['country'];
    //     } else {
    //         $country = 'Unknown'; // Set a default value or handle the error case
    //     }

    //     $responden = Responden::create([
    //         'nama_responden' => $nama_responden,
    //         'jenis_kelamin' => $jenis_kelamin,
    //         'usia' => $usia,
    //         'pendidikan' => $pendidikan,
    //         'pekerjaan' => $pekerjaan,
    //         'id_layanan' => $id_layanan,
    //         'ip' => $ip,
    //         'asal_negara' => $country
    //     ]);

    //     return $responden;
    //     // }

    //     // Handle error case
    //     return null;
    // }

    public function addResponden(
        $nama_responden,
        $jenis_kelamin,
        $usia,
        $pendidikan,
        $pekerjaan,
        $id_layanan
    ) {
        // $ip = $_SERVER['REMOTE_ADDR'];
        $ip = '36.68.8.79';
        $locationResponse = Http::get("https://ipapi.co/{$ip}/json/");

        if ($locationResponse->successful()) {
            $locationData = $locationResponse->json();
            // $country = $locationData['country_name'];
            $country = Arr::has($locationData, 'country_name') ? $locationData['country_name'] : 'Unknown';
        } else {
            $country = 'Unknown';
            // Set a default value or handle the error case
        }

        $responden = Responden::create([
            'nama_responden' => $nama_responden,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'id_layanan' => $id_layanan,
            'ip' => $ip,
            'asal_negara' => $country
        ]);

        return $responden;
    }

    public function addKuesioner(
        $id_responden,
        $id_layanan,
        array $answers
    ) {
        $data_insert = [];
        $now = date('Y-m-d H:i:s');

        foreach ($answers as $answer) {
            $explode_answer = explode('_', $answer);
            $id_pertanyaan = $explode_answer[0];
            $id_jawaban = $explode_answer[1];
            $penilaian = $explode_answer[2];

            $data_insert[] = [
                'id_responden' => $id_responden,
                'id_layanan' => $id_layanan,
                'id_pertanyaan' => $id_pertanyaan,
                'id_jawaban' => $id_jawaban,
                'penilaian' =>   $penilaian,
                'created_at' => $now
            ];
        }
        // dd($data_insert);
        // lebih baik gunakan query builder untuk performa lebih baik
        Kuesioner::insert($data_insert);
    }

    public function addUlasan(
        $id_responden,
        $ulasan
    ) {
        $data_insert[] = [
            'id_responden' => $id_responden,
            'ulasan' => $ulasan,
            'status_ulasan' => 0
        ];

        // dd($data_insert);
        // lebih baik gunakan query builder untuk performa lebih baik
        Ulasan::insert($data_insert);
    }

    public function getListPagination()
    {
        $date_from = request()->date_from ? date('Y-m-d', strtotime(str_replace('/', '-', request()->date_from))) : null;
        $date_to = request()->date_to ? date('Y-m-d', strtotime(str_replace('/', '-', request()->date_to))) : null;
        $search = request()->search;
        $layanan = request()->layanan;
        $nilai = request()->nilai;
        $limit = request('length') ? intval(request('length')) : 10; // param => length
        $offset = request('start') ? intval(request('start')) : 0; // param => start

        $query = "SELECT
                    a.id,
                    a.nama_responden,
                    l.namalayanan,
                    AVG(c.nilai) AS avg_nilai,
                    a.created_at,
                    CASE
                        WHEN avg(c.nilai) < 2 THEN 'Sangat Buruk'
                        WHEN avg(c.nilai) >= 2 AND avg(c.nilai) <= 2.5 THEN 'Buruk'
                        WHEN avg(c.nilai) > 2.5 AND avg(c.nilai) < 3 THEN 'Cukup'
                        WHEN avg(c.nilai) >= 3 AND avg(c.nilai) < 3.6 THEN 'Baik'
                        ELSE 'Sangat Baik'
                    END AS nilai
                FROM tbl_responden a
                INNER JOIN tbl_kuesioner b ON a.id = b.id_responden
                INNER JOIN tbl_layanan l ON l.id = a.id_layanan
                INNER JOIN tbl_jawaban c ON b.id_jawaban = c.id
                WHERE true ";

        // TOTAL
        $queryTotal = "SELECT
                            a.id
                        FROM tbl_responden a
                        INNER JOIN tbl_kuesioner b ON a.id = b.id_responden
                        INNER JOIN tbl_jawaban c ON b.id_jawaban = c.id
                        WHERE true ";

        if ($date_from && $date_to) {
            $query .= " AND DATE(a.created_at) BETWEEN '$date_from' AND '$date_to'";
            $queryTotal .= " AND DATE(a.created_at) BETWEEN '$date_from' AND '$date_to'";
        }
        if ($layanan && $layanan != '') {
            $query .= " AND a.id_layanan = $layanan";
            $queryTotal .= " AND a.id_layanan = $layanan";
        }

        // if ($search && $search != '') {

        // }

        $query .= " GROUP BY a.id, a.id_layanan, a.nama_responden, l.namalayanan, a.created_at, nilai";

        if ($nilai && $nilai != '') {
            if ($nilai === 'sangat_buruk') {
                $query .= " HAVING avg(c.nilai) < 2 ";
            } else if ($nilai === 'buruk') {
                $query .= " HAVING avg(c.nilai) >= 2 AND avg(c.nilai) <= 2.5 ";
            } else if ($nilai === 'cukup') {
                $query .= " HAVING  avg(c.nilai) > 2.5 AND avg(c.nilai) < 3 ";
            } else if ($nilai === 'baik') {
                $query .= " HAVING avg(c.nilai) >= 3 AND avg(c.nilai) < 3.6 ";
            } else {
                $query .= " HAVING avg(c.nilai) > 3.6";
            }
        }

        $query .= " ORDER BY avg_nilai DESC
        LIMIT $limit OFFSET $offset";

        $queryTotal .= " GROUP BY a.id";

        $dataList = DB::select($query);
        $dataTotal = DB::select($queryTotal);

        return [
            'data' => $dataList,
            'total' => count($dataTotal),
        ];
    }

    public function findRespondenById($id)
    {
        return Responden::with(['layanan', 'kuesioners'])
            ->where('id', $id)
            ->first();
    }

    public function updateKuesionerByRespondenId($id_responden, array $answers)
    {
        $now = date('Y-m-d H:i:s');

        foreach ($answers as $answer) {
            $explode_answer = explode('_', $answer);
            $id_pertanyaan = $explode_answer[0];
            $id_jawaban = $explode_answer[1];
            $id_kuesioner = $explode_answer[2];

            DB::table('tbl_kuesioner')
                ->where('id', $id_kuesioner)
                ->update([
                    'id_jawaban' => $id_jawaban,
                    'updated_at' => $now
                ]);
        }
    }

    public function getDataExcelExport($date_from = null, $date_to = null, $jenis_layanan = null)
    {
        $query = "
            SELECT
                a.id AS id_responden,
                b.id_pertanyaan,
                c.nilai,
                d.unsur
            FROM tbl_responden a
            JOIN tbl_kuesioner b ON b.id_responden = a.id
            JOIN tbl_jawaban c ON b.id_jawaban = c.id
            JOIN tbl_pertanyaan d ON b.id_pertanyaan = d.id
            WHERE
                a.id is NOT NULL
        ";

        if (
            $date_from != null && $date_from != '-'
            && $date_to != null && $date_to != '-'
        ) {
            $date_from_format = date('Y-m-d', strtotime($date_from));
            $date_to_format = date('Y-m-d', strtotime($date_to));

            $query .= "
                AND DATE(a.created_at) BETWEEN '$date_from_format' AND '$date_to_format'
            ";
        }

        if ($jenis_layanan != null && $jenis_layanan != '') {
            $query .= "
                AND a.id_layanan = $jenis_layanan
            ";
        }

        return DB::select($query);
    }

    public function getHasilSurveyTahun($year): array
    {
        //Kembalikan nilai dari Model HasilSurvey
        return HasilSurvey::getHasilSurveyTahun($year)->toArray();
    }
}
