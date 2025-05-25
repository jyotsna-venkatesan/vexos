<script>
  // Timeline data
  const timelineEvents = [
    {
      year: "2019",
      description: "Vexos was founded with a vision to revolutionize workflow automation."
    },
    {
      year: "2020",
      description: "Launched our first enterprise solution with overwhelming success."
    },
    {
      year: "2021",
      description: "Expanded operations to three new continents with growing team."
    },
    {
      year: "2022",
      description: "Recognized with prestigious industry awards for technology innovation."
    },
    {
      year: "2023",
      description: "Setting new standards with AI-powered solutions and expanded partnerships."
    }
  ];
</script>

<section class="py-64 px-4 md:px-8 lg:px-16 bg-dark text-light">
  <div class="max-w-7xl mx-auto">
    <!-- heading -->
    <h2 class="text-light sm:text-3xl md:text-5xl lg:text-5xl text-3xl pb-12">Our Timeline</h2>

    <!-- the timeline -->
    <div class="w-full max-w-7xl mx-auto relative">
      <!-- laptop timeline -->
      <div class="hidden md:flex flex-col items-center w-full relative">
        <!-- Horizontal line -->
        <div class="absolute top-3 w-full h-0.5 bg-light/50 z-0"></div>

        <div class="flex justify-between w-full">
          {#each timelineEvents as event}
            <div class="flex flex-col items-center relative w-1/5 text-center px-2">
              <!-- Dot with dark background to create line break effect -->
              <div class="relative">
                <div class="absolute top-3 w-10 h-0.5 bg-dark z-5" style="left: -9px;"></div>
                <div class="w-6 h-6 rounded-full bg-gradient-to-br from-[#E2145C] to-[#7C0B33] shadow-md z-10 mb-6 relative"></div>
              </div>

              <!-- Content -->
              <div class="text-light">
                <div class="text-md opacity-70 mb-2">{event.year}</div>
                <p class="text-md max-w-[200px] mx-auto">{event.description}</p>
              </div>
            </div>
          {/each}
        </div>
      </div>


      <!-- mobile timeline -->
      <div class="md:hidden border-l-2 border-light/50 relative">
        {#each timelineEvents as event, index}
          <div class="relative mb-10">
            <!-- Dot with dark background to create line break effect -->
            <div class="relative">
              <!-- Dark background to create break in line -->
              <div class="absolute w-5 h-8 bg-dark -left-3 -top-1"></div>
              <!-- Gradient dot -->
              <div class="w-4 h-4 rounded-full bg-gradient-to-br from-[#E2145C] to-[#7C0B33] shadow-md absolute -left-2 top-1 z-10"></div>
            </div>

            <!-- Content -->
            <div class="pl-6">
              <div class="text-light/70 text-md">{event.year}</div>
              <p class="text-md text-light opacity-80 mt-1">{event.description}</p>
            </div>
          </div>
        {/each}
      </div>


    </div>
  </div>
</section>

<style>
  /* Optional: Hide final connecting line on desktop */
  @media (min-width: 768px) {
    .timeline-item:last-child .timeline-line {
      display: none;
    }
  }
</style>
