
<<<<<<< HEAD
=======

>>>>>>> 97151af37260850a0a22821f72b1117f877fbec0
<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
    </head>
    <body>
        <h1>何切る？1</h1>
        <form method="POST" action="/result">
<<<<<<< HEAD
            @csrf
            <img src="./ji1.png">
=======
        @csrf
        <!-- 牌姿画像 -->

        @foreach($paishi_image_array as $paishi_image_i => $paishi_image)
        <div>
            <!-- 問題番号 -->
            Q<?php echo $paishi_image_i+1; ?>
        </div>
<<<<<<< HEAD
            <div>
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
                    <input type="radio" name="choice"<?php $j; ?> value="">
                    <img src="{{ asset("/tile_images/$choice_img") }}">
                @endforeach
            </div>
        @endforeach


        <input type="submit" value="送信">
=======
>>>>>>> 97151af37260850a0a22821f72b1117f877fbec0
>>>>>>> 3281a33305381c2d78b7a664fc977b3066e39da4
        </form>
    </body>
</html>
