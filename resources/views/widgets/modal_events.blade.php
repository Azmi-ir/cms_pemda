<style>

@media print, screen and (max-width: 39.99875em) {
  .reveal {
    left: 82px;
    width: 60%;
    height: 0;
    min-height: 40%;
	margin-top: 120px;
  }
}
</style>

<div>
    {{-- <div class='cell medium-4 text-center medium-text-center' style='padding:5px'>
        <img class='thumbnail' src='$x' style='width: 100%' data-open='events'>
    </div> --}}
    @if (count($events) > 0)
        <div class='reveal small-2' id='events' data-reveal data-animation-in='fade-in' data-animation-out='fade-out'>
            <h5>Event</h5>
            {{-- <ul class="orbit-container"> --}}
            {{-- @foreach ($events as $item) --}}
                {{-- <div class='grid-x'>
                    <div class='article-title'>
                        <a href='#'><i class='fa fa-angle-right'></i>{{ $item->title }}</a>
                        <div><i class='fa fa-angle-right'></i> {{ $item->title }}</div>
                        <div style="font-size: 12px;">Mulai : {{ \Carbon\Carbon::parse($item->start_date)->locale('id')->isoFormat('dddd, MMMM Do YYYY, h:mm') }} &nbsp;&nbsp;&nbsp;&nbsp; Berakhir : {{ \Carbon\Carbon::parse($item->end_date)->locale('id')->isoFormat('dddd, MMMM Do YYYY, h:mm') }}</div>
                    </div>
                </div> --}}
            {{-- @endforeach --}}

            <ul class="accordion" data-responsive-accordion-tabs="accordion medium-tabs large-accordion">
                @foreach ($events as $item)
                <li class="accordion-item" data-accordion-item>
                  <a href="#" class="accordion-title">{{ $item->title }}</a>
                  <div class="accordion-content" data-tab-content>
                    <div style="font-size: 12px;">Mulai : {{ \Carbon\Carbon::parse($item->start_date)->locale('id')->isoFormat('dddd, MMMM Do YYYY, h:mm') }}</div>
                    <div style="font-size: 12px;">Berakhir : {{ \Carbon\Carbon::parse($item->end_date)->locale('id')->isoFormat('dddd, MMMM Do YYYY, h:mm') }}</div>
                    <p>
                        {!! $item->description !!}
                    </p>
                  </div>
                </li>
                @endforeach
              </ul>
            {{-- </ul> --}}
            {{-- <img class='thumbnail' src='$x' style='width: 100%'>
        <button class='close-button' data-close aria-label='Close modal' type='button'>
            <span aria-hidden='true'>&times;</span>
        </button> --}}
        </div>
        <script>
            $(document).ready(function() {
                $('#events').foundation('open');
            });
            // jQuery(document).ready(function($) {
            //     //you can now use $ as your jQuery object.
            //     $('#events').foundation('open');
            // });
            // (function($) {
            //     // $.ajax('/')
            //     // .done(function(resp) {
            //     //     var $modal = $('#events');
            //     //     $modal.html(resp).foundation('open');
            //     // });
            //     $('#events').foundation('open');
            // })();

        </script>
    @endif

</div>
