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
        <form action="{{ route('users.index') }}" class="form-inline" method="get" id="form_id">


            <input class="form-control mr-sm-2" type="search" name="q" id="q" class="search-box" value=""
                placeholder="Search...">
            <input class="form-control mr-sm-2" type="search" name="id" id="id" class="search-box" value=""
                placeholder="Search by ID...">
            {{-- <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button> --}}
            {{-- <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="getClick">Pesquisar</button> --}}
            <input type="submit" class="btn btn-success my-2 my-sm-0" value="Pesquisar" onclick="getClick();" />


        </form>
    </nav>
    <div class="container">
        <form action="{{ url('multipleusersdelete') }}" method="post">
            @csrf
            <input class="btn btn-danger" type="submit" name="submit" id="del" value="Delete Selected Users"
                 style="display: none;" />


            <table class="table table-responsive-sm">

                <thead class="thead-dark">
                    <tr>
                        <th class="text-left"> <input type="checkbox" id="checkAll"> Select All</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Criado em: </th>
                    </tr>
                </thead>
                @forelse ( $users as $user)
                    <tbody>
                        <tr>
                            <td class="text-left"><input name='id[]' type="checkbox" id="checkItem"
                                    value="{{ $user->id }}" onclick="updateCounter() ;">
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

        </form>
    </div>
    <div class="container d-flex justify-content-center">

        {{ $users->withQueryString()->links() }}
        {{-- {{ $users->links() }} --}}

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function getClick() {
            var form = document.getElementById("form_id");

            document.getElementById("form_id").addEventListener("click", function() {

                event.preventDefault();
                form.submit();

            })
        };
    </script>

    </script>
    <script language="javascript">
        $("#checkAll").click(function() {

            $('input:checkbox').not(this).prop('checked', this.checked);
            if ($("#del").is(":visible")) {
                console.log($("#del").hide());
            } else {
                console.log($("#del").show());
            }

        });

    </script>
    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>

</body>

</html>
