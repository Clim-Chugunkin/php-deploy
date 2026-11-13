<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;

class OrderCreateNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public Order $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = (new MailMessage)
            ->subject('⌚ Ваш заказ №' . $this->order->id . ' успешно оформлен!')
            ->greeting('Здравствуйте, ' . $this->order->name . '!')
            ->line('Спасибо за покупку в WatchStore. Мы уже начали собирать ваш заказ.')
            ->line('**Детали доставки:**')
            ->line('Адрес: ' . $this->order->address)
            ->line('Способ оплаты: ' . ($this->order->payment_method === 'online' ? 'Онлайн на сайте' : 'При получении'))
            ->line('**Состав заказа:**');

        return $mailMessage
            ->line('**Итоговая сумма: ' . $this->order->total . ' ₽**')
            ->line('Если у вас возникли вопросы, просто ответьте на это письмо.')
            ->salutation('С уважением, команда WatchStore');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
