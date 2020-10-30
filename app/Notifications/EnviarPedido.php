<?php

namespace App\Notifications;

use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EnviarPedido extends Notification
{
    use Queueable;

    public $pedido;
    public $nome;

    public function __construct($pedido, $nome)
    {
        $this->pedido = $pedido;
        $this->nome = $nome;
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
        $this->pedido['data_pedido'] = (new DateTime($this->pedido['data_pedido']))->format('d/m/Y');
        return (new MailMessage)->markdown('mail.template.enviar-pedido',
        [
            'pedido' => $this->pedido,
            'nome' => $this->nome
        ]);
    }
}
