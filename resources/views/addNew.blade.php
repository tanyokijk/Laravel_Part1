<form id="addNewForm" method="POST">
    @csrf
    <div class="row-header">
        <label for="header">Header:
            <input type="text" name="header" id="header" maxlength="50">
        </label>
    </div>

    <div class="row-short">
        <label for="short">Short text:
            <input type="text" name="short" id="short" maxlength="150">
        </label>
    </div>

    <div class="row-article">
        <label for="article">Article:
            <textarea style="margin:0; height: 455px;width: 563px;" id="article" name="article" maxlength="5000">
            </textarea>
        </label>
    </div>

    <div class="row-category">
        <label for="category">Category:</label>
        @if($categories != null && count($categories) > 0)
            <select id="category" name="category">
            @foreach($categories as $category)
                <option value="{{$category['name']}}">{{$category['name']}}</option>
            @endforeach
            </select>
        @else
            <p>Поки немає категорій. Додайте</p>
        @endif
    </div>
<br>
        <input type="submit" name="add" value="Add New">
</form>

<script>
    function validateInput(inputElement, maxLength) {
        const inputValue = inputElement.value;

        if (inputValue.length > maxLength) {
            inputElement.classList.add('error');
        } else {
            inputElement.classList.remove('error');
        }
    }

    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', function(event) {
            validateInput(event.target, parseInt(event.target.getAttribute('maxlength')));
        });
    });
</script>
<style>
    .error {
        border: 1px solid red;
    }

    form
    {
        margin: 1%;
    }

    .row-header, .row-short, .row-article
    {
        margin-bottom: 3%;
        font-size: 16px;
        text-align: left;
        input:hover, textarea:hover {
            border: 1px solid pink;
        }
    }

    input[type="submit"] {
        background-color: lightpink;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }
    select {
        padding: 10px;
        border-radius: 20px;
        border: 1px solid #ccc;
        margin-right: 10px;
    }
</style>
