@include('headerGeneral', ['Section' => 'Nuevo producto'])

<form action="{{ url()->route('crearProducto') }}" method="post">
    @csrf
    <label for="Nombre">Nombre: </label>
    <input type="text" name="Nombre" value="{{old('Nombre')}}">
    @isset($errors)
    <label name="Nombre" style="color:red"> {{ $errors -> first("Nombre"); }}</label>
    @endisset
    <br>
    
    <label for="Marca">Marca: </label>
    <input type="text" name="Marca" value="{{old('Marca')}}">
    @isset($errors)
    <label name="Marca" style="color:red"> {{ $errors -> first("Marca"); }}</label>
    @endisset
    <br>
    
    <label for="Descripcion">Descripcion: </label><br>
    <textarea name="Descripcion" cols="50" rows="10">{{old('Descripcion')}}</textarea>
    @isset($errors)
    <label name="Descripcion" style="color:red"> {{ $errors -> first("Descripcion"); }}</label>
    @endisset
    <br>
    
    <label for="Stock">Stock: </label>
    <input type="text" name="Stock" type="number" value="{{old('Stock')}}">
    @isset($errors)
       <label name="Stock" style="color:red"> {{ $errors -> first("Stock"); }}</label>
    @endisset
    <br>
    <br>
    <button type="submit">Agregar Producto</button>
</form>