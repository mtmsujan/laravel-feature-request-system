<div class="single-comment pb-[25px]">
    {{-- user-info --}}
    <div class="user-info">
        <div class="flex gap-3">
            <img src="{{ $comment->user?->avatar }}" alt="user" class="w-[25px] rounded-2xl">

            <span class="font-[500] capitalize">{{ $comment->user?->name }}</span>
        </div>
    </div>

    {{-- comment-body --}}
    <div class="comment-body pl-[37px] {{$comment->replies->count() > 0 ? 'border-l-[3px] border-gray-300' : ''}} ml-[13px] mt-1">
        {{-- parent-comment --}}
        <div class="parent-comment mb-4">
            <p>{{ $comment->body }}</p>

            <div class="comment-meta flex items-center gap-2 mt-[10px]">
                <span class="text-xs opacity-60">{{ $comment->created_at->diffForHumans() }}</span>
                {{-- <button class="reaction">
                    <span class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="w-[14px] opacity-60">
                            <path fill="currentColor"
                                d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z" />
                        </svg>
                    </span>
                    <span class="reaction-count inline-block opacity-60"></span>
                </button> --}}
                <button x-on:click="parentId = '{{$comment->id}}'; replyTo = '{{$comment->user->name}}'; $('#commentBox').focus()" class="text-xs hover:opacity-100 text-primary opacity-70">Reply</button>
            </div>
        </div>

        {{-- child-comment --}}
        @foreach ($comment->replies as $reply)
            <x-comment :comment="$reply" />
        @endforeach
    </div>
</div>
