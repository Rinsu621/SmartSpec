<div class="layout">
@extends('layouts.layoutadmin')
</div>
<div class="content">
@section('content')
<div id="overlay"></div>
<div class="spec-view">
    <h2 class="spec-topic">Specification List</h2>
    <button class="create" type="submit" onclick="togglePopup('create')">Create</button>
    <div class="popup-form-create" id="specForm" style="display:none;">
        <div class="back-arrow" onclick="togglePopup('create')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 .146.353v11.5a.5.5 0 0 1-.854.353L5.207 8l5.293-5.854a.5.5 0 0 1 .353-.146z"/>
            </svg>
        </div>
        <h2 class="spec">Add Specification</h2>
        <form action="/spec" method="POST" style="display: block;">
        @csrf
        <label for="name">Name</label><br>
        <input type="text" name="name" class="name" id="name"><br><br>
        <label for="brand_id">Brand</label>
        <select name="brand_id" id="brand_id" class="form-control">
            @foreach ($brands as $brand )
                <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
           </select><br><br>
        <label for="price">Price</label><br>
        <input type="text" class="price" name="price" id="price"><br><br>
        <label for="launch">Launch</label><br>
        <input type="date" class="launch" name="launch" id="launch"><br><br>
        <label for="color">Color</label>
        <input type="text" class="color" name="color" id="color"><br><br>
        <label for="processor">Processor</label><br>
        <input type="text" name="processor" id="processor" class="processor"><br><br>
        <label for="ram">RAM</label><br>
        <input type="text" class="ram" name="ram" id="ram"><br><br>
        <label for="storage">Storage</label><br>
        <input type="text" name="storage" id="storage" class="storage"><br><br>
        <label for="display">Display</label><br>
        <input type="text" name="display" id="display" class="display"><br><br>
        <label for="camera">Camera</label><br>
        <input type="text" class="camera" name="camera" id="camera"><br><br>
        <label for="battery">Battery</label><br>
        <input type="text" class="battery" name="battery" id="battery"><br><br>
        <label for="resistance">Resistance</label><br>
        <input type="text" class="resistance" name="resistance" id="resistance"><br><br>
        <label for="image">Image</label><br>
        <input type="file" class="image" name="image" id="image"><br><br>
        <button type="submit" class="btn-add">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         v
        </form>
    </div>
    <div class="table-container">
        <table class="custom-table">
            <thead class="th-heading">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price</th>
                    <th scope="col">launch</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="info">
                @foreach($specs as $spec)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$spec->name}}</td>
                    <td>{{$spec->brand->name}}</td>
                    <td>{{$spec->price}}</td>
                    <td>{{$spec->launch}}</td>
                    <td>
                        <a href="/detail" class="btn-detail">View More</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
</div>
@endsection
</div>

<script>
    function togglePopup(popupType)
    {
        popupCreate=document.getElementById('specForm');
        var overlay = document.getElementById('overlay');
        if(popupCreate.style.display==='none')
        {
            popupCreate.style.display='block';
            overlay.style.display = 'block';
        }
        else {
                popupCreate.style.display = 'none';
                overlay.style.display = 'none';

            }
    }
</script>

<style>
     #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Translucent black background */
        z-index: 1; /* Ensure the overlay appears above other elements */
    }

    .content
    {
        margin-top:7%;
    }
    .spec-topic
    {
        color:#1B5D6B;
        display: flex;
        justify-content: center;
        font-weight: bold;
    }
    .create
    {
        display: inline-block;
        width: 8%;
        height: 40px;;
        border: none;
        background-color: #1B5D6B;
        padding: 8px;
        border-radius: 25px;
        margin: 20px 0;
        cursor: pointer;
        margin-left: 215px;
        font-size: 15px;
        color: #F2F2F2;
    }
    table
    {
        background-color:#F2F2F2;
        width: 100%;
        align-content: center;
    }
    .table-container
    {
        display: flex;
        justify-content: center;
    }
    .custom-table
    {
        background-color: #F2F2F2;
        border-radius: 10px;
        width: 100%;
        max-width: 1000px;
        border-collapse: collapse;;
    }

    .custom-table th,
    .custom-table td{
        padding: 5px;
        width: 50px;
        text-align: center;
        border-bottom: 1px solid #1B5D6B;
    }
    .th-heading
    {
        font-size: 20px;
        border-radius: 20px;
        padding: 10px;
        color: #1B5D6B;
    }
    .info
    {
        font-size: 20px;
        color: #1B5D6B;
    }

    .popup-form-create {
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
        max-width: 400px; /* Adjust the maximum width as needed */
    }

    .back-arrow {
        cursor: pointer;
    }

    .spec {
        text-align: center;
    }

    .popup-form-create label {
        display: block;
        margin-bottom: 10px;
    }

    .popup-form-create .btn-add {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #1B5D6B;
        color: #f2f2f2;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }


</style>

