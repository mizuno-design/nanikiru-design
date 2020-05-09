<!DOCTYPE html>
<html>

<head>
    <title>Mahsis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/sanitize.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.notify.css') }}">

    <style>
    </style>
</head>

<body class="nanikiru">
    @include('part.header')
    <div class="progress">
        <div id="nanikiruProgress" class="progress-bar progress-bar-animated" role="progressbar" aria-valuemin="0">
        </div>
        <p id="progressRate" class="shivering-tiny"></p>
    </div>
    <div class="container">
        <form method="POST" action="result" name="nanikiruForm">
            <div class="card-outer">
                @csrf
                <!-- 牌姿画像 -->
                @foreach($paishi_image_array as $i => $paishi_image)
                <?php $qa_num = $i+1; ?>
                <div class="card fade-in-left">
                    <div class="problem">
                        <div class="question-area">
                            <div class="question-info">
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
                        <div class="answer-area">
                            <!-- 回答番号 -->
                            <!-- <span> A<?php echo $qa_num; ?> </span> -->

                            <!-- TODO テスト簡易化のため初期値を設定 Deploy時に消す -->
                            <input id=<?php echo "question0_$qa_num" ?> type="radio"
                                name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][0]; ?>"
                                value="<?php echo $answer_point_array[$qa_num][0]; ?>" onclick="sendNum();"
                                data-question-num="<?php echo (string)$qa_num; ?>">
                            <!-- checked required -->
                            <!-- JSにてカウント -->
                            <label for=<?php echo "question0_$qa_num"; ?>>
                                <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][0]) }}">
                            </label>

                            <input id=<?php echo "question1_$qa_num"; ?> type="radio"
                                name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][1]; ?>"
                                value="<?php echo $answer_point_array[$qa_num][1]; ?>" onclick="sendNum();"
                                data-question-num="<?php echo (string)$qa_num; ?>">
                            <label for=<?php echo "question1_$qa_num"; ?>>
                                <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][1]) }}">
                            </label>

                            <input id=<?php echo "question2_$qa_num"; ?> type="radio"
                                name="<?php echo "question$qa_num"."_".$answer_question_type_array[$qa_num][2];?>"
                                value="<?php echo $answer_point_array[$qa_num][2]; ?>" onclick="sendNum();"
                                data-question-num="<?php echo (string)$qa_num; ?>">
                            <label for=<?php echo "question2_$qa_num"; ?>>
                                <img src="{{ asset("/tile_images/".$answer_choice_array[$qa_num][2]) }}">
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="action-choices">
                <label for="answer-btn">
                    <div class="btn-shine" onclick="checkCompletion()">
                        <input id="answer-btn" class="trans-btn pointer" type="submit" value="回答する"
                            onfocus="this.blur();">
                    </div>
                </label>
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
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset('js/jquery.notify.min.js') }}"></script>
    <script>
        var flagComplete = false;
        var nanikiruForm = document.nanikiruForm;
        let totalQuestions;
        let remainTopTarget;
        var answeredArray = [];
        var remainderArray = [];
        var flagFinish = false;

        countQuestions();
        countAnswered();

        notify({
            type: "success", //alert | success | error | warning | info
            title: "何を切るか選んでください",
            message: "",
            position: {
                x: "right", //right | left | center
                y: "bottom" //top | bottom | center
            },
            icon: '<img src="images/paper_plane.png" />', //<i>, <img>
            size: "normal", //normal | full | small
            overlay: false, //true | false
            closeBtn: true, //true | false
            overflowHide: false, //true | false
            spacing: 20, //number px
            theme: "dark-theme", //default | dark-theme
            autoHide: true, //true | false
            delay: 5000, //number ms
            onShow: null, //function
            onClick: null, //function
            onHide: null, //function
            template: '<div class="notify"><div class="notify-text"></div></div>'
        });

        function countAnswered() {
            let count = 0;
            const totalSubmit = 1;

            // formのinputの数だけ判定を繰り返す（submitはカウントしない-1）
            for (var i = 0; i < document.nanikiruForm.length - totalSubmit; i++) {
                // i番目のラジオボタンがチェックされているかを判定
                if (document.nanikiruForm.elements[i].checked) {
                    count += 1;
                }
            }
            updateProgress(count);

        }

        function countQuestions() {
            totalQuestions = document.getElementsByClassName("problem").length;
        }

        function sendNum() {
            answeredArray.push(event.target.dataset.questionNum);
            let set = new Set(answeredArray);
            let array = Array.from(set);
            flagFinish = true;

            remainderArray = [];
            for (i = 1; i < totalQuestions + 1; i++) {
                i = i.toString();
                if (!array.includes(i)) {
                    remainderArray.push(i);
                }
            }
            updateProgress(array.length);
        }

        function scrollNotAnswered() {
            $(function () {
                remainTopTarget = document.getElementsByClassName("problem")[remainderArray[0] - 1];
                let remainTopTargetY;
                if (remainTopTarget) {
                    remainTopTargetY = remainTopTarget.offsetTop;
                    scrollTo({
                        top: remainTopTargetY - 50,
                        behavior: "smooth"
                    });
                } else {
                    if (flagFinish) {
                        document.getElementById("answer-btn").disabled = false;
                    } else {
                        remainderArray = "1~" + totalQuestions;
                        remainTopTargetY = 50;
                        scrollTo({
                            top: remainTopTargetY - 50,
                            behavior: "smooth"
                        });
                    }
                }
            });
        }
        

        function scrollNotAnswered() {
            $(function(){
            remainTopTarget = document.getElementsByClassName("problem")[remainderArray[0] - 1];
            let remainTopTargetY;
            if (remainTopTarget) {
                remainTopTargetY = remainTopTarget.offsetTop;
                scrollTo({
                    top: remainTopTargetY - 50,
                    behavior: "smooth"
                });
            } else {
                if (flagFinish) {
                    document.getElementById("answer-btn").disabled = false;
                } else {
                    remainderArray = "1~"+totalQuestions;
                    remainTopTargetY = 50;
                    scrollTo({
                        top: remainTopTargetY - 50,
                        behavior: "smooth"
                    });
                }
            }

            // $('body').animate({scrollTop: remainTopTargetY}, 500, 'swing');
            });
        }

        // プログレスバーを更新する
        function updateProgress(count) {

            if (count === totalQuestions) {
                document.getElementById("answer-btn").disabled = false;
                flagComplete = true;
                notify({
                    type: "success", //alert | success | error | warning | info
                    title: "回答できます",
                    message: "",
                    position: {
                        x: "right", //right | left | center
                        y: "bottom" //top | bottom | center
                    },
                    icon: '<img src="images/paper_plane.png" />', //<i>, <img>
                    size: "normal", //normal | full | small
                    overlay: false, //true | false
                    closeBtn: true, //true | false
                    overflowHide: false, //true | false
                    spacing: 20, //number px
                    theme: "dark-theme", //default | dark-theme
                    autoHide: true, //true | false
                    delay: 5000, //number ms
                    onShow: null, //function
                    onClick: null, //function
                    onHide: null, //function
                    template: '<div class="notify"><div class="notify-text"></div></div>'
                });
            }
            // 回答している割合
            var answeredRate = (count / totalQuestions) * 100;
            //  回答している割合でプログレスバー更新
            document.getElementById("nanikiruProgress").style.width = answeredRate + "%";
            // プログレスバー内の文字出力
            var progressText = "( " + count + "/" + totalQuestions + " )";
            document.getElementById("progressRate").innerText = progressText;
        }

        function nanimoshinai() {
            void(0);
        }

        function checkCompletion() {
            document.getElementById("answer-btn").disabled = true;
            scrollNotAnswered();
            if (!flagComplete) {
                notify({
                    type: "error", //alert | success | error | warning | info
                    title: "Q" + remainderArray + "の問題が未回答です",
                    message: "全てに回答をしてから押してください",
                    position: {
                        x: "right", //right | left | center
                        y: "bottom" //top | bottom | center
                    },
                    icon: '<img src="images/paper_plane.png" />', //<i>, <img>
                    size: "normal", //normal | full | small
                    overlay: false, //true | false
                    closeBtn: true, //true | false
                    overflowHide: false, //true | false
                    spacing: 20, //number px
                    theme: "dark-theme", //default | dark-theme
                    autoHide: true, //true | false
                    delay: 5000, //number ms
                    onShow: null, //function
                    onClick: null, //function
                    onHide: null, //function
                    template: '<div class="notify"><div class="notify-text"></div></div>'
                });
                setTimeout(function () {
                    document.getElementById("answer-btn").disabled = false;
                }, 1000);
            }
        }
    </script>

</body>

</html>
