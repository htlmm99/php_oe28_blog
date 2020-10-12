<?php

namespace App\Helpers;

class Recusive
{
    private $data;
    private $htmlSlelect = '';
    private $htmlMenu = '';

    public function __construct($data)
    {
        $this->data = $data;

    }

    public function categoryRecusive($parentId, $id = 0, $text = '')
    {
       foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if ( !empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSlelect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlSlelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }
                $this->categoryRecusive($parentId, $value['id'], $text. '--');
            }
        }

        return $this->htmlSlelect;
    }

    public function showMenu($menus, $parentId)
    {
        $arrMenu = [];
        foreach ($menus as $key => $value) {
            if ($value['parent_id'] == $parentId) {
                $arrMenu[] = $value;
                unset($menus[$key]);
            }
        }
        if ($arrMenu) {
            $this->htmlMenu .= '<ul class="sub-menu">';
            foreach ($arrMenu as $value) {
                if ($value->children) {
                    $this->htmlMenu .= '<li class="menu-item ">';
                }
                else {
                    $this->htmlMenu .= '<li class="menu-item">';
                }
                $this->htmlMenu .= '<a href="/category/'.$value->slug.'">'.$value->name.'<span class="border-menu"></span></a>';
                $this->showMenu($menus, $value['id']);
                $this->htmlMenu .= '</li>';
            }
            $this->htmlMenu .= '</ul>';
        }

        return $this->htmlMenu;
    }
}
