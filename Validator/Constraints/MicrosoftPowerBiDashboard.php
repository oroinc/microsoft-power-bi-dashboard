<?php

namespace Oro\Bundle\MicrosoftPowerBiDashboardBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class MicrosoftPowerBiDashboard extends Constraint
{
    public string $blankMessage = 'oro.oro_microsoft_power_bi_dashboard.validator.constraints.blank';

    public string $patternMessage = 'oro.oro_microsoft_power_bi_dashboard.validator.constraints.pattern';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return [self::CLASS_CONSTRAINT];
    }
}
