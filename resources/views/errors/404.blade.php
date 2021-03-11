@extends('layouts.layout')

@section('title')Page not found @endsection

@section('main')
    <main class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto xs:px-4">
        <div class="text-center flex flex-col justify-center items-center space-y-2 m-auto h-96">
            <lottie-player src="{{ asset('images/errors/astronaout.json') }}" background="transparent"
                           speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            <h1 class="text-8xl font-medium dark:text-gray-300">404</h1>
            <h2 class="text-2xl font-medium dark:text-gray-300">Страница не найдена</h2>
            <p class="font-light dark:text-gray-400 w-2/3">Страница устарела, была удалена или не существовала вовсе</p>
        </div>
    </main>
@stop

@push('scripts')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush
