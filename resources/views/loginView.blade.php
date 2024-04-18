<form id="takeEmailForm" method="POST">
    @csrf
    <div class="row-header">
        <label for="header">Email:
            <input type="email" name="email">
        </label>
    </div>
    <input type="submit" name="takeEmail" value="Запросити код">
</form>
<br>
@if(isset($email))
    <div class="alert alert-info">
        {{ $email }}
    </div>
@endif
<br>
<form id="takeCodeForm" method="POST">
    @csrf
    <div class="row-header">
        <label for="header">Код:
            <input type="text" name="code">
        </label>
    </div>
    <input type="submit" name="takeCode" value="Увійти">
</form>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
    }
    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .row-header {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }
    input[type="email"],
    input[type="text"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 20px;
        box-sizing: border-box; /* щоб padding не збільшував ширину */
        transition: border-color 0.3s ease;
    }
    input[type="email"]:focus,
    input[type="text"]:focus {
        outline: none;
        border-color: lightpink;
    }
    input[type="submit"] {
        background-color: lightpink;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: lightpink;
    }
</style>
