<div>
    <!-- Loader -->
    <div class="loader" wire:loading>
        <div style="position:absolute;left:50%;top:50%;transform:translate(-50%, -50%)">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    @if (session()->has('searchError'))
        <div class="alert alert-info alert-dismissible mb-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-info"></i>
            {{ session('searchError') }}
        </div>
    @endif

    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="btn btn-primary badge-pill">
                <h3 class="card-title"><i class="fas fa-window-restore "></i> Users</h3>
            </div>

            <div class="d-flex align-items-center" style="gap: 10px;">

                <div class="d-flex align-items-center bg-light p-2 rounded" style="gap: 10px;">
                    <input type="text" class="form-control form-control-sm" style="width:300px;"
                        wire:model.live.debounce.500ms="searchTermForm" placeholder="Search by name, email, or role">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-info btn-sm mr-1 disabled"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>

                <a class="btn btn-success btn-sm" href="{{ route('admin.users.create') }}"
                    wire:loading.class="disabled">
                    <i class="fa fa-plus-circle mr-1"></i>New User
                </a>
            </div>
        </div>
    </div>

    @if (session()->has('error'))
        <div class="alert bg-gradient-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span>{{ session()->get('error') }}</span>
        </div>
    @endif

    <div class="card-body p-0">

        <table class="table table-striped table-sm table-hover">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 10%;">Name</th>
                    <th style="width: 10%;">E-mail</th>
                    <th style="width: 10%;">Role</th>
                    <th style="width: 10%" class="text-center">Acções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td></td>
                        <td class="text-center">
                            <div class="btn-group gap-4">
                                <a href="{{ route('admin.users.edit', $user->id) }}" wire:loading.class="disabled"
                                    class="btn btn-rounded btn-warning btn-sm" data-toggle="tooltip" title="Edit user">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" wire:click="destroy({{ $user->id }})" title="Delete"
                                    wire:confirm.prompt="Are you sure you want to delete it? Type {{ '"' . $user->name . '"' }} to confirm|{{ $user->name }}"
                                    wire:loading.class="disabled" class="btn btn-rounded btn-danger btn-sm"
                                    data-toggle="tooltip" title="Delete user">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-1 mr-1 d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
</div>
