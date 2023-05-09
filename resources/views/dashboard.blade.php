@extends('layouts.no-sidebar')

@section('css')
<style>
    .icon-card {
        color: #3a57e8;
    }

    .text-dark {
        color: #32333b !important;
    }

    .card.layanan:hover {
        transition: all 0.3s ease-in-out;
        -webkit-box-shadow: 0 10px 30px 0 rgb(17 38 146 / 20%);
        box-shadow: 0 10px 30px 0 rgb(17 38 146 / 20%);
        margin-bottom: 2rem;

    }
</style>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(1)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <a href="{{ url('/isi-survey/ptsp') }}">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow w-full">
                            Isi Survei
                        </button>
                    </a>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pelayanan Terpadu Satu Pintu
                        (PTSP)
                    </h5>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>

                        @php
                        function getFilteredData($data_skm, $currentTriwulan, $currentYear, $id_layanan) {
                        return collect($data_skm)->firstWhere(function ($item) use ($currentTriwulan, $currentYear,
                        $id_layanan) {
                        return $item->triwulan === $currentTriwulan && $item->tahun === $currentYear &&
                        $item->id_layanan === $id_layanan;
                        });
                        }

                        $currentTriwulan = intval(ceil(date('n') / 3));
                        $currentYear = intval(date('Y'));

                        @endphp

                        <!-- Usage for id_layanan = 1 -->
                        @php
                        $filteredData1 = getFilteredData($data_skm, $currentTriwulan, $currentYear, 1);
                        @endphp
                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                            {{ $filteredData1 ? number_format($filteredData1->nilai_skm, 2).'/4.00' :
                            'Belum Diulas'
                            }}
                        </p>

                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#modal-ulasan"
                            class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white"
                            data-bs-toggle="modal">{{ $filteredData1->jumlah_responden }} Ulasan</a>

                        {{-- MODAL --}}
                        <div class="modal fade" id="modal-ulasan" aria-labelledby="modal-ulasan" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-body" style="overflow-y: auto;">
                                        <!-- Modal content goes here -->

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(2)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <a href="{{ url('/isi-survey/plhut') }}">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow w-full">
                            Isi Survei
                        </button>
                    </a>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pusat Layanan Haji dan Umrah Terpadu (PLHUT)
                    </h5>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <!-- Usage for id_layanan = 2 -->
                        @php
                        $filteredData1 = getFilteredData($data_skm, $currentTriwulan, $currentYear, 2);
                        @endphp
                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                            {{ $filteredData1 ? number_format($filteredData1->nilai_skm, 2).'/4.00' : 'Belum Diulas' }}
                        </p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#"
                            class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{
                            $filteredData1->jumlah_responden }}
                            Ulasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(3)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <a href="{{ url('/isi-survey/mpp') }}">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow w-full">
                            Isi Survei
                        </button>
                    </a>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Gerai Mall Pelayanan Publik (MPP)
                    </h5>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <!-- Usage for id_layanan = 3 -->
                        @php
                        $filteredData1 = getFilteredData($data_skm, $currentTriwulan, $currentYear, 3);
                        @endphp
                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                            {{ $filteredData1 ? number_format($filteredData1->nilai_skm, 2).'/4.00' : 'Belum Diulas'}}
                        </p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#"
                            class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{
                            $filteredData1->jumlah_responden }}
                            Ulasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(4)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <a href="{{ url('/isi-survey/wa-center') }}">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow w-full">
                            Isi Survei
                        </button>
                    </a>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Layanan Online (Whatsapp Center) </h5>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <!-- Usage for id_layanan = 4 -->
                        @php
                        $filteredData1 = getFilteredData($data_skm, $currentTriwulan, $currentYear, 4);
                        @endphp
                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                            {{ $filteredData1 ? number_format($filteredData1->nilai_skm, 2).'/4.00' : 'Belum Diulas' }}
                        </p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#"
                            class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{
                            $filteredData1->jumlah_responden }}
                            Ulasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(5)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <a href="{{ url('/isi-survey/haji-online') }}">
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow w-full">
                            Isi Survei
                        </button>
                    </a>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pelayanan Informasi Haji Online </h5>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <!-- Usage for id_layanan = 2 -->
                        @php
                        $filteredData1 = getFilteredData($data_skm, $currentTriwulan, $currentYear, 5);
                        @endphp
                        <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">
                            {{ $filteredData1 ? number_format($filteredData1->nilai_skm, 2).'/4.00' : 'Belum Diulas' }}
                        </p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#"
                            class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{
                            $filteredData1->jumlah_responden }}
                            Ulasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="graphRiwayatSKM"></div>
{{-- <div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="skm" class="table table-bordered table-hover" style="width: 100%;border-spacing: 0;">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-nowrap text-center" style="width: 100px;">
                                    Riwayat Penilaian SKM
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data_skm) > 0)
                            @foreach ($data_skm as $item)
                            <tr>
                                <td colspan="2">{{ $item->id_layanan }}. {{ $item->namalayanan }}
                            <tr>
                                <td>
                                    Triwulan {{ $item->triwulan }} Tahun {{ $item->tahun }}

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#skmModal{{$item->id_layanan}}">
                                        {{ number_format($item->nilai_skm, 2) }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="skmModal{{$item->id_layanan}}" tabindex="-1"
                                        role="dialog" aria-labelledby="skmModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="skmModalLabel">
                                                        Detail SKM<br>
                                                        {{$item->namalayanan }}
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered"
                                                            style="table-layout: auto; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th align="center">ID</th>
                                                                    <th align="center">Nama Unsur</th>
                                                                    <th align="center">Nilai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">[U1]</td>
                                                                    <td>Persyaratan</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U1,
                                                                        2) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U2]</td>
                                                                    <td>Sistem, Mekanisme, dan Prosedur</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U2,
                                                                        2) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U3]</td>
                                                                    <td>Waktu Penyelesaian</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U3,
                                                                        2) }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U4]</td>
                                                                    <td>Biaya/Tarif</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U4,2)
                                                                        }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U5]</td>
                                                                    <td>Produk Spesifikasi Jenis Pelayanan</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U5,2)
                                                                        }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U6]</td>
                                                                    <td>Kompetensi Pelaksana</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U6,2)
                                                                        }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U7]</td>
                                                                    <td>Perilaku Pelaksana</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U7,2)
                                                                        }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U8]</td>
                                                                    <td>Sarana dan prasarana</td>
                                                                    <td align="center">{{
                                                                        number_format($item->U8,2)
                                                                        }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">[U9]</td>
                                                                    <td>Penanganan Pengaduan, Saran<br>dan
                                                                        Masukan
                                                                    </td>
                                                                    <td align="center">{{
                                                                        number_format($item->U9,2)
                                                                        }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                        data-target="#skmModal{{$item->id_layanan}}"
                                                        onclick="closeModal()">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="13" class="text-center">Tidak Ada Data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap" style="margin: -10px;">
            <div class="flex-fill mb-3 px-3 py-2 rounded"
                style="background-color: #e8f48c; flex-basis: 33.33%; margin: 10px;">
                <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Total Mengikuti Survey :</h5>
                <h4 class="fw-bold text-muted">{{ $total_mengikuti_survey }}</h4>


            </div>
            <div class="flex-fill mb-3 px-3 py-2 rounded"
                style="background-color: #d8ddfa; flex-basis: 33.33%; margin: 10px;">
                <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Bulan Ini :</h5>
                <h4 class="mb-0 fw-bold text-muted" id="total_bulan_ini">{{ $total_bulan_ini }}</h4>
            </div>
            <div class="flex-fill mb-3 px-3 py-2 rounded"
                style="background-color: #d8ddfa; flex-basis: 33.33%; margin: 10px;">
                <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Bulan Lalu :</h5>
                <h4 class="mb-0 fw-bold text-muted" id="total_bulan_sebelumnya">{{ $total_bulan_sebelumnya }}</h4>
            </div>
        </div>
    </div>
</div>
<div id="chart"></div>

@endsection

@section('script')
<script>
    function rupiah(number) {
    const formatNumbering = new Intl.NumberFormat("id-ID", {minimumFractionDigits: 0});
    return formatNumbering.format(number)
    }

    async function fiterByLayanan(id) {
    const url = "{{ url('/') }}" + '/' + `dashboard-filter-layanan/${id}`;
    const response = await fetch(url);
    const json = await response.json();
    document.querySelector('#total_bulan_ini').innerHTML = json.total_bulan_ini;
    document.querySelector('#total_bulan_sebelumnya').innerHTML = json.total_bulan_sebelumnya;
    }

    // CHART
    var options = {
        series:  [
                {
                    name: 'Layanan',
                    data: [0,0,0,0,0]
                },
            ],
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false
            }
        },

        stroke: {
            curve: 'smooth',
            width: 2
        },
        xaxis: {
            show: false,
            categories: ["PTSP", "PLHUT", "MPP", "WA Center", "Info Haji Online"]
        },

          colors: [ // this array contains different color code for each data
            "#FF0000",
            "#0bdd43",
            "#d900ff",
            "#3a57e8",
            "#000480",
        ],
        fill: {
            colors: [
                "#FF0000",
                "#0bdd43",
                "#d900ff",
                "#3a57e8",
                "#000480",
            ],
            gradient: {
                opacityFrom: 0.6,
                opacityTo: 0.1
            }
        },
        plotOptions: {
            bar: {
                distributed: true, // different color each bar
                columnWidth: '60%',
                borderRadius: 2,
                dataLabels: {
                    orientation: 'horizontal',
                    position: 'top',
                    minItem: 0,
                    hideOverflowingLabels: true,
                }
            },
        },
          dataLabels: {
            offsetY: -18,
            style: {
            colors: ['#222'],
            fontWeight: 'normal'
            },
            formatter: function (val, opts) {
                return rupiah(val);
            },
        },
        legend: {
            position: 'top',
            fontSize: '16px',
            itemMargin: {
                vertical: 10,
                horizontal: 10
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
        function fetchDataGraphic() {
    const url = "{{ url('/') }}" + '/' + `data-grafik-bar`;
    fetch(url)
        .then(response => response.json())
        .then(json => {
            chart.updateSeries(json);
        });
    }
</script>

{{-- <script>
    const dataUrl = 'http://127.0.0.1:8000/get-skm/2023';

        // Fetch the data from the provided URL
        fetch(dataUrl)
          .then(response => response.json())
          .then(data => {
            const seriesData = data.map(item => item.nilai_skm.toFixed(2));
            const seriesNames = data.map(item => item.namalayanan);
            const triwulanCategories = data.map(item => item.triwulan);
            // Generate an array of colors for each series
             const colors = ['#FF0000', '#00FF00', '#0000FF', '#FF00FF', '#FFFF00'];


            var options = {
              series: seriesNames.map((name, index) => ({
                name: name,
                data: [seriesData[index]]
              })),
              chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                  enabled: true,
                  color: '#000',
                  top: 18,
                  left: 7,
                  blur: 10,
                  opacity: 0.2
                },
                toolbar: {
                  show: false
                }
              },
              colors: colors.slice(0, seriesNames.length), // Use colors for each series
              dataLabels: {
                enabled: false,
              },
              stroke: {
                curve: 'straight'
              },
              title: {
                text: 'SKM Tahun 2023',
                align: 'left'
              },
              grid: {
                borderColor: '#e7e7e7',
                row: {
                  colors: ['#f3f3f3', 'transparent'],
                  opacity: 0.5
                },
              },
              markers: {
                shapes: 'diamond',
                size: 6
              },
              xaxis: {
                categories: triwulanCategories,
                title: {
                  text: 'Triwulan'
                }
              },
              yaxis: {
            title: {
            text: 'SKM'
            },
             min: 0,
            max: 4,
             tickAmount: 4,
            labels: {
            formatter: value => value.toFixed(2) // Format y-axis labels to remove decimal places
             }
            },
              legend: {
                show: false // Hide the legend
              }
            };

            var graph = new ApexCharts(document.querySelector("#graph"), options);
            graph.render();
          })
          .catch(error => console.log('Error:', error));
</script> --}}

<script>
    const dataUrl = '{{ url('/') }}/get-skm/' + new Date().getFullYear();
    console.log('url:'+dataUrl);
    fetch(dataUrl)
      .then(response => response.json())
      .then(data => {
        const uniqueNames = [...new Set(data.map(item => item.namalayanan))];
        const triwulans = [...new Set(data.map(item => item.triwulan))];
        const colors = ['#FF0000', '#00FF00', '#0000FF', '#FF00FF', '#FFFF00'];

        const seriesData = uniqueNames.map(name => {
          const series = {
            name: name,
            data: []
          };

          triwulans.forEach(triwulan => {
            const matchingEntry = data.find(item => item.namalayanan === name && item.triwulan === triwulan);
            if (matchingEntry) {
                series.data.push(matchingEntry.nilai_skm !== null ? matchingEntry.nilai_skm.toFixed(2) : null);
            } else {
              series.data.push(null);
            }
          });
          console.log(series);
          return series;
        });

        var options = {
          series: seriesData,
          chart: {
            height: 350,
            type: 'line',
            dropShadow: {
              enabled: true,
              color: '#000',
              top: 18,
              left: 7,
              blur: 10,
              opacity: 0.2
            },
            toolbar: {
              show: false
            }
          },
          colors: colors.slice(0, uniqueNames.length),
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: 'straight'
          },
          title: {
            text: 'Grafik Survei Kepuasan Masyarakat Tahun ' + new Date().getFullYear(),
            align: 'center'
          },
          grid: {
            borderColor: '#e7e7e7',
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            },
          },
          markers: {
            size: 7
          },
          xaxis: {
            type: 'category',
            categories: triwulans.map(triwulan => 'Triwulan ' + triwulan),
          },
          yaxis: {
            title: {
              text: 'SKM'
            },
            min: 0,
            max: 4,
            tickAmount: 4,
            labels: {
                formatter: value => (value !== null ? value.toFixed(2) : null)
            }
          },
          legend: {
            show: true,
            position: 'top'
          }
        };

        var graph = new ApexCharts(document.querySelector("#graphRiwayatSKM"), options);
        graph.render();

    })
      .catch(error => console.log('Error:', error));
</script>

<script>
    $(document).ready(
        function() {
        fetchDataGraphic();
        chart.render();
        $('button[data-target^="#skmModal"]').on('click', function() {
            var target = $(this).attr('data-target');
            $(target).modal('show');
        });
        $('button[data-target^="#skmModal"]').on('click', function() {
            var target = $(this).attr('data-target');
            $(target).modal('hide');
        });
        });
</script>
@endsection