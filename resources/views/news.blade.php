<div class="container">
    <div>

        @if(isset($email))
            <div class="alert alert-info" style="justify-self: end;">
                Користувач: {{ $email }}
            </div>
        @else
            <a href="http://127.0.0.1:8000/login">
                <button>{{__('messages.Log in')}}</button>
            </a>
            <a href="http://127.0.0.1:8000/register">
                <button>{{__('messages.Sign up')}}</button>
            </a>
        @endif
    </div>

    <div id="search">
        <form action="{{url('/')}}" method="GET">
            <div class="row-header">
                <input type="text" name="summary" placeholder="{{__('messages.Summary')}}">
            </div>
            <div class="row-category">
                @if($categories != null && count($categories) > 0)
                    <select id="category" name="category">
                        <option value=""></option>
                        @foreach($categories as $category)
                            <option value="{{$category['name']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                @else
                    <p class="no-categories">{{__('messages.No categories yet')}}</p>
                @endif
            </div>

            <input type="submit" name="add" value="{{__('messages.Search')}}">
        </form>
    </div>
</div>
<div class="all-news">
@if($news != null && count($news) > 0)

    @foreach($news as $new)
            <a href="{{ route('news.show', ['news' => $new]) }}" class="one-new">
                <div>
                    <h2>{{ $new->summary }}</h2>
                    <p>{{ $new->short_description }}</p>
                </div>
            </a>
    @endforeach
@else
    <h1>{{__('messages.No news yet')}}</h1>
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

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    button, input[type="submit"] {
        padding: 10px 20px;
        background-color: pink;
        border: none;
        border-radius: 20px;
        margin: 5px;
    }

    #search {
        margin-top: 20px;
        width: 100%;
    }

    form {
        display: flex;
        align-items: center;
    }

    input[type="text"] {
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #ccc;
        margin-right: 10px;
        flex-grow: 1;
    }

    select {
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #ccc;
        margin-right: 10px;
    }

    .no-categories {
        color: red;
        margin-top: 5px;
    }

</style>
