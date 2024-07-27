<?php
use Illuminate\Support\Facades\App;
?>
<div class="text-right">
    <form action="{{route('language')}}" method="POST">
        @csrf
        @method('post')
        <label>
            <select class="border-0 bg-transparent " name="locale" id="language" onchange="this.form.submit()">
                <option class="text-gray-800" value="kk" {{app()->getLocale()=='kk'?'selected':''}}>KZ</option>
                <option class="text-gray-800" value="ru" {{app()->getLocale()=='ru'?'selected':''}}>RU</option>
            </select>
        </label>
   </form>
</div>

