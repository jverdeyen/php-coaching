!SLIDE center cover
![background](../img/background-error_reporting.jpg)
# error_reporting

!SLIDE
# error_reporting

production

    @@@ xorg
    error_reporting = E_ALL & ~E_NOTICE
    log_errors = On
    display_errors = Off

development

    @@@ xorg
    error_reporting = E_ALL & E_STRICT
    log_errors = On
    display_errors = On

.notes E_STRICT deprecated functions zien, notices voor dev


