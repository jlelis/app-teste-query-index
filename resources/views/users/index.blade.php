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

    <nav class="navbar navbar-dark bg-primary justify-content-center">
        <form action="{{ route('users.index') }}" class="form-inline" method="get">


            <input class="form-control mr-sm-2" type="search" name="q" id="q" class="search-box" value=""
                placeholder="Search...">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>


        </form>
    </nav>
    <div class="container">

        <table class="table">

            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Criado em: </th>
                </tr>
            </thead>
            @forelse ( $users as $user)
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
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
    <div class="container d-flex justify-content-center">

        {{ $users->withQueryString()->links() }}
        {{-- {{ $users->links() }} --}}

    </div>

</body>

</html>
