@extends('voyager-frontend::layouts.sidebar-right')
@section('meta_title', $post->title)
@section('meta_description', $post->meta_description)
@section('page_title', $post->title)
@section('page_subtitle', 'Posted at : ' . $post->created_at->format('j M Y'))
@section('page_banner')

@section('content')
<style>
.page-title {
	/* background-image: linear-gradient({{ setting('site.color_1') }}, #151515), url(/storage/{!! $post->image !!}); */
	background-image: linear-gradient(rgba(34, 34, 34, 0.9), rgba(240, 240, 240, 0.6)), url(/storage/<?=strtr($post->image,"\\","/")?>);
}
</style>
<div
    class="page-title"
    @if (View::hasSection('page_banner'))
    style="background-image: url(@yield('page_banner'))"
    @endif>
    <div class="grid-container">
        <h5>@yield('page_title')</h5>
        @if (View::hasSection('page_subtitle'))
            <p>@yield('page_subtitle')</p>
        @endif
    </div>
</div>

    <div class="vspace-2"></div>

    <div class="grid-container">
        <div class="grid-x">
            <div class="sharethis-inline-share-buttons"></div>
            <div class="cell small-12">
                {!! $post->body !!}

                @if ($relatedPosts)
                    <div class="vspace-1"></div>
                    <hr />

                    <h2 class="text-center">Artikel Terkait</h2>
                @endif
            </div>
        </div>
    </div>

    
    @include('voyager-frontend::modules.posts.posts-terkait', ['posts' => $relatedPosts])

    <div class="vspace-2"></div>
@endsection
