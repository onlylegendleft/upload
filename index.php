<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File Uploader</title>

        <!-- main css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- box icons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
        <div class="container">
            <h1>File Uploader</h1>
            <div class="form__container">
                <form action="#" class="form" id="form">
                    <input type="file" name="file" hidden id="file-input" />
                    <i class='bx bx-cloud-upload icon'></i>
                    <p class="helper__text">Browse File to Upload</p>
                </form>
                <section class="progress-area" id="progress-area">
                </section>
                <section class="uploaded-area" id="uploaded-area">
                </section>
            </div>
        </div>

        <!-- js -->
        <script src="assets/js/main.js"></script>
    </body>

</html>