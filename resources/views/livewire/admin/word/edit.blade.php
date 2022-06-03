<div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->messages() as $error)
                    <li> {{$error[0]}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card redial-border-light redial-shadow mb-4">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">{{__('data.word.add_new_word')}}</h6>
                    <form wire:submit.prevent="update">
                        <div class="form-group">
                            <label class="redial-font-weight-600">{{__('data.word.create.word')}}</label>
                            <input type="text" class="form-control" wire:model.defer="word" placeholder="{{__('data.word.create.word')}}" />
                        </div>
                        <div class="form-group">
                            <label class="redial-font-weight-600">{{__('data.word.create.definition')}}</label>
                            <textarea class="form-control" wire:model.defer="definition" placeholder="{{__('data.word.create.definition')}}"></textarea>
                        </div>
                        <div class="redial-divider my-4"></div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-xs">{{__('data.table.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
