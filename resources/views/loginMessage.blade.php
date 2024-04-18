
<div class="container">
    <div class="message">
        <p>Дякуємо за реєстрацію!</p>
        <p>Нижче ви знайдете код для входу на сайт:</p>
    </div>
    <strong>Код:</strong>
    <span class="code">{{ $code }}</span>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
    }
    .container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .message {
        margin-bottom: 20px;
    }
    .message p {
        margin-bottom: 10px;
        color: #555;
    }
    .code {
        display: block;
        padding: 10px;
        margin: 10px auto;
        background-color: lightpink;
        border-radius: 20px;
        font-weight: bold;
        color: #fff;
        width: fit-content;
    }
</style>
