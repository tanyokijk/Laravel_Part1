<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.News') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <?php $news=\App\Models\News::all()?>
                    @if($news != null && count($news) > 0)

                        @foreach($news as $new)

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <a href="{{ route('news.edit', ['news' => $new]) }}"  class="one-new">
                                <div>
                                    <h2>{{ $new->summary }}</h2>
                                    <p>{{ $new->short_description }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                        @endforeach
                    @else
                        <h1>{{__('messages.No news yet.')}}</h1>
                    @endif
            <a href="{{ route('add-new') }}"><button>{{__('messages.Add')}}</button></a>
        </div>
    </div>
</x-app-layout>
