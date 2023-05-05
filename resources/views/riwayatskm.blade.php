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
<div class="card">
    <div class="card-body">
        <div class="row">
            @php
            $groupedData = collect($data_skm)->groupBy(function ($item) {
            return $item->namalayanan;
            });
            @endphp
            @foreach ($groupedData as $groupKey => $groupedItems)
            <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-l font-semibold">{{ $groupKey }}</h6>
                        @foreach ($groupedItems as $item)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <p>Triwulan {{ $item->triwulan }} Tahun {{ $item->tahun }}
                                    <span class="badge bg-primary">
                                        <a href="#" class="badge-link" data-toggle="modal"
                                            data-target="#skmModal{{$item->id_layanan}}">
                                            {{ number_format($item->nilai_skm, 2) }}
                                        </a>
                                    </span>
                                </p>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection