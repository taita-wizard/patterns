<?php
$startScript = microtime(true);
$words = str_word_count(file_get_contents($argv[1]), 1);

$voc = file(__DIR__ . '\vocabulary.txt');
$voc = array_flip(array_map('rtrim', $voc));
$fs = new FS($voc);

$startSearch = microtime(true);
$cnt = 0;
foreach ($words as $word) {
    $word = strtoupper($word);
    if (!isset($voc[$word])) {
        $cnt += $fs->findMinLev($word);
    }
}
$timeSearch = microtime(true) - $startSearch;
$timeScript = microtime(true) - $startScript;
print_r($cnt);
//printf(' (%.2Fs, %.2Fs)', $timeScript, $timeSearch);

class FS
{
    /**
     * @var array
     */
    private $indexMap = [];

    public function __construct(array $words)
    {
        foreach ($words as $word => $k) {
            foreach ($this->getNGrams($word) as $part) {
                $this->indexMap[$part][$word] = $word;
            }
        }
    }

    /**
     * @param string $word
     * @param int $n
     * @return array
     */
    protected function getNGrams(string $word = '', int $n = 3) : array
    {
        $ngrams = [];
        $word = "_" . $word . "__";

        for ($j = 0; $j < strlen($word) - ($n - 1); $j++) {
            $ngrams[] = substr($word, $j, $n);
        }
        return $ngrams;
    }

    /**
     * @param $word
     * @return int
     */
    public function findMinLev(string $word) : int
    {
        $foundWords = [];
        foreach ($this->getNGrams($word) as $part) {
            if (isset($this->indexMap[$part])) {
                foreach ($this->indexMap[$part] as $w1) {
                    $foundWords[$w1] = 0 ?? ++$foundWords[$w1];
                }
            }
        }
        $minLev = -1;
        foreach ($foundWords as $k => $v) {
            $lev = levenshtein($k, $word);
            if ($lev == 1) {
                $minLev = $lev;
                break;
            }
            if ($lev < $minLev || $minLev < 0) {
                $minLev = $lev;
            }
        }

        return $minLev;
    }
}