<?php

namespace Oro\Bundle\MicrosoftPowerBiDashboardBundle\Model;

/**
 * Storage of enum values for field "type".
 */
final class DashboardEnums
{
    public const DASHBOARD_TYPE_CODE = 'dashboard_type';

    public const TYPE_WIDGETS = 'widgets';
    public const TYPE_MICROSOFT_POWER_BI = 'microsoft_power_bi';

    public const DASHBOARD_TYPES = [
        self::TYPE_WIDGETS => 'Widgets',
        self::TYPE_MICROSOFT_POWER_BI => 'Microsoft Power BI',
    ];
}
