<div>
    <div class="row mt-3 mb-3">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <div class="form-group mb-0 redial-relative">
                <input type="text" class="form-control redial-rounded-circle-50 border-0" wire:model="search" placeholder="{{__('data.search')}}">
                <div class="btn-search">
                    <a href="#" class="redial-light"><i
                            class="lnr lnr-magnifier redial-absolute redial-right-20"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="card redial-border-light redial-shadow mb-4">
        <div class="card-body">
            <div class="col-md-6">
                <h6 class="header-title pl-3 redial-relative">{{__('data.word.list')}}</h6>
            </div>
            <div class="col-md-6 text-right">
                <b> {!! __('data.table.count') !!}:</b> {!! $words->total() !!}
            </div>
            <table class="table table-hover mb-0 redial-font-weight-500 table-responsive d-md-table">
                <thead class="redial-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('data.word.create.word')}}</th>
                    <th scope="col">{{__('data.word.create.definition')}}</th>
                    <th scope="col">{{__('data.word.user')}}</th>
                    <th scope="col">{{__('data.user.date')}}</th>
                    <th scope="col">{{__('data.table.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($words as $word)
                    <tr>
                        <th scope="row">{!! $word->id !!}</th>
                        <td><b>{{ $word->word }}</b></td>
                        <td>{{ $word->definition }}</td>
                        <td>{{ $word->user->name }}</td>
                        <td>{{ $word->created_at }}</td>
                        <td >
                            <a class="btn btn-primary mb-1" href="{{route('word.show', ['word' => $word->id])}}">
                                <i class="icofont icofont-eye"></i>
                            </a>
                            <a class="btn btn-success mb-1" href="{{route('word.edit', ['word' => $word->id])}}">
                                <i class="icofont icofont-pencil"></i>
                            </a>
                            <button class="btn btn-danger" wire:click="delete({{$word->id}})">
                                <i class="icofont icofont-bin"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-12 text-center mt-3">
                {{ $words->links() }}
            </div>
        </div>
    </div>
</div>
