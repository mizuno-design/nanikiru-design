
<<<<<<< HEAD
=======

>>>>>>> 97151af37260850a0a22821f72b1117f877fbec0
<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
    </head>
    <body>
        <h1>何切る分析1</h1>
        <form method="POST" action="/result">
<<<<<<< HEAD
            @csrf
            <img src="./ji1.png">
=======
        @csrf
        <!-- 牌姿画像 -->

        @foreach ($paishi_image_array as $paishi_image)
            <img src="{{ asset("/tile_images/$paishi_image") }}">
        @endforeach
        <div>
            <input type="radio" name=choice1 value="">1
            <input type="radio" name=choice2 value="">2
            <input type="radio" name=choice3 value="">3
        </div>
>>>>>>> 97151af37260850a0a22821f72b1117f877fbec0
        </form>
    </body>
</html>
