


    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GENERER PDF</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Merci de votre commande sur notre site internet, veuillez completer votre cheque avec les informations suivante: </p>

    <table class="table table-bordered">s
        <thead>
        <tr style="border: solid black">
            <th style="border: solid black">Name</th>
            <th style="border: solid black">Email</th>
            <th style="border: solid black">Admin</th>
    {{--        <th style="border: solid black">MDP</th>--}}
        </tr>
        </thead>
        <tbody>
    {{--    @foreach($users->take(3) as $user)--}}
    {{--            <tr>--}}
    {{--                <td>{{ $user->id }}</td>--}}
    {{--                <td>{{ $user->name }}</td>--}}
    {{--                <td>{{ $user->email }}</td>--}}
    {{--            </tr>--}}
    {{--    @endforeach--}}


    @foreach($users as $user)
            @if($user->name === Auth::user()->name)
                <tr style="border: solid black">
                    <td style="border: solid black">{{ $user->name }}</td>
                    <td style="border: solid black">{{ $user->email }}</td>
                    <td style="border: solid black">{{ $user->Admin }}</td>
    {{--                <td style="border: solid black">{{ $user->password }}</td>--}}
                </tr style="border: solid black">
            @endif
        @endforeach
        </tbody>
    </table>
    <p>Voici le récapitulatif de votre commande :</p>
    </body>
    </html>

