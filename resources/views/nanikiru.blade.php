
<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <style>

        </style>
    </head>
    <body>
        <div class="container">
            <h1>弱点分析何切る</h1>
            <p>何切るに答えることで、あなたの弱点が分かります！</p>
            <form method="POST" action="result">
            @csrf
            <!-- 牌姿画像 -->

            @foreach($paishi_image_array as $paishi_image_i => $paishi_image)
                <div>
                    <!-- 問題番号 -->
                    Q<?php echo $paishi_image_i+1; ?>
                    <!-- 牌姿を作成 -->
                    @foreach($paishi_image as $pai_image)
                        <img src="{{ asset("/tile_images/$pai_image") }}">
                    @endforeach
                    <br>
                </div>
                <!-- 回答選択肢を作成 -->
                <div>
                    <!-- 回答番号 -->
                    A<?php echo $paishi_image_i+1; ?>
                    @foreach($answer_choice_array[$paishi_image_i+1] as $j => $choice_img)
                        <input type="radio" name="choice<?php echo $j; ?>" value=<?php echo $answer_point_array[$paishi_image_i+1][$j]; ?>>
                        <img src="{{ asset("/tile_images/$choice_img") }}">
                    @endforeach
                </div>
            @endforeach

            <input class="btn btn-primary" type="submit" value="送信">

            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
