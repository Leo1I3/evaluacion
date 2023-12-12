<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>evaluacion dfdf</title>

</head>

<body>
    <body class="bodyDevolucion" style="background-image: url('/Images/3d-illustration-advanced-mobile-microprocessor-600nw-2154798885.webp')">
        <div class="container divPrincipal">
            <h2>Registro de fichas</h2>


            <form action="{{ route('fichaf') }}" method="post">
                @csrf
                <div class="form-group">
                    <label >numero:</label>
                    <input type="text" class="form-control"  name="numero">
                </div>
                <div class="form-group">
                    <label >lugar</label>
                    <input type="text" class="form-control"  name="lugar">
                </div>
                <div class="form-group">
                    <label f>instructor:</label>
                    <select class="form-control" name="instructor_idinstructor">
                        <option value="">seleccione</option>
                        @foreach ($elinstructor as $losinstructores)

                            <option value="{{ $losinstructores->idinstructor }}">{{ $losinstructores->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label f>aprendiz:</label>
                    <select class="form-control" name="aprendiz_idaprendiz">
                        <option value="">seleccione</option>
                        @foreach ($elaprendiz as $losaprendizes)

                            <option value="{{ $losaprendizes->idaprendiz }}">{{ $losaprendizes->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary" name="faccion" value="insertar">Guardar</button>

            </form>
            <br>
            <br>


            <h3>Lista de fichas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID ficha</th>
                        <th>numero de ficha</th>
                        <th>lugar</th>
                        <th>instructor a cargo</th>
                        <th>aprendiz</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laficha as $lasfichas)
        <tr>
            <td value="{{ $lasfichas->idficha }}">{{ $lasfichas->idficha }}</td>
            <td value="{{ $lasfichas->numero }}">{{ $lasfichas->numero }}</td>
            <td value="{{ $lasfichas->lugar }}">{{ $lasfichas->lugar }}</td>
            <td value="{{ $lasfichas->instructor_idinstructor }}">{{ $lasfichas->instructor_idinstructor }} </td>
            <td value="{{ $lasfichas->aprendiz_idaprendiz }}">{{ $lasfichas->aprendiz_idaprendiz }} </td>
            <td>
                <a onclick="mostrar({{ $lasfichas->idficha }})" class="btn btn-warning btn-sm">Modificar</a>
                <form action="{{ route('fichafff',$lasfichas->idficha) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>

                <tr id="editFormRow{{ $lasfichas->idficha }}" style="display: none;" id="edit{{ $lasfichas->idficha }}">
                    <td colspan="5">
                        <form action="{{ route('fichaff',$lasfichas->idficha) }}" method="post" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label >numero:</label>
                                <input type="text" class="form-control"  name="numero">
                            </div>
                            <div class="form-group">
                                <label >lugar</label>
                                <input type="text" class="form-control"  name="lugar">
                            </div>
                                <label f>instructor:</label>
                                <select class="form-control" name="instructor_idinstructor">
                                    <option value="">seleccione</option>
                                    @foreach ($elinstructor as $losinstructores)

                                        <option value="{{ $losinstructores->idinstructor }}">{{ $losinstructores->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label f>aprendiz:</label>
                                <select class="form-control" name="aprendiz_idaprendiz">
                                    <option value="">seleccione</option>
                                    @foreach ($elaprendiz as $losaprendizes)

                                        <option value="{{ $losaprendizes->idaprendiz }}">{{ $losaprendizes->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Guardar cambios</button>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="hideEditForm({{ $lasfichas->idficha }})">Cancelar</button>
                        </form>


                    </td>
                </tr>
            </td>
        </tr>
    @endforeach

                </tbody>
            </table>

        </div>
</body>
<script>
    function mostrar(id){
        var nombre = "editFormRow"+id
        var fila = document.getElementById(nombre);

        // Cambiar la propiedad display
        fila.style.display = "inline";
    }
</script>
</html>
