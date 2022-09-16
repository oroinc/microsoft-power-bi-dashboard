<?php

namespace Oro\Bundle\MicrosoftPowerBiDashboardBundle\Migrations\Data\ORM;

use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\EntityExtendBundle\Entity\Repository\EnumValueRepository;
use Oro\Bundle\EntityExtendBundle\Migration\Fixture\AbstractEnumFixture;
use Oro\Bundle\EntityExtendBundle\Tools\ExtendHelper;
use Oro\Bundle\MicrosoftPowerBiDashboardBundle\Model\DashboardEnums;

class LoadDashboardTypes extends AbstractEnumFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $className = ExtendHelper::buildEnumValueClassName($this->getEnumCode());
        /** @var EnumValueRepository $enumRepo */
        $enumRepo = $manager->getRepository($className);

        $valuesToInsert = $this->getData();
        $existingValues = $enumRepo->getValues();

        // Removing already existing values that should not be added
        // In case similar extensions like oro/google-data-studio-dashboard are already installed
        foreach ($existingValues as $existingValue) {
            if (array_key_exists($existingValue->getId(), $valuesToInsert)) {
                unset($valuesToInsert[$existingValue->getId()]);
            }
        }
        // Persisting values
        foreach ($valuesToInsert as $id => $name) {
            $priority = match ($id) {
                $this->getDefaultValue() => 1,
                default => 2
            };
            $isDefault = $id === $this->getDefaultValue();
            $enumOption = $enumRepo->createEnumValue($name, $priority, $isDefault, $id);
            $manager->persist($enumOption);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    protected function getData(): array
    {
        return DashboardEnums::DASHBOARD_TYPES;
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultValue(): ?string
    {
        return DashboardEnums::TYPE_WIDGETS;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEnumCode(): string
    {
        return DashboardEnums::DASHBOARD_TYPE_CODE;
    }
}
