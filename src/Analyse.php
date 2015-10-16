<?php
/**
 * Created by PhpStorm.
 * User: indika
 * Date: 10/16/15
 * Time: 11:16 PM
 */

namespace Metrics;


class Analyse {

    public static $totalLines = 0;

    public static $blankLines = 0;

    public static $singleComments = 0;

    public static $multiLineComments = 0;

    public static $line;

    public static function getTotalLines()
    {
        return self::$totalLines;
    }

    public static function getEmptyLines()
    {
        return self::$blankLines;
    }

    public static function getAll()
    {
        return  [
                    'no_of_lines' => self::$totalLines,
                    'no_of_blank_lines' => self::$blankLines,
                    'no_of_single_comments' => self::$singleComments,
                    'no_of_multi_comments' => self::$multiLineComments
                ];
    }

    public static function line($line)
    {
        self::$line = $line;
        self::countNoOfLines();
        self::countBlankLines();
        self::countSingleLineComments();
        self::countMultiLineComments();

    }

    protected static function countNoOfLines()
    {
        self::$totalLines++;
    }

    protected static function countBlankLines()
    {
        if(preg_match("/^\s*$/", self::$line)) {

            self::$blankLines++;
        }
    }

    protected static function countSingleLineComments()
    {
        if(preg_match("/^\s*\/\//", self::$line)) {

            self::$singleComments++;
        }

    }

    protected static function countMultiLineComments()
    {
        if(preg_match("/^\s*\/\*/",self::$line)) {
            self::$multiLineComments++;
        }elseif(preg_match("/^\s*\*/",self::$line)) {
            self::$multiLineComments++;
        }
    }

}