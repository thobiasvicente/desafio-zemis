@extends('layouts.app') @section('content')

<div class="">
    <div class="container mb-5 py-5">
        <div class="row">
            <div class="col-lg col-md-10 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <button id="card-image" onclick="document.getElementById('imagem').click()" class="card-img-left d-none d-md-flex btn-btn-link">

                        <img id="output" width="500" height="490">

                    </button>
                    <div class="card-body">
                        @if(session('warnBool') == true)
                        <div class="alert alert-sucess" role="alert">
                            {{session('message')}}
                        </div>
                        @else @endif
                        <h3 class="card-title text-center">Cadastro de Itens</h3>
                        <hr>
                        <form method="post" action="{{route('iten.store')}}" enctype="multipart/form-data"> {{ csrf_field() }} Nome do item:
                            <br>
                            <input class="form-control" type="text" name="name" autofocus required>
                            <br>
                            <br>Descrição do Item:
                            <br>
                            <input class="form-control" require type="text" name="description" required>
                            <div style="display:none">
                                <input onchange="loadFile(event)" id="imagem" class="form-control" type="file" name="imagem" accept=".gif,.jpg,.png">
                            </div>
                            <br>
                            <br>Quantidade:
                            <br>
                            <input type="number" name="quantity" class="form-control" required>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary float-right " id="black"> Adicionar </button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection @section('scripts')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('card-image').style.background = 'none';
    };
</script>

@endsection