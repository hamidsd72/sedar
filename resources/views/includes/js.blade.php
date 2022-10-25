<script type="text/javascript" src="{{ asset('assets/scripts/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/new/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/new/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/new/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/new/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/new/color-scheme-demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/new/pwa-services.js') }}"></script>

<script>
    "use strict"
    $(window).on('load', function() {

        /* range picker for filter */
        var html5Slider = document.getElementById('rangeslider');
        noUiSlider.create(html5Slider, {
            start: [0, 100],
            connect: true,
            range: {
                'min': 0,
                'max': 500
            }
        });

        var inputNumber = document.getElementById('input-number');
        var select = document.getElementById('input-select');

        html5Slider.noUiSlider.on('update', function(values, handle) {
            var value = values[handle];

            if (handle) {
                inputNumber.value = value;
            } else {
                select.value = Math.round(value);
            }
        });
        select.addEventListener('change', function() {
            html5Slider.noUiSlider.set([this.value, null]);
        });
        inputNumber.addEventListener('change', function() {
            html5Slider.noUiSlider.set([null, this.value]);
        });


        /* carousel */
        var swiper = new Swiper('.swiper-products', {
            slidesPerView: 'auto',
            spaceBetween: 0,
            pagination: 'false'
        });

    });
</script>
@yield('js')
