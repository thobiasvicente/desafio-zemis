<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coleção de Itens</title>
    </head>
    <body>     
           
            <h4 id="center"><b>Editar itens:</b></h4>
            
        <form method="post" action="{{route('iten.update', $iten->id)}}" enctype="multipart/form-data">  {{ csrf_field() }}    
        @method('PATCH')

            Nome do item:<br>
            <input value="{{$iten-> name}}" class="form-control" type="text" name="name">   
            
            <br><br>Descrição do Item:<br>
           
            <input value="{{$iten-> description}}" class="form-control" require type="text" name="description"> 
            
            <br><br>Foto do Item:<br>
            
            <input value="{{$iten-> imagem}}" type="" name="imagem" accept=".gif,.jpg,.png" clss="form-control">
            
            <br><br>Quantidade:<br>
            
            <input value="{{$iten-> quantity}}" type="number" name="quantity" class="form-control">
           
            <br><br>
            
            <button type="submit" class="btn btn-warning" id="black"  > Adicionar </button>
            <button type="reset" class="btn btn btn-default"> Limpar </button>
        
        </form>                

    </body>
</html>
