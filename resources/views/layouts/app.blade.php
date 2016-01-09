<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>20Pavos - El cajón desastre de Internet</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

</head>
<body>

<header class="ui borderless doubling top large stackable menu">
    <div class="ui container">

        <div class="ui dropdown item">
            <i class="big sidebar icon"></i>
            Categorías
            <div class="menu">
                <a class="item">Novedades</a>
                <a class="item">Menos de 20€</a>
                <a class="item">Para él</a>
                <a class="item">Para ella</a>
            </div>
        </div>

        <div class="right menu">
            <div class="item">
                <div class="ui category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="¿Qué buscas?">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
            </div>
        </div>

    </div>
</header>

<div class="ui container">
    <div class="ui stackable three column grid">
        <div class="column">
            <div class="ui fluid card">
                <div class="image">
                    <img src="http://placehold.it/800x800">
                </div>
                <div class="content">
                    <div class="header">Drone RC irrompible</div>
                    <div class="meta">
                        700 <i class="euro icon"></i>
                    </div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, deleniti deserunt dolorem
                        earum eum illum maxime minus molestiae neque nostrum praesentium provident quasi qui ratione
                        repellat repudiandae sunt? Ducimus!
                    </div>
                </div>
                <div class="ui bottom attached button">
                    <i class="shop icon"></i>
                    ¡Lo quiero!
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui fluid card">
                <div class="image">
                    <img src="http://placehold.it/800x800">
                </div>
                <div class="content">
                    <div class="header">Drone RC irrompible</div>
                    <div class="meta">
                        700 <i class="euro icon"></i>
                    </div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, deleniti deserunt dolorem
                        earum eum illum maxime minus molestiae neque nostrum praesentium provident quasi qui ratione
                        repellat repudiandae sunt? Ducimus!
                    </div>
                </div>
                <div class="ui bottom attached button">
                    <i class="shop icon"></i>
                    ¡Lo quiero!
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui fluid card">
                <div class="image">
                    <img src="http://placehold.it/800x800">
                </div>
                <div class="content">
                    <div class="header">Drone RC irrompible</div>
                    <div class="meta">
                        700 <i class="euro icon"></i>
                    </div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, deleniti deserunt dolorem
                        earum eum illum maxime minus molestiae neque nostrum praesentium provident quasi qui ratione
                        repellat repudiandae sunt? Ducimus!
                    </div>
                </div>
                <div class="ui bottom attached button">
                    <i class="shop icon"></i>
                    ¡Lo quiero!
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script>
    $('.dropdown')
            .dropdown({
                on: 'hover'
            })
    ;
</script>

</body>
</html>
