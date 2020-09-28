<?php

declare(strict_types=1);

namespace Longyan\Kafka\Protocol\ListPartitionReassignments;

use Longyan\Kafka\Protocol\AbstractStruct;
use Longyan\Kafka\Protocol\ProtocolField;

class OngoingTopicReassignment extends AbstractStruct
{
    /**
     * The topic name.
     *
     * @var string
     */
    protected $topicName;

    /**
     * The ongoing reassignments for each partition.
     *
     * @var OngoingPartitionReassignment[]
     */
    protected $partitions = [];

    public function __construct()
    {
        if (!isset(self::$maps[self::class])) {
            self::$maps[self::class] = [
                new ProtocolField('topicName', 'string', false, [0], [0], [], [], null),
                new ProtocolField('partitions', OngoingPartitionReassignment::class, true, [0], [0], [], [], null),
            ];
            self::$taggedFieldses[self::class] = [
            ];
        }
    }

    public function getFlexibleVersions(): array
    {
        return [0];
    }

    public function getTopicName(): string
    {
        return $this->topicName;
    }

    public function setTopicName(string $topicName): self
    {
        $this->topicName = $topicName;

        return $this;
    }

    /**
     * @return OngoingPartitionReassignment[]
     */
    public function getPartitions(): array
    {
        return $this->partitions;
    }

    /**
     * @param OngoingPartitionReassignment[] $partitions
     */
    public function setPartitions(array $partitions): self
    {
        $this->partitions = $partitions;

        return $this;
    }
}