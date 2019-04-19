<?php

# For PHP7
// declare(strict_types=1);

// namespace Hug\Tests\Synonym;

use PHPUnit\Framework\TestCase;

use Hug\Synonym\Synonym as Synonym;

/**
 *
 */
final class SynonymTest extends TestCase
{    

    /* ************************************************* */
    /* ***************** Synonym::find ***************** */
    /* ************************************************* */

    /**
     *
     */
    public function testCanFindSynonymWithDefaultLang()
    {
        $this->assertIsArray(Synonym::find('child'));
    }
    
    /**
     *
     */
    public function testCanFindSynonymWithEnLang()
    {
        $this->assertIsArray(Synonym::find('child', 'en'));
    }

    /**
     *
     */
    public function testCanFindSynonymWithFrLang()
    {
        $this->assertIsArray(Synonym::find('enfant', 'fr'));
    }

    /**
     *
     */
    public function testCannotFindSynonymWithUnknownWord()
    {
        $this->assertIsArray(Synonym::find('coucouillage'));
    }

    /**
     *
     */
    public function testCannotFindSynonymWithWrongInput()
    {
        $this->assertIsArray(Synonym::find(123456789));
    }


}

