<?php namespace evilportal;
/* Authorized commercial security assessment and educational use only.
 * Artifact: CAPTIVE-LAB-0.1.0-alpha.1
 * Requires written authorization. Collects no form data.
 */
class MyPortal extends Portal
{
    public function handleAuthorization() { parent::handleAuthorization(); }
    public function onSuccess() { parent::onSuccess(); }
    public function showError() { parent::showError(); }
}
