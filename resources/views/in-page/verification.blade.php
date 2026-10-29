@extends('in-layout.in-layout-home')


@section('additional-css')
    <style>
        section {
            overflow-x: hidden;
        }
    </style>
@endsection


@section('content')
    <!-- Hero Section: BE BETTER WITH MONEY -->
    <section id="hero-section"
        class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
        <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur A001 -->
        <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5">
            <!-- Left Side: Logo and Tagline -->
            <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
                <div class="lg:w-4/12 md:w-5/12 w-full">
                    <!-- Placeholder for logo.png -->
                    <img src="assets/images/logo.png" alt="Omarco Logo in Hero"
                        class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
                </div>
                <div class="lg:w-9/12 md:w-7/12 w-full">
                    <div
                        class="flex flex-col md:gap-7 gap-3 text-center md:text-end xl:text-end lg:text-end 2xl:text-end items-center md:items-end lg:items-end xl:items-end 2xl:text-end">
                        <h1 class="text-2xl md:text-4xl font-impact uppercase w-fit">
                            Be Better With Money
                        </h1>
                        <button type="button"
                            class="w-fit font-bold bg-green-700 hover:bg-green-600 text-white py-2 px-4 text-xl transition-colors duration-200 rounded-md">
                            <a href="{{ route('registration') }}" class="text-white no-underline">
                                Join in
                            </a>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="bg-white py-6 md:py-10">
        <div class="container mx-auto max-w-7xl px-4 text-center">
            <p><b>{{ $dt_content['message'] }}</b></p>
            <p class="mt-3">
                {{ __('Redirecting to home in') }}
                <strong id="countdown">5</strong>
                {{ __('seconds...') }}
            </p>
            <a href="/index">Back to home now</a>
        </div>
    </section>

    <section class="bg-white py-6 md:py-10">
        <div class="container mx-auto max-w-7xl px-4">
            <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
                <img src="/assets/images/news-ico.png" class="h-8 md:h-10">Omarco News
            </p>
            <div class="py-6 md:py-10">
                <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">

                    @if (isset($dt_content['contents']) && is_array($dt_content['contents']))
                        @foreach($dt_content['contents'] ?? [] as $row)
                            @if ($row['lco_cat_ref'] == 1)
                                <div class="flex flex-col">
                                    <a href="{{ route('content-detail', $row['lco_id']) }}">
                                        <div class="relative w-full h-[200px] border">
                                            <img src="{{ $row['lco_image'] }}" alt="News 1"
                                                class="object-cover h-[200px] w-full">
                                        </div>
                                        <div class="text-black py-4 text-left">
                                            <p class="text-lg line-clamp-2 text-ellipsis">
                                                {{ $row['lco_title'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        let countdownSeconds = 5;
        const redirectUrl = "{{ route('index') }}";

        const countdownInterval = setInterval(() => {
            countdownSeconds--;
            document.getElementById('countdown').textContent = countdownSeconds;

            if (countdownSeconds <= 0) {
                clearInterval(countdownInterval);
                window.location.href = redirectUrl;
            }
        }, 1000);
    </script>
@endsection
