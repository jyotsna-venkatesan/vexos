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
    <div class="max-w-7xl mx-auto pt-24 md:pt-64 lg:pt-12 px-4 sm:px-6 lg:px-8">

        <!-- heading -->
        <h1 class="text-light sm:text-3xl md:text-5xl lg:text-5xl text-3xl pb-6 text-right">Technology Overview</h1>

        <!-- sub text -->
        <p class="text-light text-md pb-12 text-right">Vexos leverages the power of AI to analyze satellite imagery, foot traffic patterns, demographics, and infrastructure data. Unlike conventional routing systems, we provide exact locations, making our insights actionable and relevant across various industries.
</p>

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
                    <div class="relative z-10 text-light h-full flex flex-col justify-center">
                        <p class="font-medium mb-2">The Intelligence Behind Vexos</p>
                        <p class="text-sm opacity-80 mb-1">R&D focus</p>
                        <p class="text-sm opacity-80">Context protocol layer</p>
                    </div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-2xl p-0 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-[200px] sm:col-span-2 lg:col-span-1 overflow-hidden">
                    <!-- first rectangular box - Model Context Protocol -->
                    <div class="text-light h-full flex">
                        <!-- Left content side -->
                        <div class="p-4 sm:p-6 flex-1 flex flex-col justify-between">
                            <div class="text-5xl text-[#E2145C] opacity-90">1</div>
                            <div>
                                <p class="font-medium mb-2">Model Context Protocol (MCP)</p>
                                <ul class="list-none text-sm space-y-1 opacity-80">
                                    <li>Hierarchical Spatial Embeddings</li>
                                    <li>Spatial relationship modeling</li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Right image side -->
                        <div class="w-1/3 p-3 flex items-center">
                            <img src="tech-1.png" alt="Phase 1 Technology" class="h-full w-full object-cover rounded-md shadow-sm" />
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white bg-opacity-10 rounded-2xl p-4 sm:p-6 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg h-[200px] sm:h-auto sm:aspect-square lg:col-start-3 relative overflow-hidden"
                    on:mousemove={handleRightBoxMouseMove}
                    on:mouseleave={handleRightBoxMouseLeave}
                >
                    <!-- second square box - Language Processing -->
                    <!-- orange glow that follows cursor -->
                    <div
                        bind:this={rightGlowElement}
                        class="absolute w-3/4 h-3/4 bg-[#FF7F38] opacity-60 blur-3xl rounded-full transition-all duration-300 ease-out"
                        style="transform: translate({rightGlowX}px, {rightGlowY}px);"
                    ></div>
                    <div class="relative z-10 text-light h-full flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div class="text-5xl text-[#E2145C] opacity-90">2</div>
                            <div class="text-[#E2145C]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-90"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-medium mb-2">Language Processing</p>
                            <ul class="list-none text-sm space-y-1 opacity-80">
                                <li>Leveraging advanced LLMs</li>
                                <li>Intent-to-Parameter Pipeline</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- second row -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="bg-white bg-opacity-10 rounded-2xl p-0 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-[200px] overflow-hidden">
                    <!-- second rectangular box - Geospatial Processing -->
                    <div class="text-light h-full flex">
                        <!-- Left content side -->
                        <div class="p-4 sm:p-6 flex-1 flex flex-col justify-between">
                            <div class="text-5xl text-[#E2145C] opacity-90">3</div>
                            <div>
                                <p class="font-medium mb-2">Geospatial Processing</p>
                                <ul class="list-none text-sm space-y-1 opacity-80">
                                    <li>Multi-source data normalization</li>
                                    <li>Real-Time Feature Extraction</li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Right image side -->
                        <div class="w-1/3 p-3 flex items-center">
                            <img src="tech-3.png" alt="Phase 3 Technology" class="h-full w-full object-cover rounded-md shadow-sm" />
                        </div>
                    </div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-2xl p-0 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-[200px] overflow-hidden">
                    <!-- third rectangular box - Scoring & Action System -->
                    <div class="text-light h-full flex">
                        <!-- Left content side -->
                        <div class="p-4 sm:p-6 flex-1 flex flex-col justify-between">
                            <div class="text-5xl text-[#E2145C] opacity-90">4</div>
                            <div>
                                <p class="font-medium mb-2">Scoring & Action System</p>
                                <ul class="list-none text-sm space-y-1 opacity-80">
                                    <li>Multi-Objective Ranking</li>
                                    <li>Clear trade-off visualization</li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Right image side -->
                        <div class="w-1/3 p-3 flex items-center">
                            <img src="tech-4.png" alt="Phase 4 Technology" class="h-full w-full object-cover rounded-md shadow-sm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
