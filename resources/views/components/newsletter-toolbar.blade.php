<x-nnf::toolbar bodyWidth="100%" contentWidth="100%">

  <x-editor-button
    area="newsletterBackground"
    name="Bakgrunnsfarge"
    description=""
    type="select"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    :options="get_newsletter_theme_colors()"
  >
      <i class="fa fa-pencil"></i> Bakgrunnsfarge
  </x-editor-button>

  @if(content('newsletterBackground', 'text') === 'custom')
    <x-editor-button
      area="newsletterBackgroundColorCode"
      name="Legg inn fargekode"
      description=""
      type="color"
      style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    >
        <i class="fa fa-pencil"></i> Fargekode
    </x-editor-button>
  @endif

</x-nnf::toolbar>
