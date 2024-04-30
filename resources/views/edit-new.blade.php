<header class="mb-4">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('messages.News Information') }}
    </h2>
</header>

<form method="post" action="{{ route('news.update', ['news' => $news->id]) }}" class="space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="summary" :value="__('messages.Summary')" />
        <x-text-input id="summary" name="summary" type="text" class="mt-1 block w-full rounded-md shadow-sm" :value="old('summary', $news->summary)" required autofocus autocomplete="summary" />
    </div>

    <div>
        <x-input-label for="short_description" :value="__('messages.Short description')" />
        <x-text-input id="short_description" name="short_description" type="text" class="mt-1 block w-full rounded-md shadow-sm" :value="old('short_description', $news->short_description)" required autofocus autocomplete="short_description" />
    </div>

    <div>
        <x-input-label for="full_text" :value="__('messages.Full text')" />
        <x-text-input id="full_text" name="full_text" type="text" class="mt-1 block w-full rounded-md shadow-sm" :value="old('full_text', $news->full_text)" required autofocus autocomplete="full_text" />
    </div>
    <x-input-label for="category" :value="__('messages.Category')" />
    <select id="category" name="category_id">
        <?php $categories=\App\Models\Category::all();?>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>
    <br>
    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('messages.Update') }}</x-primary-button>
    </div>
</form>

<form method="post" action="{{ route('news.destroy', ['news' => $news->id]) }}" class="space-y-6">
    @csrf
    @method('delete')

    <div class="flex items-center gap-4">
        <x-danger-button>{{ __('messages.Delete') }}</x-danger-button>
    </div>
</form>


<style>
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
    input[type="text"] {
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
        border: 1px solid #cccccc;
        border-radius: 4px;
        box-sizing: border-box;
        appearance: none; /* Вимкнення браузерного стилізування */
        background-color: #ffffff;
        color: #333333;
        font-size: 1rem;
    }

    /* Стилі для вибраних варіантів у випадаючому списку */
    option[selected] {
        background-color: #f0f0f0;
    }

    /* Стилі при наведенні на випадаючому списку */
    select:hover {
        border-color: #999999;
    }
</style>
