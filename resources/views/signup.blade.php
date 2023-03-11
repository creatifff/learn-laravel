@extends('layout.layout')

@section('page_title', 'Sign Up Page')

@section('content')
    <section id="main">
        <div class="container">
            {{--      Вывод ошибок      --}}
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{ route('auth.signup') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <label for="password">Repeat Password:</label>
                    <input type="password" name="re_password" id="password">
                </div>

                <div class="form-group">
                    <label for="photo">Choose photo:</label>
                    <input type="file" name="photo" id="photo" value="{{ old('photo') }}">
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="policy">Policy</label>--}}
{{--                    <input type="checkbox" name="policy" id="policy">--}}
{{--                </div>--}}

                <br/>

                <button class="button">Sign Up</button>
            </form>
        </div>
    </section>
@endsection
