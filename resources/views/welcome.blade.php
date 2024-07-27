<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts
    <link rel="preconnect" href="https://fonts.bunny.net"> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <header>
        <div class="container flex items-center space-x-8 py-4 px-4 xl:px-0 mx-auto">
            <div class="w-full">
                <div class="flex gap-x-12 justify-end">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Контакты горячии линий</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Ответы на вопросы</a>
                    <div class="text-right">
                        <form method="POST">
                            <label>
                                <select class="border-0 bg-transparent" name="locale" id="language">
                                    <option class="text-gray-800" value="kz">KZ</option>
                                    <option class="text-gray-800" value="ru">RU</option>
                                </select>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ openMenu: null }" class="container mx-auto border-gray-300 border-t border-b">
            <nav class="mx-auto flex max-w-7xl items-center justify-end lg:justify-between py-4 lg:py-0"
                aria-label="Global">
                <div class="flex lg:hidden">
                    <button type="button" @click="toggleBurgerMenu"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex ">
                    <a href="/"><img class="h-28" src="/logo.png" alt="logo"></a>
                </div>
                <div class="hidden lg:flex lg:gap-x-6 lg:justify-end">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Маршрут вакцинации</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Национальный каленьдар</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Опасные инфекции</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Тест о знаниях</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Процесс вакцинации</a>
                </div>
            </nav>
        </div>

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-show="isBurgerMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="text-right">
                    <button type="button" @click="isBurgerMenuOpen=false" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-auto w-full" src="logo.png" alt="">
                </a>

                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <div class="-mx-3">
                                <button type="button"
                                    class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                    aria-controls="disclosure-1" aria-expanded="false">
                                    Маршрут вакцинации
                                    <!--
                                      Expand/collapse icon, toggle classes based on menu open state.

                                      Open: "rotate-180", Closed: ""
                                    -->
                                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- 'Product' sub-menu, show/hide based on menu state. -->
                            </div>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Национальный
                                каленьдар</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                Опасные инфекции
                            </a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Тест
                                о знаниях</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Процесс
                                вакцинации</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div style="background-image: url('/img/hero.jpg');" class="bg-right-top">
        <div class="hero-gradient w-[80%] sm:w-[70%]">
            <div class="py-28 pl-10 sm:pl-20 xl:pl-40 grid gap-5 sm:gap-8">
                <p class="text-3xl sm:text-4xl text-white font-semibold">НАО «Медицинский университет Семей»</p>
                <p class="text-lg sm:text-2xl text-white">Балалар вакцинасына қатысты барлық<br>ақпараттар осында</p>
                <a
                    class="shadow-[inset_0_0_0_4px_#facc15,inset_0_0_0_5px_#fff] bg-yellow-400 w-28 p-2 text-center font-semibold text-lg cursor-pointer">Button</a>
                <p class="text-xl text-white mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-6">
        <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 mb-4">
            <div class="lg:col-span-4">
                <div class="rounded-md border-yellow-500 border-t-4 shadow-lg mb-4 pb-2">
                    <h1 class="text-xl p-4 border-b">Маршрут вакцинации</h1>
                    <ul class="grid grid-rows-3 grid-flow-col mt-4 gap-4 mb-4">
                        <li class="m-auto">
                            <a href="#" id="id1"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl sm:text-xl break-words font-semibold">Беременность</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id2"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">1-4
                                        день</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id3"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">2
                                        месяца</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id4"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">3
                                        месяца</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id5"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">4
                                        месяца</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id6"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">12-15
                                        месяца</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id7"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">18
                                        месяца</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id8"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">6
                                        лет</span>
                                </div>
                            </a>
                        </li>
                        <li class="m-auto">
                            <a href="#" id="id9"
                                class="animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-cyan-500 w-24 h-24 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full text-center p-2 text-white text-sm sm:text-xl break-words font-semibold">16
                                        лет</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="rounded-md border-yellow-500 border-t-4 shadow-lg">
                    <div class="flex justify-between items-center px-4">
                        <h1 class="text-xl py-4 border-b">СТАТЬИ ДОК.МЕД</h1>
                        <div class="w-8 h-8">
                            <a href="#">
                                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                    stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m12.012 1.995c-5.518 0-9.998 4.48-9.998 9.998s4.48 9.998 9.998 9.998 9.997-4.48 9.997-9.998-4.479-9.998-9.997-9.998zm0 1.5c4.69 0 8.497 3.808 8.497 8.498s-3.807 8.498-8.497 8.498-8.498-3.808-8.498-8.498 3.808-8.498 8.498-8.498zm1.528 4.715s1.502 1.505 3.255 3.259c.146.147.219.339.219.531s-.073.383-.219.53c-1.753 1.754-3.254 3.258-3.254 3.258-.145.145-.336.217-.527.217-.191-.001-.383-.074-.53-.221-.293-.293-.295-.766-.004-1.057l1.978-1.977h-6.694c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h6.694l-1.979-1.979c-.289-.289-.286-.762.006-1.054.147-.147.339-.221.531-.222.19 0 .38.071.524.215z"
                                        fill-rule="nonzero" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4 p-4">
                        <div>
                            <img class="w-full mb-2 rounded-md" src="/img/lorem.jpg" alt="">
                            <div>
                                <h1 class="font-semibold text-base border-b pb-2">Sed diam nonumy eirmod</h1>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
                                <a class="block text-right underline my-2 text-gray-600" href="#">Толығырақ</a>
                            </div>
                        </div>
                        <div>
                            <img class="w-full mb-2 rounded-md" src="/img/lorem.jpg" alt="">
                            <div>
                                <h1 class="font-semibold text-base border-b pb-2">Sed diam nonumy eirmod</h1>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
                                <a class="block text-right underline my-2 text-gray-600" href="#">Толығырақ</a>
                            </div>
                        </div>
                        <div>
                            <img class="w-full mb-2 rounded-md" src="/img/lorem.jpg" alt="">
                            <div>
                                <h1 class="font-semibold text-base border-b pb-2">Sed diam nonumy eirmod</h1>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
                                <a class="block text-right underline my-2 text-gray-600" href="#">Толығырақ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-md border-yellow-500 border-t-4 shadow-lg">
                    <div class="p-5 bg-light-blue">
                        <div class="flex justify-center items-start my-2">
                            <div class="w-full">
                                <h2 class="text-xl font-semibold text-white mb-4">Жиі қойылатын сұрақтар</h2>
                                <ul class="flex flex-col">
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                                        <h2 @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                            <span>When will my order arrive?</span>
                                            <svg :class="handleRotate()"
                                                class="fill-current text-yellow-500 h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                                </path>
                                            </svg>
                                        </h2>
                                        <div x-ref="tab" :style="handleToggle()"
                                            class="border-l-2 border-yellow-500 overflow-hidden max-h-0 duration-500 transition-all">
                                            <p class="p-3 text-gray-900">
                                                Shipping time is set by our delivery partners, according to the delivery
                                                method chosen by you. Additional details can be found in the order
                                                confirmation
                                            </p>
                                        </div>
                                    </li>
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(2)">
                                        <h2 @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                            <span>How do I track my order?</span>
                                            <svg :class="handleRotate()"
                                                class="fill-current text-yellow-500 h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                                </path>
                                            </svg>
                                        </h2>
                                        <div class="border-l-2 border-yellow-500 overflow-hidden max-h-0 duration-500 transition-all"
                                            x-ref="tab" :style="handleToggle()">
                                            <p class="p-3 text-gray-900">
                                                Once shipped, you’ll get a confirmation email that includes a tracking
                                                number and additional information regarding tracking your order.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(3)">
                                        <h2 @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                            <span>What’s your return policy?</span>
                                            <svg :class="handleRotate()"
                                                class="fill-current text-yellow-500 h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                                </path>
                                            </svg>
                                        </h2>
                                        <div class="border-l-2 border-yellow-500 overflow-hidden max-h-0 duration-500 transition-all"
                                            x-ref="tab" :style="handleToggle()">
                                            <p class="p-3 text-gray-900">
                                                We allow the return of all items within 30 days of your original order’s
                                                date. If you’re interested in returning your items, send us an email
                                                with your order number and we’ll ship a return label.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(4)">
                                        <h2 @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                            <span>How do I make changes to an existing order?</span>
                                            <svg :class="handleRotate()"
                                                class="fill-current text-yellow-500 h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                                </path>
                                            </svg>
                                        </h2>
                                        <div class="border-l-2 border-yellow-500 overflow-hidden max-h-0 duration-500 transition-all"
                                            x-ref="tab" :style="handleToggle()">
                                            <p class="p-3 text-gray-900">
                                                Changes to an existing order can be made as long as the order is still
                                                in “processing” status. Please contact our team via email and we’ll make
                                                sure to apply the needed changes. If your order has already been
                                                shipped, we cannot apply any changes to it. If you are unhappy with your
                                                order when it arrives, please contact us for any changes you may
                                                require.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(5)">
                                        <h2 @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                            <span>What shipping options do you have?</span>
                                            <svg :class="handleRotate()"
                                                class="fill-current text-yellow-500 h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                                </path>
                                            </svg>
                                        </h2>
                                        <div class="border-l-2 border-yellow-500 overflow-hidden max-h-0 duration-500 transition-all"
                                            x-ref="tab" :style="handleToggle()">
                                            <p class="p-3 text-gray-900">
                                                For USA domestic orders we offer FedEx and USPS shipping.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(6)">
                                        <h2 @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                            <span>What payment methods do you accept?</span>
                                            <svg :class="handleRotate()"
                                                class="fill-current text-yellow-500 h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                                </path>
                                            </svg>
                                        </h2>
                                        <div class="border-l-2 border-yellow-500 overflow-hidden max-h-0 duration-500 transition-all"
                                            x-ref="tab" :style="handleToggle()">
                                            <p class="p-3 text-gray-900">
                                                Any method of payments acceptable by you. For example: We accept
                                                MasterCard, Visa, American Express, PayPal, JCB Discover, Gift Cards,
                                                etc.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="rounded-md border-yellow-500 border-t-4 shadow-lg mb-4">
                    <div class="flex justify-between items-center px-4">
                        <h1 class="text-xl py-4 border-b">Новости</h1>
                        <div class="w-8 h-8">
                            <a href="#">
                                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                    stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m12.012 1.995c-5.518 0-9.998 4.48-9.998 9.998s4.48 9.998 9.998 9.998 9.997-4.48 9.997-9.998-4.479-9.998-9.997-9.998zm0 1.5c4.69 0 8.497 3.808 8.497 8.498s-3.807 8.498-8.497 8.498-8.498-3.808-8.498-8.498 3.808-8.498 8.498-8.498zm1.528 4.715s1.502 1.505 3.255 3.259c.146.147.219.339.219.531s-.073.383-.219.53c-1.753 1.754-3.254 3.258-3.254 3.258-.145.145-.336.217-.527.217-.191-.001-.383-.074-.53-.221-.293-.293-.295-.766-.004-1.057l1.978-1.977h-6.694c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h6.694l-1.979-1.979c-.289-.289-.286-.762.006-1.054.147-.147.339-.221.531-.222.19 0 .38.071.524.215z"
                                        fill-rule="nonzero" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="py-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 px-4">
                            <div>
                                <img class="w-full rounded-md" src="/img/lorem.jpg" alt="lll">
                            </div>
                            <div class="">
                                <h1 class="font-semibold border-b pb-2">Reasons to Vaccinate Your Child</h1>
                                <p>On-time vaccination helps provide immunity against potentially life-threatening
                                    diseases.</p>
                                <a href="#" class="underline block text-right mt-2">Толығырақ</a>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 px-4">
                            <div>
                                <img class="w-full rounded-md" src="/img/lorem2.jpg" alt="lll">
                            </div>
                            <div class="">
                                <h1 class="font-semibold border-b pb-2">Reasons to Vaccinate Your Child</h1>
                                <p>On-time vaccination helps provide immunity against potentially life-threatening
                                    diseases.</p>
                                <a href="#" class="underline block text-right mt-2">Толығырақ</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <img class="w-full rounded-md" src="/img/chart.jpg" alt="chart">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-500">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 p-4">
                <div class="text-gray-300">
                    <p>Контакты:</p>
                    <ul>
                        <li>+7 747 77 77</li>
                        <li>+7 747 88 88</li>
                    </ul>
                    <p class="my-2">НАО «Медицинский университет Семей». Все права защищены.</p>
                </div>
                <div class="text-gray-300">
                    <p>Ресурсы:</p>
                    <ul>
                        <li><a class="underline"
                                href="https://data.cdc.gov/Vaccinations/Vaccines-gov-COVID-19-vaccinating-provider-locatio/5jp2-pgaw">COVID‑19
                                Vaccine Provider Data</a></li>
                        <li><a class="underline"
                                href="https://data.cdc.gov/Flu-Vaccinations/Vaccines-gov-Flu-vaccinating-provider-locations/bugr-bbfr">Flu
                                Vaccine Provider Data</a></li>
                        <li><a class="underline" href="https://vaccine-resources.gitbook.io/">Provider Resources</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="/js/init-alpine.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/leader-line-new@1.1.9/leader-line.min.js"></script>
    <script>

        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })

        function drawLine(e1, e2, start, end) {
            // Lots of options - [check Leader Line documentation](https://anseki.github.io/leader-line/)
            var line = new LeaderLine(e1, e2, {
                dash: {
                    animation: true
                }
            });
            line.setOptions({
                startSocket: start,
                endSocket: end
            });
            line.color = '#64748b'; // Change the color to red.
            line.size++; // Increase line size.
        }
        // Draw connecting lines between your elements
        drawLine(document.getElementById('id1'), document.getElementById('id2'), 'bottom', 'top');
        drawLine(document.getElementById('id2'), document.getElementById('id3'), 'bottom', 'top');
        drawLine(document.getElementById('id3'), document.getElementById('id4'), 'right', 'left');
        drawLine(document.getElementById('id4'), document.getElementById('id5'), 'bottom', 'top');
        drawLine(document.getElementById('id5'), document.getElementById('id6'), 'bottom', 'top');
        drawLine(document.getElementById('id6'), document.getElementById('id7'), 'right', 'left');
        drawLine(document.getElementById('id7'), document.getElementById('id8'), 'bottom', 'top');
        drawLine(document.getElementById('id8'), document.getElementById('id9'), 'bottom', 'top');
        // Add more lines as needed

    </script>
</body>

</html>