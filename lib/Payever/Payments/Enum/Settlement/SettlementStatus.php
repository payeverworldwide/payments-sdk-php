<?php

namespace Payever\Sdk\Payments\Enum\Settlement;

class SettlementStatus
{
    const OPEN = 'open';
    const FAILED = 'failed';
    const RETURN = 'return';
    const PAIDOUT = 'paidout';
}
