<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

// class CustomResetPasswordNotification extends Notification
// {
//     use Queueable;

//     /**
//      * Create a new notification instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the notification's delivery channels.
//      *
//      * @param  mixed  $notifiable
//      * @return array
//      */
//     public function via($notifiable)
//     {
//         return ['mail'];
//     }

//     /**
//      * Get the mail representation of the notification.
//      *
//      * @param  mixed  $notifiable
//      * @return \Illuminate\Notifications\Messages\MailMessage
//      */
//     public function toMail($notifiable)
//     {
//         return (new MailMessage)
//                     ->line('The introduction to the notification.')
//                     ->action('Notification Action', url('/'))
//                     ->line('Thank you for using our application!');
//     }

//     /**
//      * Get the array representation of the notification.
//      *
//      * @param  mixed  $notifiable
//      * @return array
//      */
//     public function toArray($notifiable)
//     {
//         return [
//             //
//         ];
//     }
// }

class CustomResetPasswordNotification extends ResetPassword
    {
        /**
        * Get the mail representation of the notification.
        *
        * @param  mixed  $notifiable
        * @return \Illuminate\Notifications\Messages\MailMessage
        */

        protected $actionUrl;

        public function __construct($token)
        {
            $this->actionUrl = route('password.reset', $token);
        }

        public function toMail($notifiable)
        {
            return (new MailMessage)
            ->subject('Notifikasi Reset Kata Laluan')
            ->markdown('custom_reset_password', ['actionUrl' => $this->actionUrl]);
            // ->line('You are receiving this email because we received a password reset request for your account.')
            // ->action('Reset Password', route('password.reset', $this->token))
            // ->line('If you did not request a password reset, no further action is required.');
        }
}
