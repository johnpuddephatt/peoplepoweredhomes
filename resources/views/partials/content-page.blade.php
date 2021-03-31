<div class="container container__tablet">

  @if($page->thumbnail)
    <div class="page--thumbnail">
      {!! $page->thumbnail !!}
    </div>
  @endif

  <div class="content">
    {!! $page->content !!}
  </div>

  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}

</div>
