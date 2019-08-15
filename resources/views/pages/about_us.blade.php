@extends('front.layout')

@section('title')Haqqımızda @stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@stop

@section('main')
<div class="layout_body">
    <div class="about_content">
        <div class="about_body">
            <h1 class="about_header">DevHub — yeni media</h1>
            <div class="text">
                <p>DevHub — media platformasıdı, kollektiv cəmiyyətlərdən və şəxsi bloglardan ibarətdir. Alt sahələrdə məzmun istifadəçilər, redaktorlar və xüsusi hazırlanmış robotlar tərəfindən yaradılır.</p>

                <p>Redaktorlar gündəmi, texnologiyanı və interneti izləyir, eləcə də böyük hekayələr və müsahibələr üzərində işləyirlər. İstifadəçilər ona kömək edə bilər və ya sadəcə onlara maraq mövzusu materiallar dərc edir. Robotlar ictimai şəbəkələrdən bütün məşhur materialları toplayır və xüsusi bölmələrdə dərc edir, həmçinin istifadəçilərə saytdakı özəlləşdirilmiş lentləri yaratmağa kömək edir.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection