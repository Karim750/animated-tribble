<?php

namespace Hackathon\LevelK;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @TODO :
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        $a = 97;
        while ($a <= 122)
        {
            $b = 97;
            while ($b <= 122)
            {
                $c = 97;
                while ($c <= 122)
                {
                    $d = 97;
                    while ($d <= 122)
                    {
                        $ca = chr($a);
                        $cb = chr($b);
                        $cc = chr($c);
                        $cd = chr($d);
                        $s = $ca . $cb . $cc . $cd;
                        if (md5($s) == $this->hash)
                        {
                            $this->origin = $s;
                            return;
                        }
                        else if (crc32($s) == $this->hash)
                        {
                            $this->origin = $s;
                            return;
                        }
                        else if (base64_encode($s) == $this->hash)
                        {
                            $this->origin = $s;
                            return;
                        }
                        else if (sha1($s) == $this->hash)
                        {
                            $this->origin = $s;
                            return;
                        }
                        $d++;
                    }
                    $c++;

                }
                $b++;

            }
            $a++;
        }
    }
}