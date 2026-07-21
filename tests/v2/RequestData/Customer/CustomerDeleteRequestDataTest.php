<?php

use AbacatePay\v2\RequestData\Customer\CustomerDeleteRequestData;

assertRequestDataQueryString(
  CustomerDeleteRequestData::make('meuID_123'),
  '?id=meuID_123',
);
