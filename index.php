<?php

function wordBreak($string, $dict) {
  $n = strlen($string);
  if ($n == 0) {
    return true;
  }

  for ($i = 1; $i <= $n; $i++) {
    $prefix = substr($string, 0, $i);
    if (in_array($prefix, $dict) && wordBreak(substr($string, $i), $dict)) {
      return true;
    }
  }

  return false;
}

function printWordBreaks($string, $dict, $output = "") {
  $n = strlen($string);
  if ($n == 0) {
    echo trim($output) . "\n";
    return;
  }

  for ($i = 1; $i <= $n; $i++) {
    $prefix = substr($string, 0, $i);
    if (in_array($prefix, $dict)) {
      printWordBreaks(substr($string, $i), $dict, $output . $prefix . " ");
    }
  }
}

$dict = ["this", "th", "is", "famous", "Word", "break", "b", "r", "e", "a", "k", "br", "bre", "brea", "ak", "problem"];
$string = "Wordbreakproblem";

if (wordBreak($string, $dict)) {
  printWordBreaks($string, $dict);
} else {
  echo "String cannot be broken into words from the dictionary.\n";
}

?>