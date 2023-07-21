
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="{{asset("FrontImg/Front photo.png")}}" width="100%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <span><a href="/login">Login</a></span>
                    <span> <a href="/register">Register</span></a>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('register.store')}}" method="POST">
                        @csrf
                        <div class="{{ $errors->any()?'input-container-error':'input-container' }}">
                        <input type="text" placeholder="Username" name="name">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <button type="submit" class="btn">Sign Up</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
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
    .account-page
    {
        padding: 200px 0;
        background: #1B5D6B;
        font-family: 'Anderson Grotesk', sans-serif;

    }
    .row{
        display: flex; /*to arrange items in a row*/
    }

    .col-2
    {
        flex:1;
    }
    .form-container
    {
        background: #F2F2F2;
        width: 400px;
        height: 500px;
        position: relative;
        text-align: center;
        padding: 20px 0;
        margin:auto;
        margin-top: 10px;
        box-shadow: 0 0 5px 0px #F2F2F2;
    }

    .form-container span{
        margin-top: 20px;
        font-weight: bold;
        font-size: 25px;
        padding: 0 20px;
        color: #1B5D6B;
        cursor: pointer;
        width: 100px;
        display: inline-block;
        position: relative;


    }

    .form-container span::before{
        content:'';
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background:#1B5D6B;
        transition: width 0.3s;
    }

    .form-container span:hover::before
    {
        width:70%
    }
    .btn
    {
        display: inline-block;
        width: 100%;
        border: none;
        background-color: #1B5D6B;
        padding: 10px;
        border-radius: 20px;
        margin: 20px 0;
        cursor: pointer;
        color: #F2F2F2;
        font-size: 15px;

    }
    .btn:focus{
        outline: none;

    }
    .form-container form
    {
       max-width: 400px;
       padding: 0 20px;
       position: absolute;
       top: 130px;
       margin-top: 10px;
    }
    form input
    {
        width: 100%;
        height: 40px;
        margin: 20px 0;
        padding: 0 10px;
        border: 1px solid #828282 ;
        border-radius: 20px
    }

    .form-container a{
        text-decoration: none;
        color:#1B5D6B;
    }
    .input-container-error{
        margin-top:70px;
    }
    .input-container{
        margin:20px 0;
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

.alert-danger li {
    margin-left: 10px;
    text-align: left;
    list-style: disc;
}

@media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .col-2 {
            width: 100%;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container form {
            top: 100px;
        }
    }
</style>
