<?php
/**
 * Template Name: Privacy Policy
 */
get_header();
?>

<main class="bg-primary-100 py-16">
  <div class="max-w-5xl mx-auto px-4">

    <!-- Page Header -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-primary-300 mb-4 ">
        Privacy Policy
      </h1>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Your privacy matters to us. This policy explains how we collect, use and protect your information.
      </p>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 space-y-10">

      <!-- Section -->
      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3">
          1. Information We Collect
        </h2>
        <p class="text-gray-700 leading-relaxed">
          We may collect personal information such as your name, phone number,
          email address, service location and any details you provide when
          booking our cleaning services or contacting us.
        </p>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3">
          2. How We Use Your Information
        </h2>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li>To provide and manage cleaning services</li>
          <li>To respond to inquiries and customer support requests</li>
          <li>To improve our website and services</li>
          <li>To send service-related updates or offers</li>
        </ul>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3">
          3. Cookies & Tracking
        </h2>
        <p class="text-gray-700 leading-relaxed">
          Our website may use cookies to enhance user experience, analyze traffic
          and improve functionality. You can disable cookies through your browser
          settings at any time.
        </p>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3 ">
          4. Data Protection
        </h2>
        <p class="text-gray-700 leading-relaxed">
          We implement appropriate security measures to protect your personal
          information from unauthorized access, alteration, disclosure or misuse.
        </p>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3">
          5. Third-Party Services
        </h2>
        <p class="text-gray-700 leading-relaxed">
          We do not sell or share your personal data with third parties except
          when required to deliver our services or comply with legal obligations.
        </p>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3">
          6. Your Rights
        </h2>
        <p class="text-gray-700 leading-relaxed">
          You have the right to access, update or request deletion of your personal
          information. Please contact us if you wish to exercise these rights.
        </p>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-primary-300 mb-3">
          7. Policy Updates
        </h2>
        <p class="text-gray-700 leading-relaxed">
          We may update this Privacy Policy from time to time. Any changes will be
          posted on this page with an updated revision date.
        </p>
      </section>

      <!-- Contact CTA -->
      <div class="bg-primary-150 rounded-xl p-6 text-center ">
        <p class="text-gray-700 mb-3">
          If you have any questions about this Privacy Policy,
          feel free to contact us.
        </p>
        <a href="<?php echo site_url('/contact'); ?>"
           class="inline-block bg-primary text-white px-6 py-3 rounded-lg shadow hover:shadow-xl transition">
          Contact Us
        </a>
      </div>

    </div>
  </div>
</main>

<?php get_footer(); ?>
