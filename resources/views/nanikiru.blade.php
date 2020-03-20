
<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <style>
            .question_area {
                width: 110%;
                margin-bottom: 10px;
            }
            .answer_area {
                width: 110%;
                margin-bottom: 30px;
            }
            .question_area img {
                width: 4%;
                max-width: 4%;
                height: auto;
            }
            .answer_area img {
                width: 60%;
                max-width: 60%;
                height: auto;
            }
            .submit_button {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>弱点分析何切る</h1>
            <p>何切るに答えることで、あなたの弱点が分かります！</p>
            <form method="POST" action="result">
            @csrf
            <!-- 牌姿画像 -->
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

                    <input id=<?php echo "question0_$qa_num" ?> type="radio" name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][0]; ?>" value="<?php echo $answer_point_array[$qa_num][0]; ?>" required>
                    <label for=<?php echo "question0_$qa_num"; ?>>
                        <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][0]) }}">
                    </label>

                    <input id=<?php echo "question1_$qa_num"; ?> type="radio" name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][1]; ?>" value="<?php echo $answer_point_array[$qa_num][1]; ?>">
                    <label for=<?php echo "question1_$qa_num"; ?>>
                        <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][1]) }}">
                    </label>

                    <input id=<?php echo "question2_$qa_num"; ?> type="radio" name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][2];?>" value="<?php echo $answer_point_array[$qa_num][2]; ?>">
                    <label for=<?php echo "question2_$qa_num"; ?>>
                        <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][2]) }}">
                    </label>
                </div>
            @endforeach
            <div class="submit_button">
                <input class="btn btn-primary" type="submit" value="送信">
            </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
        </script>
    </body>
</html>