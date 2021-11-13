@extends('crudify::layouts.modal')

@section('title', __('Edit Raw'))
@section('content')
    <x-form action="{{ route('raws.edit', $raw->id) }}" method="patch" crudify-form>
        <div class="modal-body">
            @bind($raw)
                @include('raws.form')
            @endbind
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </x-form>
@endsection
