{{--componente reutilizable (card) --}}
<div class="col-md-3 mb-4 mi-CardDelProducto">
    <div class="card h-100 text-center">
        <!-- Accedemos directamente a las propiedades del objeto $producto -->
        <img src="{{ asset('img/productos/' . $producto->url_imagen) }}" class="card-img-top">

        <div class="card-body text-center">
            <h5>{{ $producto->nombre }}</h5>
            <p>${{ number_format($producto->precio, 0, ',', '.') }}</p>
            
            <form action="{{ route('carrito.agregar') }}" method="POST">
                @csrf
                <!-- El ID ahora se envía de manera segura -->
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                <input type="number" name="cantidad" value="1" min="1" class="form-control form-control-sm mb-2 mx-auto" style="width:80px;">

                <button type="submit" class="btn btn-success">
                    Agregar al carrito
                </button>
            </form>
        </div>
    </div>
</div>
