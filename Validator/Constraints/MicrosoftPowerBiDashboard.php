<?php

namespace Oro\Bundle\MicrosoftPowerBiDashboardBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class MicrosoftPowerBiDashboard extends Constraint
{
    public string $blankMessage = 'This value should not be blank.';

    public string $patternMessage = 'This value is not valid. Url should start with "https://app.powerbi.com/reportEmbed?"';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return [self::CLASS_CONSTRAINT];
    }
}
