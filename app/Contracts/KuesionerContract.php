<?php

declare(strict_types=1);

namespace App\Contracts;

interface KuesionerContract
{
    public function addResponden(
        $nama_responden,
        $jenis_kelamin,
        $usia,
        $pendidikan,
        $pekerjaan,
        $id_layanan
    );

    public function addKuesioner(
        $id_responden,
        $id_layanan,
        array $answers
    );

    public function addUlasan(
        $id_responden,
        $ulasan
    );

    public function getHasilSurveyTahun($year);

    // public function getHasilSKM($year);

    public function getListPagination();

    public function findRespondenById($id);

    public function updateKuesionerByRespondenId($id_responden, array $answers);

    public function getDataExcelExport($date_from = null, $date_to = null, $jenis_layanan = null);
}
