<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <?php $comments=\App\Models\Comment::all()?>
                    @if($comments != null && count($comments) > 0)

                        @foreach($comments as $comment)

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <a href="{{ route('comment.edit', ['comment' => $comment]) }}"  class="one-new">
                                <div>
                                    <h2>{{$comment['userEmail']}}</h2>
                                    <h2>{{ $comment->text }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                        @endforeach
                    @else
                        <h1>{{__('messages.No comments yet.')}}</h1>
                    @endif
        </div>
    </div>
</x-app-layout>
