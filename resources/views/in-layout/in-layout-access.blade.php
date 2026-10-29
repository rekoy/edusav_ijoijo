<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content - Omarco</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/tailwind.config.js"></script>
    @yield('additional-css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>

<body>

    <header class="header-bg bg-omarcogray text-white shadow-lg top-0 w-full z-50">
        <div class="container px-4 mx-auto py-3 flex justify-between items-center max-w-7xl">
            <a href="/" class="text-3xl font-bold flex items-center">
                <img src="/assets/images/logo.png" alt="Omarco Logotype" class="h-8 md:h-10">
            </a>

            <button id="mobile-menu-toggle" class="lg:hidden p-2 rounded focus:outline-none mobile-menu-toggle">
                <span class="material-icons-outlined !text-gray-500">menu</span>
            </button>

           <nav class="hidden lg:flex items-center space-x-1 text-sm lg:text-base" role="navigation" aria-label="Main">
                                <a href="{{ route('home') }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">home</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Home</span>
                </a>

                                <a href="{{ route('content-detail',8) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">info</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">About Omarco Voucher</span>
                </a>

                                <a href="{{ route('content-detail',9) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">article</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Driving Financial Inclusion</span>
                </a>

                                <a href="{{ route('content-detail',10) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">contacts</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Multiple Benefits</span>
                </a>

                                <a href="{{ route('content-detail',33) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">dashboard</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Prize Draw Info</span>
                </a>

                                                <div class="relative group z-[9999]">                     <button type="button"
                            class="flex items-center py-2 px-3 rounded-md transition-colors duration-200 bg-transparent">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                        <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">account_circle</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">My Account</span>
                    <span class="material-icons-outlined ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">expand_more</span>
                    </button>

                    <ul class="absolute left-0 top-full bg-omarcogreen shadow-lg text-base text-white min-w-full hidden group-hover:block">
                    <li><a href="{{ route('profile') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Profile</a></li>
                    <li><a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>Dashboard</a></li>
                    <li><a href="{{ route('drawing.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Live Draw</a></li>
                    <li><a href="{{ route('content-history') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Library</a></li>
                    <li><a href="{{ route('draw-my-win') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Draw History</a></li>
                    <li><a href="{{ route('credit.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Transaction History</a></li>
                    <li><a href="{{ route('coupon.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Benefit Use History</a></li>
                    <li><a href="{{ route('logout') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">logout</span>Logout</a></li>
                    </ul>
                </div>
                </nav>

        </div>


        <div id="mobile-menu" class="mobile-menu lg:hidden bg-gray-700 hidden overflow-y-auto max-h-[calc(100vh-4rem)]">
            <nav class="flex flex-col p-4 space-y-1">
              <a href="{{ route('home') }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">home</span>Home</span>
              </a>
              <a href="{{ route('content-detail',8) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">info</span>About Omarco Voucher</span>
              </a>
              <a href="{{ route('content-detail',9) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">article</span>Driving Financial Inclusion
              </a>
              <a href="{{ route('content-detail',10) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">contacts</span>Multiple Benefits</span>
              </a>
              <a href="{{ route('content-detail',33) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">dashboard</span>Prize Draw Info</span>
              </a>

                <div class="relative">
                    <button id="mobile-account-trigger" class="w-full flex items-center justify-between py-2 px-3 rounded-md hover:!text-omarcogreen">
                        <span class="flex items-center gap-2">
                            <span class="material-icons-outlined">account_circle</span>My Account
                        </span>
                        <span id="mobile-account-icon" class="material-icons-outlined transition-transform duration-300">expand_more</span>
                    </button>

                    <ul id="mobile-account-dropdown" class="relative mt-1 bg-omarcogreen shadow-lg text-base text-white min-w-full hidden rounded-md z-10">
                        <li><a href="{{ route('profile') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Profile</a></li>
                        <li><a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>Dashboard</a></li>
                        <li><a href="{{ route('drawing.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Live Draw</a></li>
                        <li><a href="{{ route('content-history') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Library</a></li>
                        <li><a href="{{ route('draw-my-win') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Draw History</a></li>
                        <li><a href="{{ route('credit.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Transaction History</a></li>
                        <li><a href="{{ route('coupon.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Benefit Use History</a></li>
                        <li><a href="{{ route('logout') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">logout</span>Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <main>
        <section id="hero-section"
            class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="container max-w-7xl mx-auto relative md:px-0 px-4 py-5">
                <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
                    <div class="lg:w-4/12 md:w-5/12 w-full">
                        <img src="/assets/images/logo.png" alt="Omarco Logo in Hero"
                            class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
                    </div>
                    <div class="lg:w-9/12 md:w-7/12 w-full">
                        <div
                            class="flex flex-col md:gap-7 gap-3 text-center md:text-end xl:text-end lg:text-end 2xl:text-end items-center md:items-end lg:items-end xl:items-end 2xl:text-end">
                            <h1 class="text-2xl md:text-4xl font-impact uppercase w-fit">
                                Be Better With Money
                            </h1>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section id="carousel-section" class="win-cash-bg text-center text-white relative">
            <div class="container mx-auto max-w-7xl relative overflow-hidden">
                
                <div id="carousel-slides" class="flex transition-transform duration-500 ease-in-out">

                    <div class="flex-shrink-0 w-full">
                        <div class="flex md:flex-row flex-col items-center">
                            <div class="md:w-4/12 relative mx-auto w-full">
                                <img src="/assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover w-full">
                            </div>
                            <div class="md:w-8/12 md:text-center text-center py-6 px-4">
                                <p class="uppercase text-4xl md:text-7xl font-bold">one step ahead</p>
                                <p class="uppercase md:text-3xl text-lg font-bold">chance to win 100 million rupiah</p>
                                <p class="uppercase md:text-3xl text-lg font-bold">only with Rp 5,000 / unit</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex-shrink-0 w-full">
                        <div class="flex md:flex-row flex-col items-center">
                            <div class="md:w-4/12 relative mx-auto w-full">
                                <img src="/assets/images/big_cash.png" alt="Another Prize" class="object-cover w-full">
                            </div>
                            <div class="md:w-8/12 md:text-center text-center py-6 px-4">
                                <p class="uppercase text-4xl md:text-7xl font-bold">New Offer</p>
                                <p class="uppercase md:text-3xl text-lg font-bold">Win a brand new motorcycle!</p>
                                <p class="uppercase md:text-3xl text-lg font-bold">Available for a limited time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex-shrink-0 w-full">
                        <div class="flex md:flex-row flex-col items-center">
                            <div class="md:w-4/12 relative mx-auto w-full">
                                <img src="/assets/images/big_cash.png" alt="Travel Prize" class="object-cover w-full">
                            </div>
                            <div class="md:w-8/12 md:text-center text-center py-6 px-4">
                                <p class="uppercase text-4xl md:text-7xl font-bold">Dream Getaway</p>
                                <p class="uppercase md:text-3xl text-lg font-bold">All-expenses-paid trip to Bali!</p>
                                <p class="uppercase md:text-3xl text-lg font-bold">Purchase 20 units to enter.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <button id="carousel-prev"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 bg-black/50 hover:bg-black/80 transition text-white z-30 hidden md:block">
                    <span class="material-icons-outlined">chevron_left</span>
                </button>

                <button id="carousel-next"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 bg-black/50 hover:bg-black/80 transition text-white z-30 hidden md:block">
                    <span class="material-icons-outlined">chevron_right</span>
                </button>
                
                <div id="carousel-dots-container" class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 p-2 z-30">
                    </div>

            </div>
        </section>
        <section class="bg-white">
            <div class="container mx-auto max-w-7xl px-0 relative">

                <div class="lg:hidden flex justify-start p-4">
                    <button id="content-menu-toggle"
                        class="bg-rose-500 text-white p-2 rounded-full shadow-lg transition-colors duration-200 hover:bg-rose-600 z-50">
                        <span id="content-menu-icon" class="material-icons-outlined">menu</span>
                    </button>
                </div>
                <div class="hidden lg:block">
                    <ul class="grid grid-cols-2 lg:grid-cols-4">

                        <li class="relative border-r border-rose-600 group">
                            <div
                                class="cursor-pointer flex items-center justify-between lg:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons-outlined">photo_camera</span>
                                    Watch & Learn
                                </div>
                                <span class="material-icons-outlined transition-transform duration-200">expand_more</span>
                            </div>
                            <ul
                                class="absolute left-0 top-full bg-omarcogreen shadow-lg lg:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
                                <li class="border-b border-white">
                                    <a href="{{ route('content-video') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">wallet</span>
                                        <span>All Media</span>
                                    </a>
                                </li>
                                <li class="border-b border-white">
                                    <a href="{{ route('content-summary') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">wallet</span>
                                        <span>Type of Media</span>
                                    </a>
                                </li>

                                <li class="border-b border-white">
                                    <a href="{{ route('content-history') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">redeem</span>
                                        <span>My Media</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="relative border-r border-rose-600 group">
                            <div
                                class="cursor-pointer flex items-center justify-between lg:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons-outlined">wallet</span>
                                    Shop & Save
                                </div>
                                <span class="material-icons-outlined transition-transform duration-200">expand_more</span>
                            </div>
                            <ul
                                class="absolute left-0 top-full bg-omarcogreen shadow-lg lg:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
                                <li class="border-b border-white">
                                    <a href="{{ route('coupon-available') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">wallet</span>
                                        <span>Available Discounts</span>
                                    </a>
                                </li>
                                <li class="border-b border-white">
                                    <a href="{{ route('coupon.my') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">redeem</span>
                                        <span>Get Coupon</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="relative border-r border-rose-600 group">
                            <div
                                class="cursor-pointer flex items-center justify-between lg:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons-outlined">account_balance_wallet</span>
                                    Buy Vouchers
                                </div>
                                <span class="material-icons-outlined transition-transform duration-200">expand_more</span>
                            </div>
                            <ul
                                class="absolute left-0 top-full bg-omarcogreen shadow-lg lg:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
                                <li class="border-b border-white">
                                    <a href="{{ route('wallet.topup') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">book_online</span>
                                        <span>Voucher Purchase</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="relative border-r border-rose-600 group">
                            <div
                                class="cursor-pointer flex items-center justify-between lg:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons-outlined">dashboard</span>
                                    Enter & Win
                                </div>
                                <span class="material-icons-outlined transition-transform duration-200">expand_more</span>
                            </div>
                            <ul
                                class="absolute left-0 top-full bg-omarcogreen shadow-lg lg:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
                                <li class="border-b border-white">
                                    <a href="{{ route('draw-list') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">wallet</span>
                                        <span>Current Draw & Price</span>
                                    </a>
                                </li>
                                <li class="border-b border-white">
                                    <a href="{{ route('draw-my-win') }}"
                                        class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                                        <span class="material-icons-outlined">redeem</span>
                                        <span>Claim Price</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
        </section>
        <div id="main-content-mobile-menu" class="lg:hidden bg-rose-600 border-white hidden">
            <nav class="flex flex-col p-4 space-y-1">
                <div class="relative">
                    <button class="content-dropdown-trigger w-full flex items-center justify-between py-2 px-3 rounded-md hover:text-omarcogreen text-white">
                        <span class="flex items-center gap-2">
                            <span class="material-icons-outlined">photo_camera</span>Watch & Learn
                        </span>
                        <span class="material-icons-outlined transition-transform duration-300 content-dropdown-icon">expand_more</span>
                    </button>
                    <ul class="content-dropdown-menu relative mt-1 bg-omarcogreen shadow-lg text-base text-white min-w-full hidden rounded-md">
                        <li><a href="{{ route('content-video') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">wallet</span>All Media</a></li>
                        <li><a href="{{ route('content-summary') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">wallet</span>Type of Media</a></li>
                        <li><a href="{{ route('content-history') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">redeem</span>My Media</a></li>
                    </ul>
                </div>
                
                <div class="relative">
                    <button class="content-dropdown-trigger w-full flex items-center justify-between py-2 px-3 rounded-md hover:text-omarcogreen text-white">
                        <span class="flex items-center gap-2">
                            <span class="material-icons-outlined">wallet</span>Shop & Save
                        </span>
                        <span class="material-icons-outlined transition-transform duration-300 content-dropdown-icon">expand_more</span>
                    </button>
                    <ul class="content-dropdown-menu relative mt-1 bg-omarcogreen shadow-lg text-base text-white min-w-full hidden rounded-md">
                        <li><a href="{{ route('coupon-available') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">wallet</span>Available Discounts</a></li>
                        <li><a href="{{ route('coupon.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">redeem</span>Get Coupon</a></li>
                    </ul>
                </div>

                <div class="relative">
                    <button class="content-dropdown-trigger w-full flex items-center justify-between py-2 px-3 rounded-md hover:text-omarcogreen text-white">
                        <span class="flex items-center gap-2">
                            <span class="material-icons-outlined">account_balance_wallet</span>Buy Vouchers
                        </span>
                        <span class="material-icons-outlined transition-transform duration-300 content-dropdown-icon">expand_more</span>
                    </button>
                    <ul class="content-dropdown-menu relative mt-1 bg-omarcogreen shadow-lg text-base text-white min-w-full hidden rounded-md">
                        <li><a href="{{ route('wallet.topup') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">book_online</span>Voucher Purchase</a></li>
                    </ul>
                </div>
                
                <div class="relative">
                    <button class="content-dropdown-trigger w-full flex items-center justify-between py-2 px-3 rounded-md hover:text-omarcogreen text-white">
                        <span class="flex items-center gap-2">
                            <span class="material-icons-outlined">dashboard</span>Enter & Win
                        </span>
                        <span class="material-icons-outlined transition-transform duration-300 content-dropdown-icon">expand_more</span>
                    </button>
                    <ul class="content-dropdown-menu relative mt-1 bg-omarcogreen shadow-lg text-base text-white min-w-full hidden rounded-md">
                        <li><a href="{{ route('draw-list') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">wallet</span>Current Draw & Price</a></li>
                        <li><a href="{{ route('draw-my-win') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">redeem</span>Claim Price</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- to this--->

        @yield('content')

    </main>

    <footer class="bg-omarcogray text-black py-8">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="grid lg:grid-cols-4 grid-cols-2 gap-8 mb-8">
                <div>
                    <h5 class="font-bold text-lg mb-3">Omarco Edusav</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-omarcogreen transition-colors">Home</a></li>
                        <li><a href="{{ route('content-detail',8 ) }}"
                                class="hover:text-omarcogreen transition-colors">About</a></li>
                        <li><a href="{{ route('content-detail',21 ) }}"
                                class="hover:text-omarcogreen transition-colors">Service</a></li>
                        <li><a href="{{ route('content-video') }}"
                                class="hover:text-omarcogreen transition-colors">Search</a></li>
                        <li><a href="{{ route('content-detail',22 ) }}"
                                class="hover:text-omarcogreen transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="font-bold text-lg mb-3">Legal</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('content-detail',23 ) }}"
                                class="hover:text-omarcogreen transition-colors">Terms of service</a></li>
                        <li><a href="{{ route('content-detail',24 ) }}"
                                class="hover:text-omarcogreen transition-colors">Trademarks</a></li>
                        <li><a href="{{ route('content-detail',25 ) }}"
                                class="hover:text-omarcogreen transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="font-bold text-lg mb-3">Company</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('content-detail',26 ) }}"
                                class="hover:text-omarcogreen transition-colors">Careers</a></li>
                        <li><a href="{{ route('content-detail',27 ) }}"
                                class="hover:text-omarcogreen transition-colors">Made in Indonesia</a></li>
                        <li><a href="{{ route('content-detail',28 ) }}"
                                class="hover:text-omarcogreen transition-colors">Advertise</a></li>
                        <li><a href="{{ route('content-detail',29 ) }}"
                                class="hover:text-omarcogreen transition-colors">Help</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="font-bold text-lg mb-3">Connect With Us</h5>
                    <div class="flex space-x-3">
                        <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                                src="{{ config('urls.social_icons.facebook') }}"
                                alt="Facebook social media icon" class="rounded w-6 h-6"></a>
                        <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                                src="{{ config('urls.social_icons.twitter') }}"
                                alt="Twitter social media icon" class="rounded w-6 h-6"></a>
                        <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                                src="{{ config('urls.social_icons.instagram') }}"
                                alt="Instagram social media icon" class="rounded w-6 h-6"></a>
                    </div>
                </div>
            </div>
            <div class="border-t pt-8 text-center text-sm">
                <p>© 2025 Omarco Edusav. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
      const menuToggle = document.getElementById('mobile-menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      const mobileMenuLinks = mobileMenu.querySelectorAll('a');
      const dropdownTrigger = document.getElementById('mobile-account-trigger');
      const dropdownMenu = document.getElementById('mobile-account-dropdown');
      const dropdownIcon = document.getElementById('mobile-account-icon');

      function closeMobileMenu() {
        if (mobileMenu.classList.contains('open')) {
          mobileMenu.classList.remove('open');
          mobileMenu.classList.add('hidden');
          menuToggle.innerHTML = '<span class="material-icons-outlined !text-gray-500">menu</span>';
        }
      }

      function collapseAccountDropdown() {
        if (!dropdownMenu.classList.contains('hidden')) {
          dropdownMenu.classList.add('hidden');
          dropdownIcon.classList.remove('rotate-180');
        }
      }

      menuToggle?.addEventListener('click', () => {
        console.log("Menu toggle clicked");
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('open');
        if (mobileMenu.classList.contains('open')) {
          menuToggle.innerHTML = '<span class="material-icons-outlined !text-gray-500">close</span>';
        } else {
          menuToggle.innerHTML = '<span class="material-icons-outlined !text-gray-500">menu</span>';
          collapseAccountDropdown();
        }
      });

      mobileMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
          collapseAccountDropdown();
          closeMobileMenu();
        });
      });

      dropdownTrigger?.addEventListener('click', e => {
        e.preventDefault();
        dropdownMenu.classList.toggle('hidden');
        dropdownIcon.classList.toggle('rotate-180');
      });

        document.addEventListener('DOMContentLoaded', () => {
        const menuToggles = document.querySelectorAll('.content-menu-toggle');

        menuToggles.forEach(toggle => {
            if (window.innerWidth < 768) { 
            toggle.addEventListener('click', function() {
                const dropdown = this.nextElementSibling;
                const toggleIcon = this.querySelector('.toggle-icon');
                
                if (dropdown && dropdown.classList.contains('content-dropdown')) {
                const isHidden = dropdown.classList.contains('hidden');
                
                document.querySelectorAll('.content-dropdown').forEach(dd => {
                    if (dd !== dropdown) {
                    dd.classList.add('hidden');
                    dd.previousElementSibling.querySelector('.toggle-icon').classList.remove('rotate-180');
                    }
                });

                if (isHidden) {
                    dropdown.classList.remove('hidden');
                    toggleIcon.classList.add('rotate-180');
                } else {
                    dropdown.classList.add('hidden');
                    toggleIcon.classList.remove('rotate-180');
                }
                }
            });
            }
        });

        window.addEventListener('resize', () => {
            location.reload();
        });
        });
    </script>

    @yield('additional-js')

</body>

<script>
    var BASE_URL = "{{ config('urls.base.web') }}";
    var API_URL = "{{ config('urls.base.api') }}/api";

    function loading() {
        var output = '<div align="center"><br /><br /><br />';
        output += '<img src="' + BASE_URL + '/assets/img/icegif-loading.gif" width="30" /> Please wait...</div>';
        return output;
    }

    const formatWithDecimal = new Intl.NumberFormat('id-ID', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    // ===================================
    // CAROUSEL FUNCTIONALITY (PURE JS)
    // ===================================

    // Initialize carousel variables
    const slidesContainer = document.getElementById('carousel-slides');
    const slides = slidesContainer ? slidesContainer.children.length : 0;
    const nextButton = document.getElementById('carousel-next');
    const prevButton = document.getElementById('carousel-prev');
    const dotsContainer = document.getElementById('carousel-dots-container');

    let currentSlide = 1; // 1-based index
    const autoSlideInterval = 5000; // 5 seconds
    let intervalId;

    function updateCarousel() {
        if (!slidesContainer) return;
        
        // Calculate new translateX position
        const offset = (currentSlide - 1) * 100;
        slidesContainer.style.transform = `translateX(-${offset}%)`;

        // Update dots
        if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll('.carousel-dot');
            dots.forEach((dot, index) => {
                dot.classList.remove('bg-white');
                dot.classList.add('bg-gray-500');
                if (index + 1 === currentSlide) {
                    dot.classList.add('bg-white');
                    dot.classList.remove('bg-gray-500');
                }
            });
        }
    }

    function goToSlide(n) {
        currentSlide = n;
        updateCarousel();
    }

    function nextSlide() {
        currentSlide = currentSlide === slides ? 1 : currentSlide + 1;
        updateCarousel();
    }

    function prevSlide() {
        currentSlide = currentSlide === 1 ? slides : currentSlide - 1;
        updateCarousel();
    }

    function startAutoSlide() {
        clearInterval(intervalId); 
        intervalId = setInterval(nextSlide, autoSlideInterval);
    }

    function setupDots() {
        if (!dotsContainer) return;

        dotsContainer.innerHTML = '';
        for (let i = 1; i <= slides; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-3 h-3 rounded-full transition-colors duration-300 carousel-dot';
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }
        updateCarousel();
    }

    function initCarousel() {
        if (slidesContainer && slides > 1) {
            slidesContainer.style.display = 'flex';
            
            setupDots();

            nextButton?.addEventListener('click', () => {
                nextSlide();
                startAutoSlide();
            });
            prevButton?.addEventListener('click', () => {
                prevSlide();
                startAutoSlide();
            });

            startAutoSlide();
        } else if (slidesContainer) {
            nextButton?.classList.add('hidden');
            prevButton?.classList.add('hidden');
            dotsContainer?.classList.add('hidden');
        }
    }

    window.addEventListener('load', initCarousel);

    const contentMenuToggle = document.getElementById('content-menu-toggle');
    const contentMobileMenu = document.getElementById('main-content-mobile-menu');
    const contentMenuIcon = document.getElementById('content-menu-icon');
    const contentDropdownTriggers = document.querySelectorAll('.content-dropdown-trigger');

    contentMenuToggle?.addEventListener('click', () => {
        contentMobileMenu.classList.toggle('hidden');
        if (contentMobileMenu.classList.contains('hidden')) {
            contentMenuIcon.textContent = 'apps';
        } else {
            contentMenuIcon.textContent = 'close';
            closeMobileMenu(); 
        }
    });

    contentDropdownTriggers?.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const dropdown = trigger.nextElementSibling;
            const icon = trigger.querySelector('.content-dropdown-icon');

            document.querySelectorAll('.content-dropdown-menu').forEach(dd => {
                if (dd !== dropdown) {
                    dd.classList.add('hidden');
                    dd.previousElementSibling.querySelector('.content-dropdown-icon').classList.remove('rotate-180');
                }
            });

            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });

    contentMobileMenu?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            contentMobileMenu.classList.add('hidden');
            contentMenuIcon.textContent = 'apps';
            document.querySelectorAll('.content-dropdown-menu').forEach(dd => dd.classList.add('hidden'));
            document.querySelectorAll('.content-dropdown-icon').forEach(icon => icon.classList.remove('rotate-180'));
        });
    });


</script>
<script src="/js/edusav_all.js"></script>

</html>