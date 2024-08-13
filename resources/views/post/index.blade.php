<x-app-layout :meta-title="__('site.database of scientific articles and evidence')" meta-description="">
      <div class="bg-white mx-2 p-4 rounded-md shadow-lg mb-6">
        <div class="flex items-center flex-wrap">
            <ul class="flex items-center">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-500">
                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
                    </a>

                    <span class="mx-4 h-auto text-gray-400 font-medium">/</span>
                </li>
                <li class="inline-flex items-center">
                    <a href="#" class="text-strong-blue">
                       {{ __("site.database of scientific articles and evidence") }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mx-2">
        @foreach($posts as $post)
        <div class="mb-4 flex rounded-md overflow-hidden border-2">
         
                <img class="w-60 object-cover" src="{{ $post->getThumbnail() }}" alt="post">
         
            <div class="p-4 grow">
                <h1 class="pb-4 border-b text-xl font-semibold">{{ $post->{'title_'.app()->getLocale()} }}</h1>
                <p class="text-sm text-gray-600">{{ $post->getFormattedDate() }} </p>
                <p class="mt-4 break-all">{!! $post->shortBody() !!}</p>
                <a class="block text-right underline my-2 text-gray-600" href="{{ route('post.view',['locale'=>app()->getLocale(),'post'=>$post]) }}">{{ __("site.more") }}</a>
            </div>
        </div>
        @endforeach
        <div>
            {{ $posts->links()}}
        </div>
    </div>
</x-app-layout>