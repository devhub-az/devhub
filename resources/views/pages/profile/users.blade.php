@extends('layouts.layout')

@section('title')Müəlliflər @stop

@section('main')
    <div class="container w-full my-4 mx-auto " id="app">
        <div class="pb-2">
            <p class="text-5xl font-medium pb-4">Müəlliflər</p>
            <p>
                Hablar müəyyən mövzularda nəşrlərin yerləşdirildiyi bölmələrdir. Onlar yalnız saytdakı bütün
                məlumatları rahat şəkildə qurulmasına deyil, həm də istifadəçi qidasının formalaşmasına kömək edir -
                yalnız maraqlı olan ocaqlara yazılmaq.
            </p>
        </div>
        <users-list @auth :auth_check="true" @endauth :url="'/api/authors'"></users-list>
        {{--            <div class="content_right">--}}
        {{--                @include('pages.profile.include.users_right')--}}
        {{--            </div>--}}
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/users.js') }}"></script>
@endpush

@push('styles')
    <link rel="preload" href="{{ mix('js/users.js') }}" as="script">
@endpush
