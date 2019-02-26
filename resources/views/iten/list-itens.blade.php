@extends('layouts.app') @section('content')
<!-- <a href="{{route('iten.create')}}">
   <button>Adicionar</button></a> -->
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg col-md-10">
            <div class="card shadow p-3 mb-5 bg-white">
                <div class="card-header text-white bg-dark">
                    <h1 class="d-block bg-primary text-white font-weight-bold shadow p-3 bg-dark rounded text-center"> Lista de Itens</h1>
                </div>
                <Table class="table">
                    <thead class="thead-dark">
                        <tr scope="row">
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">

                                <a class="float-right" href="{{route('iten.create')}}">
                                    <button type="submit" class="btn btn-link  mr-2">
                                        <i class="material-icons md-dark md-36 ">add</i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($itens as $iten)
                        <tr scope="row">
                            <td class="h4">{{$iten->id}}</td>
                            <td class="h4">{{$iten->name}}</td>
                            <td class="h4">{{$iten->description}}</td>
                            <td class="h4">{{$iten->quantity}}</td>
                            <td>
                                <a href="{{$iten->imagem}}" data-fancybox="gallery"><img id="imagem{{$iten-> id}}" src="{{$iten-> imagem}}" alt="{{$iten-> name}}" style="width:50%">
            </td>
            <td class="float-right" >
               <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="Second group" >
                     <button type="button" class="btn btn-link" data-toggle="modal" data-target="#edit{{$iten->id}} "> 
                     <i class="material-icons md-dark">edit</i>
                     </button>    
                     <div class="modal fade" id="edit{{$iten->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                 <form method="post" action="/update/{{$iten -> id}}" enctype="multipart/form-data">  {{ csrf_field() }}    
                                    Nome do item:<br>
                                    <input value="{{$iten-> name}}" class="form-control" type="text" name="name">   
                                    <br><br>Descrição do Item:<br>
                                    <input value="{{$iten-> description}}" class="form-control" require type="text" name="description"> 
                                    <br><br>Foto do Item:<br>
                                    <input onchange="loadFile(event)" id="imagem{{$iten-> id}}" value="{{$iten-> imagem}}" type="file" name="imagem" accept=".gif,.jpg,.png" clss="form-control">
                                    <br><br>Quantidade:<br>
                                    <input value="{{$iten-> quantity}}" type="number" name="quantity" class="form-control">
                                    <br><br>
                                    <button type="submit" class="btn btn-success  float-right" id="black">

                                    Alterar </button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <form method="POST" action="{{route('iten.destroy', $iten -> id)}}">
                        <div class="btn-group mr-2  " role="group" aria-label="First group" >
                           {{ csrf_field() }} 
                           @method('DELETE')    
                           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#confirmDelete" >
                           <i class="material-icons md-dark">delete</i>
                           </button> 
                           <div class="modal fade" id="confirmDelete" 
                              tabindex="-1" role="dialog" 
                              aria-labelledby="confirmModalLabel">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" 
                                          data-dismiss="modal" 
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                       <p>
                                          Você tem certeza de que deseja excluir o item {{$iten-> name}}
                                       </p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" 
                                          class="btn btn-default" 
                                          data-dismiss="modal">Close</button>
                                       <span class="pull-right">
                                       <button type="submit" class="btn btn-danger">
                                          Delete
                                       </button>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
            </td>
         </tr>
         @endforeach  
      </tbody>
   </table>
   </div>
</div>
@endsection
@section('scripts')
<script>
   var loadFile = function(event) {
       var output = document.getElementById('output');
       output.src = URL.createObjectURL(event.target.files[0]);
   };  

</script>
@endsection