@extends('voyager-frontend::layouts.sidebar-right')
@section('meta_title', $post->title)
@section('meta_description', $post->meta_description)
@section('page_title', $post->title)
@section('page_subtitle', 'Posted at : ' . $post->created_at->format('j M Y'))
@section('page_banner')

@section('content')
    @include('voyager-frontend::partials.page-title')

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

    @include('voyager-frontend::modules.posts.posts-grid', ['posts' => $relatedPosts])

    <div class="vspace-2"></div>
@endsection