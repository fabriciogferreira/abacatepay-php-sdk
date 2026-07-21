<?php

use AbacatePay\v2\RequestData\Customer\CustomerGetRequestData;

assertRequestDataQueryString(
  CustomerGetRequestData::make('meuID_123'),
  '?id=meuID_123',
);
