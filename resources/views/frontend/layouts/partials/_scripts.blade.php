<!-- JavaScripts -->
<link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="{{ asset('js/app.min.js') }}"></script>

<script type="text/javascript">
    WebFontConfig = {
        google: {families: ['Lato:400,400italic,700,700italic:latin']}
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

@include('frontend.layouts.partials._cookies')

@include('sweet::alert')