<script>
  const currentYear = new Date().getFullYear();

  function navigateToHome() {
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

<footer class="bg-dark text-white pt-48 md:pt-64 lg:pt-64 pb-8 relative overflow-hidden font-khula" id="footer-section">
  <!-- Background gradient effect -->
  <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent pointer-events-none"></div>

  <!-- Footer content -->
  <div class="container mx-auto px-6 md:px-12 md:max-w-7xl relative z-10">
    <!-- Logo and tagline -->
    <div class="flex flex-col md:flex-row justify-between mb-12 md:mb-16">
      <div class="mb-10 md:mb-0">
        <div class="flex items-center mb-4">
          <span class="text-2xl font-playfair">Vexos</span>
        </div>
        <p class="text-light text-md max-w-md">
          Transforming location intelligence for business growth through AI and geospatial analytics
        </p>
      </div>

      <!-- Contact & Social links -->
      <div class="flex flex-col md:items-end">
        <p class="text-light text-md mb-3">Get in touch</p>

        <!-- Social media icons -->
        <div class="flex space-x-4">
          <a href="https://www.linkedin.com/company/vexos/" target="_blank" rel="noopener noreferrer"
             class="text-white/70 hover:text-[#0077b5] transition-colors"
             aria-label="Visit Vexos LinkedIn page">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Bottom section with links and copyright -->
    <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row md:items-center justify-between">
      <nav class="mb-6 md:mb-0">
        <ul class="flex flex-wrap gap-6">
          <li><a href="/" class="text-md text-light hover:text-white transition-colors" on:click|preventDefault={navigateToHome}>Home</a></li>
          <li><a href="#product" class="text-md text-light hover:text-white transition-colors" on:click|preventDefault={navigateToProduct}>The Product</a></li>
          <li><a href="#about" class="text-md text-light hover:text-white transition-colors" on:click|preventDefault={navigateToAbout}>About Us</a></li>
        </ul>
      </nav>

      <p class="text-light text-md">
        © {currentYear} Vexos All rights reserved.
      </p>
    </div>
  </div>

</footer>
