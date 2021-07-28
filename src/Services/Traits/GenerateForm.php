<?php

namespace Coreproc\PaynamicsSdk\Services\Traits;

trait GenerateForm
{
    /**
     * Generate form
     *
     * @return string
     */
    public function generate(): string
    {
        $form = '<form name="paygate_frm" method="POST" action="' . $this->paynamicsClient->getEndpoint() . '">';
        $form .= '<input type="hidden" name="paymentrequest" value="' .  base64_encode($this->toXml()) . '">';
        $form .= '</form>';
        $form .= '<script>document.paygate_frm.submit();</script>';
        return $form;
    }
}
