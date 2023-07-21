@extends('layouts.layoutadmin')
@section('content')
<div id="overlay"></div>
<div class="brand-view">
    <h2 class="topic-brand"> Brand List</h2>
        <button class="create" type="submit" onclick="togglePopup('create')">Create</button>
        <div class="popup-form-create" id="brandForm" style="display: none;">
            <div class="back-arrow" onclick="togglePopup('create')">
                <!-- Back arrow icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 .146.353v11.5a.5.5 0 0 1-.854.353L5.207 8l5.293-5.854a.5.5 0 0 1 .353-.146z"/>
                </svg>
            </div>
            <h2 class="brand">Add Brand</h2>
            <form action="/brand" method="POST">
                @csrf
                <input type="text" class="brand-name" name="name" placeholder="Brand Name">
                <button type="submit" class="btn-add">Add</button>
    </form>
</div>
 <div class="table-container">
    <table class="custom-table">
    <thead class="heading">
        <tr>

            <th scope="col" >S.No</th>
            <th scope="col">Name</th>
            <th colspan="2" class="action">Action</th>
        </tr>
    </thead>
    <tbody class="info">
        @foreach ($brands as $brand)
        <tr>
           <td>{{$loop->iteration}}</td>
           <td>{{$brand->name}}</td>
           <td>
            <button class="edit-btn-first" type="submit" onclick="togglePopup('edit')">Edit</button>
        <div class="popup-form-edit" id="editForm" style="display: none;">
            <div class="back-arrow-edit" onclick="togglePopup('edit')">
                <!-- Back arrow icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 .146.353v11.5a.5.5 0 0 1-.854.353L5.207 8l5.293-5.854a.5.5 0 0 1 .353-.146z"/>
                </svg>
            </div>
            <h2 class="brand-topic">Edit Brand</h2>
            <form action="/brand/{{$brand->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" class="brand-name" name="name" placeholder="Brand Name" value="{{$brand->name}}">
                <button type="submit" class="btn-edit">Edit</button>
    </form>
</div>
           </td>
           <td>
            <form id="deleteForm" action="/brand/{{$brand->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete" type="button" onclick="confirmDelete()">Delete</button>
            </form>
           </td>
        </tr>

        @endforeach
    </tbody>
</table>
 </div>

</div>
<script>
    function confirmDelete()
    {
        if(confirm('Are you sure you want to delete this brand?'))
    {
    document.getElementById('deleteForm').submit();
    }
    else{
        return false;
    }
}

    function togglePopup(popupType) {
        var popupCreate = document.getElementById('brandForm');
        var popupEdit = document.getElementById('editForm');
        var overlay = document.getElementById('overlay');
        if (popupType === 'create') {
            if (popupCreate.style.display === 'none') {
                popupCreate.style.display = 'block';
                overlay.style.display = 'block';
            } else {
                popupCreate.style.display = 'none';
                overlay.style.display = 'none';

            }
            popupEdit.style.display = 'none';
        } else if (popupType === 'edit') {
            if (popupEdit.style.display === 'none') {
                popupEdit.style.display = 'block';
                overlay.style.display = 'block';
            } else {
                popupEdit.style.display = 'none';
                overlay.style.display = 'none';

            }
            popupCreate.style.display = 'none';

        }
    }
</script>

<style>
     @font-face {
    font-family: 'Anderson Grotesk';
    src: url('/path-to-your-fonts/anderson-grotesk.woff2') format('woff2'),
         url('/path-to-your-fonts/anderson-grotesk.woff') format('woff');

    font-weight: normal; /* Adjust as needed */
    font-style: normal;
     }

     *
     {
        font-family: 'Anderson Grotesk', sans-serif;
     }
     .brand
     {
        color: #1B5D6B;
        font-weight: bold;
     }
     .btn-add
     {

        width: 25%;
        height: 40px;
        border: none;
        background-color: #1B5D6B;
        padding: 8px;
        border-radius: 20px;
        margin: 20px 0;
        cursor: pointer;

        font-size: 15px;
        color: #F2F2F2;;
     }
    .brand-view
    {
        margin-top:100px;

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
    .edit-btn-first
    {
        display: inline-block;
        width: 25%;
        height: 40px;
        border: none;
        background-color: #1B5D6B;
        padding: 8px;
        border-radius: 20px;
        margin: 20px 0;
        cursor: pointer;
        margin-left: 215px;
        font-size: 15px;
        color: #F2F2F2;

    }
    h2
    {

        text-align: center;
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
    }
    .popup-form-edit {
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
    .back-arrow-edit
    {
        cursor: pointer;
        display: inline-block;
        color: #1B5D6B;
        margin-bottom: 10px;
        margin-right: 340px;
    }
    .back-arrow {
        cursor: pointer;
        display: inline-block;
        color: #1B5D6B;
        margin-bottom: 10px;
    }

    .back-arrow svg {
        vertical-align: middle;
        margin-right: 5px;
    }
    .delete
    {
        display: inline-block;
        width: 65%;
        height: 40px;
        border: none;
        background-color:  rgb(143, 16, 16);
        padding: 5px 20px;
        border-radius: 20px;
        margin: 10px 0;
        cursor: pointer;
        font-size: 15px;
        color: #F2F2F2;
    }
    .btn-edit
    {
        display: inline-block;
        width: 50%;
        height: 40px;
        border: none;
        background-color: #1B5D6B;
        color: #F2F2F2;
        padding: 5px 20px;
        border-radius: 20px;
        margin: 10px 0;
        cursor: pointer;
        margin-top:18px;
        font-size: 15px;
    }
    /* .edit
    {
        display: inline-block;
        width: 60%;
        height: 30px;
        border: none;
        background-color: ;
        padding: 5px 40px;
        border-radius: 20px;
        margin: 20px 0;
        cursor: pointer;

    } */

    table
    {
        background-color: #F2F2F2;
        width: 100%;
        align-content: center;
    }
    .table-container {
        display: flex;
        justify-content: center;
    }

    .custom-table {
        background-color: #F2F2F2;
        border-radius: 10px;
        width: 100%;
        max-width: 1000px;
        border-collapse: collapse;


    }

    .custom-table th,
    .custom-table td {
        padding: 5px;
        width:50px;
        text-align: center;
        border-bottom:1px solid #1B5D6B;


    }
    .heading
    {
        font-size: 20px;
        border-radius: 20px;
        padding: 100px;
        color: #1B5D6B;
    }

    .info
    {
        font-size: 20px;
        color: #1B5D6B;
    }
    .topic-brand
    {
        font-weight: bold;
        color: #1B5D6B;
    }
    .brand-topic
    {
        font-weight: bold;
        color: #1B5D6B;
    }

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

    /* Show overlay when popup form is open */
    .popup-form-create[style="display: block;"] + #overlay,
    .popup-form-edit[style="display: block;"] + #overlay {
        display: block;
    }

</style>
@endsection
