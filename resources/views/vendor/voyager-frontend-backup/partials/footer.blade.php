        <footer class="top-footer">
            <div class="grid-container full" style="padding-left:1rem;padding-right:1rem;">
                <div class="grid-x" style="color:white;">
					
				  <div class="columns small-4 large-2 medium-text-left">
					<img src="/storage/{{ setting('site.logo') }}"><br>
					{{ setting('site.address') }}
				  
				  </div>
				  <div class="columns small-4 large-7 medium-text-center" style="padding-left:15px"><!-- ... -->
					<a onclick="window.open('{{ setting('site.link_facebook') }}');" href="#" style="color:white"><img src="/storage/settings/April2021/fb.png" width="16px"> {{ setting('site.facebook') }}</a> 
					<a onclick="window.open('{{ setting('site.link_instagram') }}');" href="#" style="color:white"><img src="/storage/settings/April2021/ig.png" width="16px"> {{ setting('site.instagram') }}</a> 
					<a onclick="window.open('{{ setting('site.link_twitter') }}');" href="#" style="color:white"><img src="/storage/settings/April2021/twitter.png" width="16px"> {{ setting('site.twitter') }}</a> 
					<a onclick="window.open('{{ setting('site.link_youtube') }}');" href="#" style="color:white"><img src="/storage/settings/April2021/yt.png" width="16px"> {{ setting('site.youtube') }}</a> <br>
                	<div class="grid-x" style="color:white;">
						<div class="columns small-6 large-6 medium-text-center">
						</div>
						<div class="columns small-6 large-6 medium-text-center">
<pre class='medium-text-justify'>@php $dc = exec('cat /home/ubuntu/awstatall.log',$red); foreach($red as $rd){echo $rd."\n";} @endphp
@php $xc = exec('cat /home/ubuntu/awstat.log',$res); foreach($res as $r){echo $r."\n";} @endphp/pre>
						</div>
					</div>
				  
				  </div>
				  <div class="columns small-4 large-3 medium-text-right" style="padding-left:15px"><!-- ... -->
				  
				  <div class="map-responsive">
				  {!! setting('site.map') !!}
</div>
				  </div>
                </div> <!-- /.grid -->
            </div> <!-- /.grid-container -->
        </footer>
	
<script src="{{ url('/') }}/js/app.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>
