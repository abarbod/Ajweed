<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use NotificationChannels\MobilyWs\MobilyWsChannel;
use NotificationChannels\MobilyWs\MobilyWsMessage;

class VerifyMobile extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [MobilyWsChannel::class];
    }

    /**
     * Get the text message representation of the notification
     *
     * @param  mixed                                         $notifiable
     * @param \NotificationChannels\MobilyWs\MobilyWsMessage $msg
     *
     * @return \NotificationChannels\MobilyWs\MobilyWsMessage|string
     */
    public function toMobilyWs($notifiable, MobilyWsMessage $msg)
    {
        $url = $this->verificationUrl($notifiable);

        $message = "Click the link to verify your account\n";
        $message .= $url;

        session()->flash('sms-url', $url);

        return $msg->text($message);
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed $notifiable
     *
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify', Carbon::now()->addMinutes(1), ['id' => $notifiable->getKey()]
        );
    }

}
