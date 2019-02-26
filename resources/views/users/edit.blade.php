@extends('layouts.app') 


@section('content')
<form method="post" action="{{route('users.update')}}" enctype="multipart/form-data"> 
    {{ csrf_field() }} @method ('PATCH')

    <div class="container">
        <div>
            <h1 class=" card-header bg-light shadow rounded">Editar Perfil</h1>
            <hr>
        </div>
        <div class="row">

            <div class=" card  bg-dark p-3 mb-5" style="width: 18rem;">
                <div class="col">
                    <p class="card-text card bg-light mb-3 shadow rounded form-control text-center">Avatar</p>
                    <br>
                    @if($user->profile_picture)

                    <img id="output" width="200" height="200" class="rounded-circle shadow" src="{{$user->profile_picture}}">
                    @else
                    <img id="output" width="200" height="200" class="rounded-circle shadow" src="{{asset('css/profile-image.jpg')}}">
                    @endif

                    <a href="/delete-avatar" onclick="return confirm('tem certeza que deseja deletar sua imagem de perfil?')" class="btn btn-link float-right"><i class="material-icons md-light">delete</i></a>
                    <input style="display:none" onchange="loadFile(event)" id="imagem" type="file" name="profile_picture">
                    
                    <input onchange="loadFile(event)" id="imagem" type="file" class="form-control-file d-none" name="imagem">
                    <button onclick="document.getElementById('imagem').click()" type="submit" class=" btn btn-link float-right mr-4">
                        <i class="material-icons md-light">edit</i>

                    </button>
                    
                    <br>
                    <br>
                    <br>
                    <div class="card-body bg-dark ">
                        <label class="control-label text-light">Nome:</label>

                        <p class="card-text card bg-light mb-3 shadow rounded form-control ">

                            {{$user->name}}
                        </p>
                        <label class="control-label text-light">Email:</label>

                        <p class="card-text card bg-light mb-3 shadow rounded  form-control">
                            {{$user->email}}
                        </p>
                    </div>

                </div>
            </div>
            
            <div class="col personal-info">
                <div class="card shadow p-3 mb-5 bg-white">
                    <div class="card-header">
                        
            
                            <h1 class="d-block bg-primary text-white font-weight-bold shadow p-3 bg-dark rounded text-center"> Minhas Informações</h1>
                                <div class="form-group">
                                    <br>
                                    <label class="control-label">Nome:</label>
                                    <div class="">
                                        <input class="form-control" name="name" type="text" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <div class="">
                                        <input class="form-control" name="email" type="text" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" name="password_confirmation">Senha:</label>
                                    <div class="">
                                        <input class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" name="password_confirmation">Confirmação de Senha:</label>
                                    <div class="">
                                        <input class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div class="">
                                        <button type="submit" class="btn btn-success float-right" value="Salvar"> Salvar</button>
                                    </div>
                                </div>
                        </form>    
                    </div>
                </div>
            </div>
            <hr>
</form>
</div>

<br>
</div>
@endsection @section('scripts')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection