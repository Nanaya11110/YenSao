<div class=" bg-white mx-5">
  <h1 class="text-black font-bold text-3xl my-4">{{$post->title}}</h1>
  <div>
    {!! $post->content !!}

  </div>
  <img class="mx-auto my-3" src="{{asset($post->url)}}" alt="{{$post->url}}">
</div>
