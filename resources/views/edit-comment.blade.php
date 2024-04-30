<header class="mb-4">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('messages.Comment Information') }}
    </h2>
</header>

<form method="post" action="{{ route('comment.update', ['comment' => $comment->id]) }}" class="space-y-6">

    @csrf
    @method('patch')

    <div>
        <x-input-label for="text" :value="__('messages.Text')" />
        <x-text-input id="text" name="text" type="text" class="mt-1 block w-full rounded-md shadow-sm" :value="old('text', $comment->text)" required autofocus autocomplete="text" />
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('messages.Update') }}</x-primary-button>
    </div>
</form>

<form method="post" action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" class="space-y-6">
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
