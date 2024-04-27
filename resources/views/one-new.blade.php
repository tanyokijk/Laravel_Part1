
<h1>{{$news['summary']}}</h1>
<h3>Категорія: {{$category->name}}</h3>
<p>{{$news['full_text']}}</p>

@if($isLoggedIn)
    <h3>Коментарі: </h3>
    @if($comments != null && count($comments) > 0)
    @foreach($comments as $comment)
        <p><b>{{$comment['userEmail']}}:</b> {{$comment['text']}}</p>
    @endforeach
    @else
        <p>Поки немає коментарів. Додайте</p>
    @endif
    <form id="addCommentForm" method="POST">
        @csrf
        <div class="row-name">
            <label for="name">Коментар:
                <input type="text" name="text">
            </label>
        </div>
        <input type="submit" name="add" value="Додати">
    </form>
@else
    <p>Ви не зареєструвалися, тому не можете бачити та залишати коментарі, будь ласка,
         <a href="http://127.0.0.1:8000/login">зареєструйтеся</a></p>
@endif

<style>
    body {
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    h1 {
        color: #333;
    }

    h3 {
        color: #333;
    }

    h5 {
        color: #666;
    }

    p {
        color: #333;
    }

    input[type="text"],
    input[type="submit"] {
        padding: 10px;
        border: none;
        border-radius: 20px;
        margin: 5px;
    }

    input[type="submit"] {
        background-color: pink;
        color: #fff;
    }

    form {
        margin-top: 20px;
    }

    form label {
        display: block;
        margin-bottom: 10px;
    }

    form input[type="text"] {
        width: 100%;
    }

    form input[type="submit"] {
        cursor: pointer;
    }

    a {
        color: pink;
    }
</style>
