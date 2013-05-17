!SLIDE center cover
![background](../img/background-mail.jpg)
# mail() vs. Swift Mailer


!SLIDE
# gebruik nooit mail()
* niet vatbaar voor header injection
* flexibel (smtp, sendmail, postfix, ..)
* makkelijk MIME compliant HTML/multipart emails
* efficienter bij mass mails

.notes Multipurpose Internet Mail Extension (MIME), 1992 IETF (internet engineering task force) , niet text email bijlagen

!SLIDE
# MIME?
* tekst in characters sets anders dan ASCII
* niet tekst bijlagen (zip, jpg, ..)
* message bodies in meerdere delen
* header informatie in niet-ASCII character sets