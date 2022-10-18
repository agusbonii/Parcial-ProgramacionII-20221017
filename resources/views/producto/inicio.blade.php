@include('headerGeneral', ['Section' => 'Productos'])

<h1>Productos</h1>
<a href="{{ url()->route('crearProducto') }}">Nuevo</a>
<hr>

@foreach ($Productos as $Producto)
    <h2><a href="{{ url()->route('verProducto', $Producto->id) }}">{{ $Producto->Nombre }}</a></h2>
    <p>Marca: {{ $Producto->Marca }}</p>
    <label for="Descripcion"></label>
    <textarea name="Descripcion" readonly>{{ $Producto->Descripcion }}</textarea>
    <p>Stock: {{ $Producto->Stock }}</p>
    <br>
    {{-- <a href="{{ url()->route('borrarProducto') . '/' . $Producto->id }}">Borrar</a> --}}
    <hr>
@endforeach
