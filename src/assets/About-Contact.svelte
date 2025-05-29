<script>
    let email = '';
    let isSubmitting = false;
    let submissionMessage = '';
    let messageType = ''; // 'success' or 'error'

    async function handleSubmit() {
        // Basic email validation
        if (!email || !email.includes('@') || !email.includes('.')) {
            submissionMessage = 'Please enter a valid email address';
            messageType = 'error';
            return;
        }

        isSubmitting = true;
        submissionMessage = '';

        try {
            // Determine if we're in development or production
            const isDevelopment = window.location.hostname === 'localhost' ||
                                  window.location.hostname === '127.0.0.1';

            if (isDevelopment) {
                // In development, simulate success but log to console
                console.log('DEV MODE: Would send email to venkatesanjyotsna@gmail.com with:', email);

                // Wait a moment to simulate network request
                await new Promise(resolve => setTimeout(resolve, 1000));

                // Show success message
                submissionMessage = 'Test mode: Email would be sent to venkatesanjyotsna@gmail.com';
                messageType = 'success';
                email = '';
                return;
            }

            try {
                // Using FormSubmit.co as our form backend - no registration required
                const response = await fetch('https://formsubmit.co/ajax/venkatesanjyotsna@gmail.com', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        subject: "New Vexos Subscription",
                        message: `New subscription request from: ${email}`,
                        _autoresponse: "Thank you for subscribing to Vexos updates!"
                    })
                });

                // Parse the response as JSON (FormSubmit always returns JSON)
                const result = await response.json();

                if (response.ok && result.success) {
                    // Show success message and reset form
                    submissionMessage = 'Thank you! We\'ll keep you updated.';
                    messageType = 'success';
                    email = '';
                } else {
                    throw new Error(result.message || 'Form submission failed. Please try again later.');
                }
            } catch (fetchError) {
                console.error('Submission error:', fetchError);

                // Handle different errors
                if (fetchError instanceof TypeError && fetchError.message.includes('Failed to fetch')) {
                    // Network error - PHP endpoint might not be available yet
                    submissionMessage = 'Our subscription service is temporarily unavailable. Please try again later.';
                } else {
                    submissionMessage = fetchError.message || 'Something went wrong. Please try again later.';
                }

                messageType = 'error';

                // Since we're on GitHub Pages without backend functionality,
                // we'll use the email client option directly
                submissionMessage = 'Our form service is preparing to open your email client...';
                messageType = 'success';

                // Create the mailto link
                const mailtoLink = document.createElement('a');
                mailtoLink.href = `mailto:venkatesanjyotsna@gmail.com?subject=Vexos%20Email%20Subscription&body=Please%20subscribe%20me%20to%20Vexos%20updates:%20${encodeURIComponent(email)}`;

                // Open the mailto link after a brief delay
                setTimeout(() => {
                    if (confirm('Click OK to open your email client to send your subscription request.')) {
                        mailtoLink.click();
                        submissionMessage = 'Thank you for your interest! Please send the email that opened in your email client.';
                        messageType = 'success';
                        email = '';
                    } else {
                        submissionMessage = 'You can try again later or contact us directly at venkatesanjyotsna@gmail.com';
                        messageType = 'error';
                    }
                }, 500);
            }
        } catch (error) {
            console.error('Unexpected error:', error);
            submissionMessage = error.message || 'Something went wrong. Please try again later.';
            messageType = 'error';
        } finally {
            isSubmitting = false;
        }
    }
</script>

<div id="about-contact" class="relative overflow-hidden bg-dark">
    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6">
        <!-- heading -->
        <h1 class="text-light sm:text-3xl md:text-5xl lg:text-5xl text-3xl pb-6"><span class="text-pinkn">Reach out</span> to us</h1>
        <p class="text-light text-md pb-8">Want to share something with us or collaborate?
        Feel free to drop your email here, and we’ll get back to you shortly!</p>

        <div class="max-w-7xl ml-auto">
            <form on:submit|preventDefault={handleSubmit} class="relative">
                <div class="w-full">
                    <input
                        type="email"
                        bind:value={email}
                        placeholder="Enter your email address"
                        class="w-full px-4 py-3 pr-12 rounded-lg bg-white text-dark border border-gray-300 focus:border-pink-500 focus:outline-none placeholder-gray-500 transition-colors"
                        disabled={isSubmitting}
                    />
                    <!-- Gradient arrow button positioned at right end of input box -->
                    <button
                        type="submit"
                        class="absolute right-0 top-0 h-full px-4 rounded-r-lg bg-gradient-to-r from-pink-500 to-orange-500 hover:from-pink-600 hover:to-orange-600 transition-all disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center"
                        disabled={isSubmitting}
                        aria-label="Submit"
                    >
                        {#if isSubmitting}
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        {:else}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        {/if}
                    </button>
                </div>
            </form>

            <!-- Submission message -->
            {#if submissionMessage}
                <div class="mt-4 px-4 py-3 rounded-lg text-right {messageType === 'success' ? 'bg-green-900 bg-opacity-50 text-green-200' : 'bg-red-900 bg-opacity-50 text-red-200'}">
                    {submissionMessage}
                </div>
            {/if}

            <p class="text-gray-400 text-xs mt-4">
                We respect your privacy. Your email will be sent to our team and never shared with third parties.
            </p>

            <!-- Contact info grid with three icons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
                <!-- Email contact -->
                <div class="flex items-center bg-dark/30 p-4 rounded-lg transition-all hover:bg-dark/50 hover:scale-105">
                    <div class="w-12 h-12 rounded-md bg-pinkn flex items-center justify-center mr-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-400 text-xs">Email us</div>
                        <span class="text-light font-medium">vexos.contact@gmail.com</span>
                    </div>
                </div>

                <!-- LinkedIn contact -->
                <a href="https://www.linkedin.com/company/vexos-ai/" target="_blank" rel="noopener noreferrer" class="flex items-center bg-dark/30 p-4 rounded-lg transition-all hover:bg-dark/50 hover:scale-105">
                    <div class="w-12 h-12 rounded-md bg-pinkn flex items-center justify-center mr-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-400 text-xs">Social</div>
                        <span class="text-light font-medium">Check out our LinkedIn</span>
                    </div>
                </a>

                <!-- Phone contact -->
                <div class="flex items-center bg-dark/30 p-4 rounded-lg transition-all hover:bg-dark/50 hover:scale-105">
                    <div class="w-12 h-12 rounded-md bg-pinkn flex items-center justify-center mr-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-gray-400 text-xs">Phone</div>
                        <span class="text-light font-medium">+852 97753135</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
