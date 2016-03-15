<?php require('header.php') ?>
    <link rel="stylesheet" href="static/content/form.css">
    <script>
        function check_lastname(a) {
            if (!a.match(/\S\D/i) || a.length == 0) {
                document.getElementById("lastname_err").className = "errorValid show";
                document.getElementById("lastname_err").innerHTML = "Некорректный ввод";
                document.getElementById("submitbtn").style.display = 'none';
            }
            else {
                document.getElementById("lastname_err").className = "errorValid";
                document.getElementById("submitbtn").style.display = 'block';
            }
        }
        function check_firstname(a) {
            if (!a.match(/\S\D/i) || a.length == 0) {
                document.getElementById("firstname_err").className = "errorValid show";
                document.getElementById("firstname_err").innerHTML = "Некорректный ввод";
                document.getElementById("submitbtn").style.display = 'none';
            }
            else {
                document.getElementById("firstname_err").className = "errorValid";
                document.getElementById("submitbtn").style.display = 'block';
            }
        }
        function check_content(a) {
            if ( a.length == 0) {
                document.getElementById("content_err").className = "errorValid show";
                document.getElementById("content_err").innerHTML = "Некорректный ввод";
                document.getElementById("submitbtn").style.display = 'none';
            }
            else {
                document.getElementById("content_err").className = "errorValid";
                document.getElementById("submitbtn").style.display = 'block';
            }
        }
        function check_email(a) {
            if (!a.match(/\S\w+@\S\w+\.[a-z]{2,5}/i) || a.length == 0) {
                document.getElementById("phone_err").className = "errorValid show";
                document.getElementById("phone_err").innerHTML = "Некорректный ввод";
                document.getElementById("submitbtn").style.display = 'none';
            }
            else {
                document.getElementById("phone_err").className = "errorValid";
                document.getElementById("submitbtn").style.display = 'block';
            }
        }
        function check_phone(a) {
            if (!a.match(/\d/i) || a.length == 0) {
                document.getElementById("phone_err").className = "errorValid show";
                document.getElementById("phone_err").innerHTML = "Некорректный ввод";
                document.getElementById("submitbtn").style.display = 'none';
            }
            else {
                document.getElementById("phone_err").className = "errorValid";
                document.getElementById("submitbtn").style.display = 'block';
            }
        }
    </script>


    <form class="main" role="form" action="?act=do-new-forma" method="POST" >
        <p class="note"> Все поля обязательны для заполнения! </p>
        <div class="cell">
            <label for="lastname" class="text">Фамилия: </label>
            <input type="text" class="input" name="lastname" id="lastname" autofocus onkeyup="check_lastname(this.value)">
            <span id="lastname_err" class="errorValid"></span>
        </div>
        <div class="cell">
            <label for="firstname" class="text">Имя: </label>
            <input type="text" class="input" name="firstname" id="firstname" onkeyup="check_firstname(this.value)">
            <span id="firstname_err" class="errorValid"></span>
        </div>
        <div class="cell">
            <label for="email" class="text">e-mail: </label>
            <input type="text" class="input" name="email" id="email" onkeyup="check_email(this.value)">
            <span id="email_err" class="errorValid"></span>
        </div>
        <div class="cell">
            <label for="phone" class="text">Телефон: </label>
            <input type="text" class="input" name="phone" id="phone" onkeyup="check_phone(this.value)">
            <span id="phone_err" class="errorValid"></span>
        </div>
        <div class="cell">
            <label for="content" class="text">Сообщение: </label>
            <textarea class="input" name="content" id="content" cols="30" rows="10" onkeyup="check_content(this.value)"></textarea>
            <span id="content_err" class="errorValid"></span>
        </div>
        <br>

        <input class="btn btn-primary" id="submitbtn" name="submitbtn" type="submit" value="Sent">
    </form>

<?php require('footer.php') ?>