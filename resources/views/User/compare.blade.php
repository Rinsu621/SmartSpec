@extends('layouts.layoutuser')
@section('content')

<?php
    //get the products added by the user
    $user_compare_products = \App\Models\Compare::where('user_id',auth()->id())->get();
    if(!$user_compare_products){
        echo 'You have not added any products to compare';
    }else{ ?>


<table style="width:100%">
    <tr>
      <th>Image</th>
      @foreach ($user_compare_products as $item)
      <td>
            @php
                $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
                // dd($product_detail);
            @endphp
          <img style="max-width: 200px" src="{{asset('images/'.$product_detail->image)}}" alt="">
        </td>
          @endforeach
    </tr>
    <tr>
      <th>Title:</th>
      @foreach ($user_compare_products as $item)
    <td>
            @php
                $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
            @endphp
          {{$product_detail->name}}
        </td>
      @endforeach
    </tr>
    <tr>
      <th>Price:</th>
      @foreach ($user_compare_products as $item)
    <td>
            @php
                $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
            @endphp
          {{$product_detail->name}}
        </td>
      @endforeach
    </tr>
    <tr>
      <th>RAM:</th>
      @foreach ($user_compare_products as $item)
    <td>
            @php
                $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
            @endphp
          {{$product_detail->name}}
        </td>
      @endforeach
    </tr>

    <tr>
      <th>Action:</th>
        @foreach ($user_compare_products as $item)
          <td>
            <button class="remove-compare" data-productid="{{$item->id}}" style="background:red">Remove</button>
          </td>
        @endforeach
    </tr>
  </table>

<?php } ?>




@endsection
