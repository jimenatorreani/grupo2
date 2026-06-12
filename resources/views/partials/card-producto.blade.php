{{--componente reutilizable (card) --}}
<div class="col-md-3 mb-4 mi-CardDelProducto">
    <div class="card h-100 text-center">
        <img src="{{ asset('img/productos/'.$imagen) }}" class="card-img-top">

        <div class="card-body text-center">
            <h5>{{ $nombre }}</h5>
            <p>{{ $precio }}</p>
            <form action="{{ route('carrito.agregar') }}" method="POST">

    @csrf

    <input type="hidden" name="producto_id" value="{{ $producto_id ?? $id ?? '' }}">

    <input type="number" name="cantidad" value="1" min="1" class="form-control form-control-sm mb-2 mx-auto" style="width:80px;">

    <button type="submit" class="btn btn-success">
        Agregar al carrito
    </button>

</form>
        </div>
    </div>
</div>
