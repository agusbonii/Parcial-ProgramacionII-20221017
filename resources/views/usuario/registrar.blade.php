@include('headerGeneral', ['Section' => 'Registrarse'])

<form action="{{ url()->route('registrarse') }}" method="post">
    @csrf
    Usuario: <input autofocus type="text" name="username" value="{{ old('username') }}" /><br />
    Nombre Completo: <input autofocus type="text" name="FullName" value="{{ old('FullName') }}" /><br />
    Contraseña: <input type="password" name="password" required /><br />
    Confirmar contraseña: <input type="password" name="password_confirmation" required /><br />
    <button type="submit">Registrarse</button>
</form>


@if (Session::has('success'))
<div style="color: green;"> {{ Session::get('success') }}
<a href="{{ url()->route('login'); }}">Loguearse</a>
</div>
@endif

@if ($errors !== NULL)
<div style="color: red;"> {{ $errors -> first() }} </div>
@endif

@include('footerGeneral')