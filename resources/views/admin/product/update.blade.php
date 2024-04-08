<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Editar Producto</h1>
                    <hr />
                    <form action="{{ route('admin/products/update', $products->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$products->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Descripción</label>
                                <input type="text" name="description" class="form-control" placeholder="Descripción" value="{{$products->description}}">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Categoría</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="{{ $products->category->id }}">{{ $products->category->name }}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <!--<input type="text" name="category" class="form-control" placeholder="Categoría" value="{{$products->category->name}}">-->
                                @error('category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Sucursal</label>
                                <select class="form-control" id="branch_id" name="branch_id"  required>
                                    <option value="{{ $products->branch->id }}">{{ $products->branch->name }}</option>
                                    @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                <!--<input type="text" name="branch" class="form-control" placeholder="Sucursal" value="{{$products->branch->name}}">-->
                                @error('branch')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" name="price" class="form-control" placeholder="Precio" value="{{$products->price}}">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Fecha de compra</label>
                                <input type="date" name="purchase_date" class="form-control" placeholder="Fecha de compra" value="{{$products->purchase_date}}" style="width: 100px; padding: 4px;">
                                @error('purchase_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning" style="width: 100px; padding: 4px;">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>