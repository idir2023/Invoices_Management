<?php

namespace App\Notifications;

use App\Models\invoices;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Add_invoice_new extends Notification
{
    use Queueable;
    private $invoices;

    public function __construct(invoices $invoices)
    {
        $this->invoices=$invoices;
    }

  
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toDatabase($notifiable)
    {
        return [
            'id'=>$this->invoices->id,
            'title'=>'تم إضافة فاتورة جديدة بواسطة :',
            'user'=>auth()->user()->name,
            ];
    }
}
