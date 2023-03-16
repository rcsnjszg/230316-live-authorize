<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Regisztráió</title>
    <style>
        html {
            min-height: 100vh;
        }
        body {
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <section id="register">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-6">
                    <div class="card" style="">
{{--                        <img src="{{asset('logo2.jpg')}}" class="card-img-top" alt="...">--}}
                        <div class="card-body">
                            <h5 class="card-title">Regisztráció</h5>
                            {!! Form::open(['route' => 'register.store', "class" =>"is-invalid"]) !!}

                            <div class="row mt-3">
                                <div class="col">
                                    {{Form::label('name','Név')}}
                                    {{Form::text('name', $value = old('name'), $attributes = ["class"=>"form-control"])}}

                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    {{Form::label('email','Email')}}
                                    {{Form::email('email', $value = old('email'), $attributes = ["class"=>"form-control"])}}
                                </div>
                            </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        {{Form::label('password',"Jelszó")}}

                                        @error('password')
                                        {{Form::password('password', ['class' => 'form-control is-invalid'])}}
                                        <div id="passwordFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @else
                                            {{Form::password('password', ['class' => 'form-control'])}}
                                        @enderror
                                    </div>
                                </div>
                            <div class="row mt-3">
                                <div class="col">
                                    {{Form::label('password_confirmation',"Jelszó újra")}}
                                    {{Form::password('password_confirmation', ['class' => 'form-control'])}}
                                </div>
                            </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        {{Form::submit('Regisztráció', ['class' => 'btn btn-primary'])}}
                                    </div>
                                </div>
                            {!! Form::close() !!}

                            @if($errors->any)
                                @foreach($errors->all() as $message)
                                    <li>{{$message}}</li>
                                @endforeach
                            @endif

                            <p class="my-3">Már vanfiókja? <a href="{{route("auth.login")}}">Jelentkezzen be</a>!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>