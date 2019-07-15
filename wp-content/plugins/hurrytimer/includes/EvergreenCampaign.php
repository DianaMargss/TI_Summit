<?php

namespace Hurrytimer;

class EvergreenCampaign extends Campaign
{
    /**
     * @var CookieDetection
     */
    private $cookieDetection;

    /**
     * @var IPDetection
     */
    private $IPDetection;

     const RESET_FLAG = '_hurrytimer_reset_compaign_flag';

    public function __construct($id, $cookieDetection, $IPDetection)
    {
        parent::__construct($id);
        $this->IPDetection     = $IPDetection;
        $this->cookieDetection = $cookieDetection;
    }

    /**
     * Reset timer.
     */
    public function reset()
    {
        $this->IPDetection->forget($this->getId());
        $this->markReset();
    }

    private function markReset(){
	    update_post_meta($this->getId(), self::RESET_FLAG, 1);
    }

    /**
     * Returns client expiration time.
     *
     * @return int
     */
    public function getEndDate()
    {
        // Get expire timestamp if cookie exists.
        $clientEndTimestamp = $this->cookieDetection->find($this->getId());

        // If cookie doesn't exist.
        if (is_null($clientEndTimestamp)) {
            // Fallback to IP detection
            $result = $this->IPDetection->find($this->getId());

            if ($result) {
                // Return IP `client_expires_at`.
                return $result['client_expires_at'];
            }

            // A new cookie will be created from client side
            // containing the expiration timestamp.
            return null;
        }

        $result = $this->IPDetection->find($this->getId());

        if ($result) {
            // Update IP expiration timestamp.
            $this->IPDetection->update( $result['id'], $clientEndTimestamp);
        } else {
            // We create an IP entry.
            $this->IPDetection->create($this->getId(), $clientEndTimestamp);
        }

        return $clientEndTimestamp;
    }

    /**
     * Returns true to force reset timer.
     *
     * @return bool
     */
    public function reseting()
    {
        $reset = filter_var(
            get_post_meta($this->getId(), self::RESET_FLAG, true),
            FILTER_VALIDATE_BOOLEAN
        );

        $isDeleted = delete_post_meta($this->getId(), self::RESET_FLAG);

        // Make sure timer won't reset again before returning reset state.
        return $isDeleted ? $reset : false;
    }

    /**
     * Returns given timer's cookie name.
     *
     * @return string
     */
    public function cookieName()
    {
        return CookieDetection::cookieName($this->getId());
    }
}
