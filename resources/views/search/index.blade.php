<x-app-layout :meta-title="__('site.site_search')" meta-description="">
<div class="container mx-auto mb-8 px-4 bg-white rounded-md pb-4 shadow-lg">

<div>
           <h1 class="text-strong-blue text-2xl font-semibold border-b mt-4 pb-4">{{ __('site.site_search') }}</h1>
        </div>
    <div>
    <form id="searchForm" class="my-4" action="{{ route('search',['locale'=>app()->getLocale()]) }}">
                        <input 
                        type="text" 
                        name="query" 
                        id="query" 
                        value="{{request()->input('query')}}" 
                        minlength="4"
                        class="w-full border-gray-400 border p-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent rounded-md" 
                        placeholder="{{__("site.search")}}">
                    </form>
    </div>

@if ($resultsPage->count()>0)
    <ul>
        @foreach ($resultsPage as $page)
            <li class="py-2 border-b">
                <h2 class="text-cyan-700 my-2">{{ $page->getAttribute('title_' . App::getLocale()) }}</h2>
                @php
    
        $content = strip_tags($page->{'content_' . App::getLocale()});
        $query = request()->input('query');
        $pos = mb_stripos($content, $query, 0, 'UTF-8');
        $start = max(0, $pos - 50);
        $end = min(mb_strlen($content, 'UTF-8'), $pos + 50);
        $excerpt = mb_substr($content, $start, $end - $start, 'UTF-8');
        $highlightedExcerpt = preg_replace('/(' . preg_quote($query, '/') . ')/iu', '<strong class="text-yellow-500">$1</strong>', $excerpt);

    @endphp
    <p class="mb-2">{!! $highlightedExcerpt !!}</p>
    <a class="flex space-x-4 items-center text-base text-primary italic"
          href="{{ route('page',['locale'=>app()->getLocale(),'page'=>$page]) }}">
          <span>{{ __('site.go_to_page') }}</span>
          <svg width="27" height="13" viewBox="0 0 27 13" fill="currentColor">
            <path
              d="M21.1523 12.5157L26.4594 7.2086C26.7851 6.88293 26.7851 6.35492 26.4594 6.02925L21.1523 0.72216C20.8267 0.39649 20.2987 0.39649 19.973 0.722161C19.6473 1.04783 19.6473 1.57584 19.973 1.90151L23.8565 5.785L0.032226 5.785L0.0322261 7.45286L23.8565 7.45286L19.973 11.3363C19.6473 11.662 19.6473 12.19 19.973 12.5157C20.2987 12.8414 20.8267 12.8414 21.1523 12.5157Z">
            </path>
          </svg>
        </a>
            </li>
        @endforeach
    </ul>
@endif

@if ($resultsPost->count()>0)
    <ul>
        @foreach ($resultsPost as $post)
            <li class="py-2 border-b">
                <h2 class="text-cyan-700 my-2">{{ $post->getAttribute('title_' . App::getLocale()) }}</h2>
                @php
    
        $content = strip_tags($post->{'content_' . App::getLocale()});
        $query = request()->input('query');
        $pos = mb_stripos($content, $query, 0, 'UTF-8');
        $start = max(0, $pos - 50);
        $end = min(mb_strlen($content, 'UTF-8'), $pos + 50);
        $excerpt = mb_substr($content, $start, $end - $start, 'UTF-8');
        $highlightedExcerpt = preg_replace('/(' . preg_quote($query, '/') . ')/iu', '<strong class="text-yellow-500">$1</strong>', $excerpt);

    @endphp
    <p class="mb-2">{!! $highlightedExcerpt !!}</p>
    <a class="flex space-x-4 items-center text-base text-primary italic"
          href="{{ route('post.view',['locale'=>app()->getLocale(),'post'=>$post]) }}">
          <span>{{ __('site.go_to_page') }}</span>
          <svg width="27" height="13" viewBox="0 0 27 13" fill="currentColor">
            <path
              d="M21.1523 12.5157L26.4594 7.2086C26.7851 6.88293 26.7851 6.35492 26.4594 6.02925L21.1523 0.72216C20.8267 0.39649 20.2987 0.39649 19.973 0.722161C19.6473 1.04783 19.6473 1.57584 19.973 1.90151L23.8565 5.785L0.032226 5.785L0.0322261 7.45286L23.8565 7.45286L19.973 11.3363C19.6473 11.662 19.6473 12.19 19.973 12.5157C20.2987 12.8414 20.8267 12.8414 21.1523 12.5157Z">
            </path>
          </svg>
        </a>
            </li>
        @endforeach
    </ul>
@endif

@if ($resultsNews->count()>0)
    <ul>
        @foreach ($resultsNews as $news)
            <li class="py-2 border-b">
                <h2 class="text-cyan-700 my-2">{{ $news->getAttribute('title_' . App::getLocale()) }}</h2>
                @php
    
        $content = strip_tags($news->{'content_' . App::getLocale()});
        $query = request()->input('query');
        $pos = mb_stripos($content, $query, 0, 'UTF-8');
        $start = max(0, $pos - 50);
        $end = min(mb_strlen($content, 'UTF-8'), $pos + 50);
        $excerpt = mb_substr($content, $start, $end - $start, 'UTF-8');
        $highlightedExcerpt = preg_replace('/(' . preg_quote($query, '/') . ')/iu', '<strong class="text-yellow-500">$1</strong>', $excerpt);

    @endphp
    <p class="mb-2">{!! $highlightedExcerpt !!}</p>
    <a class="flex space-x-4 items-center text-base text-primary italic"
          href="{{ route('news.view',['locale'=>app()->getLocale(),'news'=>$news]) }}">
          <span>{{ __('site.go_to_page') }}</span>
          <svg width="27" height="13" viewBox="0 0 27 13" fill="currentColor">
            <path
              d="M21.1523 12.5157L26.4594 7.2086C26.7851 6.88293 26.7851 6.35492 26.4594 6.02925L21.1523 0.72216C20.8267 0.39649 20.2987 0.39649 19.973 0.722161C19.6473 1.04783 19.6473 1.57584 19.973 1.90151L23.8565 5.785L0.032226 5.785L0.0322261 7.45286L23.8565 7.45286L19.973 11.3363C19.6473 11.662 19.6473 12.19 19.973 12.5157C20.2987 12.8414 20.8267 12.8414 21.1523 12.5157Z">
            </path>
          </svg>
        </a>
            </li>
        @endforeach
    </ul>
@endif

</div>

</x-layout>