@if(auth()->user()->hasPermission('delete_services'))
    <a href="#sub-{{ $service->id }}-delete-model" class="btn btn-outline-danger waves-effect waves-light btn-sm"
       data-toggle="modal">
        <i class="fas fa-trash-alt fa fa-fw"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="sub-{{ $service->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $service->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="modal-title-{{ $service->id }}">@lang('categories::services.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('categories::services.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.services.destroy', [$category, $service])) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('categories::services.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('categories::services.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@else
    <button
        type="button"
        disabled
        class="btn btn-outline-danger waves-effect waves-light btn-sm">
        <i class="fas fa-trash-alt fa fa-fw"></i>
    </button>
@endcan
