
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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">
        <style>
        </style>
    </head>
    <body class="top full-screen">
        @include('part.header')
        <div class="container top">
            <div class="front">
                <div class="top-description">
                    <div class="description-title">
                        <h2>Mahsis(マーシス)では<span class="sp-none">、</span><br class="sp-br">雀力の強みと弱みを<br class="sp-br">分析できます。</h2>
                    </div>
                    <div class="description-detail">
                        <p>何切るに答えることで<span class="sp-none">、</span><br class="sp-br">牌効率の強みと弱みを<br class="sp-br">知ることができます。</p>
                    </div>
                </div>
                <div class="action-choices">
                    <button type="button" class="trans-btn" onclick="location.href='nanikiru'" onfocus="this.blur();"><span class="btn-shine">分析をする</span></button>
                </div>
            </div>
        </div>
        @include('part.footer')
    </body>
</html>