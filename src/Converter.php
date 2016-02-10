<?php
namespace DQNEO\SmartyDelimiterConverter;

class Converter
{
    private $leftDelimiter = '{';
    private $rightDelimiter = '}';

    private $newLdelim = '{';
    private $newRdelim = '}';

    public function convert($input)
    {
        if (is_file($input)) {
            $source_content = file_get_contents($input);
        } else if (is_string($input)) {
            $source_content = $input;
        }

        $ldq = preg_quote($this->leftDelimiter, '~');
        $rdq = preg_quote($this->rightDelimiter, '~');

        /* Gather all template tags. */
        preg_match_all("~{$ldq}(\s*.*?\s*){$rdq}~s", $source_content, $_match);
        $template_tags = $_match[1];
        /* Split content by template tags to obtain non-template content. */
        $text_blocks = preg_split("~{$ldq}.*?{$rdq}~s", $source_content);
        //var_dump($template_tags, $text_blocks);

        $ret = '';
        $inLiteral = false;
        $cnt = count($template_tags);
        for ($i = 0; $i < $cnt; $i++) {
            $tag_old = $template_tags[$i];
            if (preg_match("~\s*literal~", $tag_old)) {

                $inLiteral = true;
            } elseif (preg_match("~\s*/literal~", $tag_old)) {

                $inLiteral = false;
            }

            $new_tag =  $this->newLdelim . $tag_old . $this->newRdelim;
            $ret .= $text_blocks[$i] . $new_tag;
        }

        return $ret;
    }
}
