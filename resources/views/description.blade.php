
<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
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
        <div class="container">
            <div class="card_outer">
                    @foreach($paishi_image_array as $i => $paishi_image)
                        <?php $qa_num = $i+1; ?>
                        <div class="card">
                            <div class="problem">
                                <div class="question_area">
                                    <div class="question_info">
                                        <!-- 問題番号 -->
                                        <span> Q<?php echo $qa_num; ?>.&nbsp;&nbsp;</span>
                                        <?php echo $kyoku_array[$i]; ?>
                                        <?php echo $tya_array[$i]; ?>家
                                        <?php echo $junme_array[$i]; ?>巡目
                                        ドラ
                                        <img src="{{ asset("/tile_images/$dora_array[$i]") }}">
                                    </div>

                                    <!-- 牌姿を作成 -->
                                    <div class="paishi">
                                        @foreach($paishi_image as $pai_image)
                                            <img src="{{ asset("/tile_images/$pai_image") }}">
                                        @endforeach
                                        <br>
                                    </div>
                                </div>

                                <!-- 回答選択肢を作成 -->
                                <div class="answer_area">
                                    <!-- 回答番号 -->
                                    <span> A<?php echo $qa_num; ?>.&nbsp;&nbsp;</span>
                                    <!-- 正解順選択肢 -->
                                    <img src="{{ asset("/tile_images/".$answer_choice_sorted[$qa_num][0]) }}">＞
                                    <img src="{{ asset("/tile_images/".$answer_choice_sorted[$qa_num][1]) }}">＞
                                    <img src="{{ asset("/tile_images/".$answer_choice_sorted[$qa_num][2]) }}">
                                </div>

                                <!-- 解説 -->
                                <div class="description_area">
                                    <div class="description_content">
                                        <p>
                                            <?php
                                            if($description_array[$i]['description']) {
                                            echo $description_array[$i]['description'];} 
                                            else {
                                            echo str_repeat('HERE IS DESCRIPTION TEST.<br>', rand(1,10)); }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            <div class="action_choices">
                <button type="button" class="trans-btn" onclick="javascript:window.history.back(-1);return false;" onfocus="this.blur();"><span class="btn-shine">戻る</span></button>
            </div>
        </div>
        @include('part.footer')
    </body>
</html>
