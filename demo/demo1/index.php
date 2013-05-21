<html>
<head>
    <title>demo 1</title>
    <style>
        form label, input[type="submit"] {
            display: block;
        }

        textarea {
            width: 300px;
            height: 100px;
        }
    </style>
</head>

<body>
<p>Enter you information</p>

<form method="post" action="process.php">
    <label>name: <input type="text" name="name" /></label>
    <label>email: <input type="text" name="email" /></label>
    <label for="message"></label>
    <textarea name="message"></textarea>

    <input type="submit" value="Contact Me!" />
</form>

</body>

</html>