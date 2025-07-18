<?php
$feature_hero = get_field( 'feature_hero' );
$countdown_to_date = get_field('countdown_to_date', 'option');
$countdown_intro_text = get_field( 'countdown_intro_text', 'option');

if ($countdown_to_date){

if ($feature_hero && is_front_page()){
?>
<!-- Counter -->
<div class="absolute bottom-[40px] xl:bottom-[60px] left-1/2 -translate-x-1/2 max-w-full w-full" data-event-datetime="<?php echo esc_attr($countdown_to_date); ?>" id="acf-countdown">
    <p class="text-sm font-semibold text-center text-white"><?php echo esc_html($countdown_intro_text)?></p>
    <div class="counters flex flex-wrap justify-center gap-y-1">
        <div class="single-counter min-w-[82px] xl:min-w-[100px] text-center px-half border-r border-white">
            <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-white mb-half">164</p>
            <p class="counter-title text-sm mb-0 text-white">days</p>
        </div>
        <div class="single-counter min-w-[82px] xl:min-w-[100px] text-center px-half border-r border-white">
            <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-white mb-half">08</p>
            <p class="counter-title text-sm mb-0 text-white">hours</p>
        </div>
        <div class="single-counter min-w-[82px] xl:min-w-[100px] text-center px-half border-r border-white">
            <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-white mb-half">02</p>
            <p class="counter-title text-sm mb-0 text-white">minutes</p>
        </div>
        <div class="single-counter min-w-[82px] xl:min-w-[100px] text-center px-half">
            <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-white mb-half">07</p>
            <p class="counter-title text-sm mb-0 text-white">seconds</p>
        </div>
    </div>
</div>
<?php } else {
    if (is_front_page()){
?>
<!-- Hero Counter -->
<div class="counter-block relative z-[1] mt-1.75 xl:mt-[-85px]" data-event-datetime="<?php echo esc_attr($countdown_to_date); ?>" id="acf-countdown">
    <div class="container flex justify-center">
        <div class="bg-white p-0 xl:px-[30px] xl:py-1.25 xl:shadow-[0px_30px_99px_#00000012]">
            <p class="text-sm font-semibold text-center text-[#515151]"><?php echo esc_html($countdown_intro_text)?></p>
            <div class="counters flex flex-wrap justify-center gap-y-1">
                <div class="single-counter min-w-[82px] xl:min-w-[128px] text-center px-half border-r border-[#DDDDDD]">
                    <p class="counter-count text-[1.75rem] xl:text-[3.375rem] leading-[1.2] font-semibold text-primary mb-half">164</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">days</p>
                </div>
                <div class="single-counter min-w-[82px] xl:min-w-[128px] text-center px-half border-r border-[#DDDDDD]">
                    <p class="counter-count text-[1.75rem] xl:text-[3.375rem] leading-[1.2] font-semibold text-primary mb-half">08</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">hours</p>
                </div>
                <div class="single-counter min-w-[82px] xl:min-w-[128px] text-center px-half border-r border-[#DDDDDD]">
                    <p class="counter-count text-[1.75rem] xl:text-[3.375rem] leading-[1.2] font-semibold text-primary mb-half">02</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">minutes</p>
                </div>
                <div class="single-counter min-w-[82px] xl:min-w-[128px] text-center px-half">
                    <p class="counter-count text-[1.75rem] xl:text-[3.375rem] leading-[1.2] font-semibold text-primary mb-half">07</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">seconds</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<!-- Hero Counter -->
<div class="counter-block relative z-[1] mt-1.75 lg:mt-[-65px] xl:mt-[-85px]" data-event-datetime="<?php echo esc_attr($countdown_to_date); ?>" id="acf-countdown">
    <div class="container flex justify-center lg:justify-start">
        <div class="bg-white p-0 lg:px-[30px] lg:py-1.25 lg:shadow-[0px_30px_99px_#00000012]">
            <p class="text-sm font-semibold text-[#515151] text-center lg:text-left"><?php echo esc_html($countdown_intro_text)?></p>
            <div class="counters flex flex-wrap justify-center gap-y-1">
                <div class="single-counter min-w-[82px] xl:min-w-[90px] text-center px-half border-r border-[#ddd]">
                    <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-primary mb-half">164</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">days</p>
                </div>
                <div class="single-counter min-w-[82px] xl:min-w-[90px] text-center px-half border-r border-[#ddd]">
                    <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-primary mb-half">08</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">hours</p>
                </div>
                <div class="single-counter min-w-[82px] xl:min-w-[90px] text-center px-half border-r border-[#ddd]">
                    <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-primary mb-half">02</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">minutes</p>
                </div>
                <div class="single-counter min-w-[82px] xl:min-w-[90px] text-center px-half">
                    <p class="counter-count text-2xl xl:text-4xl leading-[1.2] font-semibold text-primary mb-half">07</p>
                    <p class="counter-title text-sm mb-0 text-[#6C7381]">seconds</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
}