<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <head>
    <style>
    .logo {
        font-size: xx-large;
        font-weight: 900;
        color: #14c1c4;
        line-height: 25px;
        padding-top: 15px;
    }
    </style>
</head>
    <title>in person.</title>
</head>
<body class="bg-dark">
    <div class="container-sm">
        <header class="container-sm">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-11 logo">in<br>person.</div>
            </div>
        </header>

        <?= $this->fetch('content') ?>

        <footer class="fixed-bottom">
            <div class="row text-center">
                <div class="col-12 text-secondary">
                    Powered by <a href="https://s-kanno.net">s-kanno.net</a>.
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
