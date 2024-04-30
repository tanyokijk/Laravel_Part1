<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <?php $categories=\App\Models\Category::all()?>
                    @if($categories != null && count($categories) > 0)

                        @foreach($categories as $category)

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <a href="{{ route('category.edit', ['category' => $category]) }}"  class="one-new">
                                <div>
                                    <h2>{{ $category->name }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                        @endforeach
                    @else
                        <h1>{{__('messages.No category yet.')}}</h1>
                    @endif
            <a href="{{ route('add-category') }}"><button>{{__('messages.Add')}}</button></a>
        </div>
    </div>
</x-app-layout>
