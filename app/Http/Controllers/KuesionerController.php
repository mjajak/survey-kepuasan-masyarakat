<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;
use App\Contracts\PertanyaanContract;

class KuesionerController extends Controller
{
    public function __construct(
        private PertanyaanContract $pertanyaanService,
        private KuesionerContract $kuesionerService
    ) {
        //
    }


    public function ptsp()
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();

        return view('kuesioner.index', [
            'questions' => $questions,
            'namalayanan' => 'Pelayanan Terpadu Satu Pintu (PTSP)',
            'id_layanan' => 1
        ]);
    }

    public function plhut()
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();

        return view('kuesioner.index', [
            'questions' => $questions,
            'namalayanan' => 'Pusat Layanan Haji dan Umrah Terpadu (PLHUT)',
            'id_layanan' => 2
        ]);
    }

    public function mpp()
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();

        return view('kuesioner.index', [
            'questions' => $questions,
            'namalayanan' => 'Mall Pelayanan Publik (MPP)',
            'id_layanan' => 3
        ]);
    }

    public function onlineWaCenter()
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();

        return view('kuesioner.index', [
            'questions' => $questions,
            'namalayanan' => 'Layanan Online (Whatsapp Center)',
            'id_layanan' => 4
        ]);
    }

    public function onlinePlhut()
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();

        return view('kuesioner.index', [
            'questions' => $questions,
            'namalayanan' => 'Pelayanan Informasi Haji Online',
            'id_layanan' => 5
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|string|in:1,2',
            'usia' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'answers' => 'required|array',
            'id_layanan' => 'required|numeric'
        ]);

        DB::beginTransaction();

        try {
            $add_responden = $this->kuesionerService->addResponden(
                $request->nama_lengkap,
                $request->jenis_kelamin,
                $request->pendidikan,
                $request->pekerjaan,
                $request->no_hp,
                $request->usia,
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
