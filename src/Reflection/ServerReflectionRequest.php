<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: reflection.proto

namespace Xhtkyy\GrpcServer\Reflection;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The message sent by the client when calling ServerReflectionInfo method.
 *
 * Generated from protobuf message <code>grpc.reflection.v1alpha.ServerReflectionRequest</code>
 */
class ServerReflectionRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string host = 1;</code>
     */
    protected $host = '';
    protected $message_request;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $host
     *     @type string $file_by_filename
     *           Find a proto file by the file name.
     *     @type string $file_containing_symbol
     *           Find the proto file that declares the given fully-qualified symbol name.
     *           This field should be a fully-qualified symbol name
     *           (e.g. <package>.<service>[.<method>] or <package>.<type>).
     *     @type \Xhtkyy\GrpcServer\Reflection\ExtensionRequest $file_containing_extension
     *           Find the proto file which defines an extension extending the given
     *           message type with the given field number.
     *     @type string $all_extension_numbers_of_type
     *           Finds the tag numbers used by all known extensions of the given message
     *           type, and appends them to ExtensionNumberResponse in an undefined order.
     *           Its corresponding method is best-effort: it's not guaranteed that the
     *           reflection service will implement this method, and it's not guaranteed
     *           that this method will provide all extensions. Returns
     *           StatusCode::UNIMPLEMENTED if it's not implemented.
     *           This field should be a fully-qualified type name. The format is
     *           <package>.<type>
     *     @type string $list_services
     *           List the full names of registered services. The content will not be
     *           checked.
     * }
     */
    public function __construct($data = NULL) {
        \Xhtkyy\GrpcServer\Reflection\GPBMetadata\Reflection::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string host = 1;</code>
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Generated from protobuf field <code>string host = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setHost($var)
    {
        GPBUtil::checkString($var, True);
        $this->host = $var;

        return $this;
    }

    /**
     * Find a proto file by the file name.
     *
     * Generated from protobuf field <code>string file_by_filename = 3;</code>
     * @return string
     */
    public function getFileByFilename()
    {
        return $this->readOneof(3);
    }

    public function hasFileByFilename()
    {
        return $this->hasOneof(3);
    }

    /**
     * Find a proto file by the file name.
     *
     * Generated from protobuf field <code>string file_by_filename = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setFileByFilename($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Find the proto file that declares the given fully-qualified symbol name.
     * This field should be a fully-qualified symbol name
     * (e.g. <package>.<service>[.<method>] or <package>.<type>).
     *
     * Generated from protobuf field <code>string file_containing_symbol = 4;</code>
     * @return string
     */
    public function getFileContainingSymbol()
    {
        return $this->readOneof(4);
    }

    public function hasFileContainingSymbol()
    {
        return $this->hasOneof(4);
    }

    /**
     * Find the proto file that declares the given fully-qualified symbol name.
     * This field should be a fully-qualified symbol name
     * (e.g. <package>.<service>[.<method>] or <package>.<type>).
     *
     * Generated from protobuf field <code>string file_containing_symbol = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setFileContainingSymbol($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Find the proto file which defines an extension extending the given
     * message type with the given field number.
     *
     * Generated from protobuf field <code>.grpc.reflection.v1alpha.ExtensionRequest file_containing_extension = 5;</code>
     * @return \Xhtkyy\GrpcServer\Reflection\ExtensionRequest|null
     */
    public function getFileContainingExtension()
    {
        return $this->readOneof(5);
    }

    public function hasFileContainingExtension()
    {
        return $this->hasOneof(5);
    }

    /**
     * Find the proto file which defines an extension extending the given
     * message type with the given field number.
     *
     * Generated from protobuf field <code>.grpc.reflection.v1alpha.ExtensionRequest file_containing_extension = 5;</code>
     * @param \Xhtkyy\GrpcServer\Reflection\ExtensionRequest $var
     * @return $this
     */
    public function setFileContainingExtension($var)
    {
        GPBUtil::checkMessage($var, \Xhtkyy\GrpcServer\Reflection\ExtensionRequest::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Finds the tag numbers used by all known extensions of the given message
     * type, and appends them to ExtensionNumberResponse in an undefined order.
     * Its corresponding method is best-effort: it's not guaranteed that the
     * reflection service will implement this method, and it's not guaranteed
     * that this method will provide all extensions. Returns
     * StatusCode::UNIMPLEMENTED if it's not implemented.
     * This field should be a fully-qualified type name. The format is
     * <package>.<type>
     *
     * Generated from protobuf field <code>string all_extension_numbers_of_type = 6;</code>
     * @return string
     */
    public function getAllExtensionNumbersOfType()
    {
        return $this->readOneof(6);
    }

    public function hasAllExtensionNumbersOfType()
    {
        return $this->hasOneof(6);
    }

    /**
     * Finds the tag numbers used by all known extensions of the given message
     * type, and appends them to ExtensionNumberResponse in an undefined order.
     * Its corresponding method is best-effort: it's not guaranteed that the
     * reflection service will implement this method, and it's not guaranteed
     * that this method will provide all extensions. Returns
     * StatusCode::UNIMPLEMENTED if it's not implemented.
     * This field should be a fully-qualified type name. The format is
     * <package>.<type>
     *
     * Generated from protobuf field <code>string all_extension_numbers_of_type = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setAllExtensionNumbersOfType($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * List the full names of registered services. The content will not be
     * checked.
     *
     * Generated from protobuf field <code>string list_services = 7;</code>
     * @return string
     */
    public function getListServices()
    {
        return $this->readOneof(7);
    }

    public function hasListServices()
    {
        return $this->hasOneof(7);
    }

    /**
     * List the full names of registered services. The content will not be
     * checked.
     *
     * Generated from protobuf field <code>string list_services = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setListServices($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageRequest()
    {
        return $this->whichOneof("message_request");
    }

}

