<?php

namespace App\Mail;

use App\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCompanyEntered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The company instance.
     *
     * @var Company
     */
    protected $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notifications@crm.com')
                    ->subject('new company entered!')
                    ->view('emails.new_company')
                    ->with([
                        'companyName' => $this->company->name,
                        'companyEmail' => $this->company->email,
                        'companyWebsite' => $this->company->website,
                    ]);
    }
}
