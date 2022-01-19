<br><h1>
    <?= $title ?>
</h1><br>
<form action="/check" class="form-signin" method="post">
    <input type="text" name="username" class="form-control" placeholder="Username" required>
    <input type="password" name="password" class="form-control" placeholder="Password" required><br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
</form>

