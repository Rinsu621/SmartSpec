@extends('layouts.layoutadmin')

@section('content')
<div class="layout">
    <div class="content">
        <div id="overlay"></div>
        <div class="spec-view">
            @if(count($result) > 0)
            <h2 class="spec-topic">Search Result</h2>

            <div class="table-container">
                <table class="custom-table">
                    <thead class="th-heading">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Launch</th>
                            <th scope="col">RAM</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="info">
                         @php
                            $initialSerialNumber = ($result->currentPage() - 1) * $result->perPage();
                        @endphp
                        @foreach($result as $spec)

                        <tr>
                            <td>{{$initialSerialNumber +$loop->iteration}}</td>
                            <td>{{$spec->name}}</td>
                            <td>{{$spec->brand->name}}</td>
                            <td>{{$spec->launch}}</td>
                            <td>{{$spec->ram}}</td>
                            <td>
                                <a href="#" class="viewmore" onclick="togglePopup('detail{{$spec->id}}')">View More</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
           <center> <p class="search-result"> No results found</p></center>
            @endif
        </div>
        @foreach ($result as $spec)
            <div class="popup-detail" id="detail{{$spec->id}}" style="display: none;">
                <div class="back-arrow" onclick="togglePopup('detail{{$spec->id}}')">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 .146.353v11.5a.5.5 0 0 1-.854.353L5.207 8l5.293-5.854a.5.5 0 0 1 .353-.146z"/>
                        </svg>
                </div>
                <h2 class="specification">Specification</h2>
                <center><img src="{{asset('images/'.$spec->image)}}" alt="{{$spec->name}}" width="150" class="image"></center><br>
                <p class="name">{{$spec->name}}</p>
                <p class="brand"><b>Brand: </b> {{$spec->brand->name}}</p>
                <p class="price"><b>Price: </b>{{$spec->price}}</p>
                <p class="launch"><b>Launch:</b> {{$spec->launch}}</p>
                <p class="color"><b>Color:</b> {{$spec->color}}</p>
                <p class="processor"><b>Processor:</b>{{$spec->processor}}</p>
                <p class="ram"><b>RAM:</b>{{$spec->ram}}</p>
                <p class="storage"><b>Storage:</b>{{$spec->storage}}</p>
                <p class="display"><b>Display:</b>{{$spec->display}}</p>
                <p class="camera"><b>Camera:</b>{{$spec->camera}}</p>
                <p class="battery"><b>Battery:</b>{{$spec->battery}}</p>
                <p class="resistance"><b>Resistance:</b>{{$spec->resistance}}</p>
                <div class="button-view">
               <a href="/spec/{{$spec->id}}/edit" class="btn-edit">Edit</a>
                <form id="deleteForm{{$loop->iteration}}" action="/spec/{{$spec->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="button" onclick="confirmDelete({{$loop->iteration}})">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

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

   </script>

   <style>

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
           width: 80px;
           height: 60px;
           text-align: center;
           border-bottom: 1px solid #1B5D6B;
       }
       .custom-table td{
           font-size: 15px;
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

       .viewmore
       {
           background-color: #1B5D6B;
           text-decoration: none;
           padding: 12px;
           color: #F2F2F2;
           border-radius: 30px;
           font-size: 15px;
       }
       .viewmore:hover {
       text-decoration: none;
       color: #F2F2F2;
   }

   .specification
   {
       color: #1B5D6B;
       font-weight: bold;
       display: flex;
       justify-content: center;
       margin-bottom: 10px;
   }
   .image
   {
      display: flex;
      justify-content: center;
      align-items: center;
   }
   .image img {
           max-width: 100%;
           max-height: 200px; /* Set the maximum height for the image */
           object-fit: contain;
   }
   .name
   {
       color: #1B5D6B;
       font-weight: bold;
       display: flex;
       justify-content: center;
   }
   p
   {
       color: #1B5D6B;
   }

   .btn-edit
   {
          background-color: #1B5D6B;
          color: #F2F2F2;
          width: 100px;
           height: 40px;
           border: none;
           padding: 5px 20px;
           border-radius: 20px;
           margin: 10px 0;
           cursor: pointer;
           font-size: 15px;
           text-align: center;
           padding-top: 10px;
           margin-top: 15px;
   }
   .btn-edit:hover{
       text-decoration: none;
       color: #F2F2F2;
   }
   .delete
   {
       width: 100px;
           height: 40px;
           border: none;
           background-color:  rgb(143, 16, 16);
           color: #F2F2F2;
           padding: 5px 20px;
           border-radius: 20px;
           margin: 10px 0;
           cursor: pointer;
           font-size: 15px;
   }
   .button-view
   {
       display: flex;
       justify-content: space-between;
       margin-top: 20px;

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

       .popup-detail[style="display: block;"] + #overlay {
           display: block;
       }
       .pagination {
           display: flex;
           justify-content: center;
           align-items: center;
           gap: 2px;
           margin-top: 20px;
       }

       .pagination .page-item .page-link {
           color: #1B5D6B; /* Text color of pagination links */
           background-color: #ffff; /* Desired background color (Green) */
           border-color: #1B5D6B; /* Border color of pagination links (Green) */
       }

       .pagination .page-item .page-link:hover {
           background-color: #1B5D6B; /* Hover background color (Darker Green) */
           border-color: #ffff; /* Hover border color (Darker Green) */
           color: #fff;
       }

       .pagination .page-item.active .page-link {
           background-color: #1B5D6B; /* Active page background color (Darker Green) */
           border-color: #ffff; /* Active page border color (Darker Green) */
       }
       .search-result
       {
        color: #1B5D6B;
        font-size: 22px;
        font-weight: bold;
       }


   </style>


