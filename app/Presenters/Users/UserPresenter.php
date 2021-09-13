<?php

namespace App\Presenters\Users;

use App\Presenters\Presenter;
use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter {

    public function getId()
    {
        return $this->model->id;
    }

    public function link()
    {
        return new HtmlString("<a href=" . route('user.show', $this->model->id) . ">" . $this->model->name ."</a>");
    }

    public function getTags()
    {
        return $this->model->tags->pluck('name')->implode(', ');
    }

    public function getNote()
    {
        return $this->model->note->body ?? '';
    }

    public function getRoles()
    {
        return $this->model->roles->pluck('display_name')->implode(', ');
    }
}