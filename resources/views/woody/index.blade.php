<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $session_array = array(
        'id' => $_GET['id'],
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
    );

    // Ajout du tableau dans la session
    $_SESSION['cart'][] = $session_array;
}


if (!empty($_SESSION['cart'])) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Nom</th>";
    echo "<th>Description</th>";
    echo "<th>Prix</th>";
    echo "<th>Quantité</th>";
    echo "</tr>";

    foreach ($_SESSION['cart'] as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['description'] . "</td>";
        echo "<td>" . $item['price'] . "</td>";
        echo "<td>" . $item['quantity'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Le panier est vide.";
}
?>


{{-- BLOCKAGE ADMIN +--}}
@if(Auth::user()->Admin == 1)
    <meta http-equiv="refresh" content="0; URL=http://localhost/Woodycraft/public/dashboard">
@endif

@if(Auth::user()->Admin == 0)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('index') }}
            </h2>
        </x-slot>

        <div
            style="width: 100%; height: 10vh; display: flex; align-items: center; flex-direction: row; flex-wrap: wrap;">
            <div
                style="width: 50vw; min-width: 250px; height: 100%; display: flex; align-items: center; justify-content: center; flex-wrap: wrap; background-color: transparent">
                <h2 style="background-color: transparent;font-size: 30px; width:100%; height: 100%; display: flex; align-items: center; justify-content: center">
                    SHOPPING</h2>
            </div>

            {{-- AFFICHAGE DES PRODUITS +--}}
            @foreach($pros as $pro)
                <div style="display: flex; flex-direction: row; width: 100%; height: auto;">

                    {{-- FORMULAIRE POUR CHAQUES PRODUITS +--}}
                    <form method="post" action="pro?id={{ $pro->id }}"
                    style="display: flex; flex-direction: row; width: 100%; height: auto;">
                        @csrf
                        <img style="width: 300px; height: auto; margin-left: 30px"
                             src="{{ asset('storage/'.$pro->image) }}"/>

                        {{-- INFOS PRODUITS +--}}
                        <p style="width: 300px; height: auto; margin-left: 20px">
                            Nom :{{ $pro->name }}<br>
                            Description :{{ $pro->description }}<br>
                            Prix : {{ $pro->price }}<br>
                            En Stock : {{ $pro->quantity }} <br>

                            {{-- BOUTTONS PRODUITS +--}}
                            <input type="hidden" name="name" value="{{ $pro->name }}">
                            <input type="hidden" name="description" value="{{ $pro->description }}">
                            <input type="hidden" name="price" value="{{ $pro->price }}">

                            {{-- CHOIX DE LA QUANTITÉ +--}}
                            <input type="number" name="quantity" value="1" class="form">
                            <input style="background-color: #CA2E55;color: white; width: 81%; margin-top: 5px"
                                   type="submit" name="add_to_cart" value="add_to_cart">

                        </p>
                    </form>

                </div>
        @endforeach

        {{--            <div style="width: 50vw; min-width: 250px;font-size: 30px; height: 100%;display: flex; align-items: center; justify-content: center; flex-wrap: wrap; background-color: transparent">--}}
        {{--                <h2>Panier</h2>--}}
        {{--            </div>--}}
        {{--            --}}{{-- TABLEAU AFFICHAGE PANIER +--}}
        {{--            <table style="width: 50vw;">--}}
        {{--                <thead>--}}
        {{--                    <tr>--}}
        {{--                        --}}{{-- NB COLONNES +--}}
        {{--                        <th colspan="5"></th>--}}
        {{--                    </tr>--}}
        {{--                </thead>--}}
        {{--                <tbody>--}}
        {{--                    <tr>--}}
        {{--                        --}}{{-- TYPE COLONNE +--}}
        {{--                        <td>Id</td>--}}
        {{--                        <td>Nom Article</td>--}}
        {{--                        <td>Prix</td>--}}
        {{--                        <td>Quantity</td>--}}
        {{--                        <td>Action</td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                        --}}{{-- ARTICLES DANS LE PANIER +--}}

        {{--                        <td></td>--}}
        {{--                        <td></td>--}}
        {{--                        <td></td>--}}
        {{--                        <td></td>--}}
        {{--                        <td></td>--}}
        {{--                    </tr>--}}
        {{--                </tbody>--}}
        {{--            </table>--}}
        {{--        </div>--}}
    </x-app-layout>
@endif


