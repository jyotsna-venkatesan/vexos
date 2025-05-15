<nav class="sticky top-0 bg-[#DCD9D5] px-6 py-3 shadow-md flex justify-between items-center">
    <!--logo -->
  <div class="text-xl font-alconica text-[#2B2B2B] p-2">vexos</div>

  <!-- Navigation Links -->
  <div class="hidden md:flex space-x-8 text-sm">
    <a href="#what-we-do" class="text-[#2B2B2B] hover:text-[#000000] relative group py-2">
      What We Do
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-[#2B2B2B] transition-all duration-300 group-hover:w-full"></span>
    </a>
    <a href="#why-vexos" class="text-[#2B2B2B] hover:text-[#000000] relative group py-2">
      Why Vexos
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-[#2B2B2B] transition-all duration-300 group-hover:w-full"></span>
    </a>
    <a href="#team-section" class="text-[#2B2B2B] hover:text-[#000000] relative group py-2">
      The Team
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-[#2B2B2B] transition-all duration-300 group-hover:w-full"></span>
    </a>
    <a href="#footer-section" class="text-[#2B2B2B] hover:text-[#000000] relative group py-2">
      Contact
      <span class="absolute left-0 bottom-0 h-0.5 w-0 bg-[#2B2B2B] transition-all duration-300 group-hover:w-full"></span>
    </a>
  </div>

  <!-- Mobile Menu Button (Hidden on desktop) -->
  <button class="md:hidden text-[#2B2B2B]" on:click={toggleMobileMenu}>
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
