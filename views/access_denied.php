<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access denied</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="content">
        <img src="../imgs/stop_hand.png" onmouseover="bigImg(this)" onmouseout="normalImg(this)" alt="stop_hand" class="stop_hand">
        <h2 class="access_denied_warning">ACCESS DENIED</h2>
        <button class="go_back_btn" id="go_back_btn" type="button" onClick="javascript:clickinner(this);">Go back</button>
    </div>

    <script>

        function bigImg(x) {
            x.style.height = "550px";
            x.style.width = "550px";
        };

        function normalImg(x) {
            x.style.height = "500px";
            x.style.width = "500px";
        };

        function clickinner(go_back_btn) { 
            location.href='general_login.php';
        };

    </script>
</body>
</html>