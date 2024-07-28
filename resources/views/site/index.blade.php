<x-app-layout>

    <x-slot:header>
        <div class="relative h-[400px]">
        <img class="hidden md:block object-right h-full absolute top-0 right-0" src="{{$image->getThumbnail()}}" alt="">
             <div class="hero-gradient absolute inset-0"> 
                  <div class="container mx-auto px-4">
                    <div class="absolute top-1/2 translate-x-0 -translate-y-1/2 w-full md:w-2/4">
                    <p class="text-3xl sm:text-4xl mb-4 text-white font-semibold"> {{ __("site.banner_text") }}</p>
                    <p class="text-lg sm:text-2xl text-white uppercase whitespace-pre-wrap text-left">{{ __("site.banner_sub_text") }}</p>
                  </div>
                </div>
            </div>
        </div>
    </x-slot:header>

    @if ($about_vaccination)
    <div class="rounded-md border-yellow-500 border-t-4 shadow-lg mb-4 pb-2">
      <h1 class="text-lg uppercase border-b p-4">{{ $about_vaccination->{'title_'.app()->getLocale()} }}</h1>
        <div class="p-4 font-tahoma">
            {!! $about_vaccination->{'content_'.app()->getLocale()} !!}
        </div>
    </div>
    @endif

    <x-vaccine-by-age></x-vaccine-by-age>

    <div class="rounded-md border-yellow-500 border-t-4 shadow-lg">
        <div class="flex justify-between items-center p-4 border-b">
            <h1 class="text-lg uppercase">{{ __("site.database of scientific articles and evidence") }}</h1>
            <div class="w-8 h-8">
                <a href="{{ route('posts',['locale'=>app()->getLocale()]) }}">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m12.012 1.995c-5.518 0-9.998 4.48-9.998 9.998s4.48 9.998 9.998 9.998 9.997-4.48 9.997-9.998-4.479-9.998-9.997-9.998zm0 1.5c4.69 0 8.497 3.808 8.497 8.498s-3.807 8.498-8.497 8.498-8.498-3.808-8.498-8.498 3.808-8.498 8.498-8.498zm1.528 4.715s1.502 1.505 3.255 3.259c.146.147.219.339.219.531s-.073.383-.219.53c-1.753 1.754-3.254 3.258-3.254 3.258-.145.145-.336.217-.527.217-.191-.001-.383-.074-.53-.221-.293-.293-.295-.766-.004-1.057l1.978-1.977h-6.694c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h6.694l-1.979-1.979c-.289-.289-.286-.762.006-1.054.147-.147.339-.221.531-.222.19 0 .38.071.524.215z"
                            fill-rule="nonzero" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4 p-4">
            @foreach ($posts as $post)
            <div class="border border-gray-200 rounded-md overflow-hidden">
                <div class="bg-yellow-500">
                    <img class="w-full h-48 mb-2 object-cover" src="{{ $post->getThumbnail() }}" alt=""> 
                </div>
               
                <div class="px-4">
                    <h1 class="font-semibold text-base border-b pb-2">{{ $post->{'title_'.app()->getLocale()} }}</h1>
                    <div>
                        {!! $post->shortBody(10) !!}
                    </div>
                    <a class="block text-right underline my-2 text-gray-600" href="{{route('post.view',['locale'=>app()->getLocale(),'post'=>$post])}}">{{ __('site.more') }}</a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <div class="rounded-md border-yellow-500 border-t-4 shadow-lg">
        <div class="p-5 bg-light-blue">
            <div class="flex justify-center items-start my-2">
                <div class="w-full">
                    <h2 class="text-xl font-semibold text-white mb-4">{{ __("site.faq") }}</h2>
                    <ul class="flex flex-col">
                        @foreach ($questionAnswer as $item )
                        <li class="bg-white my-2 shadow-lg" x-data="accordion({{$item->id}})">
                            <h2 @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                <span>{{ $item->question }}</span>
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
                                <div class="p-3">
                                {!! $item->answer !!}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')

        <script>

        </script>
    @endpush
</x-app-layout>