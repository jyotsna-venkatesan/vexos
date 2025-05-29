<nav class="sticky top-0 bg-dark backdrop-blur-sm px-6 py-3 shadow-lg flex justify-between items-center z-50">
    <!--logo -->
  <div class="text-xl font-playfair text-light p-2">Vexos</div>

  <!-- Navigation Links -->
  <div class="hidden md:flex space-x-16 text-sm">
      <!-- home link -->
    <a href="/" class="text-light hover:text-orangel relative group py-2" on:click|preventDefault={navigateHome}>
      Home
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-orangel transition-all duration-300 group-hover:w-full"></span>
    </a>
    <!-- the product link -->
    <a href="#product" class="text-light hover:text-orangel relative group py-2" on:click|preventDefault={navigateToProduct}>
      The Product
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-orangel transition-all duration-300 group-hover:w-full"></span>
    </a>

    <!-- about us link -->
    <a href="#about" class="text-light hover:text-orangel relative group py-2" on:click|preventDefault={navigateToAbout}>
      About us
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-orangel transition-all duration-300 group-hover:w-full"></span>
    </a>
  </div>

  <!-- Mobile Menu Button -->
  <button class="md:hidden text-light" on:click={toggleMobileMenu} aria-label="Toggle mobile menu">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
    </svg>
  </button>
</nav>

<!-- Mobile Menu  -->
<div class="bg-dark backdrop-blur-sm bg-opacity-95 text-light p-4 md:hidden sticky top-[56px] z-40 shadow-md {isMobileMenuOpen ? 'block' : 'hidden'}">
  <div class="flex flex-col space-y-3">
    <a href="/" class="py-2 hover:text-orangel" on:click|preventDefault={() => { navigateHome(); closeMobileMenu(); }}>Home</a>
    <a href="#product" class="py-2 hover:text-orangel" on:click|preventDefault={() => { navigateToProduct(); closeMobileMenu(); }}>The Product</a>
    <a href="#about" class="py-2 hover:text-orangel" on:click|preventDefault={() => { navigateToAbout(); closeMobileMenu(); }}>About Us</a>
  </div>
</div>

<script>
  let isMobileMenuOpen = false;

  function toggleMobileMenu() {
    isMobileMenuOpen = !isMobileMenuOpen;
  }

  function closeMobileMenu() {
    isMobileMenuOpen = false;
  }

  function navigateHome() {
    window.history.pushState({}, "", "/");
    // Always scroll to top regardless of current position
    setTimeout(() => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }, 0);
    window.dispatchEvent(new CustomEvent('hashchange'));
  }

  function navigateToProduct() {
    window.history.pushState({}, "", "#product");
    // Using setTimeout to ensure this runs after the current execution cycle
    setTimeout(() => {
      const productSection = document.getElementById('product');
      if (productSection) {
        // Get the element's position and scroll there directly
        const offsetTop = productSection.offsetTop;
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      } else {
        // Fallback to top if section not found
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    }, 0);
    window.dispatchEvent(new CustomEvent('hashchange'));
  }

  function navigateToAbout() {
    window.history.pushState({}, "", "#about");
    // Using setTimeout to ensure this runs after the current execution cycle
    setTimeout(() => {
      const aboutSection = document.getElementById('about');
      if (aboutSection) {
        // Get the element's position and scroll there directly
        const offsetTop = aboutSection.offsetTop;
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      } else {
        // Fallback to top if section not found
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    }, 0);
    window.dispatchEvent(new CustomEvent('hashchange'));
  }
</script>
