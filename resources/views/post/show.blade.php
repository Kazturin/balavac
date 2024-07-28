<x-app-layout :meta-title="$post->{'title_'.app()->getLocale()}" :meta-description="$post->shortBody()">
<div class="bg-white mx-2 p-4 rounded-md shadow-lg mb-4">
        <div class="flex  flex-wrap md:flex-nowrap md:items-center">
            <ul class="flex items-center">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                    </a>

                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('posts',['locale'=>app()->getLocale()]) }}" class="text-gray-600 hover:text-blue-500">
                    {{__("site.database of scientific articles and evidence")}}
                   </a>
                   <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="#" class="text-strong-blue">
                        {{ $post->{'title_'.app()->getLocale()} }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white mx-2 rounded-md overflow-hidden shadow-lg">
        @if ($post->thumbnail)
         <img src="{{ $post->getThumbnail() }}" alt="tp">
        @endif
        <div class="p-4">
           <h1 class="text-strong-blue text-2xl font-semibold border-b mt-4 pb-4">{{ $post->{'title_'.app()->getLocale()} }}</h1>
           <p class="text-gray-600 italic text-sm">{{ $post->category->{'title_'.app()->getLocale()} }}</p>
           <div class="mt-4 tiptap-content">
           {!! $post->{'content_'.app()->getLocale()} !!}
           </div>
        </div>
    </div>
    <x-slot:aside>
    <div class="divide-y divide-slate-200 bg-cyan-800 rounded-md mb-4 drop-shadow-lg">
        <ul>
        @foreach($categories as $item)
            @if(count($item->children)>0)
            <li x-data="{ expanded: {{ $item->children->contains($postCategory) ? 'true' : 'false' }} }">
                <button
                    id="faqs-title-{{$item->id}}"
                    type="button"
                    class="flex items-center justify-between w-full border-b border-white text-left text-white font-semibold mt-2 p-4"
                    @click="expanded = !expanded"
                    :aria-expanded="expanded"
                    aria-controls="faqs-text-{{$item->id}}"
                >
                    <span>{{ $item->title_kk }}</span>
                    <svg class="fill-white shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                        <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                        <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" :class="{'!rotate-180': expanded}" />
                    </svg>
                </button>
                <div x-show="expanded"
                    id="faqs-text-{{$item->id}}"
                    role="region"
                    aria-labelledby="faqs-title-01"
                    class="bg-cyan-700 grid text-sm text-slate-600 overflow-hidden rounded-b-md transition-all duration-300 ease-in-out p-4"
                    :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                >
                    <div class="overflow-hidden">
                        <ul>
                            @foreach($item->children as $child)
                                <li 
                                @class([
                                        'text-gray-200 font-semibold ml-2 p-2',
                                        'border border-white rounded-md' => $child->post && $child->post->id===$post->id,
                                    ])
                                >
                                    <a href="{{ $child->post ? route('post.view',['locale'=>app()->getLocale(),'post'=>$child->post]) : '#' }}">{{ $child->{'title_'.app()->getLocale()} }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </li>
            @else
                <li class="text-white font-semibold border-b border-white p-4">
                    <a href="{{ $item->post ? route('post.view',['locale'=>app()->getLocale(),'post'=>$item->post]) : '#' }}">{{ $item->{'title_'.app()->getLocale()} }}</a>
                </li>
            @endif
        @endforeach
        </ul>
    </div>
    </x-slot:aside>
</x-app-layout>