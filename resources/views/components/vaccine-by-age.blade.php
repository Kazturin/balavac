<div class="rounded-md border-yellow-500 border-t-4 shadow-lg mb-4 pb-2">
                    <h1 class="text-lg p-4 border-b font-baltica uppercase">{{ __('site.vaccine_route') }}</h1>
                    <ul class="grid grid-rows-3 grid-flow-col mt-4 gap-4 mb-4">
                        @foreach ($vaccineByAge as $key=>$item)
                         <li class="m-auto">
                            <a href="{{ $item->page ? route('page',['locale'=>app()->getLocale(),'page'=>$item->page]) : '#' }}" id="id{{$item->id}}"
                                class="{{$colors[$key]}} animate-pulse flex justify-center items-center rounded-full drop-shadow-lg bg-amber-500 w-24 h-24 hover:w-28 hover:h-28 sm:w-32 sm:h-32">
                                <div
                                    class="flex justify-center items-center w-20 h-20 sm:w-28 sm:h-28 rounded-full border-white border-2">
                                    <span
                                        class="w-full font-mon text-center p-2 text-white text-base md:text-xl leading-none md:leading-snug break-words font-semibold">{{ $item->{'title_'.app()->getLocale()} }}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
</div>
@push('scripts')
<script type="text/javascript" src="/js/leader-line.min.js"></script>
<script>
    var vaccineByAge = {{ Js::from($vaccineByAge) }};
    document.addEventListener("DOMContentLoaded", ready);
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
    line.color = '#0891B2'; // Change the color to red.
    line.size++; // Increase line size.
}
function ready() {
    for (let i = 0; i < vaccineByAge.length-1; i++) {
    if((i+1) % 3 == 0){
        drawLine(document.getElementById('id'+ vaccineByAge[i].id), document.getElementById('id'+ vaccineByAge[i+1].id), 'right', 'left');
    }
    else{
        drawLine(document.getElementById('id'+ vaccineByAge[i].id), document.getElementById('id'+ vaccineByAge[i+1].id), 'bottom', 'top');
    }
   }
}


</script>
@endpush