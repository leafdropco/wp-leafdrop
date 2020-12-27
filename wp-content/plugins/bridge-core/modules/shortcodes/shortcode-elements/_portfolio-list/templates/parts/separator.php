<?php

$separator_styles = array();
if($separator_color !== '') {
    $separator_styles[] = 'background-color: '.$separator_color;
}

if($portfolio_separator == "yes"){ ?>
    <div <?php echo bridge_qode_get_inline_style($separator_styles); ?> class="portfolio_separator separator  small <?php echo esc_attr( $portfolio_separator_aignment ); ?>"></div>
<?php }