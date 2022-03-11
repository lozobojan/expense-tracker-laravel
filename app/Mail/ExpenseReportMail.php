<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpenseReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reportData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reportData)
    {
        $ttData;
    }

    /**his->reportData = $repor
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.expense_report');
    }
}
