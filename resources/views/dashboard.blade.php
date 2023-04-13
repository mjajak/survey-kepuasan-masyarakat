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
                    <svg width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="color: red;">
                        <path opacity="0.4"
                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div>
                    <a href="{{ url('/isi-survey/ptsp') }}">
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pelayanan Terpadu Satu Pintu
                            (PTSP)</h5>
                        <h4 class="mb-0 fw-bold text-muted">{{ $total_ak1 }}</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(2)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <svg width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="color: #0bdd43;">
                        <path opacity="0.4"
                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div>
                    <a href="{{ url('/isi-survey/plhut') }}">
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pusat Layanan Haji dan Umrah
                            Terpadu
                            (PLHUT)
                        </h5>
                        <h4 class="mb-0 fw-bold text-muted">{{ $total_rekom_passport }}</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(3)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <svg width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="color: #d900ff;">
                        <path opacity="0.4"
                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div>
                    <a href="{{ url('/isi-survey/mpp') }}">
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Gerai Mall Pelayanan Publik (MPP)
                        </h5>
                        <h4 class="mb-0 fw-bold text-muted">{{ $total_pelatihan }}</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(4)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <svg width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="color: #3a57e8;">
                        <path opacity="0.4"
                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div>
                    <a href="{{ url('/isi-survey/wa-center') }}">
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Layanan Online (Whatsapp Center)
                        </h5>
                        <h4 class="mb-0 fw-bold text-muted">{{ $total_lpk }}</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
        <div class="card" onclick="fiterByLayanan(5)" style="cursor: pointer;">
            <div class="card-body d-flex align-items-center" style="height: 120px;">
                <div class="me-3 text-primary">
                    <svg width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="color: #000480;">
                        <path opacity="0.4"
                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div>
                    <a href="{{ url('/isi-survey/haji-online') }}">
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pelayanan Informasi Haji Online
                        </h5>
                        <h4 class="mb-0 fw-bold text-muted">{{ $total_perusahaan }}</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <table id="skm" class="table table-bordered table-hover" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-center" style="width: 50px;">No</th>
                            <th class="text-nowrap text-center" style="width: 100px;">Unit Layanan</th>
                            <th class="text-nowrap text-center">Periode</th>
                            <th class="text-nowrap text-center">U1</th>
                            <th class="text-nowrap text-center">U2</th>
                            <th class="text-nowrap text-center">U3</th>
                            <th class="text-nowrap text-center">U4</th>
                            <th class="text-nowrap text-center">U5</th>
                            <th class="text-nowrap text-center">U6</th>
                            <th class="text-nowrap text-center">U7</th>
                            <th class="text-nowrap text-center">U8</th>
                            <th class="text-nowrap text-center">U9</th>
                            <th class="text-nowrap text-center">SKM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data_skm) > 0)
                        @foreach ($data_skm as $item)
                        <tr>
                            <td>{{ $item->id_layanan }}</td>
                            <td></td>
                            <td>Triwulan {{ $item->triwulan }} Tahun {{ $item->tahun }}</td>
                            <td>{{ number_format($item->U1) }}</td>
                            <td>{{ number_format($item->U2)}}</td>
                            <td>{{ number_format($item->U3)}}</td>
                            <td>{{ number_format($item->U4)}}</td>
                            <td>{{ number_format($item->U5)}}</td>
                            <td>{{ number_format($item->U6)}}</td>
                            <td>{{ number_format($item->U7)}}</td>
                            <td>{{ number_format($item->U8)}}</td>
                            <td>{{ number_format($item->U9)}}</td>
                            <td>{{ number_format($item->nilai_skm,2)}}</td>
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

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between w-100 mb-5">
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Total Mengikuti Survey</h5>
                        <h4 class="fw-bold text-muted">{{ $total_mengikuti_survey }}</h4>
                    </div>
                    <div class="d-flex">
                        <div class="me-4 px-3 py-2 rounded" style="width: 205px; background-color: #d8ddfa;">
                            <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Bulan Ini :</h5>
                            <h4 class="mb-0 fw-bold text-muted" id="total_bulan_ini">{{ $total_bulan_ini }}</h4>
                        </div>
                        <div class="px-3 py-2 rounded" style="width: 205px; background-color: #d8ddfa;">
                            <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Bulan Sebelumnya :</h5>
                            <h4 class="mb-0 fw-bold text-muted" id="total_bulan_sebelumnya">{{
                                $total_bulan_sebelumnya
                                }}</h4>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="text-muted">
                        {{ date('d F Y') }}
                    </div>
                </div>

                <div id="chart">

                </div>
            </div>
        </div>
    </div>
</div>




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

        // tooltip: {
        //     x: {
        //     format: 'dd/MM/yy HH:mm'
        //     },
        // },
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
        // plotOptions: {
        //     bar: {
        //         distributed: true, // this line is mandatory
        //         horizontal: false,
        //         barHeight: '85%',
        //     },
        // },
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

function fetchDataSKM() {
  $('#skm').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "{{ route('skm.get', ['year' => 2023]) }}",
      "type": "GET",
      "dataSrc": function (json) {
        console.log(json); // log the response data
        return json;
      }
    },
    "columns": [
      {"data": "No"},
      {"data": "Unit Layanan"},
      {"data": "Periode"},
      {"data": "U1"},
      {"data": "U2"},
      {"data": "U3"},
      {"data": "U4"},
      {"data": "U5"},
      {"data": "U6"},
      {"data": "U7"},
      {"data": "U8"},
      {"data": "U9"},
      {"data": "SKM"}
    ]
  });
}




$(document).ready(function() {
    chart.render();
    fetchDataSKM();
    fetchDataGraphic();
});


</script>
@endsection