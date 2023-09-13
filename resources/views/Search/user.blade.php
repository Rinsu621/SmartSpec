@extends('layouts.layoutuser')

@section('content')
@php
//get the ids of products that the user has already added to the compare
$user_products = \App\Models\Compare::where('user_id',auth()->id())->get();
if($user_products){ // if there are products that the user has added
    $ids_of_products = array_column($user_products->toArray(),'prod_id');//extract only the ids from the array
    //convert the user_products object into array because array_column works with arrays only
}else{//if there are no products added to compare by this user
    $ids_of_products = []; //keep this variable empty
}

@endphp
<div class="spec-view">
    @if ($result->count() == 0)
    <div class="text">
    <p><b><center style="color: #15657c; font-size: 20px;">No results found for your search query: "{{ $searchQuery }}"</center></b></p>
    @else
    <p><b><center style="color: #15657c; font-size: 20px;"> Showing results for "{{ $searchQuery }}"</center></b></p>
    </div>
    <div class="card-container">
        @foreach ($result as $spec)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $spec->name }}</h4>
            </div>
            <div class="card-body">
                <img src="{{ asset('images/' . $spec->image) }}" alt="{{ $spec->name }}" class="card-image">
            </div>
            <div class="card-footer">
                <button class="detail" onclick="togglePopup('detail{{ $spec->id }}')">Detail</button>
                @php
                    $added = 0; // Initialize as 0
                    if (in_array($spec->id, $ids_of_products)) {
                        $added = 1; // If the product is already in compare, set as 1
                    }
                @endphp
                <form action="{{ route('compare.home') }}" method="GET">
                    <button class="compare" data-productId="{{ $spec->id }}" id="compare"
                        {{ $added == 1 ? 'style=background:green;color:#f2f2f2;' : 'color:#f2f2f2' }} onclick="addToCompare({{ $spec->id }})">Compare
                    </button>
                </form>
            </div>
        </div>
        @endforeach


    </div>

    @foreach($result as $spec)
    <div class="popup-detail" id="detail{{ $spec->id }}" style="display: none;">
        <div class="back-arrow" onclick="togglePopup('detail{{ $spec->id }}')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M11.354 1.646a.5.5 0 0 1 .146.353v11.5a.5.5 0 0 1-.854.353L5.207 8l5.293-5.854a.5.5 0 0 1 .353-.146z" />
            </svg>
        </div>
        <h2 class="specification">Specification</h2>
        <center><img src="{{ asset('images/' . $spec->image) }}" alt="{{ $spec->name }}" width="150"
                class="image"></center><br>
        <p class="name">{{ $spec->name }}</p>
        <p class="brand"><b>Brand: </b> {{ $spec->brand->name }}</p>
        <p class="price"><b>Price: </b>{{ $spec->price }}</p>
        <p class="launch"><b>Launch:</b> {{ $spec->launch }}</p>
        <p class="color"><b>Color:</b> {{ $spec->color }}</p>
        <p class="processor"><b>Processor:</b>{{ $spec->processor }}</p>
        <p class="ram"><b>RAM:</b>{{ $spec->ram }}</p>
        <p class="storage"><b>Storage:</b>{{ $spec->storage }}</p>
        <p class="display"><b>Display:</b>{{ $spec->display }}</p>
        <p class="camera"><b>Camera:</b>{{ $spec->camera }}</p>
        <p class="battery"><b>Battery:</b>{{ $spec->battery }}</p>
        <p class="resistance"><b>Resistance:</b>{{ $spec->resistance }}</p>
        <button type="button" class="btn-rate" data-toggle="modal" data-target="#exampleModal">
            Rate this Mobile
        </button>

    </div>
    @endforeach
    @endif
</div>
@endsection

<style>
    .spec-view {
        margin-top: 20px;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card {
        width: 300px;
        margin: 10px;
        padding: 15px;
        border: 1px solid #1B5D6B;
        border-radius: 8px;
        box-shadow: 0 1px 2px #1B5D6B;
        background-color: #f2f2f2;
    }

    .card-header {
        margin-bottom: 10px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        color: #1B5D6B;
        margin: 0;
    }

    .card-body {
        display: flex;
        justify-content: center;
    }

    .card-image {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
    }

    .card-footer {
        display: flex;
        justify-content: space-evenly;
        gap: 30px;
        margin-top: 10px;
    }

    .detail {
        cursor: pointer;
        border: none;
        background-color: #15657c;
        text-decoration: none;
        color: #F2F2F2;
        border-radius: 30px;
        font-size: 14px;
        padding-left: 15px;
        padding-right: 15px;
        width: 90px;
        height: 40px;
        margin-top: 5px;
    }

    .detail:hover {
        text-decoration: none;
        color: #F2F2F2;
    }

    .compare {
    cursor: pointer;
    border: none;
    background-color: #888888;
    text-decoration: none;
    color: #F2F2F2;
    border-radius: 30px;
    font-size: 14px;
    padding-left: 15px;
    padding-right: 15px;
    height: 40px;
    width: 90px;
    margin-top: 5px;
}



    .brand-heading {
        color: #1B5D6B;
        font-weight: bold;
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .popup-detail {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f2f2f2;
        padding: 20px;
        border: 1px solid #f2f2f2;
        border-radius: 8px;
        z-index: 1;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .back-arrow {
        cursor: pointer;
        display: inline-block;
        color: #1B5D6B;
        margin-bottom: 10px;
        margin-right: 340px;
        margin-top: 2px;
    }

    .specification {
        color: #1B5D6B;
        font-weight: bold;
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .image {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image img {
        max-width: 100%;
        max-height: 200px;
        /* Set the maximum height for the image */
        object-fit: contain;
    }

    .name {
        color: #1B5D6B;
        font-weight: bold;
        display: flex;
        justify-content: center;
    }

    p {
        color: #1B5D6B;
    }

    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        /* Translucent black background */
        z-index: 1;
        /* Ensure the overlay appears above other elements */
    }

    .popup-detail[style="display: block;"]+#overlay {
        display: block;
    }

    .btn-rate {
        width: 35%;
        height: 40px;
        ;
        border: none;
        background-color: #1B5D6B;
        padding-top: 10px;
        padding-left: 8px;
        border-radius: 25px;
        margin: 20px 0;
        cursor: pointer;
        display: flex;
        justify-content: center;
        font-size: 15px;
        color: #F2F2F2;
    }



    .modal-title {
        color: #1B5D6B;
        font-weight: bold;
    }

    .card-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .view-more-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .view-more-btn {
        border: none;
        background-color: #1B5D6B;
        padding: 10px 20px;
        color: #F2F2F2;
        border-radius: 50px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        /* Remove underline for the button */
        display: inline-block;
    }

    .view-more-btn:hover {
        background-color: #15657c;
    }
</style>

<script>
    function confirmDelete(iteration) {
        if (confirm('Are you sure you want to delete this Specification?')) {
            document.getElementById('deleteForm' + iteration).submit();
        } else {
            return false;
        }
    }

    function togglePopup(popupId) {
        var popupdetail = document.getElementById(popupId);
        var overlay = document.getElementById('overlay');
        var computedStyle = window.getComputedStyle(popupdetail);

        if (computedStyle.display === 'none') {
            popupdetail.style.display = 'block';
            overlay.style.display = 'block';
        } else {
            popupdetail.style.display = 'none';
            overlay.style.display = 'none';

        }
    }

    function showMore(button) {
        var cardContainer = button.parentElement.previousElementSibling;
        var cards = cardContainer.querySelectorAll('.card');

        cards.forEach(function(card, index) {
            if (index >= 4) {
                card.style.display = card.style.display === 'block' ? 'none' : 'block';
            }
        });

        button.textContent = button.textContent === 'View Less' ? 'View More' : 'View Less';
    }
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.view-more-btn');
        buttons.forEach(function(button) {
            var cardContainer = button.parentElement.previousElementSibling;
            var cards = cardContainer.querySelectorAll('.card');

            cards.forEach(function(card, index) {
                if (index >= 4) {
                    card.style.display = 'none';
                }
            });

            button.textContent = cards.length > 4 ? 'View More' : 'View Less';
        });
    });

</script>
