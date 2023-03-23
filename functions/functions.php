<?php

function e($value)
{
  return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

session_start();

if (empty($_SESSION['csrf'])) {
  if (function_exists('random_bytes')) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
  } else if (function_exists('mcrypt_create_iv')) {
    $_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
  } else {
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
  }
}

$safeHtmlTags = array(
  'abbr',
  'article',
  'aside',
  'b',
  'blockquote',
  'br',
  'cite',
  'code',
  'del',
  'em',
  'h1',
  'h2',
  'h3',
  'h4',
  'h5',
  'h6',
  'hr',
  'i',
  'main',
  'mark',
  'pre',
  'q',
  's',
  'samp',
  'section',
  'small',
  'strong',
  'sub',
  'sup',
  'u',
  'xmp'
  );

function sanitizeHtml($string, $safeHtmlTags, $filterAttributes = true)
{
    $string = htmlspecialchars($string);

    if ($filterAttributes) {
        $replace = "<$1$2$4>";
    } else {
        $replace = "<$1$2$3$4>";
    }
    $string = preg_replace("/&lt;\s*(\/?\s*)(".implode("|", $safeHtmlTags).")(\s?|\s+[\s\S]*?)(\/)?\s*&gt;/", $replace, $string);

    return $string;
}

$webmaster = "yourself";

function fileIfPartial($file)
{
  GLOBAL $webmaster;
  if((@include_once $file) === FALSE) 
  {
    echo "<p style=\"color: red;\"><b>$file</b> has not loaded, please contact: <a href=\"mailto:$webmaster\">$webmaster</a></p>";
  }
}

function dump($d = null){
  echo '<pre>';
  var_dump($d);
  echo '</pre>';
  return null;
}
