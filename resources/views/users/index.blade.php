<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{route('users.index')}}" method="get">
            <input class="" type="search" name="q" id="q" class="search-box" value="" placeholder="Search...">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </form>
   
        <table class="table">
          
            <thead>
                <tr>
                    <th>Id</th>                
                    <th>Name</th>                
                    <th>Criado em: </th>
                </tr>
            </thead>
            @forelse ( $users as $user)
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>                  
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
            </tbody>
        
            @empty
            <tfoot>
                <tr>
                    <td> Sem Dados na Pesquisa</td>
                </tr>
            </tfoot>
            @endforelse        
        </table>


    </div>
    <nav class="container d-flex justify-content-center">
       
    {{ $users->withQueryString()->links() }}
    {{-- {{ $users->links() }} --}}
       
    </nav>
    
</body>
</html>