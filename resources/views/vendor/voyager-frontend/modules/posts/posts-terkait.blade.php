<div class="vspace-2"></div>

<div class="grid-container">
    <div class="cell small-12">
        <div class="grid-x grid-padding-x">
            @empty($posts)
                <p>There are currently no posts.</p>
            @else
                @foreach($posts as $post)
                    <div class="cell small-12 medium-4 large-4">
                        <div class="card">
                            <a href="{{ route('voyager-blog-custom.blog.post', ['category' => $post->category->slug,'slug' => $post->slug]) }}">
                                <img src="{{ imageUrl($post->image, 260, 175) }}" style="width: 100%">
                            </a>
                            <div class="card-section" style="height: 250px;">
                                <span class="label secondary">
                                    {{ $post->created_at->format('M. jS Y') }}
                                </span>
                                <a href="{{ route('voyager-blog-custom.blog.post', ['category' => $post->category->slug,'slug' => $post->slug]) }}">
                                    <h5>{{ $post->title }}</h5>
                                </a>
                                @if ($post->excerpt)
                                    <p>{{ Illuminate\Support\Str::limit($post->excerpt, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endempty
        </div>
    </div>
</div>

<div class="vspace-1"></div>