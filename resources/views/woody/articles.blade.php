<?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $image = $_POST['image'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
    }
    else {
        echo "Paramètre 'id' manquant dans l'URL.";
    }

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



{{--RESTRICTION ADMIN--}}
@if(Auth::user()->Admin == 1)
    <meta http-equiv="refresh" content="0; URL=http://localhost/Woodycraft/public/dashboard">
@endif

{{--RESTRICTION USER--}}
@if(Auth::user()->Admin == 0)
    <x-app-layout>
        {{-- FORMULAIRE D'AFFICHAGE DES INFOS PRODUITS --}}
        <div class="article">
            <form method="post" class="formulaire" action="pro?id={{ $id }}">
                @csrf
                {{--IMAGE--}}
                <div class="to">
                    <div class="PP">
                        <img class="image"
                             src="{{ asset('storage/'.$image) }}"/>
                    </div>

                    {{--INFOS PRODUITS--}}
                    <div class="infos">
                        <p class="Nom"><?php echo "Nom: $name<br>"; ?></p>
                        <p class="Prix"><?php echo "Prix: $price €<br>"; ?></p>
                        <p class="Description"><?php echo "$description<br>"; ?></p>
                        <p class="Stock"><?php echo "Stock: $stock<br>"; ?></p>
                        <p class="Quantity_T">Quantité :
                            <input class="Quantity" type="number" name="quantity" min="1" value="1">
                        </p>
                    </div>
                    {{-- INPUT CACHÉ --}}
                    <input type="hidden" name="name" value="{{ $name }}" >
                    <input type="hidden" name="price" value="{{ $price }}">
                    <input type="hidden" name="description" value="{{ $description }}" >
                    <input type="hidden" name="stock" value="{{ $stock }}">
                    {{-- INPUT RENVOIE SUR ACHETER--}}
                    <div class="but">
                        <input class="button" type="submit" name="add_to_cart" value="Ajouter au panier">
                    </div>

                </div>
            </form>
        </div>
    </x-app-layout>
@endif

<style>
    body{
        background-color: #f3f4f6;
    }
    /*TOTAL DU BLOCK  */
    .formulaire{
        width: 50%;
        height: 90vh;
        /*background-color: red;*/

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    /* IMAGE + TEXTE + BUTTON */
    .article{

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .to{
        width: 50%;
        height: 90%;
        background-color: #312F2F;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    /* ZONE DE PLACEMENT IMAGE */
    .PP{
        width: 50%;
        height: 30%;
        /*background-color: green;*/
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    /* IMAGE TAILLE */
    .image{
        width: 250px;
        height: auto;
        /*background-color: darkgreen;*/
    }
    /* ZONE D'INFORMATION TEXT */
    .infos{
        width: 80%;
        height: 50%;
        /*background-color: #2563eb;*/
    }

    .Nom{
        color: white;
        width: 100%;
        height: 10%;
    }
    .Prix{
        color: white;
        width: 100%;
        height: 10%;
    }
    .Description{
        color: white;
        width: 100%;
        height: auto;
    }
    .Stock{
        color: white;
        width: 100%;
        margin-top: 5%;
        height: 10%;
    }
    .Quantity{
        width: 100%;
        color: black;
        text-align: center;
    }
    .Quantity_T{
        color: white;
    }

    .but{
        width: 90%;
        height: 10%;
        /*background-color: #CA2E55;*/
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .button{
         background-color: #FFCC70;
         color: white;
         width: 60%;
         height: 50%;
         text-align: center;
     }

</style>
