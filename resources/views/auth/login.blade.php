@extends('layouts.blank')

@section('css')
<style>
    #wrapper-login {
        background: #fff;
        height: 100vh;
        max-height: 100vh;
        position: relative;
    }

    @media (min-width: 1080px) {
        .left {
            flex: 1;
            width: 100%;
            max-width: 600px;
            position: relative;
            padding: 140px 4.2rem;
        }
    }

    .right {
        flex: 1;
        width: 100%;
        background: linear-gradient(45deg, #bac6ff, #da91da);
    }

    .eye-login {
        top: 12px;
        right: 13px;
        color: #a4b1bc;
        cursor: pointer;
    }

    .form-control {
        border: 1px solid #d6d7df;
    }
</style>
@endsection

@section('content')
<div>
    <div id="wrapper-login" class="d-flex">

        <div class="left">
            <div class="login">
                <div class="text-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('logo_kemenag.svg') }}" style="height: 54px;" class="mb-3" />
                    </a>
                </div>

                <h2 class="mb-5 fw-semibold text-center">M A S U K</h2>

                <div id="error-msg">

                </div>

                <form method="post" id="form-login" spellcheck="false">
                    <div class="mb-4">
                        <label for="username" class="fw-semibold mb-1">Username</label>
                        <input type="text" name="username" id="username" class="form-control px-3 py-2" maxlength="70"
                            tabindex="1" required />
                    </div>
                    <div class="mb-5">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="fw-semibold mb-1">Password</label>
                            <a href="/forgot-password" class="text-decoration-none" tabindex="3"
                                style="font-size: 14px;">Forgot Password</a>
                        </div>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" tabindex="2"
                                class="form-control px-3 py-2 pe-5" maxlength="40" required />
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100 py-2">MASUK</button>
                    </div>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember_me">
                            <label class="form-check-label" for="remember_me">
                                Ingatlah diriku (selalu)
                            </label>
                        </div>
                    </div>
                </form>

                {{-- <div class="mt-5 text-center">
                    <p>Doesn't have account? <a href="/register" class="text-decoration-none">Register</a></p>
                </div> --}}
            </div>
        </div>
        <div class="right position-relative">
            <img src="{{ asset('assets/images/login.svg') }}" alt="Login"
                style="max-width: 700px; position: absolute; top: 50%; right: 50%; transform: translate(50%,-50%);"
                </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        $(document).ready(function() {
        $('#form-login').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ url('/auth/l091n') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    username: $('#username').val(),
                    password: $('#password').val(),
                },
                success: function(response) {
                    $('#error-msg').html('');
                    window.location.href = "{{ url('/admin/dashboard') }}";
                },
                error: function(xhr, stat, err) {
                    if (xhr.status == 401) {
                        $('#error-msg').html(`<div class="alert alert-danger">
                            ${xhr.responseJSON.message}
                        </div>`);
                    }
                }
            });

        });
    });
    </script>
    @endsection
