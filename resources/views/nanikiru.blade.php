<!DOCTYPE html>
<html>

<head>
    <title>Mahsis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/sanitize.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
    <style>
    </style>
</head>

<body class="nanikiru">
    @include('part.header')
    <div class="container">
        <form method="POST" action="result" name="nanikiruform">
            <div class="card_outer">

                <!-- <div>
                    <progress id="nanikiruProgress" value="0" max="18"></progress>
                </div> -->

                <div id="container"></div>



                @csrf
                <!-- 牌姿画像 -->
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
                            <!-- <span> A<?php echo $qa_num; ?> </span> -->

                            <!-- TODO テスト簡易化のため初期値を設定 Deploy時に消す -->
                            <input id=<?php echo "question0_$qa_num" ?> type="radio"
                                name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][0]; ?>"
                                value="<?php echo $answer_point_array[$qa_num][0]; ?>" onclick="formcount();">
                            <!-- checked required -->
                            <!-- JSにてカウント -->
                            <label for=<?php echo "question0_$qa_num"; ?>>
                                <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][0]) }}">
                            </label>

                            <input id=<?php echo "question1_$qa_num"; ?> type="radio"
                                name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][1]; ?>"
                                value="<?php echo $answer_point_array[$qa_num][1]; ?>" onclick="formcount();">
                            <label for=<?php echo "question1_$qa_num"; ?>>
                                <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][1]) }}">
                            </label>

                            <input id=<?php echo "question2_$qa_num"; ?> type="radio"
                                name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][2];?>"
                                value="<?php echo $answer_point_array[$qa_num][2]; ?>" onclick="formcount();">
                            <label for=<?php echo "question2_$qa_num"; ?>>
                                <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][2]) }}">
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="action_choices">
                <div class="btn-shine">
                    <input class="trans-btn" type="submit" value="回答する" onfocus="this.blur();">
                </div>
            </div>
        </form>
    </div>
    @include('part.footer')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.js"></script>
    <script>
        function formcount() {
            var count = 0;

            //　formのinputの数だけ判定を繰り返す（submitはカウントしない-1）
            for (var i = 0; i < document.nanikiruform.length - 1; i++) {
                // i番目のラジオボタンがチェックされているかを判定
                if (document.nanikiruform.elements[i].checked) {
                    count += 1;
                }
            }
            updateProgress(count);
        }

        // プログレスバーを更新する
        function updateProgress(count) {
            document.getElementById("nanikiruProgress").value = count;
            document.getElementById("nanikiruProgress").innerText = count;
            console.log("progress:", count);
        }

       // progressbar.js@1.0.0 version is used
       // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

       var bar = new ProgressBar.Line(container, {
       strokeWidth: 4,
       easing: 'easeInOut',
       duration: 1400,
       color: '#FFEA82',
       trailColor: '#eee',
       trailWidth: 1,
       svgStyle: {width: '100%', height: '100%'},
       text: {
       style: {
       // Text color.
       // Default: same as stroke color (options.color)
       color: '#999',
       position: 'absolute',
       right: '0',
       top: '30px',
       padding: 0,
       margin: 0,
       transform: null
       },
       autoStyleContainer: false
       },
       from: {color: '#FFEA82'},
       to: {color: '#ED6A5A'},
       step: (state, bar) => {
       bar.setText(Math.round(bar.value() * 100) + ' %');
       }
       });

       bar.animate(1.0); // Number from 0.0 to 1.0

    </script>

</body>

</html>
