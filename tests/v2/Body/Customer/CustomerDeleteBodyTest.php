<?php

use AbacatePay\v2\Body\Customer\CustomerDeleteBody;

assertBodyQueryString(
  CustomerDeleteBody::make('meuID_123'),
  '?id=meuID_123',
);
