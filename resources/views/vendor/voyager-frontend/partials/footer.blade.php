
     <footer class="top-footer">
         <div class="grid-container full" style="padding-left:1rem;padding-right:1rem;">
             <div class="grid-x" style="color:white;">
				<div class="columns small-12 large-3 medium-text-right show-for-small-only"><!-- ... -->
				
					<div class="map-responsive">
						{!! setting('site.map') !!}
					</div>
				</div>

                 <div class="columns small-12 large-3 medium-text-left" style="padding-right: 20px">
                     <img src="/storage/{{ setting('site.logo') }}"><br><br>
                     {{ setting('site.address') }}

                 </div>
                 <div class="columns small-4 large-3 medium-text-left show-for-medium" style="font-size:18px;">
                     <!-- ... -->
                     <a onclick="window.open('{{ setting('site.link_facebook') }}');" href="#"
                         style="color:white"><h5 style="color:white;font-size: 0.9rem;"><img src="/storage/settings/April2021/fb.png" width="20px">
                         {{ setting('site.facebook') }}</h5></a>
                     <a onclick="window.open('{{ setting('site.link_instagram') }}');" href="#"
                         style="color:white"><h5 style="color:white;font-size: 0.9rem;"><img src="/storage/settings/April2021/ig.png" width="20px">
                         {{ setting('site.instagram') }}</h5></a>
                     <a onclick="window.open('{{ setting('site.link_twitter') }}');" href="#" style="color:white"><h5 style="color:white;font-size: 0.9rem;"><img
                             src="/storage/settings/April2021/twitter.png" width="20px">
                         {{ setting('site.twitter') }}</h5></a>
                     <a onclick="window.open('{{ setting('site.link_youtube') }}');" href="#" style="color:white"><h5 style="color:white;font-size: 0.9rem;"><img
                             src="/storage/settings/April2021/yt.png" width="20px"> {{ setting('site.youtube') }}</h5></a>    
				 </div>
				 
                 <div class="columns small-4 large-3 medium-text-left show-for-medium">
                             <div class='medium-text-justify'><p style="font-size:16px;color:white;">
							 @php
                                 $dc = exec('cat /home/ubuntu/awstatall.log', $red);
                                 foreach ($red as $rd) {
                                     echo $rd . "<br>";
                                 }
                             @endphp
							@php
								$xc = exec('cat /home/ubuntu/awstat.log', $res);
								foreach ($res as $r) {
									echo $r . "<br>";
								}
							@endphp
							</p></div>
	</div>  
    <div class="columns small-12 large-3 medium-text-right show-for-medium"><!-- ... -->
    
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
