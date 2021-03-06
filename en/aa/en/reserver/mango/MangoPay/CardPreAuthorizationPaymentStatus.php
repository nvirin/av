<?php
namespace MangoPay;

/**
 * Pre-authorization payment statuses
 */
class CardPreAuthorizationPaymentStatus
{
    const Canceled = 'CANCELED';
    const Expired = 'EXPIRED';
    const Validated = 'VALIDATED';
    const Waiting = 'WAITING';
}
