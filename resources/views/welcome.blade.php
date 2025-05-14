<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('tilte')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    </head>
    <body>
        <div class="container">
            <div style="width: 40%; margin:3rem auto;">

               @if(!empty($itemEdit))
                    
                   <div style=" margin: 3rem auto; width: 100%;">
                        <div style="display:flex">
                            <a href="/">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                            <h5 style="text-align: center; margin-left:10px">Editando item: {{$itemEdit->title }}</h5>
                        </div>
                        <hr>

                        <form class="d-flex" action="/update/{{ $itemEdit->id }}" method="POST">
                            @csrf
                            <input class="form-control me-2" type="text" name="title" value=" {{ $itemEdit->title }} ">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                   </div>

                @else
                    
                    <form class="d-flex" action="/create" method="POST">
                        @csrf
                        <input class="form-control me-2" type="text" name="item" placeholder="Adicionar item">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <div style="margin: 3rem auto; width: 100%;">
                        <ul style="margin: auto 0 5px -32px;">
                            @foreach($items as $item)
                                <li style="display: flex; align-items:center; justify-content:space-between; border:1px solid #E4E4E5; margin:1rem auto; padding:5px; border-radius: .5rem;">
                                    <p style="margin: auto 1.5rem;">
                                        {{$item->title}}
                                    
                                    </p>

                                    <div style="display: flex;">
                                        
                                        <a href="/edit/{{{$item->id}}}">
                                            <button style="border: none;background: #fff;"><i class="bi bi-pencil-square"></i></button>
                                        </a>
                                    
                                        <form action="/delete/{{$item->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border: none;background: #fff;"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    
               
            </div>
        </div>
    </body>
</html>