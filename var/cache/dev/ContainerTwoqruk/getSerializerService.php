<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'serializer' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/serializer/SerializerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/NormalizerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/DenormalizerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/EncoderInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/DecoderInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Serializer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/SerializerAwareInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/SerializerAwareTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/SerializerAwareNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/ObjectToPopulateTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/AbstractNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/JsonSerializableNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/DateTimeNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/DateIntervalNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/DataUriNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/ArrayDenormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/AbstractObjectNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Normalizer/ObjectNormalizer.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/SerializerAwareEncoder.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/NormalizationAwareInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/XmlEncoder.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/JsonEncoder.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/YamlEncoder.php';
include_once $this->targetDirs[3].'/vendor/symfony/serializer/Encoder/CsvEncoder.php';

return $this->services['serializer'] = new \Symfony\Component\Serializer\Serializer([0 => new \Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer(), 1 => new \Symfony\Component\Serializer\Normalizer\DateTimeNormalizer(), 2 => new \Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer(), 3 => new \Symfony\Component\Serializer\Normalizer\DataUriNormalizer(), 4 => new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), 5 => new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer(${($_ = isset($this->services['serializer.mapping.class_metadata_factory']) ? $this->services['serializer.mapping.class_metadata_factory'] : $this->load('getSerializer_Mapping_ClassMetadataFactoryService.php')) && false ?: '_'}, NULL, ${($_ = isset($this->services['property_accessor']) ? $this->services['property_accessor'] : $this->load('getPropertyAccessorService.php')) && false ?: '_'}, ${($_ = isset($this->services['property_info']) ? $this->services['property_info'] : $this->load('getPropertyInfoService.php')) && false ?: '_'})], [0 => new \Symfony\Component\Serializer\Encoder\XmlEncoder(), 1 => new \Symfony\Component\Serializer\Encoder\JsonEncoder(), 2 => new \Symfony\Component\Serializer\Encoder\YamlEncoder(), 3 => new \Symfony\Component\Serializer\Encoder\CsvEncoder()]);
