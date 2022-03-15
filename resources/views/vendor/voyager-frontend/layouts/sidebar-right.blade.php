@include('voyager-frontend::partials.meta')
@include('voyager-frontend::partials.header')
@include('voyager-frontend::partials.page-title')

<main class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="vspace-2"></div>
            <div class="cell small-12 medium-9">
                @yield('content')
            </div>

            <div class="cell small-12 medium-3 sidebar">

                <div class="card">
                    <img alt="" src="" style='background-image: linear-gradient({{ setting('site.color_1') }}, #151515), url()'>
                    <div class="card-section">
                        <h5>Artikel Terkait</h5>
                        <ul class="vertical menu">
                            @include('voyager-frontend::modules.posts.posts-url', ['posts' => $relatedPosts])
                        </ul>
                </div>
            </div>
        </div>

        <div class="vspace-2"></div>
    </div>
</main>

@include('voyager-frontend::partials.footer')
