!SLIDE center cover
# documentatie
![background](../img/background-documentation.jpg)

!SLIDE
# wanneer **GEEN** commentaar schrijven
omdat het kan

    @@@ php
    // find the needle in a heap
    public function findNeedleInHeap(Needle $needle, Heap $heap) { .. }

    // print the given name
    public function printName($name) { .. }

    /**
     * Get the bank account
     */
     public function getBankAccount() { .. }

.notes commentaar is waardeloos, functie is overduidelijk


!SLIDE
# wanneer **GEEN** commentaar schrijven
de slechte functie naam te verdoezelen

    @@@ php
    // Remove items from the Reply as stated in the Request
    // this can be, the number of items returned, total byte size, etc..
    public function cleanReply(Request $request, Reply $reply) { .. }

    // Make sure 'reply' meets the count/byte/etc. limits from the request
    public function enforceLimitsFromRequest(Request $requst, Reply $reply) { .. }

.notes wat betekend clean? wat wordt er gecleaned?

!SLIDE
# wanneer commentaar schrijven
manier van denken uit te leggen

    @@@ php
    // This class is getting messy. Maybe we should create a seperate 'Address' class

    // Looping over these objects seems much faster than using array_map

    // Looks weird, but this is the best solution, see: [link to stackoverflow]

.notes niet iedereen ziet meteen waarom een keuze gemaakt is

!SLIDE
# wanneer commentaar schrijven
om gebreken in de code aan te geven

    @@@ php
    // TODO: use a faster algorithm

    // TODO(joeri): this should also handle other image formats besides JPEG

!SLIDE
# wanneer commentaar schrijven
om gebreken in de code aan te geven

* TODO: dingen die nog gedaan moeten worden
* FIXME: kapotte code
* HACK: toegeving onbevallige oplossing voor probleem
* XXX: gevaar! serieus probleem hier

.notes handig om project search te doen

!SLIDE
# wanneer commentaar schrijven
constanten

    @@@ php
    const IMAGE_QUALITY = 0.72; // gave the best size/quality tradeoff

    const MAX_NUM_THREADS = 8; // should be >= (2 * number of processors)

    const MAX_IMAGE_SIZE_KB = 500;

!SLIDE
# wanneer commentaar schrijven
samenvatten van stukken code

    @@@ php
    // zoek alle item die de klant zelf aangekocht heeft
    for ( .. ) {
        for ( .. ) {
            for ( .. ) {
                ..
            }
        }
    }

.notes opmerking: 3 nested for loops zijn evil

!SLIDE
# samenvatting
* manier van denken uit leggen
* om gebreken in de code aan te geven
* constanten
* samenvatten van stukken code
* onduidelijke stukken code
* uitzonderlijke beslissingen uit te leggen
* algemeen doel van een class te beschrijven

!SLIDE
# hulpmiddelen voor documentatie
* phpDocumentor
* phpdox
* DocBook (End User)

.notes DocBook: hoe de code gebruiken, andere: wat code doet


