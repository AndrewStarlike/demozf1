<?php

class Application_Form_Album extends EasyBib_Form
{

    public function init()
    {
        $this->setName('album');

        // create elements
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        $artist = new Zend_Form_Element_Text('artist');
        $artist->setLabel('Artist')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $submit = new Zend_Form_Element_Button('submit');
        $cancel = new Zend_Form_Element_Button('cancel');

        $submit->setLabel('Save')
                ->setAttrib('type', 'submit');
        $cancel->setLabel('Cancel');

        // add elements
        $this->addElements(array(
            $id, $artist, $title, $submit, $cancel
        ));

        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit', 'cancel');
    }

}
