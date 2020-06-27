<?php
class ResponseController
{
        public $success;
        public $content;
        public $message;
        public $status;

        const MESSAGE_ERROR_SYSTEM = "Oops! Something is wrong !";
        const MESSAGE_BAD_REQUEST = "Please complete the params!";


        public function __construct($success = null, $content = null, $message = null, $status = null)
        {
                $this->success = $success;
                $this->content = $content;
                $this->message = $message;
                $this->status = $status;
        }
        /**
         * Get the value of content
         */
        public function getContent()
        {
                return $this->content;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        /**
         * Get the value of success
         */
        public function getSuccess()
        {
                return $this->success;
        }

        /**
         * Set the value of success
         *
         * @return  self
         */
        public function setSuccess($success)
        {
                $this->success = $success;

                return $this;
        }

        /**
         * Get the value of message
         */
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        /**
         * Get the value of status
         */
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */
        public function setStatus($status)
        {
                $this->status = $status;
                $message = null;
                switch ($status) {
                        case 400:
                                $message = self::MESSAGE_BAD_REQUEST;
                                break;
                        case 500:
                                $message = self::MESSAGE_ERROR_SYSTEM;
                                break;
                        default:
                                break;
                }
                $this->setMessage($message);
                return $this;
        }
}
