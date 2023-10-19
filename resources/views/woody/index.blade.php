<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $session_array = array(
        'id' => $_GET['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
    );

    // Ajout du tableau dans la session
    $_SESSION['cart'][] = $session_array;
}
?>


{{-- BLOCKAGE ADMIN +--}}
@if(Auth::user()->Admin == 1)
    <meta http-equiv="refresh" content="0; URL=http://localhost/Woodycraft/public/dashboard">
@endif

@if(Auth::user()->Admin == 0)
    <x-app-layout>
        <div
            style="width: 100%; height: 10vh; display: flex; align-items: center; flex-direction: row; flex-wrap: wrap; ">
            <div
                style="width: 100vw; min-width: 250px; height: 100%; display: flex; align-items: center; justify-content: center; flex-wrap: wrap;">
                <h2 style="background-color: transparent;font-size: 30px; width:100%; height: 100%; display: flex; align-items: center; justify-content: center">
                    SHOPPING</h2>

            </div>

            {{-- AFFICHAGE DES PRODUITS +--}}
            @foreach($pros as $pro)
                <div style="width: 50%;height: auto; display: flex; flex-direction: column;">
                    <form method="post" action="pro?id={{ $pro->id }}" style="display: flex; flex-direction: row;">
                        @csrf
                        <div class="total" style="width: 100%; height: auto; display: flex; justify-content: center; align-content: center; flex-direction: row">
                            <div class="image">
                                <img style="width: 250px; height: auto; margin-left: 100px;"
                                     src="{{ asset('storage/'.$pro->image) }}"/>
                            </div>
                            <div class="block_texte" style="display: flex; flex-direction: column">
                                <p style="width: 500px; height: auto; margin-left: 60px;margin-top: 50px;">
                                    Nom : {{ $pro->name }}<br>
                                    Prix : {{ $pro->price }} €<br>
                                    En Stock : {{ $pro->stock }} <br>

                                    {{--                            BOUTTONS PRODUITS +--}}
                                    <input type="hidden" name="name" value="{{ $pro->name }}" >
                                    <input type="hidden" name="price" value="{{ $pro->price }}">
                                    {{--                            CHOIX DE LA QUANTITÉ +--}}
                                    <input type="number" name="quantity" min="1" value="1" class="form" style="width: 80%"><br>
                                    <input style="background-color: #FFCC70;color: black; width: 80%; margin-top: 5px; text-align: center"
                                           type="submit" name="add_to_cart" value="Ajouter au panier">
                                </p>

                            </div>
                        </div>
                    </form>

                    <form method="post" style="width: 100%;" action="article?id={{ $pro->id }}">
                        @csrf
                        {{-- INFOS PRODUITS +--}}
                        <p style="width: 500px; height: 30px; margin-left: 430px;margin-top: -50px;">
                            {{-- BOUTTONS PRODUITS +--}}
                            <input style="background-color: #FFCC70; color: black; width: 80%; text-align: center;"
                                   type="submit" name="Voir_description" value="Voir +">

                            <input type="hidden" name="id" value="{{ $pro->id }}">
                            <input type="hidden" name="image" value="{{ $pro->image }}">
                            <input type="hidden" name="name" value="{{ $pro->name }}">
                            <input type="hidden" name="price" value="{{ $pro->price }}">
                            <input type="hidden" name="description" value="{{ $pro->description }}">
                            <input type="hidden" name="stock" value="{{ $pro->stock }}">
                            {{--                            CHOIX DE LA QUANTITÉ +--}}
                            <input type="hidden" name="quantity" value="1" class="form" style="width: 80%"><br>

                        </p>
                    </form>
                </div>
        @endforeach

    </x-app-layout>
@endif



<style>
    body{
        background-color: #f3f4f6;
    }
</style>
