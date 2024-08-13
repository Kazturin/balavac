<x-app-layout :meta-title="$page->meta_title" :meta-description="$page->meta_description">
<div class="bg-white mx-2 p-4 rounded-md shadow-lg mb-4">
        <div class="flex flex-wrap md:items-center flex-wrap">
            <ul class="flex items-center">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                    </a>

                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="#" class="text-strong-blue">
                        {{ $page->{'title_'.app()->getLocale()} }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white mx-2 rounded-md overflow-hidden shadow-lg">
        @if ($page->thumbnail)
         <img src="{{ $page->getThumbnail() }}" alt="tp">
        @endif
        <div class="p-4">
           <h1 class="text-strong-blue text-2xl font-semibold border-b mt-4 pb-4">{{ $page->{'title_'.app()->getLocale()} }}</h1>
           <div class="mt-4 tiptap-content font-tahoma">
           {!! $page->{'content_'.app()->getLocale()} !!}
           </div>
        </div>
    </div>

    <x-slot:aside>
    <div class="divide-y divide-slate-200 bg-cyan-800 rounded-md mb-4 drop-shadow-lg">
        <ul class="text-white">
        @foreach($menus as $item)
                <li 
                @class([
                    'font-semibold border-b border-white py-2 px-4',
                    'text-gray-400' => $item->id===$page->menu->id,
                    ])>
                    <a href="{{ $item->page ? route('page',['locale'=>app()->getLocale(),'page'=>$item->page]) : '#' }}">{{ $item->{'title_'.app()->getLocale()} }}</a>
                </li>
        @endforeach
        </ul>
    </div>
    </x-slot:aside>

</x-app-layout>