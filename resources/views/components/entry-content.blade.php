<x-nnf::content-block>

    @if ($withImage)

        <x-nnf::content-row>
              <x-nnf-image href="{{ url($entry->newsletterReadMoreLink) }}" area="{{ $area }}_image" size="{{ $imageWidth }}" class="{{ $settings['imageClass'] }}"
                  :default="$entry->newsletterImage" />
        </x-nnf::content-row>

        <x-nnf::spacing height="10" />

    @endif

    @if ($withTitle)

        <x-nnf::content-row alignment="{{ $settings['alignment'] }}">
            <x-inline area="{{ $area }}_title" is="div" class="{{ $settings['titleClass'] }}">
                @if($settings['showSubTitle'])
                  <small>{{ $entry->newsletterSubTitle }}</small>
                @endif
                <{{ $settings['titleHeaderSelector'] }}>{{ $entry->newsletterTitle }}</{{ $settings['titleHeaderSelector'] }}>
            </x-inline>
        </x-nnf::content-row>
        <x-nnf::spacing height="10" />

    @endif

    @if ($withContent)

        <x-nnf::content-row alignment="{{ $settings['alignment'] }}">
            <x-inline area="{{ $area }}_content" is="div" class="{{ $settings['contentClass'] }}">
              @if($withentryDescription)
                {!! $entry->newsletterIntro !!}
              @endif
            </x-inline>
        </x-nnf::content-row>

        <x-nnf::spacing height="10" />

        <x-nnf::spacing height="10" />

        <x-nnf::content-row alignment="{{ $settings['alignment'] }}">
            <x-nnf::button class="{{ $settings['buttonClass'] }}" padding="8px 15px" fontSize="14px"
                background="#c39753" color="#000000" fontWeight="normal" text="Les mer &nbsp;&nbsp;<small>&rarr;</small>" href="{{ url($entry->newsletterReadMoreLink) }}" />
        </x-nnf::content-row>

    @endif

</x-nnf::content-block>
