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
      <th>Name:</th>
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
        <th>Brand</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->brand->name}}
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
          {{$product_detail->price}}
        </td>
      @endforeach
    </tr>
    <tr>
        <th>Launch:</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->launch}}
          </td>
        @endforeach
      </tr>
      <tr>
        <th>Color</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->color}}
          </td>
        @endforeach
      </tr>
      <tr>
        <th>Processor</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->processor}}
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
          {{$product_detail->ram}}
        </td>
      @endforeach
    </tr>
    <tr>
        <th>Storage</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->storage}}
          </td>
        @endforeach
      </tr>
      <tr>
        <th>Display</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->display}}
          </td>
        @endforeach
      </tr>
      <tr>
        <th>Camera</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->camera}}
          </td>
        @endforeach
      </tr>
      <tr>
        <th>Battery</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->battery}}
          </td>
        @endforeach
      </tr>
      <tr>
        <th>Resistance</th>
        @foreach ($user_compare_products as $item)
      <td>
              @php
                  $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
              @endphp
            {{$product_detail->resistance}}
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
