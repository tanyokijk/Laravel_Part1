<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.News') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="search" style="display: flex; align-items: center;">
                <form action="{{url('/dashboard')}}" method="GET" style="display: flex; align-items: center;">
                    <div class="row-header" style="margin-right: 10px;">
                        <input type="text" name="summary" placeholder="Header" style="border-radius: 5px 0 0 5px; border: 1px solid #ccc; padding: 5px;">
                    </div>
                    <div class="row-category" style="margin-right: 10px;">

                        @if($categories != null && count($categories) > 0)
                            <select id="category" name="category" style="border-radius: 0 5px 5px 0; border: 1px solid #ccc; padding: 5px;">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{$category['name']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                        @else
                            <p class="no-categories">{{__('messages.No categories yet')}}</p>
                        @endif
                    </div>
                    <input type="submit" name="add" value="Пошук" style="border-radius: 5px; border: 1px solid #ccc; padding: 5px; background-color: transparent; color: black; cursor: pointer;">
                </form>
            </div>
            <br>
            <a href="{{route('add-new')}}"><button style="border-radius: 5px; border: 1px solid #ccc; padding: 5px; background-color: transparent; color: black; cursor: pointer;">{{__('messages.Add')}}</button></a>



                    @if($news != null && count($news) > 0)

                        @foreach($news as $new)
                    <br>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <a href="{{ route('news.show', ['news' => $new->id]) }}" class="one-new">
                                <div>
                                    <h2>{{ $new->summary }}</h2>
                                    <p>{{ $new->short_description }}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                        @endforeach
                    @else
                        <h1>{{__('messages.No news yet.')}}</h1>
                    @endif


        </div>
    </div>
</x-app-layout>
