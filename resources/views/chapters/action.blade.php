<div class="text-md-right text-nowrap">
    <button type="button" class="btn btn-link p-1" title="{{ __('Show') }}" crudify-show-modal="{{ route('chapters.show', $id) }}">
        <i class="fas fa-eye"></i>
    </button>

    <button type="button" class="btn btn-link p-1" title="{{ __('Edit') }}" crudify-show-modal="{{ route('chapters.edit', $id) }}">
        <i class="fas fa-edit"></i>
    </button>

    <x-form action="{{ route('chapters.destroy', $id) }}" method="delete" class="d-inline-block" crudify-form>
        <button type="submit" class="btn btn-link p-1" title="{{ __('Delete') }}" crudify-confirm="{{ __('Delete this Chapter?') }}">
            <i class="fas fa-trash-alt"></i>
        </button>
    </x-form>
</div>
