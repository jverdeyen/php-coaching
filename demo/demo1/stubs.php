require_once __DIR__.'/vendor/swiftmailer/swiftmailer/lib/swift_required.php';

$message = \Swift_Message::newInstance()

  ->setSubject('contact form request')

  ->setFrom(array($email => $name))

  ->setTo(array('info@jverdeyen.be' => 'Joeri'))

  ->setBody($message);

$transport = Swift_MailTransport::newInstance();
$mailer = Swift_Mailer::newInstance($transport);
$mailer->send($message);


class DummyTest extends PHPUnit_Framework_TestCase
{

    protected $number = 0;

    public function setUp()
    {
        $this->number = 1;
    }

    public function testNumberOne()
    {
        $this->assertEquals(1, $this->number);
    }
}