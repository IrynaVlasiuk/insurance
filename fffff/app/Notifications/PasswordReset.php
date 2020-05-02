<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class PasswordReset extends Notification
{
    use Queueable;
    protected $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Réinitialiser le mot de passe de votre compte GEDOSIN')
            ->greeting('Cher utilisateur,')
                    ->line('Nous avons reçu une demande de réinitialisation du mot de passe de votre compte GEDOSIN. Si vous n’avez pas formulé cette demande, vous pouvez ignorer cet e-mail, nous pouvons vous assurer que votre compte est totalement sécurisé.')
                    ->line('Si vous devez modifier votre mot de passe, vous pouvez utiliser le bouton ci-dessous.')
                    ->action('Réinitialiser votre mot de passe', url('password/reset', $this->token))
                    ->line('En cas de question, n’hésitez pas à prendre contract avec votre interlocuteur habituel.');
        //->markdown('bla');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
