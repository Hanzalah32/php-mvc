<?php


namespace app\core\form;



class TextareaField extends BaseField
{

    public function renderinput(): string
    {
        return sprintf(
            '<textarea name="%s" class="form-control%s>%s</textarea>',
            $this->attribute,
        );
    }
}
