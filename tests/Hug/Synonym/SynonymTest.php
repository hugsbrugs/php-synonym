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
        $this->assertInternalType(
            'array',
            Synonym::find('child')
        );
    }
    
    /**
     *
     */
    public function testCanFindSynonymWithEnLang()
    {
        $this->assertInternalType(
            'array',
            Synonym::find('child', 'en')
        );
    }

    /**
     *
     */
    public function testCanFindSynonymWithFrLang()
    {
        $this->assertInternalType(
            'array',
            Synonym::find('enfant', 'fr')
        );
    }

    /**
     *
     */
    public function testCannotFindSynonymWithUnknownWord()
    {
        $this->assertInternalType(
            'array',
            Synonym::find('coucouillage')
        );
    }

    /**
     *
     */
    public function testCannotFindSynonymWithWrongInput()
    {
        $this->assertInternalType(
            'array',
            Synonym::find(123456789)
        );
    }


}

