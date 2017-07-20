<?php
namespace ald;

class Push {
    //notification title
    private $title;
 
    //notification message 
    private $message;
 
    //notification image url 
    private $image;

    //notification sound
    private $sound;

    //initializing values in this constructor
    function __construct($title = null, $message = null, $image = null, $sound = "default") {
         $this->title = $title;
         $this->message = $message; 
         $this->image = $image; 
         $this->sound = $sound;
    }
    
    //getting the push notification
    public function getPush() {
        $res = array();

        /*
        | TODO: make it simple!!!!
        */
        
        //ignore if 'title' empty
        if(! $this->title == null)
        {
            $res['title'] = $this->title;
        }

        //ignore if 'body' empty
        if(! $this->message == null)
        {
            $res['body'] = $this->message;
        }

        //ignore if 'icon' empty
        if(! $this->image == null)
        {
            $res['icon'] = $this->image;
        }

        //ignore if 'sound' empty
        if(! $this->sound == null)
        {
            $res['sound'] = $this->sound;
        }
        return $res;
    }
}