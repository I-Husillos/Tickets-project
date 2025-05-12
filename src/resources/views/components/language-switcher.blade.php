@foreach($allowedLocales as $lang)

    @if($lang === $currentLocale)
        <span class="text-light me-2" style="text-decoration:underline;">{{ strtoupper($lang) }}</span>
    @else
        <a href="{{ url(app()->getLocale() . '/' . __('routes.change_language') . '/' . $lang) }}">

            {{ $lang === 'es' ? 'Español' : 'English' }}
        </a>


    @endif

@endforeach
