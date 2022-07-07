@extends('layouts.app')
@section('title','Log in')
@section('auth_content')
    <h3>تسجيل دخول</h3>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        @method('POST')
        <div class="errors">
            @if ($errors->all())
                @foreach ($errors->all() as $err)
                    <div class="error">{{ $err }}</div>
                @endforeach
            @endif
        </div>
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
        <div class="back">
            <i class="fal fa-arrow-left"></i>
        </div>
        <div class="auth_form">
            <div class="field active">
                <i class="fal fa-envelope-square"></i>
                <input type="email" name="email" placeholder="البريد الالكتروني" required autofocus>
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="field inactive">
                <i class="fas fa-key"></i>
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="field inactive">
                <button type="submit" disabled aria-hidden="true">تسجيل الدخول</button>
            </div>
        </div>

        <div class="remember-me">
            <input type="checkbox" name="remember">
            <span style='margin-left:0;margin-right:10px;'>تذكرني</span>
        </div>

    </form>
@endsection
