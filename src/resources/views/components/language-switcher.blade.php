@foreach($allowedLocales as $lang)
    @if($lang === $currentLocale)
        <span class="text-light me-2" style="text-decoration:underline;">{{ strtoupper($lang) }}</span>
    @else
        <a href="{{ route('change.language', ['locale' => $currentLocale, 'targetLocale' => $lang]) }}">
            {{ $lang === 'es' ? 'Español' : 'English' }}
        </a>
    @endif
@endforeach
