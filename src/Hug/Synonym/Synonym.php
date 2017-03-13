<?php

namespace Hug\Synonym;


/*
DEBUG 
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


STRUCTURE DE LA BASE DE DONNEES
CREATE TABLE "thesaurus_fr" (
  "synonymes_id" int(11) NOT NULL,
  "synonymes_racine" tinytext NOT NULL,
  "synonymes_mots" tinytext NOT NULL,
  PRIMARY KEY ("synonymes_id")
);

INFORMATIONS 
http://data.culture.fr/thesaurus/static/thesaurus-w-web-de-donnees
http://www.dicollecte.org/download.php?prj=fr
*/

/**
 *
 */
class Synonym
{
    /**
     * Interroge la base de donnée thesaurus des synonymes (en français)
     * @param string $word mot dont on word des synonymes
     * @return array $Synonyms tableau des synonymes trouvé (tableau vide si aucun synonyme trouvé)
     */
    public static function find($word, $lang = 'en')
    {
        $Synonyms = false;

        try
        {
            # Set default timezone
            date_default_timezone_set('UTC');

            /*
             * SQLITE : http://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
             */

            $DatabasePath = __DIR__ . DIRECTORY_SEPARATOR . 'thesaurus_'.$lang.'.db';
            if(file_exists($DatabasePath) && is_readable($DatabasePath))
            {
                $Synonyms = [];
        
                $file_db = new \PDO('sqlite:'.$DatabasePath);
                
                $file_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                
                $result = $file_db->query('SELECT * FROM thesaurus_'.$lang.' WHERE synonymes_racine = "'.$word.'"');

                foreach ($result as $m)
                {
                    //echo $m['synonymes_id'].' '.$m['synonymes_racine'].' '.$m['synonymes_mots'];
                    // $Synonyms = explode(',', $m['synonymes_mots']);
                    $Synonyms = array_merge($Synonyms, explode(',', $m['synonymes_mots']));
                }
                
                // Close file db connection
                $file_db = null;
            }
            else
            {

            }
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
        }

        return $Synonyms;

    }
}
