<div class="first">
    <div class="second">
<h1 class="spec">Add <br> Specification</h1>
<hr><hr><br>
<form action="/spec" method="POST" enctype="multipart/form-data" >
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" class="name" id="name" placeholder="Enter the name"><br><br>
    <label for="brand_id">Brand</label>
    <select name="brand_id" id="brand_id" class="form-control">
        @foreach ($brands as $brand )
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
       </select><br><br>
    <label for="price">Price</label>
    <input type="text" class="price" name="price" id="price" placeholder="Enter the price"><br><br>
    <label for="launch">Launch</label>
    <input type="date" class="launch" name="launch" id="launch"><br><br>
    <label for="color">Color</label>
    <input type="text" class="color" name="color" id="color" placeholder="Enter the colors available"><br><br>
    <label for="processor">Processor</label>
    <input type="text" name="processor" id="processor" class="processor"><br><br>
    <label for="ram">RAM</label>
    <input type="text" class="ram" name="ram" id="ram"><br><br>
    <label for="storage">Storage</label>
    <input type="text" name="storage" id="storage" class="storage"><br><br>
    <label for="display">Display</label>
    <input type="text" name="display" id="display" class="display"><br><br>
    <label for="camera">Camera</label>
    <input type="text" class="camera" name="camera" id="camera"><br><br>
    <label for="battery">Battery</label>
    <input type="text" class="battery" name="battery" id="battery"><br><br>
    <label for="resistance">Resistance</label>
    <input type="text" class="resistance" name="resistance" id="resistance"><br><br>
    <label for="image">Image</label>
    <input type="file" class="image" name="image" id="image" required><br><br>
    <button type="submit" class="btn-add">Add</button>

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
        background-color: #d7d5d5;
        font-family: 'Anderson Grotesk', sans-serif;
    }
    .first
    {
        margin-left: 35%;
        padding: 20px;
        height: auto;
        width: 30%;
        border-top:20px solid #1B5D6B;
        background-color:#F2F2F2;
        backdrop-filter: blur(10px);
    }
    .second
    {
        background-color:#F2F2F2;
    }
    form
    {
        background-color:#F2F2F2;
    }
    .spec
    {
        color: #1B5D6B;
        background-color:#F2F2F2;
    }

    label
    {
        font-size: 15px;
        color: #1B5D6B;
        font-weight: bold;
        background-color:#F2F2F2;
        width: 200px;
    }
    input{
        width: 100%;
        padding: 1.2%;
        border: 1px solid #1B5D6B;
        border-radius: 20px;
        background-color:#F2F2F2;
    }
    select {
  width: 100%;
  padding: 1.2%;
  border: 1px solid #1B5D6B;
  border-radius: 20px;
  background-color: #F2F2F2;
  color: #1B5D6B; /* Text color inside the select box */
  font-family: 'Anderson Grotesk', sans-serif; /* Font family for the select box text */
  font-size: 16px; /* Font size for the select box text */
}
.btn-add
{
        width: 30%;
        height: 40px;;
        border: none;
        background-color: #1B5D6B;
        padding: 8px;
        border-radius: 25px;
        margin: 20px 0;
        margin-left: 35%;
        cursor: pointer;
        font-size: 15px;
        color: #F2F2F2;
}
</style>

