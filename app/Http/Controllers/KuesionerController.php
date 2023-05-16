<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;
use App\Contracts\PertanyaanContract;
use App\Models\KategoriPekerjaan;
use App\Models\KategoriPendidikan;
use App\Models\KategoriUsia;
// use App\Models\Pertanyaan;

class KuesionerController extends Controller
{
    public function __construct(
        private PertanyaanContract $pertanyaanService,
        private KuesionerContract $kuesionerService
    ) {
        //
    }


    public function index($namalayanan)
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();
        $kategori_pekerjaan_list = KategoriPekerjaan::all();
        $kategori_pendidikan_list = KategoriPendidikan::all();
        $kategori_usia_list = KategoriUsia::all();

        $id_layanan = null;
        switch ($namalayanan) {
            case 'ptsp':
                $namalayanan = 'Pelayanan Terpadu Satu Pintu (PTSP)';
                $id_layanan = 1;
                break;
            case 'plhut':
                $namalayanan = 'Pusat Layanan Haji dan Umrah Terpadu (PLHUT)';
                $id_layanan = 2;
                break;
            case 'mpp':
                $namalayanan = 'Mall Pelayanan Publik (MPP)';
                $id_layanan = 3;
                break;
            case 'wa-center':
                $namalayanan = 'Layanan Online (Whatsapp Center)';
                $id_layanan = 4;
                break;
            case 'haji-online':
                $namalayanan = 'Pelayanan Informasi Haji Online';
                $id_layanan = 5;
                break;
            default:
                abort(404);
        }

        return view('kuesioner.index', [
            'questions' => $questions,
            'namalayanan' => $namalayanan,
            'id_layanan' => $id_layanan,
            'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
            'kategori_pendidikan_list' => $kategori_pendidikan_list,
            'kategori_usia_list' => $kategori_usia_list,
        ]);
    }



    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'nama_responden' => 'required|string',
            'jenis_kelamin' => 'required|string|in:1,2',
            'usia' => 'required|numeric',
            'pendidikan' => 'required|numeric',
            'pekerjaan' => 'required|numeric',
            'answers' => 'required|array',
            'id_layanan' => 'required|numeric',
            'saran' => 'required|string|max:100|regex:/^[0-9a-zA-Z\s\.,?!\'"()]+$/'
        ]);

        DB::beginTransaction();

        try {
            $add_responden = $this->kuesionerService->addResponden(
                $request->nama_responden,
                $request->jenis_kelamin,
                $request->usia,
                $request->pendidikan,
                $request->pekerjaan,
                $request->id_layanan
            );

            $add_kuesioner = $this->kuesionerService->addKuesioner(
                $add_responden->id,
                $add_responden->id_layanan,
                $request->answers,
            );

            $add_ulasan = $this->kuesionerService->addUlasan(
                $add_responden->id,
                $request->saran
            );

            DB::commit();

            return response()->json([
                'message' => 'Proses berhasil'
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
