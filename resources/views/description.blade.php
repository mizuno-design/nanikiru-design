
<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <style>

        </style>
    </head>
    <body>
        @include('part.header')
        <div class="container">
            @foreach($paishi_image_array as $i => $paishi_image)
                <?php $qa_num = $i+1; ?>
                <div class="question_area">
                    <div class="question_info">
                        <!-- 問題番号 -->
                        <span> Q<?php echo $qa_num; ?> </span>
                        <?php echo $kyoku_array[$i]; ?>
                        <?php echo $tya_array[$i]; ?>家
                        <?php echo $junme_array[$i]; ?>巡目
                        ドラ
                        <img src="{{ asset("/tile_images/$dora_array[$i]") }}">
                    </div>

                    <!-- 牌姿を作成 -->
                    @foreach($paishi_image as $pai_image)
                        <img src="{{ asset("/tile_images/$pai_image") }}">
                    @endforeach
                    <br>
                </div>

                <!-- 回答選択肢を作成 -->
                <div class="answer_area">
                    <!-- 回答番号 -->
                    <span> A<?php echo $qa_num; ?> </span>
                    <!-- 正解順選択肢 -->
                    <img src="{{ asset("/tile_images/".$answer_choice_sorted[$qa_num][0]) }}">＞
                    <img src="{{ asset("/tile_images/".$answer_choice_sorted[$qa_num][1]) }}">＞
                    <img src="{{ asset("/tile_images/".$answer_choice_sorted[$qa_num][2]) }}">
                </div>

                <!-- 解説 -->
                <div class="description_area">
                    <p><?php echo $description_array[$i]['description'];?></p>
                </div>
            @endforeach
            <button type="button" class="btn btn-primary" onclick="location.href='nanikiru'">戻る</button>
        </div>
        @include('part.footer')
    </body>
</html>
