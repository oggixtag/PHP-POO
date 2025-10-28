<?php

namespace NsAppBlog;

class Response
{
    private string $statusCode;
    private string $statusValue;
    private string $status;
    private string $body;
    private string $location = 'index.php?p=';

    //Builder to initialize the state and body of the response
    public function __construct(string $statusCode = '200', string $statusValue = 'OK', string $body = '')
    {
        $this->statusCode = $statusCode;
        $this->statusValue = $statusValue;
        $this->status = $this->statusCode . ' ' . $this->statusValue;
        $this->body = $body;
    }

    // Method for setting HTTP status (code and valued)
    public function setStatus(string $statusCode, string $statusValue): void
    {
        $this->statusCode = $statusCode;
        $this->statusValue = $statusValue;
        $this->status = $this->statusCode . ' ' . $this->statusValue;
    }

    // Method for setting the body of the response
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    // Method for setting location of the response
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function set200(): void
    {
        $this->statusCode = '200';
        $this->statusValue = 'OK';
        $this->status = $this->statusCode . ' ' . $this->statusValue;
        $this->body = 'retur OK';
        $this->location = '200';
        $this->send();
    }

    public function set404(): void
    {
        $this->statusCode = '404';
        $this->statusValue = 'Not Found';
        $this->status = $this->statusCode . ' ' . $this->statusValue;
        $this->body = 'Page not Found';
        $this->location = '404';
        $this->send();
    }

    public function set500(): void
    {
        $this->statusCode = '500';
        $this->statusValue = 'Internal Server Error';
        $this->status = $this->statusCode . ' ' . $this->statusValue;
        $this->body = 'An error occurred';
        $this->location = '500';
        $this->send();
    }


    // Method for sending the response
    public function send(): void
    {
        // Set HTTP status header
        header("HTTP/1.1 " . $this->status);

        // Set localisation
        header('Location:' . $this->location);

        // Print the body of the answer
        echo $this->body;
    }
}
