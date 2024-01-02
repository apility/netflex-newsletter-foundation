<?php 

namespace Netflex\NewsletterFoundation\Contracts;

interface NewsletterEntryListContract
{
    public function newsletterImage();
    public function newsletterTitle();
    public function newsletterSubTitle();
    public function newsletterIntro();
    public function newsletterReadMoreLink();
}