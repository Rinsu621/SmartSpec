@extends('layouts.layoutuser')
@section('content')

<?php
    //get the products added by the user
    $user_compare_products = \App\Models\Compare::where('user_id',auth()->id())->get();
    if(!$user_compare_products){
        echo 'You have not added any products to compare';
    }else{ ?>
@if ($user_compare_products->isEmpty())

<form action="{{route('index.page')}}" method="GET">
    <button type="submit" class="add-more" name="add-more">Add</button>
</form>
<center><img src="{{asset('FrontImg/Empty_Artboard 1.png')}}" alt="" width="50%" ></center>
@else
<form action="{{route('index.page')}}" method="GET">
    <button type="submit" class="add-more" name="add-more">Add More</button>
</form>
<table style="width:100%">
    <tr>
      <th>Image</th>
      @foreach ($user_compare_products as $item)
      <td>
            @php
                $product_detail = \App\Models\Spec::where('id',$item->prod_id)->first();
                // dd($product_detail);
            @endphp
          <img src="{{asset('images/'.$product_detail->image)}}" alt="">
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
            <button class="remove-compare" data-productid="{{$item->id}}" onclick="confirmRemove()">Remove</button>
          </td>
        @endforeach
    </tr>
  </table>
  @endif

<?php  }?>

<script>
     function confirmRemove()
    {
        if(confirm('Are you sure you want to Remove?'))
    {
    document.getElementById('deleteForm').submit();
    }
    else{
        return false;
    }
}
</script>


@endsection
<style>
       @font-face {
    font-family: 'Anderson Grotesk';
    src: url('/path-to-your-fonts/anderson-grotesk.woff2') format('woff2'),
         url('/path-to-your-fonts/anderson-grotesk.woff') format('woff');
    /* Add more formats here if needed (e.g., .ttf) */
    font-weight: normal; /* Adjust as needed */
    font-style: normal; /* Adjust as needed */
      }
    *{
        font-family: 'Anderson Grotesk', sans-serif;

    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid #1B5D6B;
        border-radius: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #1B5D6B;
        color: #1B5D6B;

    }

    th {
        color: #1B5D6B;
        background-color: #F2F2F2;
        font-weight: bold;
        font-size: 16px;
    }
    td img {
        max-width: 150px;
        max-height: 150px;
        display: block;
        margin: 0 auto;
    }

    .remove-compare {
        background:  rgb(143, 16, 16);
        color: #f2f2f2;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 4px;
    }

    .remove-compare:hover {
        background-color: rgb(125, 9, 9) ;
        color: #f2f2f2;

    }
    .checked
    {
        color: #15657c;
    }
    .add-more
    {
        display: inline-block;
        width: 8%;
        height: 40px;;
        border: none;
        background-color: #1B5D6B;
        padding: 8px;
        border-radius: 25px;
        cursor: pointer;
        margin-left: 50px;
        margin-top: 50px;

        font-size: 15px;
        color: #F2F2F2;
    }
    .message
    {
        color: #1B5D6B;
    }
    @media (max-width: 768px) {
        table {
            font-size: 14px;
        }
    }

</style>
