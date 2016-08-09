<?php
require_once('core/connect.php');
require_once('template/front/header.php');
?>
<body>
<div class="container" style="text-align: center;">
    <div class="login jumbotron" style="text-align: center;">
        <h3>Admin Dashboard - Bookstore</h3>
    </div>
    <form>
        <div class="form-group">
            <label for="input-username">Username</label>
            <input type="email" class="form-control" id="input-username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="input-password">Password</label>
            <input type="password" class="form-control" id="input-password" placeholder="Password">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Keep me log in web!
            </label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</body>
</html>
