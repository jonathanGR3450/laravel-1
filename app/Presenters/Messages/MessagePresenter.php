<?php

namespace App\Presenters\Messages;

use App\Presenters\Presenter;
use Illuminate\Support\HtmlString;

class MessagePresenter extends Presenter {


    public function getName()
    {
        return $this->model->user_id ? $this->userLink() : $this->model->name;
    }

    public function getLastName()
    {
        return $this->model->user_id ? $this->model->user->last_name : $this->model->last_name;
    }

    public function getEmail()
    {
        return $this->model->user_id ? $this->model->user->email : $this->model->email;
    }

    public function getTags()
    {
        return $this->model->tags->pluck('name')->implode(', ');
    }

    public function getNote()
    {
        return $this->model->note->body ?? '';
    }

    public function Getsubject()
    {
        return $this->model->subject;
    }

    public function link()
    {
        return new HtmlString("<a href=" . route('message.show', $this->model) . ">" . $this->model->content ."</a>");
    }

    public function userLink()
    {
        return $this->model->user->present()->link();
    }
}