<footer class="site-footer">
  <div class="container">
    <div class="footer-left">
      @if(get_theme_mod('phonenumber_humans'))
        <h3>Want to talk? Call us on <a href="tel:{{ get_theme_mod('phonenumber_robots')}}">{{ get_theme_mod('phonenumber_humans') }}</a></h3>
      @else
        <h3>Want to talk? <a href="/contact/">Get in touch</a></h3>
      @endif
      @if(get_theme_mod('company_info'))
        <p>{{ get_theme_mod('company_info') }}</p>
      @endif
      @if(get_theme_mod('address'))
        <p>Registered Address {{ get_theme_mod('address') }}</p>
      @endif
    </div>
    <nav class="footer-navigation">
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu($footer_navigation) !!}
      @endif
    </nav>

  </div>
</footer>

<div class="secondary-footer">
  <div class="container container--footer-logos container--desktop">
    <a href="https://www.communityledhomes.org.uk/" class="footer-logo-link xl">
      <img class="footer-logo" src="@asset('images/funders/CommunityLedHomes.jpg')">
    </a>
    <a href="https://www.uk.coop/" class="footer-logo-link medium">
      <img class="footer-logo" src="@asset('images/funders/cuk.png')">
    </a>
    <a href="http://www.thepowertochange.org.uk/" class="footer-logo-link x-wide">
      <img class="footer-logo" src="@asset('images/funders/powertochange.png')">
    </a>
    <a href="http://communityshares.org.uk" class="footer-logo-link medium">
      <img class="footer-logo" src="@asset('images/funders/Community-Shares-logo-b.png')">
    </a>
    <a href="http://www.communitylandtrusts.org.uk/" class="footer-logo-link">
      <img class="footer-logo" src="@asset('images/funders/CLT-b.png')">
    </a>
    <a href="https://www.cch.coop/" class="footer-logo-link wide">
      <img class="footer-logo" src="@asset('images/funders/cch.png')">
    </a>
  </div>
</div>
