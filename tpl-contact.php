<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

<main class="main">
    <div class="container">
        <div class="section-header">
            <div class="eyebrow"><?php _e('Contact', 'wpdev-portfolio'); ?></div>
            <h1><?php _e('Let\'s build something.', 'wpdev-portfolio'); ?></h1>
            <p><?php _e('Need a WordPress plugin, custom theme, or a strategic WordPress rebuild? Hire a WordPress developer. Send me a message.', 'wpdev-portfolio'); ?></p>
        </div>

        <div class="contact-grid">
            <div class="contact__info">
                <p><?php _e('WordPress developer available for freelance projects, contract work, and technical consultations. I typically respond within 24 hours.', 'wpdev-portfolio'); ?></p>
                <div class="contact__details">
                    <span><?php echo esc_html(get_option('admin_email')); ?></span>
                    <span><?php _e('Remote / Kathmandu', 'wpdev-portfolio'); ?></span>
                </div>
            </div>
            <form class="contact-form" id="contact-form">
                <div class="form-status" id="form-status"></div>
                <input type="text" name="name" placeholder="<?php esc_attr_e('Your name', 'wpdev-portfolio'); ?>" required>
                <input type="email" name="email" placeholder="<?php esc_attr_e('Your email', 'wpdev-portfolio'); ?>" required>
                <textarea name="message" rows="5" placeholder="<?php esc_attr_e('Tell me about your project...', 'wpdev-portfolio'); ?>" required></textarea>
                <button type="submit" class="btn btn--primary" id="form-submit" style="align-self:flex-start;"><?php _e('Send message', 'wpdev-portfolio'); ?></button>
            </form>
        </div>
    </div>
</main>

<?php get_footer(); ?>
