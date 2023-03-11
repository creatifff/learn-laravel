@extends('layout.layout')

@section('page_title', 'Sign In Page')

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

            <form action="{{ route('auth.signin') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>

                <br/>

                <button class="button">Sign In</button>
            </form>
        </div>
    </section>
@endsection
