<?php
namespace Metrics;

class Stats {

    public static $totalLines = 0;

    public static $blankLines = 0;

    public static $hasCharacters = false;

    public static $filePointer;

    public static $nonWhiteSpaceCharacters = 0;

    public static $chracter;

    public static $singleComments = 0;


    public static function getTotalLines()
    {
        return self::$totalLines;
    }

    public static function getEmptyLines()
    {
        return self::$blankLines;
    }

    public static function getNonwhiteSpaceCharacters()
    {
        return self::$nonWhiteSpaceCharacters;
    }

    public static function character($x,$filepointer)
    {
        self::$chracter = $x;
        self::$filePointer = $filepointer;
        self::countNonWhiteSpaceCharacters();
        self::countNoOfLines();


    }

    public static function line($line)
    {

    }

    protected static function countNoOfLines()
    {

        if(self::checkNoOfLinesCondition()) {
            self::countBlankLines();
            self::$hasCharacters = false;
            self::$totalLines++;
        }
    }

    protected static function countNonWhiteSpaceCharacters()
    {
        if(self::checkNonwhitespaceCondition()) {
            self::$hasCharacters = true;
            self::$nonWhiteSpaceCharacters++;
        }
    }

    protected static function countBlankLines()
    {
         if(!self::$hasCharacters) {
             self::$blankLines++;
         }
    }

    protected static function checkNoOfLinesCondition()
    {
        return ((self::$chracter === "\n")||feof(self::$filePointer));
    }

    protected static function checkNonwhitespaceCondition()
    {
        return (self::checkForSpaceAndTab() && self::checkForNewLineAndEndOfFile());
    }

    protected static function checkForSpaceAndTab()
    {
        return ((self::$chracter !== ' ') && (self::$chracter !== "\t"));
    }

    protected static function checkForNewLineAndEndOfFile()
    {
        return ((self::$chracter !== "\r") && (self::$chracter !== "\n") && (!feof(self::$filePointer)));
    }

    //protected static




}