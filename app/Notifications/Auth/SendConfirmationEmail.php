<?php

namespace App\Notifications\Auth;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class SendConfirmationEmail extends VerifyEmailBase implements ShouldQueue
{
    use Queueable;
    private $user;
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        if(static::$toMailCallback){
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
                    ->subject('Email de confirmacao de registro')
                    ->greeting('Saudacoes, ' . $this->user->name)
                    ->line('Este eh o seu email de confirmacao, clique no botao a seguir para confirmar o seu registo.')
                    ->action('Confirmar email', $this->verificationUrl($notifiable))
                    // ->action('Confirmar email', url('/'))
                    ->line('Se voce nao solicitou o link de confirmacao, por favor ignora este email!');
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

            // ANOTACOES PARA REALIZACAO BEM SUCEDIDA DESSA IMPLEMENTACAO de VERIFICACAO DE EMAIL
    /*  
        1 - php artisan make:notification SendConfirmationEmail
        2 - php artisan queue:table   -> Then create new table migration
        3 - php artisan queue:work   ->   No ficheiro .env, vamos definir 'QUEUE_CONNECTION=database'  & com implementacao de ShouldQueue vai organizar os emails
        4 - php artisan vendor:publish --tag=laravel-notifications   ||  Vai modificar o texto da mensagem  no views > vendor
        5 - Modificar .ENV -> "APP_URL=http://localhost:8000"  (Adicionando a porta 8000)  ||  Resolve o bug de Botao de Confirmar Email
        6 - php artisan config:cache
        7 - php artisan serve
    */
}
