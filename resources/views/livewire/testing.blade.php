<div>
  @if($currentQuestion)
<div>
    <div class="flex flex-wrap mt-8" v-if="examData">
      @foreach($questions as $question)
        <div
                @class(['mr-2 mb-2 w-10 h-10 text-center py-2 px-4 border-cyan-600 border font-semibold text-lg rounded-md',
                        'bg-white text-cyan-600' => $currentQuestion['id']===$question['id'],
                        'bg-cyan-600 text-white' => $currentQuestion['id']!==$question['id']
                        ])
        >
        <span>{{ $loop->index+1 }}</span>
      </div>
      @endforeach
      
    </div>
    <hr class="my-2">
    <div class="flex justify-center">
      <div wire:loading class="w-12 h-12 rounded-full animate-spin
    border-4 border-dashed border-yellow-500 border-t-transparent mt-4"></div>
    </div>
    
    <div class="mb-6 bg-white rounded-md shadow-lg p-5">
      <div>
        <p class="font-semibold text-lg mb-4">{!! $currentQuestion['question'] !!}</p>
        @foreach($currentQuestion['answers'] as $answer)
        <div class="m-2">
          <label class="inline-flex items-center">
            <input
         
                id="answer{{ $answer['id'] }}"
                name="season"
                type="radio"
                class="text-indigo-600
                  border-indigo-600
                  rounded-full
                  shadow-sm
                  focus:border-indigo-300
                  focus:ring
                  focus:ring-offset-0
                  focus:ring-indigo-200
                  focus:ring-opacity-50"
                
                  wire:model="selectedAnswers.{{ $currentQuestion['id'] }}"
    value="{{ $answer['id'] }}"
    @if(isset($selectedAnswers[$currentQuestion['id']]) && $selectedAnswers[$currentQuestion['id']] == $answer['id']) checked @endif
               
            />
            <span class="ml-4"> {{ $answer['answer'] }} </span>
          </label>
        </div>
        @endforeach
       
      </div>
     <div class="flex items-center space-x-8">
      <div>
         <button wire:click="prevQuestion" class="text-cyan-700 my-4">
      <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg>
    </button>
      <button 
      wire:click="nextQuestion" 
      class="text-cyan-700 my-4">
      <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.568 18.005l-1.414-1.415 4.574-4.59-4.574-4.579 1.414-1.416 5.988 5.995-5.988 6.005z"/></svg>
    </button>
      </div>
 
      @if($testComplete)
   <button 
      wire:click="completeTest" 
      class="py-2 px-4 bg-yellow-500 rounded-md shadow-md text-white font my-4 ml-8">Аяқтау</button>
      @endif
     </div>
    
    </div>
  </div>
  @else
    <p>Сұрақтар табылмады</p>
  @endif
</div>
