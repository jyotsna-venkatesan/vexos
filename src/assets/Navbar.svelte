<nav class="sticky top-0 bg-dark px-6 py-3 shadow-md flex justify-between items-center">
    <!--logo -->
  <div class="text-xl font-alconica text-[#2B2B2B] p-2">vexos</div>

  <!-- Navigation Links -->
  <div class="hidden md:flex space-x-16 text-sm">
      <!-- home link -->
    <a href="/" class="text-light hover:text-pinkl relative group py-2">
      Home
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-pinkl transition-all duration-300 group-hover:w-full"></span>
    </a>
    <!-- the product link -->
    <a href="#what-we-do" class="text-light hover:text-pinkl relative group py-2">
      The Product
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-pinkl transition-all duration-300 group-hover:w-full"></span>
    </a>

    <!-- about us link -->
    <a href="#what-we-do" class="text-light hover:text-pinkl relative group py-2">
      About us
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-pinkl transition-all duration-300 group-hover:w-full"></span>
    </a>
  </div>

  <!-- Mobile Menu Button (Hidden on desktop) -->
  <button class="md:hidden text-[#2B2B2B]" on:click={toggleMobileMenu} aria-label="Toggle mobile menu">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
    </svg>
  </button>
</nav>

<!-- Mobile Menu (Hidden by default) -->
<div class="bg-[#DCD9D5] text-[#2B2B2B] p-4 md:hidden {isMobileMenuOpen ? 'block' : 'hidden'}">
  <div class="flex flex-col space-y-3">
    <a href="#what-we-do" class="py-2 hover:text-[#000000]" on:click={closeMobileMenu}>What We Do</a>
    <a href="#why-vexos" class="py-2 hover:text-[#000000]" on:click={closeMobileMenu}>Why Vexos</a>
    <a href="#team-section" class="py-2 hover:text-[#000000]" on:click={closeMobileMenu}>The Team</a>
    <a href="#footer-section" class="py-2 hover:text-[#000000]" on:click={closeMobileMenu}>Contact</a>
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
</script>
