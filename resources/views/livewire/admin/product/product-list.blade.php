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
                <h3 class="card-title"><i class="fas fa-window-restore "></i> Produtos</h3>
            </div>

            <div class="d-flex align-items-center" style="gap: 10px;">

                <div class="d-flex align-items-center bg-light p-2 rounded" style="gap: 10px;">
                    <input type="text" class="form-control form-control-sm" style="width:300px;"
                        wire:model.live.debounce.500ms="searchTermForm"
                        placeholder="Pesquisar por nome, categoria, descrição ou preço">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-info btn-sm mr-1 disabled"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>

                <a class="btn btn-success btn-sm" href="{{ route('admin.products.create') }}"
                    wire:loading.class="disabled">
                    <i class="fa fa-plus-circle mr-1"></i>Novo Produto
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
                    <th style="width: 10%;">Nome</th>
                    <th style="width: 10%;">Categoria</th>
                    <th style="width: 10%;">Preço</th>
                    <th style="width: 20%;">Descrição</th>
                    <th style="width: 10%;">Imagem</th>
                    <th style="width: 10%" class="text-center">Acções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>
                            <div>
                                <span class="short-description">{{ Str::limit($product->description, 50) }}</span>
                                @if (Str::length($product->description) > 50)
                                    <span class="full-description d-none">{{ $product->description }}</span>
                                    <a href="#" class="toggle-description">Ver mais</a>
                                @endif
                            </div>
                        </td>

                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                style="width: 50px; height: 50px;" class="mb-2">

                            @if ($product->image)
                                <div class="d-flex justify-content-start gap-1">
                                    <a href="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        target="_blank" class="btn btn-info btn-sm mr-1" title="Ver Imagem">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button wire:click="deleteImage({{ $product->id }})"
                                        wire:confirm="Tem certeza que deseja eliminar?" class="btn btn-danger btn-sm"
                                        title="Eliminar Imagem">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group gap-4">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    wire:loading.class="disabled" class="btn btn-rounded btn-warning btn-sm"
                                    data-toggle="tooltip" title="Editar produto">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" wire:click="destroy({{ $product->id }})" title="Delete"
                                    wire:confirm.prompt="Tem certeza que deseja eliminar? Digite {{ '"' . $product->name . '"' }} para confirmar|{{ $product->name }}"
                                    wire:loading.class="disabled" class="btn btn-rounded btn-danger btn-sm"
                                    data-toggle="tooltip" title="Eliminar produto">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-1 mr-1 d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.toggle-description').on('click', function(event) {
                event.preventDefault();
                const shortDescription = $(this).siblings('.short-description');
                const fullDescription = $(this).siblings('.full-description');
                if (fullDescription.hasClass('d-none')) {
                    shortDescription.addClass('d-none');
                    fullDescription.removeClass('d-none');
                    $(this).text('Ver menos');
                } else {
                    shortDescription.removeClass('d-none');
                    fullDescription.addClass('d-none');
                    $(this).text('Ver mais');
                }
            });
        });
    </script>
@endpush
