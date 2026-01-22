<?php

/**
 * Template Name: Thank You
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleanin_theme
 */

get_header();
?>

<section class="relative min-h-screen flex items-center justify-center py-16 px-4 overflow-hidden bg-gradient-to-br from-primary-300 via-primary to-secondary-300">
    <!-- Decorative circles/ for gradient -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl w-full">
        <div class="text-center mb-12" >
            <!-- Icon/optional -->
            <div class="flex justify-center mb-6">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-2xl">
                <!-- checkmark -->
                    <svg class="w-12 h-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Heading -->
            <p class="text-white font-semibold text-sm uppercase tracking-wide mb-3">Success</p>
            <h1 class="text-4xl lg:text-5xl font-bold text-white mb-5">Thank You!</h1>
            <p class="text-white text-lg lg:text-xl leading-relaxed max-w-2xl mx-auto opacity-95">
                Your booking request has been successfully submitted. Our cleaning team will review your request and contact you within 24-48 hours to confirm your appointment.
            </p>
        </div>

        <!-- Info Box/ optional-->
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-8 lg:p-10 mb-8 shadow-2xl" >
            <h3 class="font-bold text-gray-800 text-xl mb-6 flex items-center justify-center gap-2">
                <svg class="w-6 h-6 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                What happens next?
            </h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-300 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg animate-bounce-loop-up">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 font-medium">Check your email for confirmation</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-300 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg animate-bounce-loop-up">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 font-medium">Our team will contact you soon</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-300 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg animate-bounce-loop-up">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 font-medium">Get ready for a sparkling clean space!</p>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12" >
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-white text-gray-800 font-semibold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Back to Home
            </a>

            <a href="<?php echo esc_url(get_post_type_archive_link('ss_service_single')); ?>"
                class="inline-flex items-center justify-center px-8 py-4 rounded-xl border-2 border-white text-white font-semibold hover:bg-white hover:text-gray-800 transition-all duration-200 shadow-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Browse Services
            </a>
        </div>   
    </div>
</section>

<?php
get_footer();
?>