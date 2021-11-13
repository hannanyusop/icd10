@extends('crudify::layouts.modal')

@section('title', __('Code'))
@section('content')
    <div class="modal-body">
        @foreach($code->getFillable() as $fillable)
            <h6 class="font-weight-bold mb-0">{{ Str::title(str_replace('_', ' ', $fillable)) }}</h6>
            <div class="mb-3">
                @if(is_array($code->$fillable))
                    <pre class="mb-0">{{ json_encode($code->$fillable, JSON_PRETTY_PRINT) }}</pre>
                @elseif(in_array($fillable, $code->getDates()))
                    @displayDate($code->$fillable)
                @else
                    {{ $code->$fillable ?? __('N/A') }}
                @endif
            </div>
        @endforeach

        <hr>
            <h5>Chapter Details</h5>
            @foreach($code->chapter->getFillable() as $fillable)
                <h6 class="font-weight-bold mb-0">{{ Str::title(str_replace('_', ' ', $fillable)) }}</h6>
                <div class="mb-3">
                    @if(is_array($code->chapter->$fillable))
                        <pre class="mb-0">{{ json_encode($code->chapter->$fillable, JSON_PRETTY_PRINT) }}</pre>
                    @elseif(in_array($fillable, $code->chapter->getDates()))
                        @displayDate($chapter->$fillable)
                    @else
                        {{ $code->chapter->$fillable ?? __('N/A') }}
                    @endif
                </div>
            @endforeach

            <hr>
            <h5>Block Details</h5>
            @foreach($code->block->getFillable() as $fillable)
                <h6 class="font-weight-bold mb-0">{{ Str::title(str_replace('_', ' ', $fillable)) }}</h6>
                <div class="mb-3">
                    @if(is_array($code->block->$fillable))
                        <pre class="mb-0">{{ json_encode($code->block->$fillable, JSON_PRETTY_PRINT) }}</pre>
                    @elseif(in_array($fillable, $code->block->getDates()))
                        @displayDate($chapter->$fillable)
                    @else
                        {{ $code->block->$fillable ?? __('N/A') }}
                    @endif
                </div>
            @endforeach
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
    </div>
@endsection
