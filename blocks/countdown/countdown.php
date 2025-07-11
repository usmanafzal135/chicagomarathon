<?php
    /**
     * Countdown Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'countdown-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Check class_name for style variant
    $class_name = '';
    $has_class_name = ! empty($block['className']);

    if ($has_class_name) {
        $class_name .= ' ' . $block['className'];
        if ($block['className'] == 'is-style-narrow') { 
            $class_name = ' container max-w-screen-md ';
        } elseif ($block['className'] == 'is-style-full') { 
            $class_name = ' max-w-full ';
        } elseif ($block['className'] == 'is-style-wide') { 
            $class_name = ' container max-w-screen-3xl '; 
        } else {
            $class_name = ' container max-w-screen-xl ';
        }
    } else {
        $class_name = ' container max-w-screen-xl ';
    }

    // Load values.
    $remove_bottom_margin = get_field('remove_bottom_margin');
    $the_event_date = get_field('countdown_to_date', 'option');
    $intro_text = get_field('countdown_intro_text', 'option');
    $alert_id = $id . '-alert';
?>

<section id="<?php echo esc_attr($id); ?>" class="js-hidden alpine-js block-button clearfix <?php get_template_parts( array( 'includes/partials/block-modifiers/bottom-margin' ) ); ?>">
    <div class="container <?php echo esc_attr( $class_name ); ?>">
        <?php if ($the_event_date) { ?>
            <div class="countdown">
                <div id="<?php echo esc_attr($alert_id); ?>" role="alert" aria-live="polite" style="position:absolute; width:0; height:0; clip: rect(0,0,0,0);"></div>
                
                <?php if ($intro_text) : ?>
                <h2 class="h5 text-primary text-center">
                    <?php echo esc_html($intro_text); ?>
                </h2>
                <?php endif; ?>
                
                <div id="time" class="flex justify-center items-center">
                    <script>
                        document.addEventListener('alpine:init', () => {
                            Alpine.data('countdown', () => ({
                                days: 0,
                                hours: 0,
                                minutes: 0,
                                seconds: 0,
                                isCompleted: false,
                                alertElement: null,
                                
                                init() {
                                    const targetDateStr = '<?php echo esc_js($the_event_date); ?>'.replace(' ', 'T') + ' UTC';
                                    this.targetDate = new Date(targetDateStr);
                                    this.alertElement = document.getElementById('<?php echo esc_js($alert_id); ?>');
                                    
                                    this.calculateTime();
                                    this.updateAriaAlert();
                                    
                                    this.timer = setInterval(() => {
                                        this.calculateTime();
                                        this.updateAriaAlert();
                                    }, 1000);
                                    
                                    // Set up hourly alert for screen readers
                                    this.hourlyTimer = setInterval(() => {
                                        this.updateAriaAlert(true);
                                    }, 1000 * 60 * 60);
                                },
                                
                                calculateTime() {
                                    const targetDateStr = '<?php echo esc_js($the_event_date); ?>'.replace(' ', 'T');
                                    this.targetDate = new Date(targetDateStr);

                                    const nowCentral = new Date(
                                        new Date().toLocaleString('en-US', { timeZone: 'America/Chicago' })
                                    );

                                    const diff = this.targetDate - nowCentral;

                                    if (diff <= 0) {
                                        this.days = 0;
                                        this.hours = 0;
                                        this.minutes = 0;
                                        this.seconds = 0;
                                        this.isCompleted = true;
                                        clearInterval(this.timer);
                                        clearInterval(this.hourlyTimer);

                                        if (this.alertElement) {
                                            this.alertElement.textContent = 'The countdown has completed.';
                                        }
                                        return;
                                    }

                                    this.days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                    this.hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    this.minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                    this.seconds = Math.floor((diff % (1000 * 60)) / 1000);
                                },
                                
                                updateAriaAlert(forceUpdate = false) {
                                    // Only update once per minute or on force update to avoid excessive screen reader announcements
                                    if (!this.alertElement) return;
                                    
                                    if (this.isCompleted) {
                                        this.alertElement.textContent = 'Countdown complete. Time remaining: 0 days, 0 hours, 0 minutes, 0 seconds';
                                        return;
                                    }
                                    
                                    // Update on first load, hourly updates, or when seconds are 0
                                    if (forceUpdate || this.seconds === 0 || !this.lastUpdate) {
                                        this.lastUpdate = new Date();
                                        this.alertElement.textContent = `Time remaining: ${this.days} days, ${this.hours} hours, ${this.minutes} minutes, ${this.seconds} seconds`;
                                    }
                                },
                                
                                padNumber(number) {
                                    return number < 10 ? '0' + number : number;
                                }
                            }));
                        });
                    </script>
                    
                    <div x-data="countdown">
                        <div class="flex justify-center items-center w-full">
                            <div class="relative text-primary text-3xl lg:text-5xl text-center px-1">
                                <span x-text="padNumber(days)"></span>
                                <span class="block text-secondary text-xs">days</span>
                            </div>
                            
                            <div class="relative text-primary text-3xl lg:text-5xl text-center px-1">
                                <span x-text="padNumber(hours)"></span>
                                <span class="block text-secondary text-xs">hours</span>
                            </div>
                            
                            <div class="relative text-primary text-3xl lg:text-5xl text-center px-1">
                                <span x-text="padNumber(minutes)"></span>
                                <span class="block text-secondary text-xs">minutes</span>
                            </div>
                            
                            <div class="relative text-primary text-3xl lg:text-5xl text-center px-1">
                                <span x-text="padNumber(seconds)"></span>
                                <span class="block text-secondary text-xs">seconds</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
