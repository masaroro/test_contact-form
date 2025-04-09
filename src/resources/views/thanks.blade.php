<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>

<body>
    <main>
        <div class="thanks__content-group">
            <div class="thanks__content">
                <div class="thanks__content-heading">
                    <h2>お問い合わせありがとうございました</h2>
                </div>
                <form class="form" action="/" method="get">
                    @csrf
                    <div class="home__button">
                        <button class="home__button-submit" type="submit">Home</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="thanks__content-background">
            <h1>Thank you</h1>
        </div>
    </main>
</body>

</html>