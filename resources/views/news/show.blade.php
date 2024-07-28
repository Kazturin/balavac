<x-app-layout  :meta-title="$news->{'title_'.app()->getLocale()}" :meta-description="$news->shortBody()">
<div class="bg-white mx-2 p-4 rounded-md shadow-lg mb-4">
        <div class="flex items-center flex-wrap">
            <ul class="flex items-center flex-wrap md:flex-nowrap">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                    </a>

                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('news',['locale'=>app()->getLocale()]) }}" class="text-gray-600 hover:text-blue-500">
                     {{ __("site.news") }}
                   </a>
                   <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="#" class="text-strong-blue">
                        {{ $news->{'title_'.app()->getLocale()} }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white mx-2 rounded-md overflow-hidden shadow-lg">
        @if ($news->thumbnail)
         <img src="{{ $news->getThumbnail() }}" alt="tp">
        @endif
        <div class="p-4">
            <p class="text-gray-500">{{ $news->getFormattedDate() }}</p>
           <h1 class="text-strong-blue text-2xl font-semibold border-b mt-2 pb-4">{{ $news->{'title_'.app()->getLocale()} }}</h1>
           <div class="mt-4 tiptap-content font-tahoma">
           {!! $news->{'content_'.app()->getLocale()} !!}
           </div>
        </div>
    </div>
</x-app-layout>