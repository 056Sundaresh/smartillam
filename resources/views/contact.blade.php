@extends('layouts.app')

@section('title', $cmsContent['contact.page_title'] ?? 'Contact Smart Illam | Smart Home Consultation')
@section('body-class', 'contact-page')

@section('content')
    <section class="contact-hero" aria-labelledby="contact-hero-title">
        <div class="contact-hero__image" role="img" aria-label="{{ $cmsContent['contact.hero_image_description'] ?? 'Warm, modern living room with smart home controls' }}" style="background-image: url('{{ \Illuminate\Support\Str::startsWith($cmsContent['contact.hero_image'] ?? 'images/contact/contact-hero.png', ['http://', 'https://', 'data:']) ? $cmsContent['contact.hero_image'] : asset($cmsContent['contact.hero_image'] ?? 'images/contact/contact-hero.png') }}')"></div>
        <div class="contact-hero__shade"></div>
        <div class="contact-hero__content">
            <h1 id="contact-hero-title">{{ $cmsContent['contact.hero_title'] ?? 'Let’s Build Your Smart Home' }}</h1>
            <p>{{ $cmsContent['contact.hero_description'] ?? 'Have questions about smart home automation, security, or connected living? Our team is here to help you find the right solution for your home or business.' }}</p>
            <div class="contact-hero__actions">
                <a class="btn site-navbar__cta" href="#contact-form">{{ $cmsContent['contact.hero_primary_button'] ?? 'Book Consultation' }}</a>
                <a class="contact-hero__secondary" href="mailto:{{ $cmsContent['contact.email'] ?? 'buildingcare09@gmail.com' }}?subject=Smart%20Illam%20Brochure%20Request">{{ $cmsContent['contact.hero_secondary_button'] ?? 'Get Brochure' }}</a>
            </div>
        </div>
    </section>

    <section class="contact-form-section" id="contact-form" aria-labelledby="contact-form-title">
        <div class="contact-form-section__content">
            <h2 id="contact-form-title">{{ $cmsContent['contact.form_title'] ?? 'Send us a message' }}</h2>
            <p class="contact-form-section__intro">{{ $cmsContent['contact.form_description'] ?? 'Have a question, need assistance, or looking for the right smart home solution? Fill out the form and our team will get back to you shortly.' }}</p>

            <form class="contact-form" data-contact-form data-contact-email="{{ $cmsContent['contact.email'] ?? 'buildingcare09@gmail.com' }}" data-contact-phone-prefix="{{ $cmsContent['contact.form_phone_prefix'] ?? '+91' }}">
                <label>{{ $cmsContent['contact.form_first_name_label'] ?? 'First Name *' }}<input name="first_name" type="text" autocomplete="given-name" placeholder="{{ $cmsContent['contact.form_first_name_placeholder'] ?? 'Enter your first name' }}" required></label>
                <label>{{ $cmsContent['contact.form_last_name_label'] ?? 'Last Name' }}<input name="last_name" type="text" autocomplete="family-name" placeholder="{{ $cmsContent['contact.form_last_name_placeholder'] ?? 'Enter your last name' }}"></label>
                <label>{{ $cmsContent['contact.form_email_label'] ?? 'Email *' }}<input name="email" type="email" autocomplete="email" placeholder="{{ $cmsContent['contact.form_email_placeholder'] ?? 'Enter your email address' }}" required></label>
                <label>{{ $cmsContent['contact.form_mobile_label'] ?? 'Mobile Number *' }}<span class="contact-form__phone"><span>{{ $cmsContent['contact.form_phone_prefix'] ?? '+91' }}</span><input name="phone" type="tel" autocomplete="tel-national" placeholder="{{ $cmsContent['contact.form_mobile_placeholder'] ?? 'Enter your mobile number' }}" required></span></label>
                <label>{{ $cmsContent['contact.form_service_label'] ?? 'I’m Interested In *' }}<select name="service" required><option value="" selected disabled>{{ $cmsContent['contact.form_service_placeholder'] ?? 'Select a service' }}</option>@foreach (preg_split('/\r\n|\r|\n/', $cmsContent['contact.form_services'] ?? "Smart Home Automation\nSmart Touch Switches\nRetrofit Switches\nSmart Security Systems\nSmart Gate Automation\nOther", -1, PREG_SPLIT_NO_EMPTY) as $service)<option>{{ $service }}</option>@endforeach</select></label>
                <label>{{ $cmsContent['contact.form_method_label'] ?? 'Preferred Contact Method' }}<select name="contact_method"><option value="" selected disabled>{{ $cmsContent['contact.form_method_placeholder'] ?? 'Select a method' }}</option>@foreach (preg_split('/\r\n|\r|\n/', $cmsContent['contact.form_methods'] ?? "Email\nPhone\nWhatsApp", -1, PREG_SPLIT_NO_EMPTY) as $method)<option>{{ $method }}</option>@endforeach</select></label>
                <label class="contact-form__message">{{ $cmsContent['contact.form_requirement_label'] ?? 'Tell us about your requirement' }}<textarea name="requirements" rows="3" placeholder="{{ $cmsContent['contact.form_requirement_placeholder'] ?? 'Briefly describe your project, requirements, or how we can help you.' }}"></textarea></label>
                <button class="contact-form__submit" type="submit">{{ $cmsContent['contact.form_submit_label'] ?? 'Send Message' }}</button>
            </form>
            <p class="contact-form__note" data-contact-form-note hidden>{{ $cmsContent['contact.form_success_message'] ?? 'Message sent successfully!' }}</p>
        </div>
    </section>

    <section class="contact-details" aria-label="{{ $cmsContent['contact.details_label'] ?? 'Contact details' }}">
        <div class="contact-details__grid">
            <a class="contact-detail-card" href="{{ $cmsContent['contact.map_url'] ?? 'https://share.google/XTFKc6t0ACAF0xF2y' }}" target="_blank" rel="noopener noreferrer">
                <span class="contact-detail-card__icon" aria-hidden="true">⌖</span><h2>{{ $cmsContent['contact.address_title'] ?? 'Visit Us' }}</h2>
                <p>{{ $cmsContent['contact.address'] ?? 'D.No.2/950, Plot No.11 B, Periyar Nagar Main Road, Madipakkam, Chennai - 91.' }}</p>
            </a>
            <a class="contact-detail-card" href="mailto:{{ $cmsContent['contact.email'] ?? 'buildingcare09@gmail.com' }}">
                <span class="contact-detail-card__icon" aria-hidden="true">✉</span><h2>{{ $cmsContent['contact.email_title'] ?? 'Drop us an email.' }}</h2><p>{{ $cmsContent['contact.email'] ?? 'buildingcare09@gmail.com' }}</p>
            </a>
            <a class="contact-detail-card" href="tel:{{ preg_replace('/[^0-9+]/', '', $cmsContent['contact.phone'] ?? '+91 9884882032') }}">
                <span class="contact-detail-card__icon" aria-hidden="true">☎</span><h2>{{ $cmsContent['contact.phone_title'] ?? 'Call Us' }}</h2><p>{{ $cmsContent['contact.phone'] ?? '+91 9884882032' }}</p>
            </a>
        </div>
    </section>

    <section class="contact-map" aria-label="{{ $cmsContent['contact.map_section_label'] ?? 'Map to Smart Illam' }}">
        <a class="contact-map__link" href="{{ $cmsContent['contact.map_url'] ?? 'https://share.google/XTFKc6t0ACAF0xF2y' }}" target="_blank" rel="noopener noreferrer">{{ $cmsContent['contact.map_link_text'] ?? 'Open location in Google Maps' }} <span aria-hidden="true">↗</span></a>
        <iframe title="{{ $cmsContent['contact.map_frame_title'] ?? 'Map showing Smart Illam' }}" src="{{ $cmsContent['contact.map_embed_url'] ?? 'https://maps.google.com/maps?q=D.No.2%2F950%2C%20Plot%20No.11%20B%2C%20Periyar%20Nagar%20Main%20Road%2C%20Madipakkam%2C%20Chennai&t=&z=14&ie=UTF8&iwloc=&output=embed' }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
    </section>

    @include('partials.site-footer')
@endsection
