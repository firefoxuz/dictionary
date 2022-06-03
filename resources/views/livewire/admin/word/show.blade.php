<div>
    <div class="card redial-border-light redial-shadow mt-3">
        <div class="card-body">
            <p class="text-danger h5">{{$word->definition}}</p>
        </div>
    </div>

    <div id="signLanguage">
        @foreach($splited_definition as  $value)
            <div class="oneWord">
                <div class="oneWordEng">{{$value}}</div>
                @foreach(str_split($value) as $letter)
                    @if(preg_match("/[A-Z]|[a-z]|[0-9]/", $letter))
                        <span class="sign-language upperCase">{{$letter}}<span class="obj39xs2">{{$letter}}</span></span>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>
