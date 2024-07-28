<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>{{ $metaTitle?: 'balavak.kz'.' | '.__("site.app_title")}}</title>
    <meta name="description" content="{{ $metaDescription?:__("site.app_description") }}">
    <meta property="og:title" content="{{ $metaTitle?: 'balavak.kz'}}">
    <meta property="og:description" content="{{ $metaDescription?:__("site.app_description") }}">
    <meta property="og:image" content="/img/not_photo.png">


    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body>
    <header x-data="{ isBurgerMenuOpen: false }">
        <div class="container flex items-center space-x-8 py-4 px-4 xl:px-0 mx-auto">
            <div class="w-full">
                <div class="flex items-center gap-x-4 justify-end">
                <div class="pt-2 relative text-gray-600">
                    <form action="{{ route('search',['locale'=>app()->getLocale()]) }}">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
          type="search" 
          name="query"  
          minlength="4"
          placeholder="{{__("site.search")}}">
        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
          <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
            width="512px" height="512px">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
        </button>
        </form>
      </div>
                <a href="tel:+8 800 080 00 95" class="hidden md:flex items-center text-center space-x-2 text-sm font-semibold leading-6 text-gray-900">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.3747 14.652L15.4964 12.7129C15.3144 12.622 15.1083 12.5908 14.9075 12.6235C14.7067 12.6562 14.5213 12.7512 14.3775 12.8952L12.7535 14.5192C10.4198 14.144 6.7422 10.4674 6.36794 8.13364L7.99196 6.50962C8.1359 6.36583 8.23095 6.18041 8.26366 5.9796C8.29638 5.7788 8.26509 5.57279 8.17424 5.39075L6.23511 1.51249C6.17163 1.38537 6.08099 1.27375 5.96959 1.18554C5.8582 1.09732 5.72878 1.03467 5.59049 1.00202C5.4522 0.969369 5.30842 0.967511 5.16934 0.996579C5.03025 1.02565 4.89925 1.08493 4.78561 1.17023L0.907357 4.07893C0.786941 4.16924 0.689205 4.28635 0.621891 4.42098C0.554576 4.5556 0.519531 4.70406 0.519531 4.85458C0.519531 14.1333 6.75383 20.3676 16.0326 20.3676C16.1831 20.3676 16.3315 20.3326 16.4662 20.2652C16.6008 20.1979 16.7179 20.1002 16.8082 19.9798L19.7169 16.1015C19.8022 15.9879 19.8615 15.8569 19.8906 15.7178C19.9196 15.5787 19.9178 15.4349 19.8851 15.2966C19.8525 15.1584 19.7898 15.0289 19.7016 14.9175C19.6134 14.8061 19.5018 14.7155 19.3747 14.652Z" fill="#396195"></path>
                            <path d="M11.6698 2.91545C13.3406 2.9175 14.9424 3.58214 16.1238 4.76358C17.3052 5.94502 17.9699 7.54681 17.9719 9.21762C17.9719 9.47476 18.0741 9.72137 18.2559 9.9032C18.4377 10.085 18.6843 10.1872 18.9415 10.1872C19.1986 10.1872 19.4452 10.085 19.6271 9.9032C19.8089 9.72137 19.9111 9.47476 19.9111 9.21762C19.9085 7.03267 19.0394 4.93796 17.4944 3.39297C15.9494 1.84799 13.8547 0.978884 11.6698 0.976318C11.4126 0.976318 11.166 1.07847 10.9842 1.2603C10.8023 1.44213 10.7002 1.68874 10.7002 1.94588C10.7002 2.20303 10.8023 2.44964 10.9842 2.63147C11.166 2.8133 11.4126 2.91545 11.6698 2.91545Z" fill="#396195"></path>
                            <path d="M11.6698 6.79387C12.3126 6.79387 12.9292 7.04924 13.3837 7.50381C13.8383 7.95838 14.0937 8.57491 14.0937 9.21778C14.0937 9.47492 14.1958 9.72153 14.3776 9.90336C14.5595 10.0852 14.8061 10.1873 15.0632 10.1873C15.3204 10.1873 15.567 10.0852 15.7488 9.90336C15.9306 9.72153 16.0328 9.47492 16.0328 9.21778C16.0328 8.06063 15.5731 6.95087 14.7549 6.13264C13.9367 5.31441 12.8269 4.85474 11.6698 4.85474C11.4126 4.85474 11.166 4.95689 10.9842 5.13872C10.8023 5.32054 10.7002 5.56716 10.7002 5.8243C10.7002 6.08145 10.8023 6.32806 10.9842 6.50989C11.166 6.69171 11.4126 6.79387 11.6698 6.79387Z" fill="#396195"></path>
                        </svg>
                        <div>
                        <div class="header-phone_text"> {{ $hotLine->{'title_'.app()->getLocale()} }} </div>
                        <div class="font-semibold">{!! $hotLine->{'content_'.app()->getLocale()} !!}</div> 
                        </div>
                </a>
                    @include('partials/language_switcher')
                </div>
            </div>
        </div>
        <div x-data="{ openMenu: null }" class="container mx-auto px-4 border-gray-300 border-t border-b">
            <nav @click.outside="openMenu = null" class="mx-auto flex max-w-7xl items-center justify-end lg:justify-between py-4 lg:py-0"
                aria-label="Global">
                <div class="flex lg:hidden">
                    <button type="button" @click="isBurgerMenuOpen=true"
                        class="mx-2 inline-flex items-center justify-center rounded-md px-3 text-gray-700">
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
                    @foreach($menu as $item)
                        @if(count($item->children) > 0)
                            <div class="relative">
                                <button @click="openMenu === {{ $item->id }} ? openMenu = null : openMenu = {{ $item->id }}"
                                    type="button"
                                    class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                                    aria-expanded="false">
                                    {{ $item->{'title_'.app()->getLocale()} }}
                                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div x-cloak x-show="openMenu === {{ $item->id }}"
                                    class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-52 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-gray-900/5"
                                    x-transition:enter="transition ease-in duration-150"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    aria-label="submenu">
                                    <div class="p-4">
                                        @foreach($item->children as $child)
                                            <div class="relative text-sm leading-6 border-b pb-2 hover:bg-gray-50">
                                                <a href="{{ $child->page ? route('page', ['locale'=>app()->getLocale(),'page'=>$child->page]) : '#' }}"
                                                    class="block font-semibold text-gray-900">
                                                    {{ $child->{'title_'.app()->getLocale()} }}
                                                    <span class="absolute inset-0"></span>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @else
                            <a href="{{ $item->link?$item->link:( $item->page ? route('page', ['locale'=>app()->getLocale(),'page'=>$item->page]) : '#' ) }}"
                                class="text-sm font-semibold leading-6 text-gray-900">{{ $item->{'title_'.app()->getLocale()} }}</a>
                        @endif
                    @endforeach
                </div>
            </nav>
        </div>

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div  x-show="isBurgerMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="text-right">
                    <button type="button" @click="isBurgerMenuOpen=false" class="rounded-md p-4 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <a href="#">
                    <img class="h-auto w-full" src="/logo.png" alt="">
                </a>

                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            @foreach ($menu as $menuItem)
                                @if (count($menuItem->children) > 0)
                                    <div class="-mx-3" x-data="accordion({{100+$menuItem->id}})">
                                        <button type="button" @click="handleClick()"
                                            class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                            aria-controls="disclosure-1" aria-expanded="false">
                                            {{ $menuItem->{'title_'.app()->getLocale()} }}
                                            <!--
                                            Expand/collapse icon, toggle classes based on menu open state.

                                            Open: "rotate-180", Closed: ""
                                            -->
                                            <svg :class="handleRotate()" class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <!-- 'Product' sub-menu, show/hide based on menu state. -->
                                        <div x-ref="tab" :style="handleToggle()"
                                            class="mt-2 space-y-2 overflow-hidden max-h-0 duration-500 transition-all" id="disclosure-1">
                                            @foreach ($menuItem->children as $childMenu)
                                                <a href="#"
                                                    class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                                    {{ $childMenu->{'title_'.app()->getLocale()} }}
                                                </a>
                                            @endforeach

                                        </div>
                                    </div>
                                @else
                                    <a href="#"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                        {{ $menuItem->{'title_'.app()->getLocale()} }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($header))
            {{ $header }}
        @endif

    </header>
    <main>

        <div class="container mx-auto px-4 my-6">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-4 mb-4">
                <div class="lg:col-span-4">
                    {{ $slot }}
                </div>
                <div class="lg:col-span-2">
                    @if(isset($aside))
                        {{ $aside }}
                    @endif

                    <div class="rounded-md border-yellow-500 border-t-4 shadow-lg mb-4">
                        <div class="flex justify-between items-center border-b p-4">
                            <h1 class="text-xl">{{ __('site.last_news') }}</h1>
                            <div class="w-8 h-8">
                                <a href="{{ route('news',['locale'=>app()->getLocale()]) }}">
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
                            @foreach ($news as $item)
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 px-4">
                                    <div>
                                        <img class="w-full rounded-md" src="{{ $item->getThumbnail() }}" alt="lll">
                                    </div>
                                    <div class="">
                                        <h1 class="font-semibold border-b pb-2"> {{ $item->{'title_'.app()->getLocale()} }} </h1>
                                        <p>{{ $item->shortBody(10) }}</p>
                                        <a href="{{ route('news.view', ['locale'=>app()->getLocale(),'news'=>$item]) }}"
                                            class="underline block text-right mt-2">{{ __("site.more") }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        @foreach ($infoImages as $image)
                           <img class="w-full rounded-md mb-2" src="{{$image->getThumbnail()}}" alt="info">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div x-data="{ isVisible: false }" x-init="window.addEventListener('scroll', () => { isVisible = window.scrollY > 100; })" class="fixed bottom-6 left-6 z-50" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-2" style="display: none;"> 
        <button title="Scroll to top" aria-label="Scroll to top" @click="window.scrollTo({ top: 0, behavior: 'smooth' })" class="rounded-full bg-yellow-500 p-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 w-full">
        <svg  class="w-10 h-10 fill-current"  stroke-miterlimit="2" viewBox="0 0 24 24"><path d="m16.843 13.789c.108.141.157.3.157.456 0 .389-.306.755-.749.755h-8.501c-.445 0-.75-.367-.75-.755 0-.157.05-.316.159-.457 1.203-1.554 3.252-4.199 4.258-5.498.142-.184.36-.29.592-.29.23 0 .449.107.591.291zm-7.564-.289h5.446l-2.718-3.522z"/></svg>
        </button>
    </div> 
    <footer>
        <div class="bg-gray-500">
            <div class="container mx-auto py-10 text-white">
                {!! $footer?->{'content_'.app()->getLocale()} !!}
            </div>
        </div>
    </footer>


    @livewireScripts
    @livewire('wire-elements-modal')
    @vite(['resources/js/app.js'])
    <!-- <script src="/js/init-alpine.js"></script> -->
 
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
                    console.log(this.$store.accordion.tab);
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
        
    </script>
      
    <script>
          var start = "{{ __('chatbot.start') }}";
  var botmanWidget = {
    title: "Чат-бот",
  aboutText: 'balavak.kz',
  mainColor: "#EAB308",
  introMessage: start,
  placeholderText: ''
  };
  
</script>
<script src="/js/botman-web-widget.js"></script>
<script>
     window.addEventListener("load", () => {
      
       // botmanChatWidget.whisper("start");
        botmanChatWidget.close();
    });
   
</script>
    @stack('scripts')
</body>

</html>