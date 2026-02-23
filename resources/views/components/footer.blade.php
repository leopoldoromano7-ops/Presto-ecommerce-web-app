<footer class="site-footer">
  <div class="container p-4">
    <div class="row">
      <!-- Colonna logo + testo centrati -->
      <div class="col-lg-6 col-md-12 mb-4 text-center">
        <div class="footer-logo-section">
          <img src="/logo/logo.png" alt="Logo" class="footer-logo">
        </div>
        <p class="footer-text mt-3">
         {{ __("ui.Project") }}
        </p>
      </div>
      
      <!-- Altre colonne -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="footer-title">{{ __('ui.links') }}</h5>
        <ul class="footer-links">
          <li><a href="{{route('about_us')}}">{{ __('ui.AboutUs') }}</a></li>
          <li><a href="#!">{{ __('ui.Privacy') }}</a></li>
          <li><a href="#!">{{ __('ui.help') }}</a></li>
          
          @auth
          @if(!Auth::user()->is_revisor)
          <li><a href="{{route("formRevisor")}}">{{ __('ui.WorkWithUs') }}</a></li>
          @endif
          @else
          <li><a href="{{route("register")}}">{{ __('ui.Reviewer?') }}</a></li>
          @endauth
        </ul>
      </div>
      
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="footer-title">{{ __('ui.FollowUsOn') }}</h5>
        <ul class="footer-links">
          <li><a href="#!"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
          <li><a href="#!"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
          <li><a href="#!"><i class="bi bi-youtube me-2"></i>YouTube</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="footer-bottom">
  © 2026  <img src="/logo/logo.png" alt="Logo" class="footer-logo-down">
  
</div>
</footer>
