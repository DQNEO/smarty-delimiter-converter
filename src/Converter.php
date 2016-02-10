<?php
namespace DQNEO\SmartyDelimiterConverter;

class Converter
{
    private $left_dlm;
    private $right_dlm;

    private $new_left_dlm;
    private $new_right_dlm;

    public function __construct(array $from_pair, array $to_pair)
    {
        $this->left_dlm = $from_pair[0];
        $this->right_dlm = $from_pair[1];
        $this->new_left_dlm = $to_pair[0];
        $this->new_right_dlm = $to_pair[1];
    }
    
    public function convert($input)
    {
        if (is_file($input)) {
            $source_content = file_get_contents($input);
        } else if (is_string($input)) {
            $source_content = $input;
        }

        $ldq = preg_quote($this->left_dlm, '~');
        $rdq = preg_quote($this->right_dlm, '~');

        /* Gather all template tags. */
        preg_match_all("~{$ldq}(\s*.*?\s*){$rdq}~s", $source_content, $_match);
        $template_tags = $_match[1];
        /* Split content by template tags to obtain non-template content. */
        $text_blocks = preg_split("~{$ldq}.*?{$rdq}~s", $source_content);
        //var_dump($template_tags, $text_blocks);

        $ret = '';
        $is_in_literal = false;
        $cnt = count($template_tags);
        for ($i = 0; $i < $cnt; $i++) {
            $tag_old = $template_tags[$i];

            if ($is_in_literal) {
                $new_tag =  $this->left_dlm .  $tag_old . $this->right_dlm;
            } else {
                $new_tag =  $this->new_left_dlm . $tag_old . $this->new_right_dlm;
            }

            $ret .= $text_blocks[$i] . $new_tag;

            if (preg_match("~\s*literal~", $tag_old)) {

                $is_in_literal = true;
            }

            if (preg_match("~\s*/literal~", $tag_old)) {

                $is_in_literal = false;
            }
        }

        if (isset($text_blocks[$i])) {
            $ret .= $text_blocks[$i];
        }

        return $ret;
    }
}
