<?php

namespace Teertz\Filepath;

class Generator {


    /**
     * Alphabet which will be used for generating new path
     * @var array
     */
    protected $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];


    /**
     * Base directory where we're able to create new directories
     * @var string
     */
    protected $baseDirectory = null;


    /**
     * Generated path
     * @var string
     */
    protected $generatedPath = null;


    /**
     * Initialize module
     * @param [type] $baseDirectory [description]
     * @param array  $alphabet      [description]
     */
    public function __construct($baseDirectory = null, $alphabet = []) {


        /* Set alphabet */
        if ( count($alphabet) > 0 ) $this->alphabet = $alphabet;


        /* Set base directory */
        $this->baseDirectory = $baseDirectory && is_dir($baseDirectory)
                                    ? $baseDirectory
                                    : getcwd();

        if ( mb_substr($this->baseDirectory, -1) != DIRECTORY_SEPARATOR ) $this->baseDirectory .= DIRECTORY_SEPARATOR;

         if ( !is_writeable($this->baseDirectory) ) throw new Exception("Sorry, but directory '{$this->baseDirectory}' isn't writeable.");

        return $this->generate();

    }


    /**
     * Generate and make (if not exists) new directories
     * @return $this
     */
    public function generate() {

        $alphabetSize   = count($this->alphabet) - 1;

        for ( $i = 1; $i <= 3; ++$i ) {

            $this->generatedPath .= $this->alphabet[mt_rand(0, $alphabetSize)]
                                   .$this->alphabet[mt_rand(0, $alphabetSize)]
                                   .$this->alphabet[mt_rand(0, $alphabetSize)]
                                   .DIRECTORY_SEPARATOR;

            if ( !is_dir($this->baseDirectory.$this->generatedPath) ) {

                mkdir($this->baseDirectory.$this->generatedPath, 0777, true);

            }

        }

        return $this;

    }


    /**
     * Get base directory + generated path strng
     * @return string
     */
    public function getFullPath() {

        return $this->baseDirectory.$this->generatedPath;

    }


    /**
     * Get generated path only
     * @return string
     */
    public function getGeneratedPath() {

        return DIRECTORY_SEPARATOR.$this->generatedPath;

    }

}