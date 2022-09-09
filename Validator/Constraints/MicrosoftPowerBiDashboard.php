<?php

namespace Oro\Bundle\MicrosoftPowerBiDashboardBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class MicrosoftPowerBiDashboard extends Constraint
{
    public string $message = 'This value should not be blank.';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return [self::CLASS_CONSTRAINT];
    }
}
