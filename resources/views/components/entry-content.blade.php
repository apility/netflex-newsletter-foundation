<x-netflex-newsletter-foundation::content-block>

    @if ($withImage)

        <x-netflex-newsletter-foundation::content-row>
              <x-netflex-newsletter-foundation::image href="{{ url($entry->newsletterReadMoreLink) }}" area="{{ $area }}_image" size="{{ $imageWidth }}" class="{{ $settings['imageClass'] }}"
                  :default="$entry->newsletterImage" />
        </x-netflex-newsletter-foundation::content-row>

        <x-netflex-newsletter-foundation::spacing height="10" />

    @endif

    @if ($withTitle)

        <x-netflex-newsletter-foundation::content-row alignment="{{ $settings['alignment'] }}">
            <x-inline area="{{ $area }}_title" is="div" class="{{ $settings['titleClass'] }}">
                @if($settings['showSubTitle'])
                  <small>{{ $entry->newsletterSubTitle }}</small>
                @endif
                <{{ $settings['titleHeaderSelector'] }}>{{ $entry->newsletterTitle }}</{{ $settings['titleHeaderSelector'] }}>
            </x-inline>
        </x-netflex-newsletter-foundation::content-row>
        <x-netflex-newsletter-foundation::spacing height="10" />

    @endif

    @if ($withContent)

        <x-netflex-newsletter-foundation::content-row alignment="{{ $settings['alignment'] }}">
            <x-inline area="{{ $area }}_content" is="div" class="{{ $settings['contentClass'] }}">
              @if($withentryDescription)
                {!! $entry->newsletterIntro !!}
              @endif
            </x-inline>
        </x-netflex-newsletter-foundation::content-row>

        <x-netflex-newsletter-foundation::spacing height="10" />

        <x-netflex-newsletter-foundation::spacing height="10" />

        <x-netflex-newsletter-foundation::content-row alignment="{{ $settings['alignment'] }}">
            <x-netflex-newsletter-foundation::button class="{{ $settings['buttonClass'] }}" padding="8px 15px" fontSize="14px"
                background="#c39753" color="#000000" fontWeight="normal" text="Les mer &nbsp;&nbsp;<small>&rarr;</small>" href="{{ url($entry->newsletterReadMoreLink) }}" />
        </x-netflex-newsletter-foundation::content-row>

    @endif

</x-netflex-newsletter-foundation::content-block>
