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
                            <span>Editar Produto</span>
                        @else
                            <span>Novo Produto</span>
                        @endif
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="form-group mt-2 mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">Nome</label>
                                <input type="text" id="name" class="form-control" required
                                    wire:model.defer="state.name">
                            </div>
                            <div class="form-group col-md-6" wire:ignore>
                                <label for="category">Categoria</label>
                                <select id="category" class="form-control select2" required
                                    wire:model.defer="state.category_id">
                                    <option value="">Selecione uma categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Preço</label>
                                <input type="number" id="price" class="form-control" required
                                    wire:model.defer="state.price" step="0.01">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description">Descrição</label>
                                <textarea id="description" class="form-control" required wire:model.defer="state.description"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="image">Imagem</label>
                                <input type="file" id="image" class="form-control-file"
                                    wire:model="state.image" accept="image/*">
                                @if (isset($state['image']) && !is_string($state['image']))
                                    <img src="{{ $state['image']->temporaryUrl() }}" alt="Imagem do Produto"
                                        class="img-thumbnail mt-2" style="width: 150px; height: 150px;">
                                @endif
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
                        <span>Atualizar</span>
                    @else
                        <span>Enviar</span>
                    @endif
                    </button>
                    <button class="btn btn-warning" type="button" disabled wire:loading
                        wire:target="{{ $edition ? 'update' : 'store' }}">
                        <span class="spinner-border spinner-border-sm align-items-center" role="status"
                            aria-hidden="true"></span>
                        Aguarde
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2').on('change', function(e) {
                @this.set('state.category_id', e.target.value);
            });
        });
    </script>
@endpush
