<?php

namespace Cart\Validation;

function postcode_valid($postcode) {
     if (preg_match('/^[A-Z]{1,2}[0-9]{1,2}[A-Z]?\s[0-9][A-Z]{2}/',$postcode)) {
        return true;
    }
}