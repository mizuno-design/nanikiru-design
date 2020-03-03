

<!DOCTYPE html>
<html>
    <head>
        <title>何切る分析</title>
    </head>
    <body>
        <h1>何切る？1</h1>
        <form method="POST" action="/result">
        @csrf
        <!-- 牌姿画像 -->

        @foreach ($paishi_image_array as $paishi_image)
            @foreach ($paishi_image as $pai_image)
                <img src="{{ asset("/tile_images/$pai_image") }}">
            @endforeach
            <br>
        @endforeach
        <div>
            <input type="radio" name=choice1 value="">
            <img src="{{ asset("/tile_images/ji1.png") }}">
            <input type="radio" name=choice2 value="">
            <img src="{{ asset("/tile_images/ji2.png") }}">
            <input type="radio" name=choice3 value="">
            <img src="{{ asset("/tile_images/ji3.png") }}">
        </div>

        <input type="submit" value="送信">
        </form>
    </body>
</html>
