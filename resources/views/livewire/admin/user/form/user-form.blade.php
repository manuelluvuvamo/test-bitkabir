<div>
    @if ($errors->get('state.*'))
        @foreach ($errors->get('state.*') as $messages)
            @foreach ($messages as $error)
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="mb-0">{{ $error }}</p>
                </div>
            @endforeach
        @endforeach
    @endif

    <div tabindex="-1">
        <form wire:submit.prevent="{{ $edition ? 'update' : 'store' }}" autocomplete="off">
            @csrf

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-copy mr-1"></i>
                        @if ($edition == true)
                            <span>Edit User</span>
                        @else
                            <span>New User</span>
                        @endif
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="form-group mt-2 mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" required wire:model.defer="state.name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" required wire:model.defer="state.email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" required wire:model.defer="state.password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control" required wire:model.defer="state.password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer form-group">
                <div class="float-right">
                    @if ($edition == true)
                        <button type="submit" wire:loading.remove wire:target="update" class="btn btn-primary">
                    @else
                        <button type="submit" wire:loading.remove wire:target="store" class="btn btn-primary">
                    @endif
                    <i class="fa fa-check-circle mr-1"></i>
                    @if ($edition == true)
                        <span>Update</span>
                    @else
                        <span>Submit</span>
                    @endif
                    </button>
                    <button class="btn btn-warning" type="button" disabled wire:loading wire:target="{{ $edition ? 'update' : 'store' }}">
                        <span class="spinner-border spinner-border-sm align-items-center" role="status" aria-hidden="true"></span>
                        Aguarde
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
