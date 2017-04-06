<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

</head>
<body>
    <p>time: <span id="time"></span></p>
    <input type="button" name="execute" id="execute" value="execute" />
    <script>
        document.querySelector('#execute').addEventListener('click', function (event) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'test.php');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.querySelector('#time').innerHTML = xhr.responseText;
                }
            }
            xhr.send();
        });
    </script>

</body>
</html>