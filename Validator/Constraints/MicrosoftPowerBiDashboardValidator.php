<?php

namespace Oro\Bundle\MicrosoftPowerBiDashboardBundle\Validator\Constraints;

use Oro\Bundle\DashboardBundle\Entity\Dashboard;
use Oro\Bundle\MicrosoftPowerBiDashboardBundle\Model\DashboardEnums;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class MicrosoftPowerBiDashboardValidator extends ConstraintValidator
{
    /**
     * @param Dashboard|object $value
     * @param MicrosoftPowerBiDashboard    $constraint
     *
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value) {
            return;
        }

        if (!$value instanceof Dashboard) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Value must be instance of "%s", "%s" given',
                    Dashboard::class,
                    is_object($value) ? get_class($value) : gettype($value)
                )
            );
        }

        if (!$value->getStartDashboard()) {
            if (!$value->getType()) {
                $this->context->buildViolation($constraint->message)
                    ->atPath('type')
                    ->addViolation();
            } elseif (
                $value->getType()->getId() === DashboardEnums::TYPE_MICROSOFT_POWER_BI
                && !$value->getEmbedUrl()
            ) {
                $this->context->buildViolation($constraint->message)
                    ->atPath('embed_url')
                    ->addViolation();
            }
        }
    }
}
