<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de tareas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">CRUD de Tareas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Importantes</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Secciones
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Importantes</a></li>
              <li><a class="dropdown-item" href="#">Cruciales</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Personalizados</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Para usuarios</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar algo" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h1>Hola Albino Jovel, esto es una tabla cabalona de registros</h1>

    <div class="table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($task as $tasks)
        <tr>
            <td hidden>{{ $tasks->id }}</td>
            <td>{{ $tasks->titulo }}</td>
            <td>{{ $tasks->descripcion }}</td>
            <td>{{ $tasks->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verModal{{ $tasks->id }}">Detalle</button>
                  </div>
                  <div>
                    <form action="{{ route('task.destroy', $tasks)}}" method='POST'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    </div>
                </div>
            </td>
        </tr>
        <div class="modal fade" id="verModal{{ $tasks->id }}" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalles de la tarea</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('task.update', $tasks->id)}}" method='POST'>
                            @csrf
                            @method('PUT')
                            <div class="mb-3" hidden>
                                <label for="titulo" class="form-label">ID</label>
                                <input type="text" value="{{ $tasks->id }}" class="form-control" id="id" name="id">
                            </div>
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título de la tarea</label>
                                <input type="text" value="{{ $tasks->titulo }}" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción de la tarea</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $tasks->descripcion }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value="1" {{ $tasks->estado == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="2" {{ $tasks->estado == 2 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Actualizar tarea</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>


    <div>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
        Crear nueva tarea
      </button>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear nueva tarea</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('task.store')}}" method='POST'>
            @csrf
            <div class="mb-3">
              <label for="titulo" class="form-label">Título de la tarea</label>
              <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción de la tarea</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="mb-3" hidden>
              <label for="estado" class="form-label">Estado</label>
              <input type="text" class="form-control" id="ESTADO" name="estado" value="1">
            </div>            
            <button type="submit" class="btn btn-success">Crear tarea</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
