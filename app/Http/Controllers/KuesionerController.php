<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;
use App\Contracts\PertanyaanContract;
use App\Models\KategoriPekerjaan;
use App\Models\KategoriPendidikan;
use App\Models\KategoriUsia;

class KuesionerController extends Controller
{
    public function __construct(
        private PertanyaanContract $pertanyaanService,
        private KuesionerContract $kuesionerService
    ) {
        //
    }


    // public function ptsp()
    // {
    //     // $questions = $this->pertanyaanService->getAllPertanyaan();
    //     $pertanyaan = Pertanyaan::with('jawaban')->get();
    //     $kategori_pekerjaan_list = KategoriPekerjaan::all();

    //     return view('kuesioner.index', [
    //         'questions' => $pertanyaan,
    //         'namalayanan' => 'Pelayanan Terpadu Satu Pintu (PTSP)',
    //         'id_layanan' => 1,
    //         'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
    //     ]);
    // }

    // public function plhut()
    // {
    //     $questions = $this->pertanyaanService->getAllPertanyaan();
    //     $kategori_pekerjaan_list = KategoriPekerjaan::all();

    //     return view('kuesioner.index', [
    //         'questions' => $questions,
    //         'namalayanan' => 'Pusat Layanan Haji dan Umrah Terpadu (PLHUT)',
    //         'id_layanan' => 2,
    //         'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
    //     ]);
    // }

    // public function mpp()
    // {
    //     $questions = $this->pertanyaanService->getAllPertanyaan();
    //     $kategori_pekerjaan_list = KategoriPekerjaan::all();

    //     return view('kuesioner.index', [
    //         'questions' => $questions,
    //         'namalayanan' => 'Mall Pelayanan Publik (MPP)',
    //         'id_layanan' => 3,
    //         'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
    //     ]);
    // }

    // public function onlineWaCenter()
    // {
    //     $questions = $this->pertanyaanService->getAllPertanyaan();
    //     $kategori_pekerjaan_list = KategoriPekerjaan::all();
    //     return view('kuesioner.index', [
    //         'questions' => $questions,
    //         'namalayanan' => 'Layanan Online (Whatsapp Center)',
    //         'id_layanan' => 4,
    //         'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
    //     ]);
    // }

    // public function onlinePlhut()
    // {
    //     $questions = $this->pertanyaanService->getAllPertanyaan();
    //     $kategori_pekerjaan_list = KategoriPekerjaan::all();
    //     return view('kuesioner.index', [
    //         'questions' => $questions,
    //         'namalayanan' => 'Pelayanan Informasi Haji Online',
    //         'id_layanan' => 5,
    //         'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
    //     ]);
    // }

    // public function kuesioner($id_layanan)
    // {
    //     $questions = $this->pertanyaanService->getAllPertanyaan();
    //     $kategori_pekerjaan_list = KategoriPekerjaan::all();
    //     $namalayanan = '';
    //     switch ($id_layanan) {
    //         case 1:
    //             $namalayanan = 'Pelayanan Terpadu Satu Pintu (PTSP)';
    //             break;
    //         case 2:
    //             $namalayanan = 'Pusat Layanan Haji dan Umrah Terpadu (PLHUT)';
    //             break;
    //         case 3:
    //             $namalayanan = 'Mall Pelayanan Publik (MPP)';
    //             break;
    //         case 4:
    //             $namalayanan = 'Layanan Online (Whatsapp Center)';
    //             break;
    //         case 5:
    //             $namalayanan = 'Pelayanan Informasi Haji Online';
    //             break;
    //         default:
    //             $namalayanan = '';
    //             break;
    //     }
    //     return view('kuesioner.index', [
    //         'questions' => $questions,
    //         'namalayanan' => $namalayanan,
    //         'id_layanan' => $id_layanan,
    //         'kategori_pekerjaan_list' => $kategori_pekerjaan_list,
    //     ]);
    // }

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
            'usia' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'answers' => 'required|array',
            'id_layanan' => 'required|numeric'
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
                $request->answers
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
