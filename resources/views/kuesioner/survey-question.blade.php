<div hidden id="survey-question">
    <form method="post" id="form-isi-survey">
        <div class="row">
            <div class="col-12">
                <ol>
                    @foreach ($questions as $q)
                    <div class="mb-4">
                        <div style="font-weight: bold;">
                            <li>
                                (Unsur ke {{ $q->no_urut }}) - {{ $q->pertanyaan }}
                            </li>
                        </div>
                        @foreach ($q->jawaban as $j)
                        <div class="form-check mb-2">
                            <input class="form-check-input answer" type="radio" name="answers[{{$q->id}}]"
                                id="answer_{{$q->id}}_{{$j->id}}" value="{{$q->id}}_{{$j->id}}_{{$j->nilai}}">
                            <label class="form-check-label" for="answer_{{$q->id}}_{{$j->id}}">
                                <img src="{{ asset('assets/images/emoji/'.($j->nilai).'.png') }}" alt="{{ $j->kode }}"
                                    height="24" width="24">
                                {{ $j->jawaban }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </ol>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<div hidden id="survey-saran">
    <form method="post" id="form-isi-saran">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="saran" class="col-form-label">Saran / Masukan / Kritik / Ulasan :</label>
                    <textarea name="saran" id="saran" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </form>
</div>