<canvas id="{!! $element !!}" width="{!! $size['width'] !!}" height="{!! $size['height'] !!}">
<script>
    var listener = function(event) {
        (function() {
            "use strict";
            let ctx = document.getElementById("{!! $element !!}");
            window.{!! $element !!} = new Chart(ctx, {
                type: '{!! $type !!}',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: {!! json_encode($datasets) !!}
                },
                @if(!empty($optionsRaw))
                options: {!! $optionsRaw !!}
                        @elseif(!empty($options))
                    options: {!! json_encode($options) !!}
            @endif
        });
        })();
    };

    @if($useDOMSubtreeModified)
        document.addEventListener("DOMSubtreeModified", listener, false);
        setTimeout(function() {
            document.removeEventListener("DOMSubtreeModified", listener, false);
        }, 500);
    @else
        document.addEventListener("DOMContentLoaded", listener, false);
    @endif

</script>
</canvas>
