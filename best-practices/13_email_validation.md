!SLIDE center cover
# email validatie

!SLIDE
# reguliere expressie

    @@@ php
    if (
        preg_match("/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|
        (?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C
        [\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)
        (?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\
        x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\
        x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))
        (?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D
        \x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-
        \x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*
        \x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+
        (?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|
        (?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[
        (?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})
        |(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::
        [a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]
        {1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::
        [a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})
        (?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::
        (?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?
        (?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]
        ?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|
        (?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD",

        strtolower($mail_address))) { .. }


!SLIDE
# filter_var()

    @@@ php
    filter_var('info@jverdeyen.be', FILTER_VALIDATE_EMAIL);

!SLIDE
nog veel meer filters

* FILTER_VALIDATE_BOOLEAN
* FILTER_VALIDATE_FLOAT
* FILTER_VALIDATE_INT
* FILTER_VALIDATE_IP
* FILTER_VALIDATE_URL
* ..
* + sanitize filters

!SLIDE
# email validatie (extra)
check mailserver

    @@@ php
    private function fConnect(){
        $fp             = @fsockopen($this->mxhost, 25, $errno, $errstr, 5);
        $ms_resp        = "";
        $b_server_found = false;
        if($fp){
            $ms_resp .= $this->send_command($fp, "HELO hi");
            $ms_resp .= $this->send_command($fp, "MAIL FROM:<joeri@jverdeyen.be>");
            $rcpt_text = $this->send_command($fp, "RCPT TO:<{$this->email}>");
            $ms_resp .= $rcpt_text;
            if(substr($rcpt_text, 0, 3) == "250"){
                $b_server_found = true;
            }
            $ms_resp .= $this->send_command($fp, "QUIT");
            fclose($fp);
        }
        return $b_server_found;
    }

!SLIDE
# email validatie (extra)
check MX record

    @@@ php
    private function getMXHost(){
        list($user, $domain) = explode("@", $this->email);
        getmxrr($domain, $hosts, $weights);
        $priority = mt_getrandmax();
        $key      = 0;
        if(empty($weights)){
            return false;
        }
        foreach($weights as $k => $v){
            if($v < $priority){
                $key      = $k;
                $priority = $v;
            }
        }
        return $hosts[$key];
    }