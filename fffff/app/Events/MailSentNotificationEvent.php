<?php

    namespace App\Events;

    use Illuminate\Broadcasting\Channel;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Broadcasting\PrivateChannel;
    use Illuminate\Broadcasting\PresenceChannel;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

    class MailSentNotificationEvent implements ShouldBroadcast
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;

        protected $emailInstance;
        protected $recepient;
        protected $status;
        protected $header;


        /**
         * Create a new event instance.
         *
         * @return void
         */
        public function __construct($content)
        {
            $this->emailInstance = $content['emailInstance'];
            $this->status = $content['status'];
            $this->recepient = $content['recepient'];
            $this->header = $content['header'];
        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return \Illuminate\Broadcasting\Channel|array
         */
        public function broadcastOn()
        {
            return ['user-'.request()->user()->id];
        }

        public function broadcastAs()
        {
            return 'notification';
        }

        public function broadcastWith()
        {
            return [
                'recipient' => $this->recepient['full_name'],
                'role'      => $this->recepient['role'],
                'status'    => $this->status,
                'header'    => $this->header,
            ];
        }
    }
