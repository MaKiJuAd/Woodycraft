@if(Auth::user()->Admin == 1)
    <meta http-equiv="refresh" content="0; URL=http://localhost/Woodycraft/public/dashboard">
@endif

@if(Auth::user()->Admin == 0)
    <x-app-layout>


            <?php
            session_start();
            if(!empty($_SESSION['cart'])) {
                echo "<table>";
                echo "<tr>";
//                echo "<th>Id</th>";
                echo "<th>Nom</th>";
                echo "<th>Prix</th>";
                echo "<th>Quantité</th>";
                echo "</tr>";



                foreach ($_SESSION['cart'] as $item) {
                    echo "<tr>";
//                    echo "<td>" . $item['id'] . "</td>";
                    echo "<td>" . $item['name'] . "</td>";
                    echo "<td>" . $item['price'] . " €</td>";
                    echo "<td>" . $item['quantity'] . "</td>";
                    echo "</tr>";

                }


                echo "</table>";
            }
            ?>


        <form action="{{ route('woody.store') }} " method="post">
            @csrf

            @if(!empty($_SESSION['cart']))
                @foreach($_SESSION['cart'] as $item)

                    <input type="hidden" name="id" :value="{{ $item['id'] }}" />
                    <input type="hidden" name="quantity" :value="{{ $item['quantity'] }}"/>
                    <p> id = {{ $item['quantity'] }} </p>
                    <p> Quantity = {{$item['quantity']}}</p>

                @endforeach
            @endif

            <br>
            <div class="but">
                <input class="button" type="submit" value="Valider le panier">
            </div>
        </form>

    </x-app-layout>
@endif

<style>
    body{
        background-color: #f3f4f6;
    }
    table {
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 80vw;
        border: solid  1px black;
    }
    tr{
        display: flex;
        justify-content: space-around;
        align-items: center;
        border: solid  1px black;

    }
    th{
        background-color: #FFCC70;
        color: white;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border: solid  1px black;
    }
    td{
        /*background-color: rebeccapurple;*/
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border: solid  1px black;
    }
    .but{
        width: 100%;
        height: 20%;
        /*background-color: #CA2E55;*/
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .button{
        background-color: #FFCC70;
        color: white;
        width: 20%;
        height: 50%;
        text-align: center;
    }

</style>
