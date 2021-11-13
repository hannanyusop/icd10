@extends('crudify::layouts.modal')

@section('title', __('Create Raw'))
@section('content')
    <x-form action="{{ route('raws.create') }}" crudify-form>
        <div class="modal-body">
            @include('raws.form')
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </x-form>
@endsection
