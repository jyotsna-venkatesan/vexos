<script>
  function scrollToContact() {
    const contactSection = document.getElementById('about-contact');
    if (contactSection) {
      contactSection.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>

<section class="w-full pt-48 bg-dark">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
      <!-- text -->
      <div class="text-light">
          <!-- heading -->
        <h2 class="text-light sm:text-3xl md:text-5xl lg:text-5xl text-3xl pb-12">Here's our <span class="text-pinkn">story</span></h2>

        <p class="mb-6 text-md">
            Vexos began with a question: why do businesses have so many tools to manage movement — deliveries, routes, logistics — but almost none to help them decide <span class="text-orangel">where things should go in the first place?</span>
        </p>
        <p class="mb-6 text-md">
          As we looked deeper, it became clear that this wasn't just an oversight — it was a real gap. Across industries, decisions about physical placement were still being made manually, slowly, and often without the right data. The cost of getting it wrong could be huge.
        </p>
        <p class="mb-6 text-md">
          We're two third-year university students who started Vexos to change that. With advancements in AI and access to powerful geospatial data, we saw an opportunity to build a platform that makes location decisions smarter, faster, and easier. Today, with support from HKSTP and the PolyU x HKSTP Micro Fund, we're working to turn that idea into a product that helps organizations confidently answer one of the most fundamental questions: <span class="text-pinkl">where should this go?</span>
        </p>
        <div class="flex space-x-4">
          <button on:click={scrollToContact} class="border border-primary text-primary hover:bg-light hover:text-dark py-2 px-6 rounded-md transition duration-300 inline-block cursor-pointer">
            Contact Us
          </button>
        </div>
      </div>

      <!-- elevator pitch image -->
      <div class="flex justify-center md:justify-end">
        <div class="relative">
          <img
            src="/elevator-pitch.jpeg"
            alt="Vexos Elevator Pitch"
            class="rounded-lg shadow-lg max-w-full h-auto object-cover"
          />
          <div class="absolute -inset-1 bg-primary/20 rounded-md -z-10 blur-md"></div>
        </div>
      </div>
    </div>
  </div>
</section>
