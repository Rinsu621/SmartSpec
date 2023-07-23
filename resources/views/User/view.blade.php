@extends('layouts.layoutuser')
@section('content')
@include('partial.carousal')

<div id="overlay"></div>
<div class="-view">
    <!-- Your create form goes here -->

    @php
    // Get unique brand names from specs data
    $uniqueBrands = $specs->pluck('brand.name')->unique();
    @endphp

    @foreach($uniqueBrands as $brand)
    <h3 class="brand-heading">{{ $brand }}</h3>
    <div class="card-container">
        @foreach($specs->where('brand.name', $brand) as $spec)
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $spec->name }}</h4>
            </div>
            <div class="card-body">
                <img src="{{ asset('images/' . $spec->image) }}" alt="{{ $spec->name }}" class="card-image">
            </div>
            <div class="card-footer">
                <a href="#" class="viewmore" onclick="togglePopup('detail{{$spec->id}}')">Detail</a>
                <a href="#" class="viewmore" onclick="togglePopup('detail{{$spec->id}}')">Compare</a>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

    <!-- Your popup-detail divs and JavaScript functions go here -->

</div>
  @endsection

  <style>

    .spec-view
    {
        margin-top: 200px;
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
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    justify-content: flex-end;
    margin-top: 10px;
}
.viewmore {
    background-color: #1B5D6B;
    text-decoration: none;
    padding: 8px 15px;
    color: #F2F2F2;
    border-radius: 30px;
    font-size: 14px;
}

.viewmore:hover {
    text-decoration: none;
    color: #F2F2F2;
}

.brand-heading
{
    margin-top: 20px;
    color: #1B5D6B;
    font-weight: bold;
    display: flex;
    justify-content: center;
}

  </style>
