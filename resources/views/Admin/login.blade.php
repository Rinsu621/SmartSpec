<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @font-face {
    font-family: 'Anderson Grotesk';
    src: url('/path-to-your-fonts/anderson-grotesk.woff2') format('woff2'),
         url('/path-to-your-fonts/anderson-grotesk.woff') format('woff');
    /* Add more formats here if needed (e.g., .ttf) */
    font-weight: normal; /* Adjust as needed */
    font-style: normal; /* Adjust as needed */
      }
      *
      {
        font-family: 'Anderson Grotesk', sans-serif;
      }
        body {
            margin: 0;
            padding: 0;
            background-color: #1B5D6B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container{
            background-color: #f2f2f2;
            width: 400px;
            height: 350px;
            padding: 20px;
            align-self:center;
            border-radius: 20px;
        }
        .image {
            width: 30%;
            padding: 20px;
        }
        .image img {
            width: 100%;
            display: block;
        }
        .form-container h2 {
            margin: 0;
            margin: 20px 0;
            font-size: 24px;
            font-weight: bold;
            color: #1B5D6B;


        }

        .form-container input {
            padding: 10px;
            width: 93%;
            height: 40px;
            margin: 20px 0;
            padding: 0 10px;
            border: 1px solid #828282 ;
            border-radius: 20px;
            margin-right: 60px;
             }

             .btn
             {
                display: inline-block;
                 width: 100%;
                 border: none;
                 background-color: #1B5D6B;
                 padding: 12px;
                 border-radius: 20px;
                 margin: 20px 0;
                 cursor: pointer;
                 color: #F2F2F2;
                 font-size: 15px;
             }
             .account-page
             {
                display: flex;
                margin-left: 20%;
             }

             .alert-danger
                 {
                     background-color: #f8d7da;
                     color:#721c24;
                     border: 1px solid #f5c6cb;
                      padding: 10px;
                      border-radius: 4px;
                      margin-top: 20px;
                            }

            .alert-danger ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
            }
            .alert-success ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
            }

            .alert-success li {
              margin-left: 20px;
            }

            .alert-danger li {
              margin-left: 20px;
            }
            .alert-success {
              background-color: #d4edda;
              color: #155724;
              border: 1px solid #c3e6cb;
              padding: 10px;
              border-radius: 4px;
              margin-top: 20px;
            }
 </style>
 </head>
<body>
    <div class="account-page">
        <div class="image">
            <img src="{{asset('logo/Final-logo.png')}}" alt="" style="width:100%; margin: 0" >
        </div>
        <div class="form-container">

            <form action="{{route('admin.store')}}" method="POST">
                @csrf
                <h2><center>Admin Login</center></h2>
                  @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                <div class="{{ $errors->any()?'input-container-error':'input-container' }}">
                <input type="text" placeholder="Username" name="name">
                <input type="password" name="password" placeholder="Password">
               <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
