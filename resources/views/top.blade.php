
<!DOCTYPE html>
<html>
    <head>
        <title>Mahsis</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://unpkg.com/sanitize.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
        <style>
        </style>
    </head>
    <body>
        @include('part.header')
        <div class="container top">
            <div class="front">
                <div class="title">
                    <h2>Mahsis(マーシス)は、自身の雀力の強みと弱みを分析するサービスです。</h2>
                </div>
                <div class="description">
                    <p>分析ボタンを押し出題される何切るに答えることで、牌効率の強みと弱みが分かります</p>
                </div>
            </div>
            <button type="button" class="btn btn-primary analysis_button" onclick="location.href='nanikiru'">分析をする</button>
        </div>
        @include('part.footer')
    </body>
</html>