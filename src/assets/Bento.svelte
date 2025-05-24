<script>
    import { onMount } from 'svelte';

    // Variables for left pink glow positioning
    let glowX = -100;
    let glowY = -100;
    let glowElement;

    // Variables for right orange glow positioning
    let rightGlowX = -100;
    let rightGlowY = -100;
    let rightGlowElement;

    // Handle mouse movement to update left box glow position
    function handleMouseMove(event) {
        // Get the position of the mouse relative to the container
        const rect = event.currentTarget.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        // Center the glow on the cursor
        glowX = x - (glowElement?.offsetWidth / 2 || 0);
        glowY = y - (glowElement?.offsetHeight / 2 || 0);
    }

    // Handle mouse movement to update right box glow position
    function handleRightBoxMouseMove(event) {
        // Get the position of the mouse relative to the container
        const rect = event.currentTarget.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        // Center the glow on the cursor
        rightGlowX = x - (rightGlowElement?.offsetWidth / 2 || 0);
        rightGlowY = y - (rightGlowElement?.offsetHeight / 2 || 0);
    }

    // Functions kept for event binding, but intentionally empty
    // so the glows stay where user last positioned them
    function handleMouseLeave() {
        // Intentionally empty - glow stays where user last moved it
    }

    function handleRightBoxMouseLeave() {
        // Intentionally empty - glow stays where user last moved it
    }

    onMount(() => {
        // Initialize glows position
        setTimeout(() => {
            // Position left pink glow in center
            if (glowElement && glowElement.parentElement) {
                const container = glowElement.parentElement;
                glowX = (container.offsetWidth / 2) - (glowElement.offsetWidth / 2);
                glowY = (container.offsetHeight / 2) - (glowElement.offsetHeight / 2);
            }

            // Position right orange glow at top center
            if (rightGlowElement && rightGlowElement.parentElement) {
                const container = rightGlowElement.parentElement;
                rightGlowX = (container.offsetWidth / 2) - (rightGlowElement.offsetWidth / 2);
                rightGlowY = 0 - (rightGlowElement.offsetHeight / 2); // Position at top
            }
        }, 0);
    });
</script>

<div class="relative overflow-hidden bg-dark">
    <div class="max-w-7xl mx-auto pt-48 md:pt-64 lg:pt-80 px-4 sm:px-6 lg:px-8">

        <!-- heading -->
        <h1 class="text-light sm:text-3xl md:text-5xl lg:text-5xl text-3xl pb-12 text-right">Where Vexos Works</h1>

        <div class="w-full flex flex-col gap-4 sm:gap-6">
            <!-- first row -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1fr_2fr_1fr] gap-4 sm:gap-6">
                <div
                    class="bg-white bg-opacity-10 rounded-2xl p-4 sm:p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg h-[200px] sm:h-auto sm:aspect-square relative overflow-hidden"
                    on:mousemove={handleMouseMove}
                    on:mouseleave={handleMouseLeave}
                >
                    <!-- first square box -->
                    <!-- pink glow that follows cursor -->
                    <div
                        bind:this={glowElement}
                        class="absolute w-3/4 h-3/4 bg-[#E2145C] opacity-60 blur-3xl rounded-full transition-all duration-300 ease-out"
                        style="transform: translate({glowX}px, {glowY}px);"
                    ></div>
                    <div class="relative z-10">
                        <!-- Box content -->
                    </div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-2xl p-4 sm:p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-[200px] sm:col-span-2 lg:col-span-1">
                    <!-- first rectangular box -->
                </div>
                <div
                    class="bg-white bg-opacity-10 rounded-2xl p-4 sm:p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg h-[200px] sm:h-auto sm:aspect-square lg:col-start-3 relative overflow-hidden"
                    on:mousemove={handleRightBoxMouseMove}
                    on:mouseleave={handleRightBoxMouseLeave}
                >
                    <!-- second square box -->
                    <!-- orange glow that follows cursor -->
                    <div
                        bind:this={rightGlowElement}
                        class="absolute w-3/4 h-3/4 bg-[#FF7F38] opacity-60 blur-3xl rounded-full transition-all duration-300 ease-out"
                        style="transform: translate({rightGlowX}px, {rightGlowY}px);"
                    ></div>
                    <div class="relative z-10">
                        <!-- Box content -->
                    </div>
                </div>
            </div>

            <!-- second row -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="bg-white bg-opacity-10 rounded-2xl p-4 sm:p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-[200px]">
                    <!-- second rectangular box -->
                </div>
                <div class="bg-white bg-opacity-10 rounded-2xl p-4 sm:p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-[200px]">
                    <!-- third rectangular box -->
                </div>
            </div>
        </div>
    </div>
</div>
