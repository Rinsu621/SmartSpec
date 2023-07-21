<div class="first">
    <div class="second">
<h1 class="spec">Add <br> Specification</h1>
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
</div>

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
        background-color: #F2F2F2;
        font-family: 'Anderson Grotesk', sans-serif;
    }
    .first
    {
        margin: 20%;
        padding: 20px;
        box-shadow: 0 4px 8px #1B5D6B;
        border-radius: 20px;
        height: auto;
        width: 60%;
    }
    .spec
    {
        color: #1B5D6B;
    }

    label
    {
        font-size: 20px;
        color: #1B5D6B;
        font-weight: bold;
    }

</style>
{{-- <form action="{{route('specCreate')}}" method="GET">
    @csrf
    <button type="submit" class="create">Create</button>
</form> --}}
