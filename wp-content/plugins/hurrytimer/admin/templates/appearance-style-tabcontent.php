<?php

namespace Hurrytimer;

use Hurrytimer\Utils\Form;

?>
<div id="hurrytimer-styling-general-tab" class="hurrytimer-subtabcontent">

    <!-- GROUP -->

    <div class="hurrytimer-style-control-group hurrytimer-accordion-item active">

        <div class="hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>General</h3>
        </div>
        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content">

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Display', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <select name="campaign_display">
                        <option value="block" <?php echo selected($campaign->campaignDisplay,
                            'block') ?>><?php _e('Block', 'hurrytimer') ?></option>
                        <option value="inline" <?php echo selected($campaign->campaignDisplay,
                            'inline') ?>><?php _e('Inline', 'hurrytimer') ?></option>
                    </select>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Alignement', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <select name="campaign_align">
                        <option value="left" <?php echo selected($campaign->campaignAlign,
                            'left') ?>><?php _e('Left', 'hurrytimer') ?></option>
                        <option value="right" <?php echo selected($campaign->campaignAlign,
                            'right') ?>><?php _e('Right', 'hurrytimer') ?></option>
                        <option value="center" <?php echo selected($campaign->campaignAlign,
                            'center') ?>><?php _e('Center', 'hurrytimer') ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- GROUP -->

    <div class="hurrytimer-style-control-group hurrytimer-accordion-item">

        <div class="hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>Timer Digit</h3>
        </div>

        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content">

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Color', "hurrytimer") ?>
                </div>

                <div class="hurrytimer-style-control-input">
                    <?php echo Form::colorInput('digit_color', $campaign->digitColor) ?>
                </div>

            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Size', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="digit_size"></div>
                    <input
                            type="number"
                            name="digit_size"
                            max="100"
                            min="0"
                            value="<?php echo $campaign->digitSize ?>"/>
                </div>
            </div>
        </div>
    </div>
    <!-- GROUP -->
    <div class="hurrytimer-style-control-group hurrytimer-accordion-item">
        <div class="hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>Timer Label</h3></div>
        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content">

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label>
                        <?php _e('Size', "hurrytimer") ?>
                    </label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="label_size">
                    </div>
                    <input
                            type="number"
                            min="0"
                            max="100"
                            name="label_size"
                            value="<?php echo $campaign->labelSize ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php echo Form::colorInput('label_color', $campaign->labelColor) ?>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Letter case', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <select name="label_case">
                        <option value="<?php echo C::TRANSFORM_NONE ?>"
                            <?php echo selected($campaign->labelCase, C::TRANSFORM_NONE) ?>>
                            None
                        </option>
                        <option value="<?php echo C::TRANSFORM_UPPERCASE ?>"
                            <?php echo selected($campaign->labelCase, C::TRANSFORM_UPPERCASE) ?>>
                            Uppercase
                        </option>
                        <option value="<?php echo C::TRANSFORM_LOWERCASE ?>"
                            <?php echo selected($campaign->labelCase, C::TRANSFORM_LOWERCASE) ?>>
                            Lowercase
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- GROUP -->
    <div class="hurrytimer-style-control-group hurrytimer-accordion-item">
        <div class="hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>Timer Block
                <?php //removeIf(pro)
                ?>
                <span class="hurryt-locked-feat-label">LOCKED</span>
                <?php //endRemoveIf(pro)
                ?>
            </h3>
        </div>


        <!-- GROUP -->
        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content"
            <?php //removeIf(pro)
            ?>
             data-locked-feat="on"
            <?php //endRemoveIf(pro)
            ?>

        >
            <?php //removeIf(pro)
            ?>
            <div class="hurryt-upgrade-alert hurryt-upgrade-alert-inline">
                <div class="hurryt-upgrade-alert-header">
                    <span class="dashicons dashicons-lock"></span>
                    <h3>Block Customization is a PRO feature</h3></div>
                <div class="hurryt-upgrade-alert-body">Unlock for more advanced design capabilities, including: background color, border, spacing, padding, inline display and more.
                </div>
                <div class="hurryt-upgrade-alert-footer">
                    <a class="hurryt-button button" href="https://hurrytimer.com/pricing?utm_source=plugin&utm_medium=block_design&utm_campaign=upgrade">Upgrade now</a>
                    <a href="https://hurrytimer.com/pricing?utm_source=plugin&utm_medium=block_design&utm_campaign=learn_more" class="button">Learn more</a>
                </div>
            </div>
            <?php //endRemoveIf(pro)
            ?>
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Display', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <select name="block_display">
                        <option value="block" <?php echo selected($campaign->blockDisplay,
                            'block') ?>><?php _e('Block', 'hurrytimer') ?></option>
                        <option value="inline" <?php echo selected($campaign->blockDisplay,
                            'inline') ?>><?php _e('Inline', 'hurrytimer') ?></option>
                    </select>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Background color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php echo Form::colorInput('block_bg_color', $campaign->blockBgColor) ?>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field hurrytimer-field-block-size">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Size (px)', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="block_size"></div>
                    <input
                            type="number"
                            max="200"
                            min="0"
                            name="block_size"
                            value="<?php echo $campaign->blockSize ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Padding (px)', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="block_padding"></div>

                    <input
                            type="number"
                            min="0"
                            max="100"
                            name="block_padding"
                            value="<?php echo $campaign->blockPadding ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Spacing (px)', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="block_spacing"></div>
                    <input
                            type="number"
                            min="0"
                            max="100"
                            name="block_spacing"
                            value="<?php echo $campaign->blockSpacing ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Border color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">

                    <?php echo Form::colorInput('block_border_color',
                        $campaign->blockBorderColor) ?>

                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Border width', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="block_border_width"></div>
                    <input
                            min="0"
                            max="50"
                            type="number"
                            name="block_border_width"
                            value="<?php echo $campaign->blockBorderWidth ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field ">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Border radius', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="block_border_radius"></div>
                    <input
                            type="number"
                            min="0"
                            name="block_border_radius"
                            value="<?php echo $campaign->blockBorderRadius ?>">
                </div>
            </div>
        </div>
    </div>


    <!-- GROUP -->
    <div class="hurrytimer-style-control-group hurrytimer-accordion-item">
        <div class=" hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>Headline</h3></div>
        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content">
        <div class="hurrytimer-style-control-field ">
                    <div class="hurrytimer-style-control-label">
                        <?php _e('Show/Hide', "hurrytimer") ?>
                    </div>
                    <div class="hurrytimer-style-control-input">
                        <?php Utils\Form::toggle('headline_visibility',
                            $campaign->headlineVisibility, 
                            'hurrytimer-headline-visibility'); ?>

                    </div>
                </div>
            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Size', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="headline_size"></div>
                    <input type="number"
                           name="headline_size"
                           min="0"
                           max="100"
                           value="<?php echo $campaign->headlineSize ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">

                    <?php echo Form::colorInput('headline_color', $campaign->headlineColor) ?>

                </div>
            </div>


            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Position', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">

                    <select name="headline_position" id="hurrytimer-headline-position">
                        <option value="<?php echo C::HEADLINE_POSITION_ABOVE_TIMER ?>" <?php echo selected($campaign->headlinePosition,
                            C::HEADLINE_POSITION_ABOVE_TIMER) ?>><?php _e('Above timer',
                                'hurrytimer') ?></option>
                        <option value="<?php echo C::HEADLINE_POSITION_BELOW_TIMER ?>" <?php echo selected($campaign->headlinePosition,
                            C::HEADLINE_POSITION_BELOW_TIMER) ?>><?php _e('Below timer',
                                'hurrytimer') ?></option>
                    </select>

                </div>
            </div>


            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Spacing', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="headline_spacing"></div>
                    <input
                            type="number"
                            name="headline_spacing"
                            max="100"
                            min="0"
                            value="<?php echo $campaign->headlineSpacing ?>"/>
                </div>
            </div>
        </div>
    </div>
    <!-- GROUP -->
    <div class="hurrytimer-style-control-group hurrytimer-accordion-item">
        <div class=" hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>Call to Action </h3></div>
        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content">


           <!-- field -->
           <div class="hurrytimer-style-control-field">
                    <div class="hurrytimer-style-control-label">
                        <?php _e('Show/Hide', "hurrytimer") ?>
                    </div>
                    <div class="hurrytimer-style-control-input">
                        <?php Utils\Form::toggle('call_to_action[enabled]',
                         $campaign->callToAction['enabled'],
                            'hurrytimer-cta-enabled'); ?>
                    </div>
                    
                </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Text', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <input type="text"
                           name="call_to_action[text]"
                           value="<?php echo $campaign->callToAction['text'] ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('URL', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <input type="text"
                           placeholder="http://"
                           name="call_to_action[url]"
                           value="<?php echo $campaign->callToAction['url'] ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Open link in new tab', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php Utils\Form::toggle(
                        'call_to_action[new_tab]',
                        $campaign->callToAction['new_tab'],
                        'hurrytimer-open-new-tab'
                    ); ?>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Text size', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="call_to_action\[text_size\]"></div>
                    <input type="number"
                           name="call_to_action[text_size]"
                           min="0"
                           max="100"
                           value="<?php echo $campaign->callToAction['text_size'] ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Text color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php echo Form::colorInput('call_to_action[text_color]',
                        $campaign->callToAction['text_color']) ?>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Background color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php echo Form::colorInput('call_to_action[bg_color]',
                        $campaign->callToAction['bg_color']) ?>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Radius', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="call_to_action\[border_radius\]"></div>
                    <input type="number"
                           name="call_to_action[border_radius]"
                           min="0"
                           max="100"
                           value="<?php echo $campaign->callToAction['border_radius'] ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Vertical padding', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="call_to_action\[y_padding\]"></div>
                    <input type="number"
                           name="call_to_action[y_padding]"
                           min="0"
                           max="100"
                           value="<?php echo $campaign->callToAction['y_padding'] ?>">
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Horizontal padding', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="call_to_action\[x_padding\]"></div>
                    <input type="number"
                           name="call_to_action[x_padding]"
                           min="0"
                           max="100"
                           value="<?php echo $campaign->callToAction['x_padding'] ?>">
                </div>
            </div>


            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Spacing', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider"
                         data-input-name="call_to_action\[spacing\]"></div>
                    <input
                            type="number"
                            name="call_to_action[spacing]"
                            max="100"
                            min="0"
                            value="<?php echo $campaign->callToAction['spacing'] ?>"/>
                </div>
            </div>
        </div>
    </div>
    <!-- GROUP -->
    <div class="hurrytimer-style-control-group hurrytimer-accordion-item">
        <div class=" hurrytimer-style-control-title hurrytimer-accordion-heading">
            <h3>Sticky bar <?php //removeIf(pro)
                ?>
                <span class="hurryt-locked-feat-label">LOCKED</span>
                <?php //endRemoveIf(pro)
                ?>
            </h3>
        </div>


        <!-- GROUP -->
        <div class="hurrytimer-style-control-fields hurrytimer-accordion-content"
            <?php //removeIf(pro)
            ?>
             data-locked-feat="on"
            <?php
            //endRemoveIf(pro)
            ?>
        >
            <?php //removeIf(pro)
            ?>
            <div class="hurryt-upgrade-alert hurryt-upgrade-alert-inline">
                <div class="hurryt-upgrade-alert-header">
                    <span class="dashicons dashicons-lock"></span>
                    <h3>Sticky Bar is a PRO feature</h3></div>
                <div class="hurryt-upgrade-alert-body">Unlock to pin the countdown timer at the top or bottom of any page.
                </div>
                <div class="hurryt-upgrade-alert-footer">
                    <a class="hurryt-button button"
                       href="https://hurrytimer.com/pricing?utm_source=plugin&utm_medium=stybar_dialog&utm_campaign=upgrade">Upgrade
                        now</a>
                    <a href="https://hurrytimer.com/pricing?utm_source=plugin&utm_medium=stybar_dialog&utm_campaign=learn_more"
                       class="button">Learn more</a>
                </div>
            </div>
            <?php //endRemoveIf(pro)
            ?>
            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Enable', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php Utils\Form::toggle(
                        'enable_sticky',
                        $campaign->enableSticky,
                        'hurrytimer-enable-sticky'
                    ); ?>
                </div>
            </div>
            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Show close button', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <?php Utils\Form::toggle(
                        'sticky_bar_dismissible',
                        $campaign->enableSticky,
                        'hurrytimer-sticky-dismissible'
                    ); ?>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <label><?php _e('Position', "hurrytimer") ?></label>
                </div>
                <div class="hurrytimer-style-control-input">
                    <select name="sticky_bar_position"
                            value="<?php echo $campaign->stickyBarPosition ?>">
                        <option value="top" <?php echo selected($campaign->stickyBarPosition,
                            'top') ?>><?php _e('Top', 'hurrytimer') ?></option>
                        <option value="bottom" <?php echo selected($campaign->stickyBarPosition,
                            'bottom') ?>><?php _e('Bottom', 'hurrytimer') ?></option>
                    </select>
                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Background Color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">

                    <?php echo Form::colorInput('sticky_bar_bg_color',
                        $campaign->stickyBarBgColor) ?>

                </div>
            </div>

            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Padding', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">
                    <div class="hurrytimer-input-slider" data-input-name="sticky_bar_padding"></div>
                    <input
                            type="number"
                            name="sticky_bar_padding"
                            max="100"
                            min="0"
                            value="<?php echo $campaign->stickyBarPadding ?>"/>
                </div>
            </div>
            <!-- #CONTROL -->
            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Close Button Color', "hurrytimer") ?>
                </div>
                <div class="hurrytimer-style-control-input">

                    <?php echo Form::colorInput('sticky_bar_close_btn_color',
                        $campaign->stickyBarCloseBtnColor) ?>

                </div>
            </div>


            <!-- CONTROL -->
            <div class="hurrytimer-style-control-field hurryt-w-full">
                <div class="hurrytimer-style-control-label">
                    <?php _e('Display On', "hurrytimer") ?> <span
                            title='Select on which pages you want to display the sticky bar.'
                            class="hurryt-icon" data-icon="help">
</span>
                </div>
                <div class="hurryt-inline-fields">
                <label for="hurrytStickybarAllPages" class="hurryt-form-control-addon"><input
                                type="radio"
                                id="hurrytStickybarAllPages"
                                class="hurryt-sticky-bar-display-on"
                                value="all_pages"
                                name="sticky_bar_display_on" <?php echo $campaign->stickyBarDisplayOn  === "all_pages" ? 'checked'
                            : '' ?>> All pages</label>
                            <?php if(function_exists('is_product')): ?>
                             <label for="hurrytStickybarWcProductsPages" class="hurryt-form-control-addon "><input
                             id="hurrytStickybarWcProductsPages"
                                type="radio"
                                class="hurryt-sticky-bar-display-on"
                                value="wc_products_pages"
                                name="sticky_bar_display_on" <?php echo $campaign->stickyBarDisplayOn  === "wc_products_pages" ? 'checked'
                            : '' ?>> Selected products</label>
                                <?php endif; ?>

                               <label for="hurrytStickyBarSpecificPages" class="hurryt-form-control-addon"><input
                                type="radio"
                                id="hurrytStickyBarSpecificPages"
                                class="hurryt-sticky-bar-display-on"
                                value="specific_pages"
                                name="sticky_bar_display_on" <?php echo $campaign->stickyBarDisplayOn  === "specific_pages" ? 'checked'
                            : '' ?>>Specific pages...</label>  
                            </div>
            </div>
            <!-- #CONTROL -->

            <div class="hurrytimer-style-control-field hurryt-w-full">
            <div class="hurrytimer-style-control-input hidden hurryt_sticky_bar_pages">
                    <input type="hidden" name="sticky_bar_pages[]" value="[]" >
                    <select name="sticky_bar_pages[]" multiple="multiple"
                            class="hurryt_w-full" placeholder="Select pages">
                        <?php $pages = get_pages(['post_status' => 'publish']); ?>
                        <?php foreach ($pages as $page): ?>
                            <option value="<?php echo $page->ID ?>"
                                <?php echo in_array($page->ID, $campaign->stickyBarPages)
                                    ? 'selected' : '' ?>>
                                <?php echo $page->post_title
                                    ?: '(Untitled)' ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                </div>
        </div>
    </div>
</div>
