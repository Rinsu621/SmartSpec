@extends('layouts.layoutuser')
@section('content')

    @php
        // Get unique brand names from specs data
        $uniqueBrands = $specs->pluck('brand.name')->unique();
        //get the ids of products that the user has already added to the compare
        $user_products = \App\Models\Compare::where('user_id',auth()->id())->get();
        if($user_products){ // if there are products that the user has added
            $ids_of_products = array_column($user_products->toArray(),'prod_id');//extract only the ids from the array
            //convert the user_products object into array because array_column works with arrays only
        }else{//if there are no products added to compare by this user
            $ids_of_products = []; //keep this variable empty
        }

    @endphp

    <div id="overlay" class="overlay"></div>
    @include('partial.carousal')

        @foreach ($uniqueBrands as $brand)
            <h3 class="brand-heading">{{ $brand }}</h3>
            <div class="slider-container">
                <div class="card-container  card-row">
                    @foreach ($specs->where('brand.name', $brand) as $spec)
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $spec->name }}</h4>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('images/' . $spec->image) }}" alt="{{ $spec->name }}"
                                    class="card-image">
                            </div>
                            <div class="card-footer">
                                {{-- <a href="#" class="detail" onclick="togglePopup('detail{{ $spec->id }}')">Detail</a> --}}
                                <button class="detail" onclick="togglePopup('detail{{ $spec->id }}')">Detail</button>
                                    @php
                                        $added = 0; //this is a boolean to know if the user has already added this profuct in compare or not
                                        if(!empty($ids_of_products)){ // check if the variable is empty ot not
                                            if(in_array($spec->id,$ids_of_products)){ // check if this spec id is present in the array of ids
                                                $added = 1; // if it exists in the array, toggle this boolean to 1
                                            }
                                            //if the spec id doesnot exist in the array then leave it as it is
                                        }
                                    @endphp
                                    <form action="{{route('compare.home')}}" method="GET">
                                <button class="compare" data-productId="{{ $spec->id }}" id="compare"
                                    {{$added==1?'style=background:green':''}}  onclick="addToCompare({{ $spec->id }})"
                                    {{-- the above is nothing but an if else check of the boolean --}}
                                    {{-- if the product is already added to compare then it appears red --}}
                                    >Compare</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (count($specs->where('brand.name', $brand)) > 4)
                    <div class="view-more-container">
                        <button class="view-more-btn" onclick="showMore(this)">View More</button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    @foreach ($uniqueBrands as $brand)
        @foreach ($specs->where('brand.name', $brand) as $spec)
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
                <button type="button" class="btn-rate" data-toggle="modal" data-target="#exampleModal" data-mobile-name="{{ $spec->name }}">
                    Rate this Mobile
                </button>

            </div>

        @endforeach
    @endforeach

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/add-rating" method="POST">
            <div class="modal-header">
                <h1 id="modalTitle" class="modal-title fs-5">Rate this</h1>
            </div>
            <div class="modal-body">
                <div class="rating-css">
                    <div class="star-icon">
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
             <button type="submit" class="btn-close">Close</button>
               <button type="submit" class="btn-submit">Submit</button>
          </div>
        </form>
        </div>
      </div>

@endsection

<style>
    .rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }
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
    .modal-title {
    color: #1B5D6B;
    font-weight: bold;
    font-size: 16px; /* Adjust the font size as needed */
}
    .btn-close
    {
        cursor: pointer;
        border: none;
        border-radius: 20px;
        background-color: #888888;
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
    .btn-submit
    {
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
    function updateModalTitle(button) {
    var mobileName = button.getAttribute('data-mobile-name');
    var modalTitle = document.getElementById('modalTitle');
    modalTitle.textContent = "Rate " + mobileName;
}
document.addEventListener('DOMContentLoaded', function() {
    var rateButtons = document.querySelectorAll('.btn-rate');
    rateButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            updateModalTitle(button);
        });
    });
});

</script>
