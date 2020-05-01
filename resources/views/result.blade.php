<!DOCTYPE html>
<html>

<head>
    <title>何切る分析</title>
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

<body class="result full-screen">
    @include('part.header')
    <div class="container">
    </div>
    <div class="container result">
        <div class="result-content">
            <div class="card white chart">
                <div class="chart">
                    <canvas id="myChart" width="20" height="20"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="suggestion">
                    <p>あなたにおすすめの戦術書は・・・</p>
                    <div class="book">
                        <img src='book_images/<?php echo $result_book['path']; ?>' width=100 height=100><br>
                        <p><?php echo $result_book['title']; ?><p>
                    </div>
                    <!-- <p>です</p> -->
                </div>
            </div>
        </div>
        <div class="action_choices">
            <button type="button" class="trans-btn" onclick="location.href='nanikiru'" onfocus="this.blur();"><span
                    class="btn-shine">戻る</span></button>
            <button type="button" class="trans-btn" onclick="location.href='description'" onfocus="this.blur();"><span
                    class="btn-shine">解答・解説を見る</span></button>
        </div>
    </div>
    <button type="button" class="btn btn-primary" onclick="location.href='nanikiru'">戻る</button>
    <button type="button" class="btn btn-primary" onclick="location.href='description'">解答・解説を見る</button>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var question_type_array = [];
        var question_type_count = "<?php echo(count($result_array)); ?>";
        question_type_array[0] = "<?php echo($result_array[1]['get_score']); ?>";
        question_type_array[1] = "<?php echo($result_array[2]['get_score']); ?>";
        question_type_array[2] = "<?php echo($result_array[3]['get_score']); ?>";
        question_type_array[3] = "<?php echo($result_array[4]['get_score']); ?>";
        question_type_array[4] = "<?php echo($result_array[5]['get_score']); ?>";
        question_type_array[5] = "<?php echo($result_array[6]['get_score']); ?>";

        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['テンパイ時の判断', 'イーシャンテン時の判断', '孤立牌の比較', '安くて遠い手の判断', '形のセオリー', '5ブロックと6ブロックの比較'],
                datasets: [{
                    label: '牌効率力',
                    data: [question_type_array[0], question_type_array[1], question_type_array[2],
                        question_type_array[3], question_type_array[4], question_type_array[5]
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scale: {
                    ticks: {
                        stepSize: 5,
                        max: 15,
                        min: 0,
                    }
                }
            }
        });

    </script>
</body>

</html>
