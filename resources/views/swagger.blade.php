<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Swagger Store</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 64px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Swagger Store
        </div>

        <p>
            <a href="/swagger/{{$apiKey}}/json" target="_blank">json</a>
            -
            <a href="/swagger/{{$apiKey}}/doc" target="_blank">doc</a>
        </p>

        <div>
            <input type="hidden" id="formApikey" value="{{$apiKey}}">
            <textarea class="form-control" id="formSwagger" cols="30" rows="10" placeholder="put your swagger doc here">{{$doc->doc}}</textarea>
        </div>

        <div>
            <br>
            <a class="btn btn-block btn-light" id="storeBtn">update</a>
        </div>
        <div class="links">
            <br>
            <a href="https://github.com/chatbox-inc/swagger-store">Github</a>
            <a href="https://swagger-store.herokuapp.com/">Heroku</a>
        </div>
    </div>
</div>

<script>
    $(function(){
      $("#storeBtn").on("click",function(){
        var key = $("#formApikey").val()
        $.ajax("/api/swagger/"+key,{
          method: "PATCH",
          contentType: 'application/json',
          data: $("#formSwagger").val()
        }).done(function(){

        }).fail(function(){

        }).always(function(){

        })
      })
    })
</script>
</body>
</html>