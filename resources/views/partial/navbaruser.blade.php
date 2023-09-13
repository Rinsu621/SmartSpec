<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
@php
$uniqueBrands = $specs->pluck('brand.name')->unique();
@endphp
<body>
    <header>

        <a href="/home" class="logo"><img src="{{asset('logo/Final-logo.png')}}" width="100px" height="70px"></a>
        <nav>
            <ul class="navbar">
                <li class="nav-item">
                  <a href="/home" >Smartphone</a>
                </li>
                <li class="nav-item">
                  <a href="/compare" >Compare</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" id="brandsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Brands
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="brandsDropdown">
                    @foreach ($uniqueBrands as $brand)
                      <li class="drop-brand"><a href="{{route('show_brand_cards',['brand'=>$brand])}}">{{ $brand }}</a></li>
                    @endforeach
                  </ul>
                </li>
              </ul>
        </nav>

            <form action="{{route('user.search')}}" method="GET">
                @csrf
                <input type="text" placeholder="Search Smartphone" name="data">
                <button type="submit" name="search" class="btn"><i class="fas fa-search"></i></button>
            </form>
            @if(Auth::check())
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" name="logout" class="logout" onclick="confirmLogout()" >Logout</button>
            </form>
            @else
            <form action="{{route('loginPage')}}" method="GET">
                @csrf
                <button type="submit" name="login" class="login" >Login</button>
            </form>
            @endif
    </header>

</html>

<script>
      function confirmLogout()
    {
        if(confirm('Are you sure you want to Logout?'))
    {
    document.getElementById('deleteForm').submit();
    }
    else{
        return false;
    }
}



</script>

<style>
     @font-face {
    font-family: 'Anderson Grotesk';
    src: url('/path-to-your-fonts/anderson-grotesk.woff2') format('woff2'),
         url('/path-to-your-fonts/anderson-grotesk.woff') format('woff');

    font-weight: normal; /* Adjust as needed */
    font-style: normal; /* Adjust as needed */
    }
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Anderson Grotesk', sans-serif;
    }

    header{
        margin-top: 0px;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        padding: 10px 20px;
        background: #1b5d6b;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    nav a{
        font-size: 18px;
        text-decoration: none;
        color: #f2f2f2;
        font-weight: bold;
        margin-left: 50px;
        transition: .3s;
        display: inline-block;

    }



    nav a:hover
    {
        color: #c8c9c9;
        text-decoration: none;
        border-bottom: 2px solid #c8c9c9;
    }

    .nav-links
    {
        display: flex;
        gap: 20px;

    }
    form
    {
        display: flex;
        gap: 10px;
    }
    form input
    {

        width: 300px;
        height: 40px;
        margin: 20px 0;
        padding: 0 10px;
        border: 1px solid #828282 ;
        border-radius: 20px
    }
    .btn
    {
        display: inline-block;
        width: 40px;
        height: 40px;
        border: none;
        background-color: #F2F2F2;
        padding: 5px;
        border-radius: 100%;
        margin: 20px 0;
        cursor: pointer;

    }
    .btn:hover{
        background-color: #F2F2F2 ;
        border: 2px solid #F2F2F2;
        box-shadow: #F2F2F2;
        transition:  0.3s;
    }
    .logout
    {
        display: inline-block;
        width: 80%;
        height: 40px;
        border: none;
        background-color: #F2F2F2;
        padding: 5px 40px;
        border-radius: 20px;
        margin: 20px 0;
        margin-right: 30px;
        cursor: pointer;

    }

    .login
    {
        display: inline-block;
        width: 80%;
        height: 40px;
        border: none;
        background-color: #F2F2F2;
        padding: 5px 40px;
        border-radius: 20px;
        margin: 20px 0;
        margin-right: 30px;
        cursor: pointer;
    }

    .login:hover{
        background-color: transparent;
        border: 2px solid  #F2F2F2;
        color: #F2f2f2;
        transition:  0.3s;
    }
    .logout:hover{
        background-color: transparent;
        border: 2px solid  #F2F2F2;
        color: #F2f2f2;
        transition:  0.3s;
    }

    nav a::before{
        content:'';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background:#888989;
        transition: width 0.3s;
        text-decoration: none;
    }

    .navbar {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-item {
  margin-right: 20px;
}

.nav-link {
  color: #fff;
  text-decoration: none;
}

/* Dropdown Styles */
.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #fff;
  padding: 10px;
  color: #1b5d6b;
  transition-duration: 0.9s;
}
.drop-brand a {
  color: #1b5d6b; /* Set the color to #1b5d6b */
  text-decoration: none;
  align-content: center;
  list-style: none;
  margin-left: 30px;
}
.drop-brand a:hover {
  color: #1b5d6b; /* Set the color to #1b5d6b */
  text-decoration: none;
  border-bottom: 2px solid #1b5d6b;
  margin-left: 20px;
}


.nav-item:hover .dropdown-menu {
  display: block;
}


    @media (max-width: 768px) {
            header {
                padding: 5px;
                align-items: flex-start;
            }

            .logo {
                margin-right: 5px;
                margin-top: 0;
            }

            nav {
                margin-top: 5px;
                text-align: left;
                margin-left: auto;
            }

            nav a {
                margin-left: 0;
                margin-right: 10px;
            }

            .nav-links {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            form {
                margin-top: 10px;
            }

            form input {
                width: 100%;
            }

            .btn {
                width: 40%;
                padding: 5px 20px;
            }

            .logout {
                width: 100%;
                padding: 5px 20px;
            }

            /* Optionally, you can hide the nav links when collapsed */
            .nav-item {
                display: none;
            }

            /* Show the collapsed nav links when the menu icon is clicked */
            .menu-icon:checked + .nav-item {
                display: flex;
            }
        }


</style>
