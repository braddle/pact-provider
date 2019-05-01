<?php
declare(strict_types=1);

namespace Braddle\Test\Provider;

use PhpPact\Standalone\ProviderVerifier\Model\VerifierConfig;
use PhpPact\Standalone\ProviderVerifier\Verifier;
use PHPUnit\Framework\TestCase;
use Slim\Http\Uri;

class PersonTest extends TestCase
{
    public function testGetPersonById()
    {
        $config = new VerifierConfig();
        $config
            ->setProviderName('personProvider')
            ->setProviderVersion('1.0.0')
            ->setProviderBaseUrl(Uri::createFromString('http://localhost:58000')) // URL of the Provider.
            ->setBrokerUri(Uri::createFromString('http://localhost')) // URL of the Pact Broker to publish results.
            ->setPublishResults(false)
            ->setProcessTimeout(60)
            ->setProcessIdleTimeout(10)
            ->setVerbose(true);

        $verifier = new Verifier($config);
        $verifier->verifyFiles([__DIR__ . "/../pacts/personconsumer-personprovider.json"]);


        $this->assertTrue(true, 'Pact Verification has failed.');
    }
}
