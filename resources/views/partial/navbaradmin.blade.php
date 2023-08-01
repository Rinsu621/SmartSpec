<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <header>

        <a href="/spec" class="logo"><img src="{{asset('logo/Final-logo.png')}}" width="100px" height="70px"></a>
        <nav>
            <div class="nav-item">
            <a href="/spec">Specification</a>
            <a href="/brand">Brand</a>
        </div>
        </nav>
        {{-- <div > --}}

            <form action="/search" method="GET">
                @csrf
                <input type="text" placeholder="search anything" name="search">
                <button type="submit" name="search" class="btn"><i class="fas fa-search"></i></button>
            </form>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" name="logout" class="logout" onclick="confirmLogout()">Logout</button>
            </form>
            {{-- <div class="menu-btn">&#9776;</div> --}}
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
        position: fixed;
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
        position: relative;
    }



    nav a:hover
    {
        color: #c8c9c9;
        text-decoration: none;
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

    nav a:hover::before
    {
        width:100%;
    }
    @media (max-width: 768px) {
        header {
            padding: 5px;
            align-items: flex-start;
        }

        .header-content {
            margin-bottom: 10px;
        }
        .logo
        {
            margin-right: 5px;
            margin-top: 0;
        }

        nav {
            margin-top: 5px;
            text-align: left;
            margin-left: auto
        }

        nav a {
            margin-left: 0;
            margin-right: 10px;

        }

        form {
            margin-top: 10px;
        }

        form input
         {
            width: 100%;
        }
        .btn
        {
            width: 40%;
            padding: 5px 20px;
        }
        .logout
        {
            width:100%;
            padding: 5px 20px;
        }
    }

</style>
