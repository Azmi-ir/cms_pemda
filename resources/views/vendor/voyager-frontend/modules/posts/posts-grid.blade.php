<div class="vspace-2"></div>

<div class="grid-container">
    <div class="cell small-12">
        <div class="grid-x grid-padding-x">
            @empty($posts)
            <p>There are currently no posts.</p>
            @else
            @if ($posts[0]->category->name==='galerivideo')
            @php
            $y = 0;
            foreach($posts as $post){
                $y = $y+1;
                // $x = "/storage/resized/-260x175/" . substr($post['image'],1);
                $x = imageUrl($post['image'], 260, 175);
                $z = str_replace('"', "'", $post['excerpt']);
                echo "<div class='cell medium-4 text-center medium-text-center' style='padding:10px'>
                    <img src='$x' data-open='vModal$y' style='width:100%'><div class='mini-foto'>".$post['title']."</div>
                </div>";

                echo "


                <div class='reveal' id='vModal$y' data-reset-on-close='true' data-reveal data-animation-in='slide-in-down' data-animation-out='slide-out-up'>
                    <h5>".$post['title']."</h5>".$z."
                    <button class='close-button' data-close aria-label='Close modal'  type='button'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>

                ";
            }
            @endphp

            @elseif($posts[0]->category->name==='galerifoto')
            @php
            $y = 0;
            foreach($posts as $post){
                // $x = "/storage/resized/-260x175/" . substr($post['image'],1);
                $x = imageUrl($post['image'], 260, 175);
                $xx = "/storage/" . $post['image'];
                $y = $y+1;
                echo "<div class='cell medium-4 text-center medium-text-center' style='padding:5px'>
                    <img src='$x' data-open='exampleModal$y' style='width:100%'><div class='mini-foto'>{$post->title}</div>
                </div>";

                echo "

                <div class='reveal' id='exampleModal$y' data-reveal data-animation-in='fade-in' data-animation-out='fade-out'>
                    <h5>{$post->title}</h5>
                    <img src='$xx' ><div class='mini-foto text-center'>{$post->title}</div>
                    <button class='close-button' data-close aria-label='Close modal' type='button'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>

                ";
            }
            @endphp

            @elseif($posts[0]->category->name==='layanan')
            @foreach($posts as $post)
            <!-- ONE CARD BLOCK -->
            <div class="page-block">
                <div class="grid-container">
                    <div class="block-image-text"  data-scrollreveal >
                        <div class="block-image-text-img" style="width: 100%; height: 200px;">
                            <a href="{{ route('voyager-blog-custom.blog.post', ['category' => $post->category->slug,'slug' => $post->slug]) }}">    
                            <img src="{{ imageUrl($post->image) }}">
                            </a>
                        </div> <!-- /.block-image-text-img -->

                        <div class="block-image-text-content">
                            <a href="{{ route('voyager-blog-custom.blog.post', ['category' => $post->category->slug,'slug' => $post->slug]) }}">    
                                <h4>{{$post->title}}</h4>
                            </a>

                            @if ($post->excerpt)
                            <p>{{ Illuminate\Support\Str::limit($post->excerpt, 100) }}</p>
                            @endif
                        </div> <!-- /.block-image-text-content -->

                    </div> <!-- /.block-image-text -->
                </div> <!-- /.grid-container -->
            </div> <!-- /.page-block -->
            <!-- /ONE CARD BLOCK -->
            @endforeach

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
            @endif
            @endempty
        </div>
    </div>
</div>

<div class="vspace-1"></div>

<div class="d-flex justify-content-end text-center">
    {{$posts->links()}}
</div>

