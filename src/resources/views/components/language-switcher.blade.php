@foreach($allowedLocales as $lang)

    @if($lang === $currentLocale)
        <span class="text-light me-2" style="text-decoration:underline;">{{ strtoupper($lang) }}</span>
    @else
        <a href="{{ route('change.language', ['locale' => app()->getLocale(), 'targetLocale' => $lang]) }}">
            {{ $lang === 'es' ? 'Español' : 'English' }}
        </a>


        dd(route('change.language', ['locale' => app()->getLocale(), 'targetLocale' => $lang]));
    @endif

@endforeach
