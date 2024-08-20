<!-- Nav -->
<nav
    class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
    <!-- Logo -->
    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
        href="index.html" aria-label="Electro">
        <img src="{{$appData['app_logo']}}"/>
    </a>
    <!-- End Logo -->

    <!-- Fullscreen Toggle Button -->
    <button id="sidebarHeaderInvokerMenu" type="button"
        class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
        aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
        data-unfold-event="click" data-unfold-hide-on-scroll="false"
        data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
        data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
        data-unfold-duration="500">
        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
            <span class="u-hamburger__inner"></span>
        </span>
    </button>
<!-- End Fullscreen Toggle Button -->
</nav>
<!-- End Nav -->