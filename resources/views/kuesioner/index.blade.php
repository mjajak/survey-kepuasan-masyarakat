@extends('layouts.app')

@section('css')
<style>
    .nilai>div>label {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #999;
        width: 50px;
        height: 50px;
        cursor: pointer;
    }

    .nilai>.nilai-div:hover {
        background-color: #e7ebfc;
    }

    label.error {
        font-weight: 500;
    }

    #scroll-down {
        position: fixed;
        bottom: 40%;
        right: 50%;
        width: 50px;
        height: 50px;
        opacity: 1;
        z-index: 99;
        /* color: #607D8B; */
        cursor: pointer;
        line-height: 45px;
        text-align: center;
        border-radius: 5px;
        background-color: transparent;
    }
</style>
@endsection

@section('content')
<input type="hidden" name="id_layanan" id="id_layanan" value="{{ $id_layanan }}">

<div class="card">
    <div class="card-header">
        <h4 class="mb-0 card-title">{{ $namalayanan }}</h4>
    </div>
    <div class="card-body">
        {{-- Survey Question --}}
        @include('kuesioner.survey-question')
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" id="btn-isi-survey"
            data-bs-target="#modal-isi-survey">Isi Survey</button>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modal-isi-survey" aria-labelledby="modal-isi-survey" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="mb-0 modal-title">Isi Data</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                    data-bs-target="#modal-isi-survey"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="form-isi-data" spellcheck="false">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label class="col-form-label">Nama Lengkap</label>
                                <input type="text" name="nama_responden" id="nama_responden" class="form-control"
                                    placeholder="Masukkan Nama Lengkap" maxlength="50">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select">
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Usia</label>
                                <select name="usia" id="pendidikan" class="form-control">
                                    <option value="">Pilih Kategori Usia</option>
                                    @foreach ($kategori_usia_list as $usia)
                                    <option value="{{ $usia->id }}">{{ $usia->kategori }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            {{-- <div class="mb-3">
                                <label class="col-form-label">No. HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                    placeholder="Masukkan Nomor Handphone" maxlength="16">
                            </div> --}}
                            <div class="mb-3">
                                <label class="col-form-label">Pendidikan</label>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach ($kategori_pendidikan_list as $pendidikan)
                                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Pekerjaan</label>
                                <select name="pekerjaan" id="pekerjaan" class="form-control">
                                    @foreach($kategori_pekerjaan_list as $kategori_pekerjaan)
                                    <option value="{{ $kategori_pekerjaan->id }}">{{
                                        $kategori_pekerjaan->nama_pekerjaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal"
                            data-bs-target="#modal-isi-survey">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <section id="scroll-down" title="Scroll Down">
    <svg width="50" viewBox="0 0 24 24" fill="currentColor" style="color: #229c57;" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M2 16.08V7.91C2 4.38 4.271 2 7.66 2H16.33C19.72 2 22 4.38 22 7.91V16.08C22 19.62 19.72 22 16.33 22H7.66C4.271 22 2 19.62 2 16.08ZM12.75 14.27V7.92C12.75 7.5 12.41 7.17 12 7.17C11.58 7.17 11.25 7.5 11.25 7.92V14.27L8.78 11.79C8.64 11.65 8.44 11.57 8.25 11.57C8.061 11.57 7.87 11.65 7.72 11.79C7.43 12.08 7.43 12.56 7.72 12.85L11.47 16.62C11.75 16.9 12.25 16.9 12.53 16.62L16.28 12.85C16.57 12.56 16.57 12.08 16.28 11.79C15.98 11.5 15.51 11.5 15.21 11.79L12.75 14.27Z"
            fill="currentColor"></path>
    </svg>
</section> --}}
@endsection

@section('script')
<script>
    function addKuesioner() {
        let respondenData = $('#form-isi-data').serialize();
        let kuesionerData = $('#form-isi-survey').serialize();
        let saranData = $('#form-isi-saran').serialize();

        // console.log(respondenData);
        // console.log(kuesionerData);
        // console.log($('#id_layanan').val());

        $.ajax({
            url: "{{ url('isi-survey/add-kuesioner') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                showLoading();
            },
            data: respondenData + '&' + kuesionerData + '&'+ saranData + '&id_layanan=' + $('#id_layanan').val(),
            success: function(response) {
                $('#form-isi-data')[0].reset();
                $('#form-isi-survey')[0].reset();
                $('#form-isi-saran')[0].reset();
                $("#survey-question").prop('hidden', true);
                $('#btn-isi-survey').show();
                Swal.fire({
                title: '',
                text: `Berhasil melakukan survey`,
                icon: 'success',
            })
            .then(function(result) {
                if(result.isConfirmed) {
                    window.location.href = '{{ url('/') }}';
                }
            });

            },
            error: function(xhr, stat, err) {
                swal.close();
                if (xhr.status == 500) {
                    alertError();
                }
            }
        });
    }

    $(document).ready(function() {
        const modal = new bootstrap.Modal('#modal-isi-survey');

 		$('#scroll-down').click(function(){
            console.log($(document).height())
			$('html, body').animate({scrollTop : $(document).height()}, 350);
			return false;
		});

        $.validator.setDefaults({
            debug: true,
            ignore: [],
            highlight: function(element) {
                $(element).closest('.form-control').addClass('is-invalid');
                $(element).siblings('.select2-container').find('.select2-selection').addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('is-invalid');
                $(element).siblings('.select2-container').find('.select2-selection').removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                if (element[0].name== 'nilai_kepuasan') {
                    error.insertAfter(element.parents('.d-flex.nilai'));
                } else if (element.hasClass('answer')) {
                    error.insertAfter(element.parents('.soal'));
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $("#form-isi-data").validate({
            submitHandler: function(form) {
                modal.hide();
                $('#btn-isi-survey').hide();
                $("#survey-question").prop('hidden', false);
            },
            rules: {
                nama_responden: {
                    required: true,
                    minlength: 4,
                    maxlength: 50
                },
                jenis_kelamin: {
                    required: true,
                    digits: true,
                    range: [1, 2]
                },
                pendidikan: {
                    required: true,
                    digits: true,
                    minlength: 1,
                    maxlength: 2
                },
                pekerjaan: {
                    required: true,
                    digits: true,
                    minlength: 1,
                    maxlength: 2
                },
                usia: {
                    required: true,
                    digits: true,
                    minlength: 1,
                    maxlength: 2
                }

            },
            messages: {
                nama_responden: {
                    required: 'Harap isi nama lengkap',
                    minlength: 'Nama lengkap minimal 4 karakter',
                    maxlength: 'Nama lengkap minimal 50 karakter'
                },
                jenis_kelamin: {
                    required: 'Harap pilih jenis kelamin'
                },
                pendidikan: {
                    required: 'Harap isi pendidikan'
                },
                pekerjaan: {
                    required: 'Harap isi pekerjaan'
                },
                usia: {
                    required: 'Harap pilih kategori usia'
                }
            }
        });

        $('#form-isi-survey').validate({
        submitHandler: function(form) {
        $("#survey-question").prop('hidden', true);
        $("#survey-saran").prop('hidden', false);
        }});

       $('[name^="answers"]').each(function() {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Harap pilih jawaban.",
                }
            });
        });


        $.validator.addMethod("safeText", function(value, element) {
            return this.optional(element) || /^[0-9a-zA-Z\s\.,?!'"()]+$/.test(value);
        }, "Hanya diperbolehkan alphabet dan tanda baca!");

        $("#form-isi-saran").validate({
            submitHandler: function(form) {
                addKuesioner();
            },
            rules: {
                saran: {
                    required: true,
                    maxlength: 100,
                    safeText: true
                }
            },
            messages: {
                saran: {
                    required: 'Mohon saran / masukannya.. :)',
                    maxlength: "Maksimal 100 karakter!."
                }
            }
        });


    });
</script>
@endsection