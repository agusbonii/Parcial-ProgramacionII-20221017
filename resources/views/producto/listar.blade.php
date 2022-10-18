@include('headerGeneral', ['Section' => $Producto->Nombre . ' (' . $Producto->Marca . ')'])

<h1>{{ $Producto->Nombre }}</h1>
{{-- <a href="{{ url()->route('borrarProducto') . '/' . $Producto->id }}">Borrar</a> --}}
<p>Marca: {{ $Producto->Marca }}</p>
<label for="Descripcion"> Descripcion:
    <br>
    <textarea name="Descripcion">{{ $Producto->Descripcion }}</textarea>
    </br>
</label>
<p>Stock: {{ $Producto->Stock }}</p>
<h2><a href="{{ url()->route('home') }}">Regresar</a></h2>
