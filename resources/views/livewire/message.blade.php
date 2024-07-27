<div>
<div class="flex items-start justify-between py-2 border-b rounded-t">
        <h3 class="text-xl font-semibold text-gray-600 ml-4">
        Тест о знаниях
        </h3>
        <button wire:click="$dispatch('closeModal', { component: 'message' })" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="mt-2 mb-4">
        <img class="block mx-auto w-40" src="/img/icon.png" alt="icon">
    </div>
    <p class="text-center font-semibold text-2xl text-gray-600">Қорытынды:</p>
    <div class="mx-10 text-center text-gray-600 text-lg">
      <p>
        Барлық сұрақтар саны: {{ $questionCount}}
      </p>
      <p>Дұрыс жауаптар саны: {{ $result }}</p>
      <p class="text-lg font-semibold">{{ $result*100/$questionCount }}%</p>
      @if ( $resultDescription)
     <p class="font-semibold">{{ $resultDescription->{'description_'.app()->getLocale()} }}</p>  
      @endif
    
      </div>
    <div class="mb-4">
        <button
            class="flex mx-auto items-center rounded shadow-lg text-white mt-6 py-2 px-4 bg-yellow-500 hover:bg-yellow-700 w-30"
            wire:click="$dispatch('closeModal', { component: 'message' })"> Жабу </button>
    </div>
</div>