<?php

use AbacatePay\v2\Body\Customer\CustomerGetBody;

assertBodyQueryString(
  CustomerGetBody::make('meuID_123'),
  '?id=meuID_123',
);
