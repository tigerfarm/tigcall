<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V2\Service\Channel;

use Twilio\Options;
use Twilio\Values;

abstract class MessageOptions {
    /**
     * @param string $from The identity of the message's author. Defaults to system
     *                     if not specified.
     * @param string $attributes The optional attributes metadata field you can use
     *                           to store any data you wish.
     * @param \DateTime $dateCreated The ISO8601 time specifying the datetime the
     *                               Message should be set as being created.
     * @param \DateTime $dateUpdated The ISO8601 time specifying the datetime the
     *                               Message should be set as having been last
     *                               updated.
     * @param string $lastUpdatedBy Specify the Identity of the User that last
     *                              updated the Message
     * @param string $body The optional message body string.
     * @param string $mediaSid The Media Sid to be attached to this Message.
     * @return CreateMessageOptions Options builder
     */
    public static function create($from = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $lastUpdatedBy = Values::NONE, $body = Values::NONE, $mediaSid = Values::NONE) {
        return new CreateMessageOptions($from, $attributes, $dateCreated, $dateUpdated, $lastUpdatedBy, $body, $mediaSid);
    }

    /**
     * @param string $order Specifies sorting order for messages list, possible
     *                      values are: `asc` or `desc`.
     * @return ReadMessageOptions Options builder
     */
    public static function read($order = Values::NONE) {
        return new ReadMessageOptions($order);
    }

    /**
     * @param string $body The message body string.
     * @param string $attributes The attributes metadata field you can use to store
     *                           any data you wish.
     * @param \DateTime $dateCreated The ISO8601 time specifying the datetime the
     *                               Message should be set as being created.
     * @param \DateTime $dateUpdated The ISO8601 time specifying the datetime the
     *                               Message should be set as having been last
     *                               updated.
     * @param string $lastUpdatedBy Specify the Identity of the User that last
     *                              updated the Message
     * @return UpdateMessageOptions Options builder
     */
    public static function update($body = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $lastUpdatedBy = Values::NONE) {
        return new UpdateMessageOptions($body, $attributes, $dateCreated, $dateUpdated, $lastUpdatedBy);
    }
}

class CreateMessageOptions extends Options {
    /**
     * @param string $from The identity of the message's author. Defaults to system
     *                     if not specified.
     * @param string $attributes The optional attributes metadata field you can use
     *                           to store any data you wish.
     * @param \DateTime $dateCreated The ISO8601 time specifying the datetime the
     *                               Message should be set as being created.
     * @param \DateTime $dateUpdated The ISO8601 time specifying the datetime the
     *                               Message should be set as having been last
     *                               updated.
     * @param string $lastUpdatedBy Specify the Identity of the User that last
     *                              updated the Message
     * @param string $body The optional message body string.
     * @param string $mediaSid The Media Sid to be attached to this Message.
     */
    public function __construct($from = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $lastUpdatedBy = Values::NONE, $body = Values::NONE, $mediaSid = Values::NONE) {
        $this->options['from'] = $from;
        $this->options['attributes'] = $attributes;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['lastUpdatedBy'] = $lastUpdatedBy;
        $this->options['body'] = $body;
        $this->options['mediaSid'] = $mediaSid;
    }

    /**
     * The [identity](https://www.twilio.com/docs/api/chat/guides/identity) of the message's author. Defaults to `system` if not specified.
     * 
     * @param string $from The identity of the message's author. Defaults to system
     *                     if not specified.
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * A metadata field you can use to store any data you wish.  The string value must contain structurally valid JSON if specified.
     * 
     * @param string $attributes The optional attributes metadata field you can use
     *                           to store any data you wish.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The ISO8601 time specifying the datetime the Message should be set as being created. Will be set to the current time by the Chat service if not specified.  Note that this should only be used in cases where a Chat's history is being recreated from a backup/separate source.
     * 
     * @param \DateTime $dateCreated The ISO8601 time specifying the datetime the
     *                               Message should be set as being created.
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The ISO8601 time specifying the datetime the Message should be set as having been last updated. Will be set to the `null` by the Chat service if not specified.  Note that this should only be used in cases where a Chat's history is being recreated from a backup/separate source  and where a Message was previously updated.
     * 
     * @param \DateTime $dateUpdated The ISO8601 time specifying the datetime the
     *                               Message should be set as having been last
     *                               updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * Specify the Identity of the User that last updated the Message (if relevant)
     * 
     * @param string $lastUpdatedBy Specify the Identity of the User that last
     *                              updated the Message
     * @return $this Fluent Builder
     */
    public function setLastUpdatedBy($lastUpdatedBy) {
        $this->options['lastUpdatedBy'] = $lastUpdatedBy;
        return $this;
    }

    /**
     * A string message to send to this channel. You can also send structured data by serializing it into a string. May be empty string or `null`, will be set as empty string as a result in this cases.
     * 
     * @param string $body The optional message body string.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The [Media](https://www.twilio.com/docs/api/chat/rest/media) Sid to be attached to this Message.
     * 
     * @param string $mediaSid The Media Sid to be attached to this Message.
     * @return $this Fluent Builder
     */
    public function setMediaSid($mediaSid) {
        $this->options['mediaSid'] = $mediaSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.IpMessaging.V2.CreateMessageOptions ' . implode(' ', $options) . ']';
    }
}

class ReadMessageOptions extends Options {
    /**
     * @param string $order Specifies sorting order for messages list, possible
     *                      values are: `asc` or `desc`.
     */
    public function __construct($order = Values::NONE) {
        $this->options['order'] = $order;
    }

    /**
     * Specifies sorting order for messages list, possible values are: `asc` or `desc`. If no value is specified, then `asc` is used as the default.
     * 
     * @param string $order Specifies sorting order for messages list, possible
     *                      values are: `asc` or `desc`.
     * @return $this Fluent Builder
     */
    public function setOrder($order) {
        $this->options['order'] = $order;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.IpMessaging.V2.ReadMessageOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateMessageOptions extends Options {
    /**
     * @param string $body The message body string.
     * @param string $attributes The attributes metadata field you can use to store
     *                           any data you wish.
     * @param \DateTime $dateCreated The ISO8601 time specifying the datetime the
     *                               Message should be set as being created.
     * @param \DateTime $dateUpdated The ISO8601 time specifying the datetime the
     *                               Message should be set as having been last
     *                               updated.
     * @param string $lastUpdatedBy Specify the Identity of the User that last
     *                              updated the Message
     */
    public function __construct($body = Values::NONE, $attributes = Values::NONE, $dateCreated = Values::NONE, $dateUpdated = Values::NONE, $lastUpdatedBy = Values::NONE) {
        $this->options['body'] = $body;
        $this->options['attributes'] = $attributes;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['lastUpdatedBy'] = $lastUpdatedBy;
    }

    /**
     * The message body string. You can also send structured data by serializing it into a string. May be updated to empty string or `null`, will be set as empty string as a result in this cases.
     * 
     * @param string $body The message body string.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The attributes metadata field you can use to store any data you wish.  The string value must contain structurally valid JSON if specified.
     * 
     * @param string $attributes The attributes metadata field you can use to store
     *                           any data you wish.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The ISO8601 time specifying the datetime the Message should be set as being created.
     * 
     * @param \DateTime $dateCreated The ISO8601 time specifying the datetime the
     *                               Message should be set as being created.
     * @return $this Fluent Builder
     */
    public function setDateCreated($dateCreated) {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The ISO8601 time specifying the datetime the Message should be set as having been last updated.
     * 
     * @param \DateTime $dateUpdated The ISO8601 time specifying the datetime the
     *                               Message should be set as having been last
     *                               updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated($dateUpdated) {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * Specify the Identity of the User that last updated the Message (if relevant)
     * 
     * @param string $lastUpdatedBy Specify the Identity of the User that last
     *                              updated the Message
     * @return $this Fluent Builder
     */
    public function setLastUpdatedBy($lastUpdatedBy) {
        $this->options['lastUpdatedBy'] = $lastUpdatedBy;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.IpMessaging.V2.UpdateMessageOptions ' . implode(' ', $options) . ']';
    }
}