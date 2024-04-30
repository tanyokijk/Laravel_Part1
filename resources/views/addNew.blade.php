<form id="addNewForm" method="POST" class="space-y-6">
    @csrf
    <div class="flex flex-col">
        <label for="header" class="text-sm font-medium text-gray-700">{{__('messages.Summary')}}</label>
        <input type="text" name="header" id="header" maxlength="50" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div class="flex flex-col">
        <label for="short" class="text-sm font-medium text-gray-700">{{__('messages.Short description')}}</label>
        <input type="text" name="short" id="short" maxlength="150" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div class="flex flex-col">
        <label for="article" class="text-sm font-medium text-gray-700">{{__('messages.Full text')}}</label>
        <textarea id="article" name="article" rows="5" maxlength="5000" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
    </div>

    <div class="flex flex-col">
        <label for="category" class="text-sm font-medium text-gray-700">{{__('messages.Category')}}</label>
        @if($categories != null && count($categories) > 0)
            <select id="category" name="category" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @foreach($categories as $category)
                    <option value="{{$category['name']}}">{{$category['name']}}</option>
                @endforeach
            </select>
        @else
            <p class="text-sm text-red-600">{{__('messages.No categories yet')}}}</p>
        @endif
    </div>

    <div class="flex justify-center">
        <button type="submit" name="add" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-500 disabled:opacity-25 transition">
            {{__('messages.Add')}}</button>
    </div>
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

    /* Загальні стилі */
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Заголовок */
    header {
        margin-bottom: 20px;
    }

    h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333333;
    }

    /* Введення тексту */
    input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Кнопки */
    button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        background-color: #607d8b; /* Темно-сірий колір */
        color: #ffffff;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #455a64; /* Темно-сірий колір при наведенні */
    }

    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #ffffff; /* Фоновий колір */
        color: #333333; /* Колір тексту */
        font-size: 1rem;
        cursor: pointer;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Випадаючий список при наведенні */
    select:hover {
        border-color: #999999; /* Колір межі при наведенні */
    }

    /* Випадаючий список при фокусі */
    select:focus {
        border-color: #607d8b; /* Колір межі при фокусі */
        box-shadow: 0 0 0 2px rgba(96, 125, 139, 0.2); /* Тінь при фокусі */
    }

</style>
