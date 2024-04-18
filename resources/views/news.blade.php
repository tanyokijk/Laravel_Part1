<div style="display: grid; grid-template-columns: 1fr auto;">
    <button><a href="http://127.0.0.1:8000/add-new">Додати новину</a></button>
    @if(isset($email))
        <div class="alert alert-info" style="justify-self: end;">
            Користувач: {{ $email }}
        </div>
    @endif
</div>
<div class="all-news">
@if($news != null && count($news) > 0)

    @foreach($news as $new)
        <div class="one-new">
        <h2>{{$new['summary']}}</h2>
        <p>{{$new['short_description']}}</p>
        </div>
    @endforeach
@else
    <h1>Поки немає новин.</h1>
@endif

</div>

<style>
    .one-new
    {
        border: solid 2px lavenderblush;
        height: 12%;
        margin: 20px;
        padding-left: 20px;
    }
    h2
    {
        color: pink;
    }
    p
    {
        color: deeppink;
    }
    button
    {
        background-color: lightpink;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        width: 200px;
    }
    a
    {
        color: purple;
        text-decoration: none;
    }
</style>
