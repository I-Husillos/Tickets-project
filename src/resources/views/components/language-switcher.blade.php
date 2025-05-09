<div class="language-switcher">
    @foreach($allowedLocales as $lang)
        @if($lang === $currentLocale)
            <span class="text-light me-2" style="text-decoration:underline;">{{ strtoupper($lang) }}</span>
        @else
        <a href="{{ route('change.language', ['locale' => $lang, 'targetLocale' => $lang]) }}"
            class="text-light me-2" style="text-decoration:underline;">
            {{ $lang === 'es' ? 'Español' : 'English' }}
        </a>
        @endif
    @endforeach
</div>

