<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $params['title']; ?></title>
    <link rel="shortcut icon" href="<?php echo $baseUrl . '/static/favicon.ico' ?>">
    <link rel="stylesheet" href="<?php echo $baseUrl . '/static/css/site.css' ?>" type="text/css" media="screen" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
" type="text/javascript"></script>

    <script src="<?php echo $baseUrl . '/static/js/site.js' ?>" type="text/javascript"></script>
<script>
    baseUrl = '<?php echo $baseUrl?>'
</script>
</head>
<body>
<h2 class="greet">Hello <?php echo $params['user']?></h2>


<?php if($params['user'] == 'Anonymous') { ?>
<form id="loginForm">
    <table>
        <tr>
            <td><h3>Login</h3></td>
        </tr>
        <tr>
            <td>
                <label for="username">Username:</label>
            </td>
            <td>
                <input type="text" id="username" name="username" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Password:</label>
            </td>
            <td>
                <input type="text" id="password" name="password" />
            </td>
        </tr>
        <tr>
            <td><input type="submit"  class="submit" value="Login"/></td>
        </tr>
    </table>
</form>


<?php } ?>
</body>
</html>