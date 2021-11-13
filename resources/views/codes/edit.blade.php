@extends('crudify::layouts.modal')

@section('title', __('Edit Code'))
@section('content')
    <x-form action="{{ route('codes.edit', $code->id) }}" method="patch" crudify-form>
        <div class="modal-body">
            @bind($code)
                @include('codes.form')
            @endbind
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </x-form>
@endsection
