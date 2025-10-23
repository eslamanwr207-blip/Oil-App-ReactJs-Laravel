<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        *{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }

        .authBody{
            margin-top: 40px;
            display: flex;
            align-items: center;
        }


        .auth{

            width: 60%;
            height: 610px;
            border-radius: 20px;
            box-shadow: 1px 1px 5px 5px rgb(195, 195, 195);
            border: 2px solid  rgb(63, 121, 138);;
            text-align: center;
            margin: auto;
            margin-bottom: 40px;


        }
        .authH1{
            padding-top: 20px;
            font-size: 30px;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }
        .authForm{
            margin: auto;

            padding: 20px;
            width: 500px;
            align-items: center;

        }

        .authLabel{
            display: block;
            text-align: left;
            font-size: 25px;
            font-weight: bolder;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }
        .authInput{
            text-align: left;
            width: 500px;
            height: 35px;
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: bolder;
            border-radius: 7px;
            padding: 2px 4px;
        }




        .authButton{
            width: 511px;
            height: 42px;
            border-radius: 7px;
            font-size: 22px;
            font-weight: bolder;
            background: rgb(26, 33, 36);
            color: white;
            border: none;




        }

        .authOR{
            font-size: 22px;
            margin: 4px;
            font-weight: bold;
        }
        .authButtonOther{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: auto;
            text-align: center;
            font-weight: bolder;
            width: 511px;
            height: 42px;
            font-size: 22px;
            font-weight: bold;
            background: rgb(26, 33, 36);
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media screen and (min-width:750px) and (max-width:1100px){
            .auth{
                width: 80%;
                height: 600px;
            }

            .authForm{
                padding: 0px;
                width: 370px;

            }


            .authInput{
                width: 370px;
                height: 35px;

            }

            .authButton{
                width: 372px;
                height: 42px;





            }

            .authOR{
                font-size: 22px;
            }
            .authButtonOther{
                width: 372px;
                height: 42px;

            }
        }

        @media screen and (min-width:500px) and (max-width:750px){
            .auth{
                width: 80%;
                height: 600px;
            }

            .authForm{
                padding: 0px;
                width: 370px;

            }


            .authInput{
                width: 370px;
                height: 35px;

            }

            .authButton{
                width: 372px;
                height: 42px;





            }

            .authOR{
                font-size: 22px;
            }
            .authButtonOther{
                width: 372px;
                height: 42px;

            }
        }


        @media screen and (min-width:500px) and (max-width:750px){
            .auth{
                width: 80%;
                height: 600px;
            }

            .authForm{
                padding: 0px;
                width: 320px;

            }


            .authInput{
                width: 320px;
                height: 35px;

            }

            .authButton{
                width: 320px;
                height: 42px;





            }

            .authOR{
                font-size: 22px;
            }
            .authButtonOther{
                width: 320px;
                height: 42px;

            }
        }

        @media screen and (min-width:400px) and (max-width:500px){
            .auth{
                width: 90%;
                height: 570px;
            }
            .authH1{
                margin: 10px;
                padding-bottom: 20px;
                font-size: 24px;

            }
            .authLabel{
                font-size: 20px;

            }

            .authForm{
                padding: 0px;
                width: 250px;

            }


            .authInput{
                width: 250px;
                height: 35px;
                margin-bottom: 20px;

            }

            .authButton{
                width: 250px;
                height: 37px;
                font-size: 20px;





            }

            .authOR{
                font-size: 22px;
            }
            .authButtonOther{
                width: 250px;
                height: 37px;
                font-size: 20px;


            }
        }

        @media screen and (min-width:350px) and (max-width:400px){
            .auth{
                width: 90%;
                height: 570px;
            }
            .authH1{
                margin: 10px;
                padding-bottom: 20px;
                font-size: 24px;

            }
            .authLabel{
                font-size: 18px;

            }

            .authForm{
                padding: 0px;
                width: 230px;

            }


            .authInput{
                width: 230px;
                height: 35px;
                margin-bottom: 20px;
                font-size: 18px;


            }

            .authButton{
                width: 230px;
                height: 37px;
                font-size: 18px;

            }

            .authOR{
                font-size: 18px;
                padding: 0;
            }
            .authButtonOther{
                width: 230px;
                height: 37px;
                font-size: 18px;


            }
        }

        @media screen and (min-width:300px) and (max-width:350px){
            .auth{
                width: 90%;
                height: 510px;
            }
            .authH1{
                margin: 10px;
                padding-bottom: 20px;
                font-size: 21px;

            }
            .authLabel{
                font-size: 16px;

            }

            .authForm{
                padding: 0px;
                width: 210px;

            }


            .authInput{
                width: 210px;
                height: 30px;
                margin-bottom: 20px;
                font-size: 18px;


            }

            .authButton{
                width: 210px;
                height: 33px;
                font-size: 16px;

            }

            .authOR{
                font-size: 18px;
                padding: 0;
            }
            .authButtonOther{
                width: 210px;
                height: 33px;
                font-size: 16px;


            }
        }


        @media screen and (min-width:0px) and (max-width:300px){
            .auth{
                width: 90%;
                height: 510px;
            }
            .authH1{
                margin: 10px;
                padding-bottom: 20px;
                font-size: 21px;

            }
            .authLabel{
                font-size: 16px;

            }

            .authForm{
                padding: 0px;
                width: 180px;

            }


            .authInput{
                width: 180px;
                height: 30px;
                margin-bottom: 20px;
                font-size: 18px;


            }

            .authButton{
                width: 180px;
                height: 33px;
                font-size: 16px;

            }

            .authOR{
                font-size: 18px;
                padding: 0;
            }
            .authButtonOther{
                width: 180px;
                height: 33px;
                font-size: 16px;


            }
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
