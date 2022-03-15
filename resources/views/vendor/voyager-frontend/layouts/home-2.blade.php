@include('voyager-frontend::partials.meta')
@include('voyager-frontend::partials.header')

<style>
.wide-article-link {
  background-color: #f6f6f6;
  padding: 1rem 1rem 0.5rem;
  /* border-bottom: 2px solid {{setting('site.color_1')}}; */
  margin-bottom: 1rem;
}

.wide-article-link .article-title a {
  color: {{setting('site.color_1')}};
}

.wide-article-link .article-title a:hover, .wide-article-link .article-title a:focus {
  color: {{setting('site.color_1')}};
}

.wide-article-link .article-elipsis .read-more {
  font-weight: bold;
  color: {{setting('site.color_1')}};
}

.wide-article-link .article-title,
.wide-article-link .article-author,
.wide-article-link .article-elipsis {
  margin-bottom: 0.25rem;
  color: #454545;
  text-align: justify;
}

.splide__arrow {
	background:transparent;
}

h5{ color:{{ setting('site.color_1') }}; font-weight: bold; font-size: 1.1rem;}

#gpr-kominfo-widget-container {
      height: 600px!important;
	  background-color: #f6f6f6!important;
	  border-top: 1px solid #f6f6f6!important;
    }

    #gpr-kominfo-widget-body {
      overflow: auto;
      height: 600px!important;
      background-color:#f6f6f6!important;  
    }

    #gpr-kominfo-widget-footer{
      display: none!important;
    }
    #gpr-kominfo-widget-header{
      display: none!important;
    }

.img-responsive {
    display: block;
    max-width: 100%;
    height: 90vh;
}
.orbit-next, .orbit-previous {top:43%}
</style>

{{--  category:slider  --}}
<main class="main-content">
			<div class="splide text-center show-for-small-only">
				<script>
					document.addEventListener( 'DOMContentLoaded', function () {
						new Splide( '.splide', {
							type   : 'loop',
							autoWidth: true,
							perPage: 1,
							perMove: 1,
							autoplay: true,
							interval: 10000,
							pagination: false
						} ).mount();
					} );
				</script>
				<div class="splide__track">
					<ul class="splide__list">
						@php
						$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 11)->get();						
						foreach($pengPost as $result){
							$x = "/storage/" . $result['image'];
							$y = $result['excerpt'];
							echo "<li class='splide__slide'><a href='#' onclick=\"window.open('$y');\"><img src='$x' style='max-height:400px'></a></li>";
						}
						@endphp
					</ul>
				</div>
		<marquee style="color: white;bottom: 40px;opacity: 0.7;position: relative;padding-bottom: 20px;background-color:{{ setting('site.color_1') }};margin-top: -20px;"><br>
			@php
				$blogPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 14)->orderBy('published_date','desc')->limit(3)->get();
				foreach($blogPost as $result){
					$x = $result['excerpt'];
					echo $x . "<em> | </em>";
				}
			@endphp
			<br>
		</marquee><br>
			</div>
			
<div class="grid-container full show-for-medium">
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls" style='bottom:100px;'>
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
	<ul class="orbit-container">
	@php
	$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 11)->get();
	$z = 0;
	
	foreach($pengPost as $result){
		$x = "/storage/" . $result['image'];
		// $x = "/storage/resized/-260x175/" . substr($result['image'],1);
		$y = $result['title'];
		$a = $result['slug'];
		if($z == 1){
		echo "
			<li class='is-active orbit-slide'>
		";
			
		}else{
		echo "
		<li class='orbit-slide'>
		";

		}
		echo "
			<figure class='orbit-figure'>
				<img class='orbit-image img-responsive' src='$x'>
			</figure>
		</li>";
	}
	@endphp
	</ul>
  </div>
		<marquee style="color: white;bottom: 40px;opacity: 0.7;position: absolute;padding-bottom: 20px;background-color:{{ setting('site.color_1') }};"><br>
			@php
				$blogPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 14)->orderBy('published_date','desc')->limit(3)->get();
				foreach($blogPost as $result){
					$x = $result['excerpt'];
					echo $x . "<em> | </em>";
				}
			@endphp
			<br>
		</marquee>
        <nav class="orbit-bullets" style='bottom:110px; opacity:0.8;'>
        @php
        $pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 11)->get();
        $x = -1;
        foreach($pengPost as $result){
                $x = $x+1;
                if($x == 0){
                echo "
                        <button class='is-active' data-slide='$x'><span class='show-for-sr'></span></button>
                ";

                }else{
                echo "
                        <button data-slide='$x'><span class='show-for-sr'></span></button>
                ";

                }
        }
        @endphp
        </nav>
</div>
</div>

{{--  SLIDER HERE  --}}
<div class="grid-container">
	<div class="grid-x">
		<div class="cell medium-3 text-center medium-text-left">
			<h5>Pengumuman</h5><hr>
			<div class="grid-container wide-article-link" style="border:1px solid {{ setting('site.color_1') }};;border-bottom:1px solid {{ setting('site.color_1') }};max-height: 120px;overflow-y: scroll;">
				@php
				$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 4)->orderBy('published_date','desc')->get();
				foreach($pengPost as $result){
					echo "<div class='grid-x'>
					<div class='article-title'><a href='/blog/pengumuman/" . $result['slug'] . "'><i class='fa fa-angle-right'></i> " . $result['title'] . "</a></div>
					</div>";
				}
				@endphp
			<a href="/blog/pengumuman"><i class='fa fa-folder-open'></i> Arsip Pengumuman</a></div>
			<div class="vspace-medium-1"></div>
			<h5>Agenda Kegiatan</h5><hr>
			<div class="grid-container wide-article-link" style="border:1px solid {{ setting('site.color_1') }};;border-bottom:1px solid {{ setting('site.color_1') }};max-height: 120px;overflow-y: scroll;">
				@php
				$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 5)->orderBy('published_date','desc')->get();
				foreach($pengPost as $result){
					echo "<div class='grid-x'>
					<div class='article-title'><a href='/blog/agendakegiatan/" . $result['slug'] . "'><i class='fa fa-calendar-alt'></i> " . $result['title'] . "</a></div>
					</div>";
				}
				@endphp
			<a href="/blog/agendakegiatan"><i class='fa fa-folder-open'></i> Arsip Agenda Kegiatan</a></div>
		</div> <!-- /.cell -->
		<div class="cell medium-1 text-center medium-text-left">
		</div> <!-- /.cell -->
		<div class="cell medium-8 text-center medium-text-left">
			<h5>Berita</h5><hr>
			@php	
				$blogPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 3)->where('status', '=', 'PUBLISHED')->where('published_date', '<=', date("Y-m-d H:i:s"))->orderBy('published_date','desc')->limit(4)->get();
				// var_dump($blogPost);
				foreach($blogPost as $result){
					// $x = "/storage/resized/-260x175/" . substr($result['image'],1);
						$x = imageUrl($result['image'], 260, 155);
					echo "<div class='wide-article-link'>";
						echo "<h5 class='article-title'>";
						echo "<a href='/blog/berita/" . $result['slug'] . "'>";
						echo $result['title'];
						echo "</a>";
						echo "</h5>";
					echo "<div class='container'>";
						echo "<div class='grid-x'>";
						echo "<div class='cell medium-3'>";
						echo "<img src='$x' >";
						echo "</div>";
						echo "<div class='cell medium-1' style='width:15px'>";
						echo "</div>";
						echo "<div class='cell medium-8'>";
						echo "<p class='article-author'><i class='fa fa-calendar-alt'></i> " . substr($result['published_date'],0,10) . " <i class='fa fa-eye'></i> " . $result['viewer'] . "</p>";
						echo "<p class='article-elipsis'>";
						echo  $result['excerpt'] . "... <a href='/blog/berita/" . $result['slug'] . "' class='read-more'>Read more</a></p>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
				}
			@endphp
			<a href="/blog/berita"><i class='fa fa-folder-open'></i> Arsip Berita</a>
		</div> <!-- /.cell -->
	</div> <!-- /.grid -->
</div>
<hr style="border-bottom:10px solid transparent;">


<div class="grid-x">
	<div class="cell medium-12 text-center">
		<h5 class='text-center'>Link Website dan Aplikasi</h5>
	</div>
	<div class="cell medium-10 text-center medium-text-center medium-offset-1">
		<script>
			document.addEventListener( 'DOMContentLoaded', function () {
				new Splide( '#links', {
					type   : 'loop',
					autoWidth: true,
					perPage: 6,
					perMove: 1,
					autoplay: true,
					interval: 2000,
					pagination: false,
				} ).mount();
			} );
		</script>
			<div class="splide text-center" id="links">
				<div class="splide__track">
					<ul class="splide__list">
						@php
						$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 6)->get();						
						foreach($pengPost as $result){
							$x = "/storage/" . $result['image'];
							$y = $result['excerpt'];
							echo "<li class='splide__slide'><a href='#' onclick=\"window.open('$y');\"><img src='$x' style='width:180px;padding:12px'></a></li>";
						}
						@endphp
					</ul>
					<br>
				</div>
			</div>
		
	</div> <!-- /.cell -->
</div>
<hr style="border-bottom:10px solid transparent;">

<div class="grid-container">
	<div class="grid-x">
		<div class="cell medium-12 text-center medium-text-center">
			<h5>Galeri Foto</h5><hr>
			<div class="grid-container">
				<div class="grid-x">
					@php
					$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 7)->orderBy('published_date','desc')->limit(3)->get();
					$y = 0;
					foreach($pengPost as $result){
						// $x = "/storage/resized/-260x175/" . substr($result['image'],1);
						$x = imageUrl($result['image'], 320, 240);
						$xx = "/storage/" . $result['image'];
						$y = $y+1;
						echo "<div class='cell medium-4 text-center medium-text-center' style='padding:5px'>
						<img src='$x' data-open='exampleModal$y' style='width:100%'><div class='mini-foto'>".$result['title']."</div>
						</div>";
						
						echo "
						
							<div class='reveal' id='exampleModal$y' data-reveal data-animation-in='fade-in' data-animation-out='fade-out'>
							  <h5>".$result['title']."</h5>
							  <img src='$xx' ><div class='mini-foto text-center'>".$result['title']."</div>
							  <button class='close-button' data-close aria-label='Close modal' type='button'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>
						
						";
					}
					@endphp
					<a href="/blog/galerifoto"><i class='fa fa-folder-open'></i> Arsip Foto</a><br><br>
				</div>
			</div>
		<div class="cell medium-12 text-center medium-text-center">
			<h5>Galeri Video</h5><hr>
			<div class="grid-container">
				<div class="grid-x">
					@php
					$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 8)->orderBy('published_date','desc')->limit(3)->get();
					$y = 0;
					foreach($pengPost as $result){
						$y = $y+1;
						// $x = "/storage/resized/-260x175/" . substr($result['image'],1);
						$x = imageUrl($result['image'], 320, 240);
						$z = str_replace('"', "'", $result['excerpt']);
						echo "<div class='cell medium-4 text-center medium-text-center' style='padding:5px'>
						<img src='$x' data-open='vModal$y' style='width:100%'><div class='mini-foto'>".$result['title']."</div>
						</div>";
						
						echo "
						
						
							<div class='reveal' id='vModal$y' data-reset-on-close='true' data-reveal data-animation-in='slide-in-down' data-animation-out='slide-out-up'>
							  <h5>".$result['title']."</h5>".$z."
							  <button class='close-button' data-close aria-label='Close modal' type='button'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>
						
						";
					}
					@endphp
					<a href="/blog/galerivideo"><i class='fa fa-folder-open'></i> Arsip Video</a>
				</div>
			</div>
		</div> <!-- /.cell -->
	</div> <!-- /.grid -->
</div>
<hr style="border-bottom:10px solid transparent;">
<div class="grid-container">
	<div class="grid-x">
		<div class="cell medium-7 text-center medium-text-center">
			<h5>Info Grafis</h5><hr>
				<div class="orbit" role="region" aria-label="Favorite Text Ever" data-orbit>
				  <ul class="orbit-container">
					@php
					$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 9)->orderBy('published_date','desc')->limit(3)->get();
					foreach($pengPost as $result){
						$x = "/storage/" . $result['image'];
						// $x = "/storage/resized/-260x175/" . substr($result['image'],1);
						$y = $result['slug'];
						echo "<li class='is-active orbit-slide'>
							<a href='/blog/infografis/$y'><img class='thumbnail' src='$x' style='width: 80%'></a>
						</li>";
					}
					@endphp
				  </ul>
				  <nav class="orbit-bullets" style='bottom:80px'>
					@php
					$pengPost = \App\Models\BlogPost::with('category')->where('category_id', '=', 8)->orderBy('published_date','desc')->limit(3)->get();
					$x = -1;
					foreach($pengPost as $result){
						$x = $x+1;
						if($x == 0){
						echo "
							<button class='is-active' data-slide='$x'><span class='show-for-sr'></span></button>
						";
							
						}else{
						echo "
							<button data-slide='$x'><span class='show-for-sr'></span></button>
						";

						}
					}
					@endphp
				  </nav>
				</div>
		</div>
		<div class="cell medium-1 text-center medium-text-left">
		</div>
		<div class="cell medium-4 text-center medium-text-left">    
			<h5>Government Public Relation</h5><hr>
			<script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
			<div id="gpr-kominfo-widget-container" style="margin-bottom: 15px;"></div>
		</div>
	</div>
</div>
    @yield('content')
</main>

     @widget('ModalEvents');
@include('voyager-frontend::partials.footer')
