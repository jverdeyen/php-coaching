!SLIDE center cover
![background](../img/background-mail.jpg)
# mail() vs. Swift Mailer


!SLIDE
# gebruik Swift Mailer
* niet vatbaar voor header injection
* flexibel (smtp, sendmail, postfix, ..)
* makkelijk MIME compliant HTML/multipart emails
* efficienter bij mass mails
* zowel text/html

of een andere mail library ipv mail()

.notes Multipurpose Internet Mail Extension (MIME), 1992 IETF (internet engineering task force) , niet text email bijlagen

!SLIDE
# gebruik Swift Mailer

    @@@ php
    require_once 'lib/swift_required.php';

    $message = Swift_Message::newInstance()

      ->setSubject('Your subject')

      ->setFrom(array('john@doe.com' => 'John Doe'))

      ->setTo(array('receiver@domain.org', 'other@domain.org' => 'A name'))

      ->setBody('Here is the message itself')

      ->addPart('<q>Here is the message itself</q>', 'text/html')

      ->attach(Swift_Attachment::fromPath('my-document.pdf'))
      ;

!SLIDE
# via mail() .. ramp!

    @@@ php
    //define the receiver of the email
    $to = 'youraddress@example.com';
    //define the subject of the email
    $subject = 'Test email with attachment';
    //create a boundary string. It must be unique
    //so we use the MD5 algorithm to generate a random hash
    $random_hash = md5(date('r', time()));
    //define the headers we want passed. Note that they are separated with \r\n
    $headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com";
    //add boundary string and mime type specification
    $headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
    //read the atachment file contents into a string,
    //encode it with MIME base64,
    //and split it into smaller chunks
    $attachment = chunk_split(base64_encode(file_get_contents('attachment.zip')));
    //define the body of the message.
    ob_start(); //Turn on output buffering
    ?>
    --PHP-mixed-<?php echo $random_hash; ?>
    Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>"

    ...

!SLIDE
# MIME?
* tekst in characters sets anders dan ASCII
* niet tekst bijlagen (zip, jpg, ..)
* message bodies in meerdere delen
* header informatie in niet-ASCII character sets

!SLIDE
# externe services
* mandrill
* sendblaster
* ..