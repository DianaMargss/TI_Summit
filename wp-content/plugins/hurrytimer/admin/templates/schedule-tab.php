<?php
namespace Hurrytimer;
?>
<div id="hurrytimer-tabcontent-general" class="hurrytimer-tabcontent active">
    <table class="form-table">
        <tr class="form-field hurrytimer-field-mode">
            <td>
                <label for="hurrytimer-mode"><?php _e("Mode", "hurrytimer") ?></label>
            </td>
            <td>
            <label>
                    <input type="radio"
                           name="mode"
                           class="hurrytimer-mode"
                           value="<?php echo C::MODE_REGULAR ?>"
                        <?php checked($campaign->mode, C::MODE_REGULAR) ?>
                    >
                    <?php _e("Regular", "hurrytimer") ?>
                </label>
                <label>
                    <input
                            type="radio"
                            name="mode"
                            class="hurrytimer-mode"
                            value="<?php echo C::MODE_EVERGREEN ?>"
                        <?php checked($campaign->mode, C::MODE_EVERGREEN) ?>
                    >
                    <?php _e("Evergreen", "hurrytimer") ?> <span
                            title="Set a dynamic countdown timer for each visitor."
                            class="hurryt-icon" data-icon="help">
</span>
                </label>
              
            </td>
        </tr>
        <tr class="form-field hurryt-evergreen-mode-subfields hurrytimer-field-duration-wrap hidden">
            <td>
                <label><?php _e('Ends After', "hurrytimer") ?></label>
            </td>
            <td>
                <div class="hurrytimer-field-duration">

                    <label>
                        <?php _e("Days", "hurrytimer") ?>

                        <input type="number"
                               class="hurrytimer-duration"
                               name="duration[]"
                               min="0"
                               data-index="0"
                               value="<?php echo $campaign->duration[0] ?>">
                    </label>
                    <label>
                        <?php _e("Hours", "hurrytimer") ?>
                        <input type="number"
                               class="hurrytimer-duration"
                               name="duration[]"
                               min="0"
                               data-index="1"
                               value="<?php echo $campaign->duration[1] ?>"
                        >

                    </label>
                    <label>
                        <?php _e("Minutes", "hurrytimer") ?>
                        <input type="number"
                               class="hurrytimer-duration"
                               name="duration[]"
                               min="0"
                               data-index="2"
                               value="<?php echo $campaign->duration[2] ?>"
                        >

                    </label>
                    <label>
                        <?php _e("seconds", "hurrytimer") ?>
                        <input type="number"
                               class="hurrytimer-duration"
                               name="duration[]"
                               data-index="3"
                               value="<?php echo $campaign->duration[3] ?>"
                        >

                    </label>
                </div>
            </td>
        </tr>
        <tr class="form-field hidden hurryt-regular-mode-subfields">
            <td><label><?php _e("End Date & Time", "hurrytimer") ?></label></td>
            <td>
                <label for="hurrytimer-end-datetime" class="date">
                    <input type="text" name="end_datetime" autocomplete="off"
                           id="hurrytimer-end-datetime"
                           class="hurrytimer-datepicker"
                           value="<?php echo $campaign->endDatetime ?>"
                    >
                </label>
            </td>
        </tr>
        <tr class="form-field hidden hurryt-evergreen-mode-subfields">
            <td><label for="active"><?php _e("Auto-restart when expired?", "hurrytimer") ?></label></td>
            <td>
                <select name="restart" id="js-hurrytimer-restart-coundown"
                        class="htmr-form__field--m">
                    <option value="<?php echo C::RESTART_NONE ?>" <?php echo selected($campaign->restart,
                        C::RESTART_NONE) ?>>
                        <?php _e("None", "hurrytimer") ?>
                    </option>
                    <option value="<?php echo C::RESTART_IMMEDIATELY ?>" <?php echo selected($campaign->restart,
                        C::RESTART_IMMEDIATELY) ?>>
                        <?php _e("Restart immediately", "hurrytimer") ?>
                    </option>
                    <option value="<?php echo C::RESTART_AFTER_RELOAD ?>" <?php echo selected($campaign->restart,
                        C::RESTART_AFTER_RELOAD) ?>>
                        <?php _e("Restart at the next visit", "hurrytimer") ?>
                    </option>
                </select>
            </td>
        </tr>
    </table>
</div>